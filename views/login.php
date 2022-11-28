



<?php
session_start();
if(isset($_SESSION['userUniqueID'])){
    header("Location: ../views/userdashboard.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeniorSys</title>
    <?php include('../inc/designs2.php');?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400&family=Noto+Serif:ital,wght@1,700&family=Patua+One&family=Volkhov:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom_style.css?v=3"/>

    <style>
        label{
            font-size: 0.9rem;
        }
    </style>

</head>
  <body>

    <div id="login">
        <a href="../index.php" style="position: absolute; top: 3%; left: 3%; ">Back to Homepage</a>
            <div class="inner-login" style="height: 95%;">
                <div class="login-panel" id="loginPanel">
                    <div class="sidepanel">
                            <img src="../assets/img/login.png" alt="">
                            <h5 class="text-center mt-5">Senior Citizen System</h5>
                    </div>
                    <div class="form-panel-login ">
                        
                        <a href="adminlogin.php" style="float: right; padding: 10px;">Login as Admin</a>
                        <div style="width: 100%; position: relative; top: 15%; " class="d-flex justify-content-center">
                            <div id="forgotPasword" style="width: 80%; display:none;">
                            <form action="" id="forgotPasswordForm">
                                <h4 class="text-center">Forgot Password</h4>
                                <input id="enterEmailAddress" type="email" name="enterEmailAddress" placeholder="Enter your email" class="input-fields-custom mt-4">
                                <input  type="submit" class="contact-submit mt-4 mb-4" value="Submit">
                                <h5 class="mt-2 mb-5 text-start" style="display: none;" id="passwordNotFound">Password not found! Your email is not registered on system.</h5>
                                <h5 class="mt-2 mb-5 text-start" style="display: none;" id="passwordFound">Your password is: <b class="text-success" id="showPassword" >123</b><small><br>Note: Your password is HASH type for security purpose, Please use this third party link to decrypt your password hash.</small><br><a href="https://www.md5online.org/md5-decrypt.html" target="_blank">MD5 Decrypt Password</a></h5>
                                <a href="login.php" style="margin-top: 60px;">Click here to login</a>
                            </form>
                            </div>

                        <form action="" class="text-center" style="width: 70%;" id="seniorLogin">
                            <h4 class="mb-5 text-center">Login</h4>
                            <input type="text" name="username" placeholder="Username" class="input-fields-custom ">
                            <input type="password" name="password" placeholder="Password" class="input-fields-custom" style=" margin-top: 20px;"><br>
                            <a id="forgotPasswordBtn" class="forgotPass text-start" style="cursor: pointer;">Forgot Password</a>
                            <input  type="submit" class="contact-submit mt-5" value="Login">

                            <p class="mt-5">Don't have an account yet? <a style="color: #1c3456; cursor: pointer; text-decoration: underline;" id="registerBTN">Register</a></p>
                            <input type="hidden" name="SeniorLogin">
                        </form>
                        </div>

                    </div>

            </div>



            <div class="login-panel"  id="RegisterPanel"  style="display: none; position: absolute; top:50%; left: 50%; transform: translate(-50%,-50%);">
                <form action="" id="seniorReg">
                    <div class="form-panel-login p-4" >
                        <h4 class="text-start mt-1 mb-2">Register</h4>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Last Name</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="text" name="lname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>First Name</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="text" name="fname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Middle Name</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="text" name="mname" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Birthdate</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="date" name="birthDate" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Cellphone Number</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="text" name="cpNo" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Email</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="text" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Address</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="text" name="address" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Birth Certificate</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
                                        <input type="file" class="form-control" name="birthCert" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Barangay Clearance</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
                                        <input type="file" class="form-control" name="brgyClear" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Username</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="text" name="uname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Password</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="password" class="form-control" name="regpass" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label"><b>Confirm Password</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                                        <input type="password" class="form-control" name="regconpass" required>
                                    </div>
                                </div>
                            </div>

                            <input  type="submit" class="contact-submit mt-3" value="Register">
                            <p class="mt-4 text-center">Already have an account? <a style="color: #1c3456; cursor: pointer; text-decoration: underline;" id="loginBTN">Login</a></p>

                    </div>

                    </div>
                    <input type="hidden" name="SeniorRegistrationForm">
                </form>
        </div>
    </div>


    <script>
        $(document).ready(function(){

            $("#forgotPasswordBtn").click(function(){
                $("#forgotPasword").css("display","block");
                $("#seniorLogin").css("display","none");
                
            })

            $("#forgotPasswordForm").submit(function(e){
                e.preventDefault();
                dataforgotPass = $("#enterEmailAddress").val();
                
                $.ajax({
                    type: "POST",
                    url: "../Controller/SeniorCitizenFunction.php",
                    data: {forgot_data:dataforgotPass, forgotPasswordAction: "forgotPasswordAction"},
                    success: function(response){
                        if(response == "NoAccount"){
                            
                            $("#passwordNotFound").css("display","block");
                            $("#passwordFound").css("display", "none");

                        }else{
                            $("#passwordNotFound").css("display","none");
                            $("#passwordFound").css("display", "block");
                            $("#showPassword").text(response);
                            
                        }
                    }
                })
            })







            $("#registerBTN").on('click', function(){
                $("#loginPanel").fadeOut();
                $("#RegisterPanel").fadeIn();
            })
            $("#loginBTN").on('click', function(){
                $("#RegisterPanel").fadeOut();
                $("#loginPanel").fadeIn();
            })
            $("#loginInput").click(function(){
                window.location.href ="userdashboard.php";
            })

            $("#seniorReg").submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "../Controller/SeniorCitizenFunction.php",
                    data: formData,
                    success: function(data){
                        if(data == "NotMatch"){
                            Swal.fire(
                            'Failed!',
                            'Your passwords does not match',
                            'error'
                            )
                        }
                        else{

                            $("#seniorReg")[0].reset();
                            
                            Swal.fire({
                            title: 'Success',
                            text: "Account Registration Successfully!",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href="login.php";
                            }
                            })
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            })



            
            $("#seniorLogin").submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "../Controller/SeniorCitizenFunction.php",
                    data: formData,
                    success: function(data){
                        if(data == "NoFound"){
                            Swal.fire(
                            'No Found!',
                            'Invalid username or password',
                            'error'
                            )
                        }
                        else{
                            window.location.href="userdashboard.php";
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            })



        })
    </script>


  </body>
</html>