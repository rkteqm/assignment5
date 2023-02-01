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

// $(document).ready(function () {
//     $('.page-link').click(function () {
//         $(".page-item").removeClass("active");
//         addclas = $(this).parent();
//         addclas.addClass("active")
//         var count = $(this).html();
//         $.ajax({
//             url: 'pagination_data.php',
//             type: 'post',
//             data: ({
//                 'mypage': true,
//                 'count': count
//             }),
//             success: function (response) {
//                 $('.rahul').html('');
//                 $('.rahul').append(response);
//             }
//         });
//     });
// });

// function performSearch() {

//     // Declare search string 
//     var filter = searchBox.value.toUpperCase();

//     // Loop through first tbody's rows
//     for (var rowI = 0; rowI < trs.length; rowI++) {

//         // define the row's cells
//         var tds = trs[rowI].getElementsByTagName("td");

//         // hide the row
//         trs[rowI].style.display = "none";

//         // loop through row cells
//         for (var cellI = 0; cellI < tds.length; cellI++) {

//             // if there's a match
//             if (tds[cellI].innerHTML.toUpperCase().indexOf(filter) > -1) {

//                 // show the row
//                 trs[rowI].style.display = "";

//                 // skip to the next row
//                 continue;

//             }
//         }
//     }

// }

// // declare elements
// const searchBox = document.getElementById('searchBox');
// const table = document.getElementById("myTable");
// const trs = table.tBodies[0].getElementsByTagName("tr");

// // add event listener to search box
// searchBox.addEventListener('keyup', performSearch);