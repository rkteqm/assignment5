$(document).ready(function () {
    $("#regform").validate({
        rules: {
            // image: "required",
            name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                pwdUpper: /[A-Z]+/,
                pwdLower: /[a-z]+/,
                pwdNumber: /[0-9]+/,
                pwdSpecial: /[!@#$%^&()'[\]"?+-/*={}.,;:_]+/,
                minlength: 8,
                pwdLength: /^.{8,16}$/,
            },
            confirm_password: {
                required: true,
                equalTo: "#password" //for checking both passwords are same or not
            },
        },
        messages: {
            // image: " Please select your file",
            name: {
                required: " Please enter your name",
                lettersonly: "Please Enter characters only",
                minlength: "Name need to be at least 2 characters long",
                email: {
                    required: " Please enter a email",
                    email: " Please enter valid email",
                },
                password: {
                    required: "Please enter your password",
                    pwdUpper: "Please enter at least one uppercase",
                    pwdLower: "Please enter at least one lowercase",
                    pwdNumber: "Please enter at least one numeric",
                    pwdSpecial: "Please enter at least one special character",
                    minlength: " Your password must be consist of at least 8 characters",
                    pwdLength: " Your password length must be 8 to 16 characters"
                },
                confirm_password: {
                    required: " Please enter a password",
                    equalTo: " Please enter the same password as above"
                },
            },
            submitHandler: function (form) {
                alert('dddddd');
                var postdata = $("#regform").serialize();
                $.ajax({
                    url: "http://localhost:8765/users/register",
                    data: postdata,
                    type: "JSON",
                    method: "post",
                    success: function (response) {
                        alert(response);
                        // data = JSON.parse(response);
                        // $('#rahul').html('');
                        // $('#rahul').append(data['message']);
                    }
                });
            }
        }
    });
});