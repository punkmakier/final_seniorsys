<?php
    require_once('../Model/init.php');

    
  
    require_once '../Model/AccountRequested.php';
    require_once '../Model/ShowMessage.php';
    require_once '../Model/AdminAccount.php';
    require_once '../Model/Services.php';

   
    $showDataSeniorRequest = new AccountRequested;
    $showMessage = new ShowMessage;
    $showAdmin = new AdminAccount;
    $services = new Services;
    $empID = $_SESSION['empID'];
    // $sessionID = $_SESSION['userUniqueID'];

    if(!isset($_SESSION['empID']) && !isset($_SESSION['adminPos']) && !isset($_SESSION['adminFname'])){
      header("Location: ../views/adminlogin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <?php include('../inc/designs2.php');?>
  </head>
  <body>
    <input type="hidden" id="role" value="" />
    <div class="sidebar">
      <div class=" text-center p-4">
          <img src="../assets/img/logo.png" width="100"/>
      </div>

      <div class="dasboard-text">
        <span><i class="fa-solid fa-circle-user"></i>&nbsp;<?php $showAdmin->showAdminFirstName($empID); ?>&nbsp;<?php $showAdmin->showAdminMiddleName2($empID);?>.&nbsp;<?php $showAdmin->showAdminLastName($empID);?><br />
        <small><?php $showAdmin->showAdminAccountRole($empID);?></small>
      </div>
      <div class="menu">
        <div class="item">
          <a class="sub-btn" href="admindashboard.php" id="dashboardMenu"><i class="fa-solid fa-house-user"></i>&nbsp;&nbsp;Dashboard</a>
        </div>
        <div class="item" id="adminTools">
          <a class="sub-btn"><i class="fa-solid fa-gears"></i>&nbsp;&nbsp; Manage Users <i class="fa-solid fa-caret-right dropdown-icon"></i></a>
          <div class="sub-menu">
            <a  class="sub-item" href="admins.php" ><i class="fa-solid fa-sack-dollar"></i>&nbsp;&nbsp;Admin/s</a>
            <a  class="sub-item" href="seniorcitizen.php" class="btn btn-primary"><i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;Senior Citizens<small style="color: red;"></small></a>
            <a class="sub-btn" href="accountrequest.php"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;&nbsp; Account Request</a>
            <a  class="sub-item" href="disease.php"><i class="fa-solid fa-person"></i>&nbsp;&nbsp;Disease</a>

          </div>
        </div>
        <div class="item" id="adminTools">
          <a class="sub-btn"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;&nbsp; Manage Services <i class="fa-solid fa-caret-right dropdown-icon"></i></a>
          <div class="sub-menu">
            <a  class="sub-item" href="managepension.php"><i class="fa-solid fa-person"></i>&nbsp;&nbsp;Manage Pension</a>
            <a  class="sub-item" href="manageseniorid.php"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Manage Senior ID</a>
            <a  class="sub-item" href="manageburialassistance.php"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Manage Burial Asst.</a>
          </div>
        </div>
        <div class="item" id="adminTools">
          <a class="sub-btn" href="adminaccount.php"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;&nbsp; Account Settings</a>
        </div>
        <div class="item">
          <a href="postannouncement.php"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;Announcement</a>
        </div>
        <div class="item">
          <a href="messages.php"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;Message/s</a>
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









<!-- Admin Change Pass Modal -->
<div class="modal fade" id="adminchangePass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="form-group mb-3">
        <div class="form-group mt-2 mb-4">
              <label for="exampleInputEmail1" class="form-label"><b>Old Password</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
              <input type="text" class="form-control">
           </div>
            <div class="form-group mt-4">
              <label for="exampleInputEmail1" class="form-label"><b>New Password</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
              <input type="text" class="form-control">
           </div>
           <div class="form-group mt-2">
              <label for="exampleInputEmail1" class="form-label"><b>Confirm new Password</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
              <input type="text" class="form-control">
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</button>
        <button type="button" class="btn btn-custom-default" style="width: 20%;">Submit</button>
      </div>
    </div>
  </div>
</div>