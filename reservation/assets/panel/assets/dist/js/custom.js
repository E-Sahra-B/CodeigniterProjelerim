$(document).ready(function () {
  var base_url = $(".base_url").text();
  $(".sortableList").sortable({ delay: 300, opacity: 0.6, cursor: "move" });
  $(".sortableList").on("sortupdate", function (event, ui) {
    var data = $(this).sortable("serialize");
    var postUrl = $(this).attr("postUrl");
    $.post(base_url + postUrl, { data: data }, function (response) {});
  });

  $(".toggle_check").bootstrapToggle();
  $(".toggle_check").change(function () {
    var isActive = $(this).prop("checked");
    var base_url = $(".base_url").text();
    var id = $(this).attr("dataID");
    var toggleUrl = $(this).attr("toggleUrl");
    $.post(
      base_url + toggleUrl,
      {
        id: id,
        isActive: isActive,
      },
      function (response) {}
    );
  });

  $(".toggle_active").bootstrapToggle();
  $(".toggle_active").change(function () {
    var isActive = $(this).prop("checked");
    var base_url = $(".base_url").text();
    var id = $(this).attr("dataID");
    var toggleCover = $(".toggle_cover");
    $.post(
      base_url + "panel/room/isActiveSetterForImage",
      {
        id: id,
        isActive: isActive,
      },
      function (response) {
        if (!isActive) {
          toggleCover.bootstrapToggle("off");
        }
      }
    );
  });

  $(".toggle_cover").bootstrapToggle();
  $(".toggle_cover").change(function () {
    var isCover = $(this).prop("checked");
    var base_url = $(".base_url").text();
    var id = $(this).attr("dataID");
    var toggle_active = $(".toggle_active");
    $.post(
      base_url + "panel/room/isCoverSetterForImage",
      {
        id: id,
        isCover: isCover,
      },
      function (response) {
        if (isCover) {
          toggle_active.bootstrapToggle("on");
        }
      }
    );
  });

  $(".treeview-menu > li").click(function (e) {
    var parent = $(this).parent().attr("id");
    var activeItem = $(this).attr("id");
    var url = $(this).find("a").attr("href");
    $.post(
      base_url + "panel/dashboard/setActiveMenu",
      { parent: parent, activeItem: activeItem },
      function (response) {}
    );
    e.preventDefault();
    setTimeout(function () {
      window.location.href = url;
    }, 100);
  });

  // Confirm
  $(".removeBtn").click(function () {
    var dataURL = $(this).attr("dataURL");
    var remove = bootbox.confirm("Silmek istiyor musunuz ?", function (result) {
      if (result == true) {
        window.location.href = dataURL;
      }
    });
  });
});
