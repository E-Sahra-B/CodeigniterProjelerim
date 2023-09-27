<script>
    $(document).ready(function() {
        $(".reservation_submit_btn").click(function() {
            $(".reservation_form").submit();
        })
        $("#checkout").change(function() {
            if ($("#checkin").val() !== "" && $("#checkout").val() !== "") {
                $(".sorgu-btn").removeClass("disabled");
            }
        })
        $(".book_check").change(function() {
            var $state = $(this).prop("checked");
            var disabled_status = false;
            var $total_price = 0;
            $.each($(".book_check"), function(key, item) {
                if ($(item).prop("checked") == true) {
                    disabled_status = true;
                    var $price = $(item).parent().parent().find(".total_price_col").val();
                    $total_price += parseFloat($price);
                }
            })
            if ($state == true) {
                $(".reservation_submit_btn").removeClass("disabled");
            } else {
                if (!disabled_status)
                    $(".reservation_submit_btn").addClass("disabled");
            }
            $(".total_price").text(new Intl.NumberFormat('tr-TR').format($total_price));
            //$(".total_price").text(($total_price).toFixed(3));
        })
    })
</script>