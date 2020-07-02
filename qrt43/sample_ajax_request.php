<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/fav.png">
    <!-- Author Meta -->
    <!--    <meta name="author" content="colorlib">-->
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Blogger</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>


<!-- End top-section Area -->
<div class="row justify-content-between align-items-center d-flex">
    <div class="col-lg-8">
        <img class="img-fluid" src="../img/top10betzlogo.png" alt="">
    </div>
</div>

<!-- Start post Area -->
<div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-page-post">

                        <h3>Sign Up Admin</h3>
                        <form method="post" id="signup-form" action="#" enctype="multipart/form-data">
                            <div class="mt-10">
                                <input type="text" name="firstname" id="firstName" placeholder="First Name"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                                       class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="text" name="lastname" id="lastName" placeholder="Last Name"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                                       class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="text" name="username" id="username" placeholder="Username"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required
                                       class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="text" id="email" name="email" placeholder="Email"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required
                                       class="single-input"><span class="text-danger" id="email-error"></span>
                            </div>
                            <div class="mt-10">
                                <textarea type="text" name="description" id="description" class="single-textarea"
                                          style="height: 100px;" placeholder="Description"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'"
                                          required></textarea>
                            </div>
                            <div class='mt-10'>
                                <img src="" id="img-preview" width="100" height="100">
                            </div>
                            <div class="mt-10">
                                <input type="file" name="image" id="image" placeholder="Image"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Image'" required
                                       class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="password" name="password" id="password" placeholder="Password"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                                       class="single-input"><span class="text-danger" id="password-error"></span>
                            </div>
                            <div class="mt-10">
                                <input type="password" name="confirm_password" id="confirmPassword"
                                       placeholder="Confirm Password" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Confirm Password'" required
                                       class="single-input"><span class="text-danger"
                                                                  id="confirm-password-error"></span>
                            </div>
                            <div id="error-message"></div>
                            <div class="mt-10">
                                <input id="signup-button" type="submit" value="Submit" class="primary-btn mt-20">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- End post Area -->


<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    }

    function getBase64Image(imgElem) {
        // imgElem must be on the same server otherwise a cross-origin error will be thrown "SECURITY_ERR: DOM Exception 18"
        var canvas = document.createElement("canvas");
        canvas.width = imgElem.clientWidth;
        canvas.height = imgElem.clientHeight;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(imgElem, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready(function () {

        var firstnameInput = $("input[name=first-name]").val();
        var lastnameInput = $("input[name=last-name").val();
        var usernameInput = $("input[name=username]").val();
        var emailInput = $("input[name=email]").val();
        var descriptionInput = $("textarea[name=description]").val();
        var imageInput = $("input[name=image]").val();
        var passwordInput = $("input[name=password]").val();
        var confirmpasswordInput = $("input[name=confirm-password]").val();

        $('#img-preview').hide();
        $("#img-preview").css("display", "none");
        $("#image").change(function () {
            $('#img-preview').show();
            readURL(this);
        });

        $.validator.addMethod("letters", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
        });

        $("#signup-form").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3,
                    letters: true
                },
                lastname: {
                    required: true,
                    minlength: 3,
                    letters: true
                },
                username: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                description: {
                    required: true,
                    minlength: 20
                },
                image: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                firstname: "Please specify your first name (only letters and spaces are allowed)",
                lastname: "Please specify your last name (only letters and spaces are allowed)",
                username: "Please specify a username (only letters and spaces are allowed)",
                email: "Please specify a valid email address",
                description: "Please add a summary description of you",
                image: "Please select a profile image",
                password: "Please specify your password(8 characters or more)",
                confirm_password: "Passwords do not match"
            },
            submitHandler: function () {
                var imgElement = $('#img-preview');
                var img = getBase64Image(imgElement);

                $.ajax({
                    url: 'ajax/sign-up-aj.php',
                    type: 'POST',
                    data: {
                        firstname: 'firstnameInput',
                        lastname: 'lastnameInput',
                        username: 'usernameInput',
                        email: 'emailInput',
                        description: 'descriptionInput',
                        image: 'img',
                        password: 'passwordInput'
                    }
                }).done(function (data) {
                    $('#error-message').html(data);
                }).fail(function (xhr, status, data) {
                    $('#error-message').html('<hr><div class="alert alert-warning"><p align="center"><strong><i class="fa fa-exclamation-triangle"></i> Oops!</strong> Something went wrong, Please try again... </p></div>');
                });
            }
        });

    });
</script>

</body>
</html>

