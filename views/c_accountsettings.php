
<style>
    label{
        font-size: 0.9rem;
    }
</style>

<div class="container-fluid ps-lg-3 pe-lg-3 pt-4" >
    <h4>Edit your Account Information</h4>
    <div class="progress" style="height: 25px;">
        <div id="progressBarInfo" class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 15%; height: " aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
    </div>
    <!-- Personal Info -->
    <div class="container-fluid mt-lg-4" style="background-color: #fff; padding: 20px; border-radius: 10px;" id="personalInfo">
        <form action="" id="updateBasicInfoForm">

        <h5>Basic Info (Pangunahing Impormasyon)</h5>
        
        <hr>
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>First Name</b> (Pangalan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrFirstName($sessionID);?>" name="updt_fname">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Last Name</b> (Apelyido)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrLastName($sessionID); ?>" name="updt_lname">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Middle Name</b> (Panggitna)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrMiddleName($sessionID); ?>" name="updt_mname">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Barangay</b> (Tirahan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrAddress($sessionID); ?>" name="updt_address">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Birthday</b> (Kaarawan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="date" class="form-control" value="<?php $snrAccountDetails->SnrBirthdate($sessionID); ?>" name="updt_birthdate">

                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label" style="font-size: 0.8rem"><b>Place of Birth</b> (Lugar ng Kapanganakan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrPlaceOfBirth($sessionID); ?>" name="updt_placeBirth">
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Age</b> (Edad)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="number" class="form-control" value="<?php $snrAccountDetails->SnrAge($sessionID); ?>" name="updt_age">
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Gender</b> (Kasarian)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="updt_gender">
                                <option selected hidden><?php $snrAccountDetails->SnrGender($sessionID); ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Educational Attainment</b> (Antas ng Pinag-aralan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrEducAttainment($sessionID); ?>" name="updt_educAttainment">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Voter Status</b> (Botante)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="updt_voterstat">
                                <option selected hidden><?php $snrAccountDetails->SnrVoterStatus($sessionID); ?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>

                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Civil Status</b> (Katayuang Sibil)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="updt_civilstat">
                                <option selected hidden><?php $snrAccountDetails->SnrCivilStatus($sessionID); ?></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                            </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Citizenship</b> (Pagkamamamayan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrCitizenship($sessionID); ?>" name="updt_citizenship">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Religion</b> (Relihiyon)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrReligion($sessionID); ?>" name="updt_religion">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Cellphone Number</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrCellphoneNo($sessionID); ?>" name="updt_cpno">

                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Telephone Number</b> (Katayuang Sibil)</label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrTeleNumber($sessionID); ?>" name="updt_telno">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Occupation</b> (Hanapbuhay)</label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrOccupation($sessionID); ?>" name="updt_occupation">

                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Monthly Income</b> (Buwanang Kita)</label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrMonthlyIncome($sessionID); ?>" name="updt_monthlyIncome">
                    </div>
                </div>
            </div>
            
            <input id="basicInfo" type="hidden" value="<?php $snrAccountDetails->SnrBasicInfoStatus($sessionID); ?>">

            <hr>
            <div style="width: 100%;">
                <input type="submit" class="btn btn-custom-default text-center" value="Update" style="width: 20%;">
                <input type="hidden" name="SeniorUpdateBasicInfo">

                </form>
                <a class="btn btn-custom-default float-end" style="width: 9%" id="nextToPartnerInfo">Next &nbsp;&nbsp;<i class="fa-solid fa-chevron-right" style="font-weight: 900;"></i></a>
            </div>
            
    </div>

    <!-- Partner Info -->
    <div class="container-fluid mt-lg-4" style="background-color: #fff; padding: 20px; border-radius: 10px; display: none;" id="partnerInfo">
        <h5>Partner Information (Impormasyon ng Asawa)</h5>
        <hr>
       
        <form action="" id="partnerInfoForm">
            <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>First Name</b> (Pangalan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoFirstName($sessionID); ?>" name="part_fname">
                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Last Name</b> (Apelyido)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoLastName($sessionID); ?>" name="part_lname">
                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Middle Name</b> (Panggitna)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoMiddleName($sessionID); ?>" name="part_mname">
                </div>
            </div>
            </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Birthday</b> (Kaarawan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="date" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoBirthdate($sessionID); ?>" name="part_bday">
                </div>
            </div>
            <div class="col-3">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Age</b> (Edad)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="number" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoAge($sessionID); ?>" name="part_age">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Educational Attainment</b> (Antas ng Pinag-aralan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoEducAttainment($sessionID); ?>" name="part_edattain">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Occupation</b> (Hanapbuhay)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoOccupation($sessionID); ?>" name="part_oocu">

                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Monthly Income</b> (Buwanang Kita)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrPartnerInfoMonthlyIncome($sessionID); ?>" name="part_monthlyinc">
                </div>
            </div>
        </div>
        <input id="SnrPartnerInfoStatus" type="hidden" value="<?php $snrAccountDetails->SnrPartnerInfoStatus($sessionID); ?>">


            <div style="width: 100%;">
                <input  type="submit" class="btn btn-custom-default text-center" value="Update" style="width: 20%;">
                <input type="hidden" name="SnrPartnerInfo">
                </form>

                <a class="btn btn-custom-default float-end" style="width: 9%" id="nextToHealthIssue">Next &nbsp;&nbsp;<i class="fa-solid fa-chevron-right" style="font-weight: 900;"></i></a>
                <a class="btn btn-secondary float-end" style="width: 9%;  padding: 9px;  margin-right: 15px;" id="backToPersonalInfo"><i class="fa-solid fa-chevron-left" style="font-weight: 900;"></i> &nbsp;&nbsp;Back</a>
            
            </div>
    </div>

    <!-- Health Issue -->
    <div class="container-fluid mt-lg-4" style="background-color: #fff; padding: 20px; border-radius: 10px; display: none;" id="healthIssue">
        <h5>Health Issue (Mga Isyu sa Kalusugan)</h5>
        <hr>
        <form action="" id="healthIssueForm">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Current Medical Illnesses Complained</b> (Mga kasalukuyang Karamdamang Medikal na Nireklamo)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="healthissue">
                            <option selected hidden> <?php $snrAccountDetails->SnrHSCMIC($sessionID); ?></option>
                            <option value="Diabeties">Diabeties</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Rayuma">Rayuma</option>
                            <option value="Others">Others (Iba pa)</option>
                        </select>
                </div>
            </div>
        </div>
        <input type="hidden" value="<?php $snrAccountDetails->SnrHealthIssueStatus($sessionID); ?>" id="SnrHealthIssueStatus">
        <div style="width: 100%;">
                <input type="submit" class="btn btn-custom-default text-center" value="Update" style="width: 20%;">
                <input type="hidden" name="healthIssuefunc">
                </form>
                <a class="btn btn-custom-default float-end" style="width: 9%" id="nextEmergencyContact">Next &nbsp;&nbsp;<i class="fa-solid fa-chevron-right" style="font-weight: 900;"></i></a>
                <a class="btn btn-secondary float-end" style="width: 9%;  padding: 9px;  margin-right: 15px;" id="backToPartnerInfo"><i class="fa-solid fa-chevron-left" style="font-weight: 900;"></i> &nbsp;&nbsp;Back</a>
            
            </div>
    </div>
    
    <!-- Emergency Contact -->
    <div class="container-fluid mt-lg-4" style="background-color: #fff; padding: 20px; border-radius: 10px; display: none;" id="emergencyContact">
        <h5>Emergency Contact (Sa Oras ng Pangangailangan, Sakuna, o Emergency, Tawagin si)</h5>
        <hr>
        <form action="" id="emergencyContactForm">
        <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>First Name</b> (Pangalan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrEmergencyContactFirstName($sessionID); ?>" name="emer_fname">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Last Name</b> (Apelyido)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrEmergencyContactLastName($sessionID); ?>" name="emer_lname">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"><b>Middle Name</b> (Panggitna)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                        <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrEmergencyContactMiddleName($sessionID); ?>" name="emer_mname">
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Barangay</b> (Tirahan)&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrEmergencyContactAddress($sessionID); ?>" name="emer_address">
                </div>
            </div>
            <div class="col-5">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Cellphone Number</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" value="<?php $snrAccountDetails->SnrEmergencyContactCellphoneNumber($sessionID); ?>" name="emer_cpno">
                </div>
            </div>
        </div>
        <input type="hidden" value="<?php $snrAccountDetails->SnrEmergencyContactStatus($sessionID); ?>" id="SnrEmergencyContactStatus">
        <div style="width: 100%;">
                <input type="submit" class="btn btn-custom-default text-center" value="Update" style="width: 20%;">
                <input type="hidden" name="emergencyContactFunc">
                </form>
                <a class="btn btn-secondary float-end" style="width: 9%;  padding: 9px;  margin-right: 15px;" id="backToHealthIssue"><i class="fa-solid fa-chevron-left" style="font-weight: 900;"></i> &nbsp;&nbsp;Back</a>
            
            </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $("#updateBasicInfoForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
      
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(data){
                    if(data == "Success"){

                            Swal.fire({
                            title: 'Success',
                            text: "Your basic information is updated!",
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
                    else{
                        Swal.fire(
                            'Failed',
                            'There\'\ s an error when updating your data!',
                            'error'
                            )
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })


        $("#partnerInfoForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
      
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(data){
                    if(data == "Success"){
                            Swal.fire(
                            'Success',
                            'Your partner\'\ s information is updated!',
                            'success'
                            )
                    }
                    else{
                        Swal.fire(
                            'Failed',
                            'There\'\ s an error when updating your data!',
                            'error'
                            )
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })

        $("#healthIssueForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
      
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(data){
                    if(data == "Success"){
                            Swal.fire(
                            'Success',
                            'Your health\'\ s information is updated!',
                            'success'
                            )
                    }
                    else{
                        Swal.fire(
                            'Failed',
                            'There\'\ s an error when updating your data!',
                            'error'
                            )
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })



        $("#emergencyContactForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
      
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(data){
                    if(data == "Success"){

                        Swal.fire(
                            'Success',
                            'Your emergency contact\'\ s information is updated!',
                            'success'
                            )
                            
                    }
                    else{
                        Swal.fire(
                            'Failed',
                            'There\'\ s an error when updating your data!',
                            'error'
                            )
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })



        
        
        

        var basicInfoStatus = $("#basicInfo").val();
        var SnrPartnerInfoStatus = $("#SnrPartnerInfoStatus").val();
        var SnrHealthIssueStatus = $("#SnrHealthIssueStatus").val();
        var SnrEmergencyContactStatus = $("#SnrEmergencyContactStatus").val();




        if(basicInfoStatus == "Yes" &&  SnrPartnerInfoStatus == "Yes" &&  SnrHealthIssueStatus == "Yes" && SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","100%");
            $("#progressBarInfo").addClass("bg-success");
            $("#progressBarInfo").attr("aria-valuenow","100%");
            $("#progressBarInfo").text("100%");

        }

        else if(basicInfoStatus == "Yes" &&   SnrPartnerInfoStatus == "Yes" &&   SnrHealthIssueStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }




        else if(SnrPartnerInfoStatus == "Yes" &&   basicInfoStatus == "Yes" &&   SnrHealthIssueStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }

        else if(SnrPartnerInfoStatus == "Yes" &&   SnrHealthIssueStatus == "Yes" &&   SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }
        else if(SnrPartnerInfoStatus == "Yes" &&   basicInfoStatus == "Yes" &&   SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }


        // SnrHealthIssueStatus
        else if(SnrHealthIssueStatus == "Yes" &&   basicInfoStatus == "Yes" &&   SnrPartnerInfoStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }
        else if(SnrHealthIssueStatus == "Yes" &&   basicInfoStatus == "Yes" &&   SnrHealthIssueStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }
        else if(SnrHealthIssueStatus == "Yes" &&   basicInfoStatus == "Yes" &&   SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }
        else if(SnrHealthIssueStatus == "Yes" &&   SnrHealthIssueStatus == "Yes" &&   SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","75%");
            $("#progressBarInfo").attr("aria-valuenow","75%");
            $("#progressBarInfo").text("75%");

        }

        else if(basicInfoStatus == "Yes" &&  SnrPartnerInfoStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        else if(basicInfoStatus == "Yes" &&   SnrHealthIssueStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        else if(basicInfoStatus == "Yes" &&   SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        else if(SnrPartnerInfoStatus == "Yes" &&   basicInfoStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        else if(SnrPartnerInfoStatus == "Yes" &&   SnrHealthIssueStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        else if(SnrPartnerInfoStatus == "Yes" &&   SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }



        else if(SnrHealthIssueStatus == "Yes" &&   basicInfoStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        else if(SnrHealthIssueStatus == "Yes" &&   SnrPartnerInfoStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        else if(SnrHealthIssueStatus == "Yes" &&   SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","50%");
            $("#progressBarInfo").attr("aria-valuenow","50%");
            $("#progressBarInfo").text("50%");

        }
        

        



        else if(basicInfoStatus == "Yes"){
            $("#progressBarInfo").css("width","25%");
            $("#progressBarInfo").attr("aria-valuenow","25%");
            $("#progressBarInfo").text("25%");

        }
        else if(SnrPartnerInfoStatus == "Yes"){
            $("#progressBarInfo").css("width","25%");
            $("#progressBarInfo").attr("aria-valuenow","25%");
            $("#progressBarInfo").text("25%");

        }
        else if(SnrHealthIssueStatus == "Yes"){
            $("#progressBarInfo").css("width","25%");
            $("#progressBarInfo").attr("aria-valuenow","25%");
            $("#progressBarInfo").text("25%");

        }
        else if(SnrEmergencyContactStatus == "Yes"){
            $("#progressBarInfo").css("width","25%");
            $("#progressBarInfo").attr("aria-valuenow","25%");
            $("#progressBarInfo").text("25%");

        }





        // // PROGRESS BAR
        // if($("#basicInfo").val() == "Yes"){
        //     $("#progressBarInfo").css("width","25%");
        //     $("#progressBarInfo").attr("aria-valuenow","25%");
        //     $("#progressBarInfo").text("25%");
        // }
        // if($("#SnrPartnerInfoStatus").val() == "Yes"){
        //     $("#progressBarInfo").css("width","25%");
        //     $("#progressBarInfo").attr("aria-valuenow","25%");
        //     $("#progressBarInfo").text("25%");
        // }
        


        
        // NEXT
    $("#nextToPartnerInfo").click(function(){
        $("#personalInfo").fadeOut();
        $("#partnerInfo").fadeIn();
    })
    $("#nextToHealthIssue").click(function(){
        $("#partnerInfo").fadeOut();
        $("#healthIssue").fadeIn();
    })
    $("#nextEmergencyContact").click(function(){
        $("#healthIssue").fadeOut();
        $("#emergencyContact").fadeIn();
    })


    // BACK

    $("#backToPersonalInfo").click(function(){
        $("#partnerInfo").fadeOut();
        $("#personalInfo").fadeIn();
    })
    $("#backToPartnerInfo").click(function(){
        $("#healthIssue").fadeOut();
        $("#partnerInfo").fadeIn();
    })
    $("#backToHealthIssue").click(function(){
        $("#emergencyContact").fadeOut();
        $("#healthIssue").fadeIn();
    })

        
    })

    
    
</script>