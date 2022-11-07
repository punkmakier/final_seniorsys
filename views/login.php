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
    <link rel="stylesheet" href="../css/custom_style.css?v=2"/>

    <style>
        label{
            font-size: 0.9rem;
        }
    </style>

</head>
  <body>

    <div id="login">
        <a href="../index.php" style="position: absolute; top: 3%; left: 3%; ">Back to Homepage</a>
            <div class="inner-login" style="height: 90%;">
                <div class="login-panel" id="loginPanel">
                    <div class="sidepanel">
                            <img src="../assets/img/login.png" alt="">
                            <h5 class="text-center mt-5">Lorem Impsum</h5>
                    </div>
                    <div class="form-panel-login ">
                        <div style="width: 100%; position: relative; top: 15%; " class="d-flex justify-content-center">
                        <form action="" class="text-center" style="width: 70%;" id="seniorLogin">
                            <h4 class="mb-5 text-center">Login</h4>
                            <input type="text" name="username" placeholder="Username" class="input-fields-custom ">
                            <input type="password" name="password" placeholder="Password" class="input-fields-custom" style=" margin-top: 20px;"><br>
                            <a href="" class="forgotPass text-start">Forgot Password</a>
                            <input  type="submit" class="contact-submit mt-5" value="Login">

                            <p class="mt-5">Don't have an account yet? <a style="color: #1c3456; cursor: pointer; text-decoration: underline;" id="registerBTN">Register</a></p>
                            <input type="hidden" name="SeniorLogin">
                        </form>
                        </div>

                    </div>

            </div>



            <div class="login-panel"  id="RegisterPanel"  style="display: none;">
                <div class="sidepanel">
                        <img src="../assets/img/login.png" alt="">
                        <h5 class="text-center mt-5">Lorem Impsum</h5>
                </div>
                <form action="" id="seniorReg">
                    <div class="form-panel-login p-4" >
                        <h4 class="text-start mt-3 mb-4">Register</h4>
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
                    <input type="hidden" name="SeniorRegistration">
                </form>
        </div>
    </div>


    <script>
        $(document).ready(function(){
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
                            Swal.fire(
                            'Success',
                            'Account Registration Successfully!',
                            'success'
                            )
                            $("#seniorReg")[0].reset();
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