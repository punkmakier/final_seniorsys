<?php
    require_once 'AndroidRequest.php';
    require_once '../Model/SeniorRegistration.php';
    require_once '../Model/UpdateBasicInfo.php';
    require_once '../Model/PartnerInformation.php';
    require_once '../Model/Services.php';

    $services = new Services;
   

    $androidRequest = new AndroidRequest;
    
    if(isset($_POST['loginUsername']) && isset($_POST['loginPassword'])){
        $uname = $_POST['loginUsername'];
        $pass = $_POST['loginPassword'];
        
        $androidRequest->androidLogin($uname,md5($pass));
    }

    else if(isset($_GET['userIDAccountMessage'])){
        $androidRequest->showCompleteName($_GET['userIDAccountMessage']);
    }

    else if(isset($_GET['userIDAccount'])){
        $uniqueID = $_GET['userIDAccount'];
        $androidRequest->HomeDisplayUserInfo($uniqueID);
    }

    else if(isset($_GET['checkAllStatus'])){
        $uniqueID = $_GET['checkAllStatus'];
        $androidRequest->viewAllStatusData($uniqueID);
    }




    else if(isset($_POST['reg_fname']) && isset($_POST['reg_mname']) && isset($_POST['reg_lname']) && isset($_POST['reg_bday']) && isset($_POST['reg_cp']) && isset($_POST['reg_email']) && isset($_POST['reg_addr']) && 
        isset($_POST['reg_birthCert']) && isset($_POST['reg_brgy']) && isset($_POST['reg_usern']) && isset($_POST['reg_pass'])){
        $lname = $_POST['reg_lname'];
        $fname = $_POST['reg_fname'];
        $mname = $_POST['reg_mname'];
        $birthDate = $_POST['reg_bday'];
        $address = $_POST['reg_addr'];
        $email = $_POST['reg_email'];
        $cpNo = $_POST['reg_cp'];
        $userName = $_POST['reg_usern'];
        $pass = $_POST['reg_pass'];

        // Generate Random Chars for Unique ID
        $generateKey = uniqid();

        // User Unique Key Per Register
        $userUniqueId = date('Ymd')."-".$generateKey;
        $birthCertName = "BirthCertificate-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";
        $brgyClearName = "BarangayClearance-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";

        $snrReg = new SeniorRegistration($userUniqueId,$lname,$fname,$mname,$birthDate,$address,$email,$cpNo,$birthCertName,$brgyClearName,$userName,md5($pass));


        if($snrReg->SeniorRegistration()){
            file_put_contents("../assets/BirthCertificates/".$birthCertName, base64_decode($_POST['reg_birthCert']));
            file_put_contents("../assets/BarangayClearance/".$brgyClearName, base64_decode($_POST['reg_brgy']));
            echo "Success";

        }else{
            echo "Registration Failed!";
        
            
        }

    }

  
    else if(isset($_POST['messageTitle']) && isset($_POST['messageDescription']) && isset($_POST['messageFullname'])){
        $title = $_POST['messageTitle'];
        $desc = $_POST['messageDescription'];
        $fname = $_POST['messageFullname'];
        $androidRequest->androidSendMssg($fname,$title,$desc);
    }

    else if(isset($_GET['accountDatatoUpdate'])){
        $androidRequest->androidUserInfoShowToUpdate($_GET['accountDatatoUpdate']);
    }


    else if(isset($_GET['checkOldPassUID']) && isset($_GET['oldpass'])  && isset($_GET['newpass']) && isset($_GET['username']) && isset($_GET['email'])){
        $androidRequest->androidCheckOldPass($_GET['oldpass'],md5($_GET['newpass']),$_GET['username'],$_GET['email'],$_GET['checkOldPassUID']);
    }

    
    else if(isset($_GET['basicInfoUpdateID'])){
        $uid = $_GET['basicInfoUpdateID'];
        $androidRequest->viewBasicAllInfoByUser($uid);
    }

    else if(isset($_POST['update_basic_uid'])){
        $fname = $_POST['update_basic_fname'];
        $lname = $_POST['update_basic_lname'];
        $mname = $_POST['update_basic_mname'];
        $address = $_POST['update_basic_addr'];
        $birhtday = $_POST['update_basic_bday'];
        $placeofbirth = $_POST['update_basic_pob'];
        $age = $_POST['update_basic_age'];
        $gender = $_POST['update_basic_gender'];
        $educattain = $_POST['update_basic_educat'];
        $voters = $_POST['update_basic_voter'];
        $civilstat = $_POST['update_basic_civil'];
        $citizenship = $_POST['update_basic_citi'];
        $religion = $_POST['update_basic_rel'];
        $cpno = $_POST['update_basic_cp'];
        $telno = $_POST['update_basic_tpno'];
        $occu = $_POST['update_basic_occu'];
        $monthly = $_POST['update_basic_month'];
        $uniqueID = $_POST['update_basic_uid'];
        $basicInfoStatus = "Yes";
        $update = new UpdateBasicInfo(trim($fname),trim($lname),trim($mname),$address,$birhtday,$placeofbirth,$age,$gender,$educattain,$voters,$civilstat,$citizenship,$religion,$cpno,$telno,$occu,$monthly,$uniqueID,$basicInfoStatus);
        if($update->updateBasicInfo()){
            echo "Success";
        }
        else{
            echo "Failed";
        }
    }

    else if(isset($_GET['partnerInfoUpdateID'])){
        $uid = $_GET['partnerInfoUpdateID'];
        $androidRequest->viewPartnerAllInfoByUser($uid);
    }

    else if(isset($_POST['update_partner_uid'])){
        $lname = $_POST['update_partner_fname'];
        $fname = $_POST['update_partner_lname'];
        $mname = $_POST['update_partner_mname'];
        $birthDate = $_POST['update_partnerbday'];
        $age = $_POST['update_partner_age'];
        $edAttain = $_POST['update_partner_educat'];
        $occu = $_POST['update_partner_occu'];
        $monthly = $_POST['update_partner_month'];
        $uniqueID = $_POST['update_partner_uid'];
        $partnerInfo = "Yes";

        $partner = new PartnerInformation($lname,$fname,$mname,$birthDate,$age,$edAttain,$occu,$monthly,$uniqueID,$partnerInfo);
        if($partner->updatePartnerInfo()){
            echo "Success";
        }else{
            echo "Failed";
        }
    }

    else if(isset($_GET['healthIssueUpdateID'])){
        $uid = $_GET['healthIssueUpdateID'];
        $androidRequest->SnrHSCMIC($uid);
    }

    else if(isset($_POST['update_healthiss_fname'])){

        $uid = $_POST['update_healthiss_uid'];
        $cmic = $_POST['update_healthiss_fname'];
        if($androidRequest->updateHealthIssue($cmic,$uid)){
            echo "Success";
        }else {echo "Failed";}
    }


    else if(isset($_GET['emergencyInfoUpdateID'])){
        $uid = $_GET['emergencyInfoUpdateID'];
        $androidRequest->viewEmergencyAllInfoByUser($uid);
        
    }

    else if(isset($_POST['update_emergency_uid'])){
        $uid = $_POST['update_emergency_uid'];
        $fname = $_POST['update_emergency_fname'];
        $lname = $_POST['update_emergency_lname'];
        $mname = $_POST['update_emergency_mname'];
        $addr = $_POST['update_emergency_addr'];
        $age = $_POST['update_emergency_age'];

        if($androidRequest->updateEmergencyContact($lname,$fname,$mname,$addr,$age,$uid)){
            echo "Success";
        }else {echo "Failed";}

    }

    else if(isset($_POST['pen_id']) && isset($_POST['pen_srid']) && isset($_POST['pen_srsign'])){
        $id = $_POST['pen_id'];

        $SeniorID = "SeniorID-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";
        $Signatures = "Signatures-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";

        if($services->uploadReqestPension($id,$SeniorID,$Signatures)){
            
            file_put_contents("../assets/SeniorID/".$SeniorID, base64_decode($_POST['pen_srid']));
            file_put_contents("../assets/Signatures/".$Signatures, base64_decode($_POST['pen_srsign']));
            echo "Success";

        }else{echo "Failed";}
    }




    else if(isset($_POST['sen_id']) && isset($_POST['sen_picCopy']) && isset($_POST['sen_birthCert'])){
        $id = $_POST['sen_id'];
        $picCopy = "PictureCopy-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";
        $birthCert = "validCert-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";

        if($services->uploadReqestSeniorID($id,$picCopy,$birthCert)){
            
            file_put_contents("../assets/PictureCopy/".$picCopy, base64_decode($_POST['sen_picCopy']));
            file_put_contents("../assets/ValidCertificate/".$birthCert, base64_decode($_POST['sen_birthCert']));
            echo "Success";

        }else{echo "Failed";}
    }

    else if(isset($_POST['bur_id']) && isset($_POST['bur_cod']) && isset($_POST['bur_senID']) && isset($_POST['bur_deathCert'])){
        $id = $_POST['bur_id'];
        $cod = $_POST['bur_cod'];
        $burSenID = "BurialSeniorID-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";
        $burDeathcert = "BurialAsstCOD-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";

        if($services->uploadReqestBurial($id,$burSenID,$burDeathcert,$cod)){
            file_put_contents("../assets/BurialSeniorID/".$burSenID, base64_decode($_POST['bur_senID']));
            file_put_contents("../assets/BurialCOD/".$burDeathcert, base64_decode($_POST['bur_deathCert']));
            echo "Success";

        }else{echo "Failed";}
    }
    


    else if(isset($_GET['userIDNotification'])){
        $androidRequest->viewAllNotifications($_GET['userIDNotification']);
    }

    



?>