<?php


    require_once '../Model/SeniorAccount.php';
    $snrAccountDetails = new SeniorAccount;
    $sessionID = $_SESSION['userUniqueID'];

    if(!isset($_SESSION['userUniqueID'])){
      header("Location: ../views/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php include '../inc/designs2.php'; ?>
    <link rel="stylesheet" href="../css/custom2_style.css?v=1" />

  </head>
  <body>

    <input type="hidden" id="role" value="" />
    <div class="sidebar">
      <div class=" text-center pt-5 pe-5 ps-5 pb-2">
          <img src="../assets/img/logo.png" width="100"/>
      </div>

      <div class="dasboard-text">
        <span><i class="fa-solid fa-circle-user"></i>&nbsp;<?php $snrAccountDetails->SnrStatus($sessionID); ?><br />
        <input type="hidden" value="<?php $snrAccountDetails->SnrStatus($sessionID); ?>" id="accountStatusCheck">
        <small>Status</small>
      </div>
      <div class="menu">
        <div class="item">
          <a class="sub-btn" href="userdashboard.php" id="dashboardMenu"><i class="fa-solid fa-house-user"></i>&nbsp;&nbsp;Dashboard</a>
        </div>
        <div class="item" id="adminTools ">
          <a class="sub-btn" id="Services"><i class="fa-solid fa-gears"></i>&nbsp;&nbsp; Services <i class="fa-solid fa-caret-right dropdown-icon"></i></a>
          <div class="sub-menu">
            <a  class="sub-item" type="button" data-bs-toggle="modal" data-bs-target="#pensionModal"><i class="fa-solid fa-sack-dollar"></i>&nbsp;&nbsp;Request Pension</a>
            <a  class="sub-item" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#seniorID"><i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;Request Senior ID<small style="color: red;"></small></a>
            <a  class="sub-item" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#burialAsst"><i class="fa-solid fa-cross"></i>&nbsp;&nbsp;Request Burial<small style="color: red;"></small></a>
        </div>
        </div>
        <div class="item">
          <a type="button" data-bs-toggle="modal" data-bs-target="#sendMessage"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;Message</a>
        </div>

        <div class="item" id="adminTools">
          <a class="sub-btn"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;&nbsp; Account Settings <i class="fa-solid fa-caret-right dropdown-icon"></i></a>
          <div class="sub-menu">
            <a  class="sub-item" href="accountsettings.php"><i class="fa-solid fa-person"></i>&nbsp;&nbsp;Edit Personal Info</a>
            <a  class="sub-item" href="userinfo.php"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;User Account Info</a>
        </div>
        </div>
        <div class="item"><a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-left: 0;"></i>&nbsp;&nbsp;Logout</a></div>
      </div>
    </div>


    <div class="content">
      <div class="inner-content">
        <div class="header">
          <div class="header">

          </div>
        </div>


<!-- Pension Modal -->
<div class="modal fade" id="pensionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Request Pension</h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="reqPensionForm">
      <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label"><b>Senior Citizen ID</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
            <input type="file" class="form-control" id="inputGroupFile02" name="seniorID" required>
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputEmail1" class="form-label"><b>Photocopy of senior ID with 3 specimen signatures</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
            <input type="file" class="form-control" id="inputGroupFile02" name="signatures" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</button>
        <input type="submit" class="btn btn-custom-default" style="width: 20%;"id="requestPensionBTN">
      </div>
      <input type="hidden" name="reqPensionTrigger">
    </form>
    </div>
  </div>
</div>



<!-- Senior ID Modal -->
<div class="modal fade" id="seniorID" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Request Senior ID</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="reqSeniorIDForm">

      <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label"><b>1 copy of 2x2 Picture</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
            <input type="file" class="form-control" id="inputGroupFile02" name="pictureCopy" required>
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputEmail1" class="form-label"><b>Valid ID or Birth Certificate</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
            <input type="file" class="form-control" id="inputGroupFile02" name="validCert" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</button>
        <input type="submit" class="btn btn-custom-default" style="width: 20%;">
      </div>
    </div>
    <input type="hidden" name="reqSeniorIDTrigger">
    </form>
  </div>
</div>


<!-- Burial Asst Modal -->
<div class="modal fade" id="burialAsst" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Request Burial Assistance</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="reqBurialForm">

      <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label"><b>Senior ID</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
            <input type="file" class="form-control" id="inputGroupFile02" name="bur_srID" required>
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputEmail1" class="form-label"><b>Death Certificate</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
            <input type="file" class="form-control" id="inputGroupFile02" name="bur_deathCert"  required>
        </div>
        <div class="form-group mt-4">
          <label for="exampleInputEmail1" class="form-label" style="font-size: 0.9rem;"><b>Cause of Death</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
          <input type="text" class="form-control mb-4" name="bur_cod"  required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</button>
        <input type="submit" class="btn btn-custom-default" style="width: 20%;">
      </div>
    </div>
    <input type="hidden" name="reqBurialAsstTrigger">
    </form>
  </div>
</div>







<!-- Send Message Modal -->
<div class="modal fade" id="sendMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="" id="messageForm">
        <div class="form-group mb-3">
              <label for="exampleInputEmail1" class="form-label" style="font-size: 0.9rem;"><b>Subject</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
              <input type="text" class="form-control mb-4" name="subjectMessage" required>
              <label for="exampleInputEmail1" class="form-label"><b>Send your message to Admins</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
              <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a message here" id="floatingTextarea2" style="height: 100px" name="bodyMessage" required></textarea>
                  <label for="floatingTextarea2">Leave a message here</label>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" value="<?php $snrAccountDetails->SnrFirstName($sessionID);$snrAccountDetails->SnrMiddleName($sessionID);$snrAccountDetails->SnrLastName($sessionID);?>" name="senderName">
          <input type="hidden" name="messageToAdmin">
          <a type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</a>
          <input type="submit" class="btn btn-custom-default" style="width: 20%;">
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    
    $("#reqBurialForm").submit(function(e){
      e.preventDefault();
      var formData = new FormData(this);


      $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(response){
                    if(response == "Failed"){
                            Swal.fire(
                            'Failed!',
                            'There\'\ s something wrong...',
                            'error'
                            )
                    }
                    else if(response == "Required"){
                      Swal.fire(
                            'Failed!',
                            'All fields are required.',
                            'error'
                            )
                    }
                    else{
                            Swal.fire({
                            title: 'Success',
                            text: "Please wait for admin response.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                            })
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })




    })

    $("#reqPensionForm").submit(function(e){
      e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(response){
                    if(response == "Failed"){
                            Swal.fire(
                            'Failed!',
                            'There\'\ s something wrong...',
                            'error'
                            )
                    }
                    else if(response == "Required"){
                      Swal.fire(
                            'Failed!',
                            'All fields are required.',
                            'error'
                            )
                    }
                    else{
                            Swal.fire({
                            title: 'Success',
                            text: "Please wait for admin response.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                            })
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })
    })

    
    $("#reqSeniorIDForm").submit(function(e){
      e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(response){
                    if(response == "Failed"){
                            Swal.fire(
                            'Failed!',
                            'There\'\ s something wrong...',
                            'error'
                            )
                    }
                    else if(response == "Required"){
                      Swal.fire(
                            'Failed!',
                            'All fields are required.',
                            'error'
                            )
                    }
                    else{
                            Swal.fire({
                            title: 'Success',
                            text: "Please wait for admin response.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                            })
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })
    })



    if($("#accountStatusCheck").val() == "Unverified"){
        $("#Services").css("display","none");
    }

    $("#messageForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
      
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(data){
                    if(data == "Failed"){
                            Swal.fire(
                            'Failed!',
                            'There\'\ s something wrong...',
                            'error'
                            )
                    }
                    else{
                            Swal.fire({
                            title: 'Success',
                            text: "Your account\'\ s information is updated!",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                            })
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })
  })
</script>