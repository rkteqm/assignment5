// $(document).ready(function () {
//     $("#regform").validate({
//         rules: {
//             name: {
//                 required: true,
//                 minlength: 2,
//                 regex: /^[A-Za-z]+$/,
//                 // lettersonly: true,
//             },
//             email: {
//                 required: true,
//                 email: true
//             },
//             password: {
//                 required: true,
//                 minlength: 8,
//                 pwdUpper: /[A-Z]+/,
//                 pwdLower: /[a-z]+/,
//                 pwdNumber: /[0-9]+/,
//                 pwdSpecial: /[!@#$%^&()'[\]"?+-/*={}.,;:_]+/,
//             },
//             confirm_password: {
//                 required: true,
//                 equalTo: "#password" //for checking both passwords are same or not
//             },
//         },
//         messages: {
//             name: {
//                 required: " Please enter your name",
//                 minlength: "Name need to be at least 2 characters long",
//                 regex: "Please Enter characters only",
//             },
//             email: {
//                 required: " Please enter your email",
//             },
//             password: {
//                 required: "Please enter your password",
//                 pwdUpper: "Please enter at least one uppercase",
//                 pwdLower: "Please enter at least one lowercase",
//                 pwdNumber: "Please enter at least one numeric",
//                 pwdSpecial: "Please enter at least one special character",
//                 minlength: " Your password must be consist of at least 8 characters",
//             },
//             confirm_password: {
//                 required: " Please enter your confirm password",
//                 equalTo: " Please enter the same password as above"
//             },
//         },
//         submitHandler: function (form) {
//             alert('dddddd');
//             var postdata = $("#regform").serialize();
//             $.ajax({
//                 url: "http://localhost:8765/users/register",
//                 data: postdata,
//                 type: "JSON",
//                 method: "post",
//                 success: function (response) {
//                     alert(response);
//                     // data = JSON.parse(response);
//                     // $('#rahul').html('');
//                     // $('#rahul').append(data['message']);
//                 }
//             });
//         }
//     });
// });