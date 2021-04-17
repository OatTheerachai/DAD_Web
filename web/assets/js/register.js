$(function () {
    'use strict'

    var email_state = false;
    $('#email').on('blur', function() {
        var email = $('#email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: '../../assets/lib/datareturn.php',
            type: 'post',
            data: {
                i: 126,
                email: email
            },
            success: function(response) {
                if (response.data == 'available') {
                    email_state = false;
                    $('#email').siblings("span").text("Sorry... Email already taken").css("color", "red");
                    // $("#email").css("color", "red");
                } else if (response.data == "unusable") {
                    email_state = true;
                    $('#email').siblings("span").text("Email available").css("color", "green");
                }
            }
        })
    });


});