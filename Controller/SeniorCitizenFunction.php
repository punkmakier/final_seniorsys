<?php
    // Import Models Here
    require_once '../Model/SeniorRegistration.php';
    require_once '../Model/SeniorAccount.php';
    require_once '../Model/UpdateBasicInfo.php';
    require_once '../Model/PartnerInformation.php';
    require_once '../Model/HealthIssue.php';
    require_once '../Model/EmergencyContact.php';
    require_once '../Model/UserInfo.php';
    require_once '../Model/Message.php';
    require_once '../Model/Services.php';

    $services = new Services;

    
    // For Calling Function
    if(isset($_POST['SeniorRegistrationForm'])){
        SeniorRegistration();
    }

    else if(isset($_POST['SeniorLogin'])){
        SeniorLogin();
    }

    else if(isset($_POST['SeniorUpdateBasicInfo'])){
        SeniorUpdateBasicInfo();
    }
    else if(isset($_POST['SnrPartnerInfo'])){
        SnrPartnerInfo();
    }
    else if(isset($_POST['healthIssuefunc'])){

        healthIssuefunc();
    }
    else if(isset($_POST['emergencyContactFunc'])){
        emergencyContactFunc();
    }

    else if(isset($_POST['updateUserAccountInfo'])){
        updateUserAccountInfo();
    }
    else if(isset($_POST['messageToAdmin'])){
        messageToAdmin();
    }
    else if(isset($_POST['trigger'])){
        $stat = $_POST['trigger'];
        $user = $_SESSION['userUniqueID'];
        $updateStat = new SeniorAccount();
        $updateStat->updateStatusAccountChangingStat($stat,$user);
    }


    else if(isset($_POST['action']) && isset($_POST['action']) == "trigger_account_request"){
        $trig = $_POST['request_selected'];
        $updateStat = new SeniorAccount();

        if($updateStat->updateStatusAccount($trig)){
            echo "Success";
            
        }else{
            echo "Error";
        }
    }

    else if(isset($_POST['triggerDisapprove']) && isset($_POST['triggerDisapprove']) == "trigger_account_request_disapprove"){
        $trig = $_POST['request_selected_disapproved'];
        $updateStat = new SeniorAccount();

        if($updateStat->updateStatusAccountDisapproved($trig)){
            echo "Success";
            
        }else{
            echo "Error";
        }
    }
    else if(isset($_POST['reqPensionTrigger'])){
        $id = $_SESSION['userUniqueID'];

        // Upload seniorID images
        $senior_img_name = $_FILES['seniorID']['name'];
        $senior_tmp_name = $_FILES['seniorID']['tmp_name'];

        $senior_img_ext = pathinfo($senior_img_name, PATHINFO_EXTENSION);
        $senior_img_ex_lc = strtolower($senior_img_ext);

        $senior_new_name_image = uniqid("SeniorID-",true).'.'.$senior_img_ex_lc;

        $seniorID_img_upload_path = "../assets/SeniorID/".$senior_new_name_image;

       // Upload seniorID images
       $signatures_img_name = $_FILES['signatures']['name'];
       $signatures_tmp_name = $_FILES['signatures']['tmp_name'];

       $signatures_img_ext = pathinfo($signatures_img_name, PATHINFO_EXTENSION);
       $signatures_img_ex_lc = strtolower($signatures_img_ext);

       $signatures_new_name_image = uniqid("Signatures-",true).'.'.$signatures_img_ex_lc;

       $signatures_img_upload_path = "../assets/Signatures/".$signatures_new_name_image;
   
       if(empty($_FILES['signatures']) || empty($_FILES['seniorID'])){
        echo "Required";
       }
       
       else{
            if($services->uploadReqestPension($id,$senior_new_name_image,$signatures_new_name_image)){
                move_uploaded_file($senior_tmp_name, $seniorID_img_upload_path);
                move_uploaded_file($signatures_tmp_name, $signatures_img_upload_path);
                echo "Success";
            }
            else{
                echo "Failed";
            }

       }
    }

    else if(isset($_POST['reqSeniorIDTrigger'])){
        $id = $_SESSION['userUniqueID'];

        // Upload seniorID images
        $pictureCopy_img_name = $_FILES['pictureCopy']['name'];
        $pictureCopy_tmp_name = $_FILES['pictureCopy']['tmp_name'];

        $pictureCopy_img_ext = pathinfo($pictureCopy_img_name, PATHINFO_EXTENSION);
        $pictureCopy_img_ex_lc = strtolower($pictureCopy_img_ext);

        $pictureCopy_new_name_image = uniqid("PictureCopy-",true).'.'.$pictureCopy_img_ex_lc;

        $pictureCopy_img_upload_path = "../assets/PictureCopy/".$pictureCopy_new_name_image;

       // Upload seniorID images
       $validCert_img_name = $_FILES['validCert']['name'];
       $validCert_tmp_name = $_FILES['validCert']['tmp_name'];

       $validCert_img_ext = pathinfo($validCert_img_name, PATHINFO_EXTENSION);
       $validCert_img_ex_lc = strtolower($validCert_img_ext);

       $validCert_new_name_image = uniqid("validCert-",true).'.'.$validCert_img_ex_lc;

       $validCert_img_upload_path = "../assets/ValidCertificate/".$validCert_new_name_image;

       echo $validCert_new_name_image . " ". $pictureCopy_new_name_image;

 
        if($services->uploadReqestSeniorID($id,$pictureCopy_new_name_image,$validCert_new_name_image)){
            move_uploaded_file($pictureCopy_tmp_name, $pictureCopy_img_upload_path);
            move_uploaded_file($validCert_tmp_name, $validCert_img_upload_path);
            echo "Success";
        }
        else{
            echo "Failed";
        }
       
    }




    else if(isset($_POST['reqBurialAsstTrigger'])){
        $id = $_SESSION['userUniqueID'];
        $cod = $_POST['bur_cod'];
        // Upload seniorID images
        $bur_seniorID_img_name = $_FILES['bur_srID']['name'];
        $bur_seniorID_tmp_name = $_FILES['bur_srID']['tmp_name'];

        $bur_seniorID_img_ext = pathinfo($bur_seniorID_img_name, PATHINFO_EXTENSION);
        $bur_seniorID_img_ex_lc = strtolower($bur_seniorID_img_ext);

        $bur_seniorID_new_name_image = uniqid("BurialAsstSeniorID-",true).'.'.$bur_seniorID_img_ex_lc;

        $bur_seniorID_img_upload_path = "../assets/BurialSeniorID/".$bur_seniorID_new_name_image;

       // Upload seniorID images
       $bur_deathCert_img_name = $_FILES['bur_deathCert']['name'];
       $bur_deathCert_tmp_name = $_FILES['bur_deathCert']['tmp_name'];

       $bur_deathCert_img_ext = pathinfo($bur_deathCert_img_name, PATHINFO_EXTENSION);
       $bur_deathCert_img_ex_lc = strtolower($bur_deathCert_img_ext);

       $bur_deathCert_new_name_image = uniqid("BurialAsstCOD-",true).'.'.$bur_deathCert_img_ex_lc;

       $bur_deathCert_img_upload_path = "../assets/BurialCOD/".$bur_deathCert_new_name_image;

 
        if($services->uploadReqestBurial($id,$bur_seniorID_new_name_image,$bur_deathCert_new_name_image,$cod)){
            move_uploaded_file($bur_seniorID_tmp_name, $bur_seniorID_img_upload_path);
            move_uploaded_file($bur_deathCert_tmp_name, $bur_deathCert_img_upload_path);
            echo "Success";
        }
        else{
            echo "Failed";
        }
       
    }




















    else if(isset($_POST['forgotPasswordAction']) && isset($_POST['forgotPasswordAction']) == "forgotPasswordAction"){
        forgotPassFunc();
    }
    
    
    // Executions from condition above

    function SeniorRegistration(){
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $birthDate = $_POST['birthDate'];
        $cpNo = $_POST['cpNo'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $userName = $_POST['uname'];
        $pass = $_POST['regpass'];
        $conPass = $_POST['regconpass'];

        // Generate Random Chars for Unique ID
        $generateKey = uniqid();

        // User Unique Key Per Register
        $userUniqueId = date('Ymd')."-".$generateKey;


        // Upload birth certificates images
        $birth_img_name = $_FILES['birthCert']['name'];
        $birth_tmp_name = $_FILES['birthCert']['tmp_name'];

        $birth_img_ext = pathinfo($birth_img_name, PATHINFO_EXTENSION);
        $birth_img_ex_lc = strtolower($birth_img_ext);

        $birth_new_name_image = uniqid("BirthCertificate-",true).'.'.$birth_img_ex_lc;

        $birthCert_img_upload_path = "../assets/BirthCertificates/".$birth_new_name_image;


        // Upload barangay clearance images
        $brgy_img_name = $_FILES['brgyClear']['name'];
        $brgy_tmp_name = $_FILES['brgyClear']['tmp_name'];

        $brgy_img_ext = pathinfo($brgy_img_name, PATHINFO_EXTENSION);
        $brgy_img_ex_lc = strtolower($brgy_img_ext);

        $brgy_new_name_image = uniqid("BrgyClearance-",true).'.'.$brgy_img_ex_lc;

        $brgyClear_img_upload_path = "../assets/BarangayClearance/".$brgy_new_name_image;

        // password validation
        if($pass != $conPass){
            echo "NotMatch";
        }

        else{
            $addSr = new SeniorRegistration($userUniqueId,$lname,$fname,$mname,$birthDate,$address,$email,$cpNo,$birth_new_name_image,$brgy_new_name_image,$userName,md5($pass));
            if($addSr->SeniorRegistration()){

                move_uploaded_file($birth_tmp_name, $birthCert_img_upload_path);
                move_uploaded_file($brgy_tmp_name, $brgyClear_img_upload_path);
                echo "Success";
            }else{
                echo "False";
            }
        }


    }


    function SeniorLogin(){
        $uname = $_POST['username'];
        $pass = $_POST['password'];

        $snr = new SeniorAccount();
        if($snr->SeniorLoginAccount($uname,md5($pass))){
            echo "Success";
        }
        else{
            echo "NoFound";
        }

    }


    function SeniorUpdateBasicInfo(){
        $fname = $_POST['updt_fname'];
        $lname = $_POST['updt_lname'];
        $mname = $_POST['updt_mname'];
        $address = $_POST['updt_address'];
        $birhtday = $_POST['updt_birthdate'];
        $placeofbirth = $_POST['updt_placeBirth'];
        $age = $_POST['updt_age'];
        $gender = $_POST['updt_gender'];
        $educattain = $_POST['updt_educAttainment'];
        $voters = $_POST['updt_voterstat'];
        $civilstat = $_POST['updt_civilstat'];
        $citizenship = $_POST['updt_citizenship'];
        $religion = $_POST['updt_religion'];
        $cpno = $_POST['updt_cpno'];
        $telno = $_POST['updt_telno'];
        $occu = $_POST['updt_occupation'];
        $monthly = $_POST['updt_monthlyIncome'];
        $uniqueID = $_SESSION['userUniqueID'];

        $basicInfoStatus = "";

        if(empty($fname) || empty($lname) || empty($mname) || empty($address) || empty($birhtday) || empty($placeofbirth) || empty($age) || $gender == "- Select -" || empty($educattain) || $voters == "- Select -"
         || $civilstat == "- Select -" || empty($citizenship) || empty($religion) || empty($cpno) || empty($telno) || empty($occu) || empty($monthly) || empty($uniqueID)){
            $basicInfoStatus = "No";
         }
         else{
            $basicInfoStatus = "Yes";
         }


        $updateBasicInfo = new UpdateBasicInfo(trim($fname),trim($lname),trim($mname),$address,$birhtday,$placeofbirth,$age,$gender,$educattain,$voters,$civilstat,$citizenship,$religion,$cpno,$telno,$occu,$monthly,$uniqueID,$basicInfoStatus);
        if($updateBasicInfo->updateBasicInfo()){
            echo "Success";
        }
        else{
            echo "Failed";
        }

    }


    function SnrPartnerInfo(){
        $lname = $_POST['part_lname'];
        $fname = $_POST['part_fname'];
        $mname = $_POST['part_mname'];
        $birthDate = $_POST['part_bday'];
        $age = $_POST['part_age'];
        $edAttain = $_POST['part_edattain'];
        $occu = $_POST['part_oocu'];
        $monthly = $_POST['part_monthlyinc'];
        $uniqueID = $_SESSION['userUniqueID'];

        $partnerInfo = "";

        if(empty($fname) || empty($lname) || empty($mname) || empty($birthDate) || empty($age) || empty($edAttain) || empty($occu) || empty($monthly)){
            $partnerInfo = "No";
         }
         else{
            $partnerInfo = "Yes";
         }


        $partner = new PartnerInformation($lname,$fname,$mname,$birthDate,$age,$edAttain,$occu,$monthly,$uniqueID,$partnerInfo);
        if($partner->updatePartnerInfo()){
            echo "Success";
        }else{
            echo "Failed";
        }
        
    }

    function healthIssuefunc(){
        $hissue = $_POST['healthissue'];
        $uniqueID = $_SESSION['userUniqueID'];
       
        $healthIssueInfo = "";

        if(empty($hissue)){
            $healthIssueInfo = "No";
         }
         else{
            $healthIssueInfo = "Yes";
         }

        $healthIssue = new HealthIssue($hissue,$healthIssueInfo,$uniqueID);
        if($healthIssue->updateHealthIssue()){
            echo "Success";
        }else{
            echo "Failed";
        }
    }


    function emergencyContactFunc(){

        $lname = $_POST['emer_lname'];
        $fname = $_POST['emer_fname'];
        $mname = $_POST['emer_mname'];
        $address = $_POST['emer_address'];
        $cpno = $_POST['emer_cpno'];
        $uniqueIDUser = $_SESSION['userUniqueID'];

         $emergencyInfo = "";

        if(empty($lname) || empty($fname) || empty($mname) || empty($address) || empty($cpno)){
            $emergencyInfo = "No";
         }
         else{
            $emergencyInfo = "Yes";
         }

        $emyc = new EmergencyContact($lname,$fname,$mname,$address,$cpno,$emergencyInfo,$uniqueIDUser);
        if($emyc->updateEmergencyContact()){
            echo "Success";
        }else{
            echo "Failed";
        }
    }



    function updateUserAccountInfo(){

        $uname = $_POST['ac_uname'];
        $email = $_POST['ac_email'];
        $pass = $_POST['ac_newpass'];
        $conpass = $_POST['ac_connewpass'];
        $oldpass = $_POST['ac_oldnewpass'];
        $uniqueID = $_SESSION['userUniqueID'];

        $convertOldPass = md5($oldpass);

        if($pass != $conpass){
            echo "NewPassNotMatch";
        }
        else{

            $userinfo = new UserInfo();
            $userinfo->checkIfOldPassTrue($uniqueID,$convertOldPass,$uname,$email,md5($pass));
    
        }

    }

    function messageToAdmin(){
        $subject = $_POST['subjectMessage'];
        $body = $_POST['bodyMessage'];
        $user = $_POST['senderName'];
        echo $body;
        $send = new Message($subject,$body,$user);
        if($send->sendMessageToAdmin()){
            echo "Success";
        }else{
            echo "Failed";
        }
    }

    function forgotPassFunc(){
        $email = $_POST['forgot_data'];

        $accnt = new SeniorAccount;
        
        $accnt->forgotAcountPassword($email);
            


    }


    
   
?>