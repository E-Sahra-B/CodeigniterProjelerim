<script>
    function generateRandomNumbers() {
        var num1 = Math.floor(Math.random() * 10) + 1;
        var num2 = Math.floor(Math.random() * 10) + 1;
        $("#num1").text(num1);
        $("#num2").text(num2);
        return num1 + num2;
    }

    var captchaResult = generateRandomNumbers();

    function checkCaptcha() {
        var userAnswer = parseInt($("#captchaAnswer").val());
        if (isNaN(userAnswer)) {
            showMessage("Geçerli bir sayı girin.");
            // Yanlış bir giriş olduğunda düğmeyi devre dışı bırak
            $("#checkCaptcha").prop("disabled", true);
        } else {
            if (userAnswer === captchaResult) {
                $("#checkCaptcha").prop("disabled", false);
            } else {
                showMessage("Yanlış. Lütfen tekrar deneyin.");
                $("#checkCaptcha").prop("disabled", true);
                captchaResult = generateRandomNumbers();
            }
        }
    }

    function showMessage(message) {
        $("#captchaMessage").css("color", "red").text(message);
        setTimeout(function() {
            $("#captchaMessage").text("").css("color", "");
            $("#captchaAnswer").val("");
        }, 3000);
    }

    $("#captchaAnswer").keydown(function(event) {
        if (event.keyCode === 13 || event.keyCode === 9) {
            checkCaptcha();
            event.preventDefault();
        }
    });

    $("#checkCaptcha").click(checkCaptcha);
</script>