<?php
    // Import Models Here
    require_once '../Model/AddAdmin.php';
    require_once '../Model/AdminAccount.php';
    require_once '../Model/AddAnnouncement.php';
    require_once '../Model/AccountRequested.php';
    require_once '../Model/Services.php';

    $services = new Services;


    if(isset($_POST['addAdminAccount'])){
        addAdminAccountFunc();
    }

    else if(isset($_POST['deleteAdminAccount'])){
        deleteAdminAccountFunc();
    }

    else if(isset($_POST['deleteSrSelected'])){
        deleteSrSelectedFunc();
    }
    else if(isset($_POST['adminLoginAccount'])){
        adminLoginAccountFunc();
    }
    else if(isset($_POST['updateAccountAdminC'])){
        updateAccountAdminCFunc();
    }
    
    else if(isset($_POST['postDataAnnouncement'])){
        postDataAnnouncementFunc();
    }
    else if(isset($_POST['action']) && $_POST['action'] == "deletethisAnnouncement"){
        deleteDataAnnouncement();
    }

    else if(isset($_POST['deleteSelectedMes'])){
        deleteSelectedMesFunc();
    }
    else if(isset($_POST['updateSelectedMes'])){
        updateSelectedMesFunc();
    }

    else if(isset($_POST['action']) && $_POST['action'] == "viewSrCitizenInfo"){
        viewSrCitizenInfoFunc();
    }

    else if(isset($_POST['approveSelectedBurialAsst'])){
       $id = $_POST['id_item_select'];
       $date = $_POST['dateRelease'];
       if($services->approveBurialReq($id,$date)){
            echo "Success";
       }else{
        echo "Failed";
       }
    }

    else if(isset($_POST['disapproveSelectedBurialAsst'])){
        $id = $_POST['id_item_disapprove'];
        if($services->disapproveBurialReq($id)){
             echo "Success";
        }else{
         echo "Failed";
        }
     }

     else if(isset($_POST['approveSelectedPension'])){
        $id = $_POST['id_item_pensionReq'];
        $date = $_POST['dateReleasePension'];
        if($services->approvePensioReq($id,$date)){
             echo "Success";
        }else{
         echo "Failed";
        }
     }
     else if(isset($_POST['disapproveSelectedPension'])){
        $id = $_POST['id_item_pensionReq'];
        if($services->disapprovePensioReq($id)){
             echo "Success";
        }else{
         echo "Failed";
        }
     }
     else if(isset($_POST['approveSelectedSeniorID'])){
        $id = $_POST['id_item_seniorIDReq'];
        $date = $_POST['dateReleaseSeniorID'];
        if($services->approveSeniorIDReq($id,$date)){
             echo "Success";
        }else{
         echo "Failed";
        }
     }

     else if(isset($_POST['disapproveSelectedSeniorID'])){
        $id = $_POST['id_item_seniorIDReq'];
        if($services->disapproveSeniorIDReq($id)){
             echo "Success";
        }else{
         echo "Failed";
        }
     }

    function addAdminAccountFunc(){
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $empid = $_POST['empid'];
        $phoneNo = $_POST['phoneNo'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];

        if(empty($lname) || empty($fname) || empty($mname) || empty($empid) || empty($phoneNo) || empty($email) || empty($position) || empty($uname) || empty($pass) || empty($conpass) )
        {
            echo "Required";
        }
        else if($pass != $conpass){
            echo "NotMatch";
        }
        else{
            $addAd = new AddAdmin($empid,$position,$lname,$fname,$mname,$email,$phoneNo,$uname,md5($pass));
            if($addAd->addAdminAccount()){
                echo "Success";
            }else{
                echo "Failed";
            }
        }

    }

    function deleteAdminAccountFunc(){
        $id = $_POST['selectedDataToDelete'];
        
        $del = new AdminAccount();
        $del->deleteAdminAccount($id);
    }

    function adminLoginAccountFunc(){
        $user = $_POST['username'];
        $password = $_POST['password'];
        
        $del = new AdminAccount();
        if($del->adminLoginAccount($user,md5($password))){
            echo "Success";
        }else{
            echo "Failed";
        }
    }


    function updateAccountAdminCFunc(){
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $empid = $_POST['empid'];
        $phoneNo = $_POST['phoneNo'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];
        $userID = $_SESSION['empID'];
        
        if(empty($lname) || empty($fname) || empty($mname) || empty($empid) || empty($phoneNo) || empty($email)
         || empty($position) || empty($uname) || empty($pass) || empty($conpass) )
        {
            echo "Required";
        }
        
        else if($pass != $conpass){
            echo "NotMatch";
        }

        else{
            $addAd = new AddAdmin($empid,$position,$lname,$fname,$mname,$email,$phoneNo,$uname,md5($pass));
            if($addAd->updateAdminAccount($userID)){
                echo "Success";
            }else{
                echo "Failed";
            }
        }
        
    }

    function postDataAnnouncementFunc(){
        $admin = new AdminAccount;

        $title = $_POST['title'];
        $desc = $_POST['description'];
        $user = $_SESSION['empID'];
        $fname = $_SESSION['adminFname'];
        $mname = $_SESSION['adminMname'];
        $lname = $_SESSION['adminLname']; 
        $pos = $_SESSION['adminPos']; 
        
        if(empty($title) || empty($desc)){
            echo "Required";
        }
        
        else{
            $completeName = $fname." ".substr($mname, 0,1).". ".$lname;
            $announce = new AddAnnouncement($title,$desc,$completeName ,$pos);
            if($announce->addAnnouncement()){
                echo "Success";
            }else{
                echo "Failed";
            }
        }


        

    }

    function deleteDataAnnouncement(){
            $id = $_POST['id_per_item'];
            $admin = new AdminAccount;
            
            if($admin->deleteAnnouncement($id)){
                echo "Success";
            }else{
                echo "Failed";
            }
    

    }


    function deleteSelectedMesFunc(){
        $id = $_POST['selectedIDmessageTodelete'];
        $admin = new AdminAccount;
        
        if($admin->deleteMessage($id)){
            echo "Success";
        }else{
            echo "Failed";
        }

    }

    function updateSelectedMesFunc(){
        $id = $_POST['selectedIDmessageToupdate'];
        $admin = new AdminAccount;
        
        if($admin->updateMessage($id)){
            echo "Success";
        }else{
            echo "Failed";
        }

    }


    function deleteSrSelectedFunc(){
        $id = $_POST['id_item_select'];

        $admin = new AdminAccount;
        if($admin->deleteSrAccountSelected($id)){
            echo "Success";
        }else{
            echo "Failed";
        }

    }



    function viewSrCitizenInfoFunc(){

        $uid = $_POST['id_per_item'];

        $acReq = new AccountRequested;

        echo ' <div id="BasicInfo" class="BasicInfos">';
        echo "
       
        <div class='row'>";
            $acReq->showBirthCertBrgyClearFnameMnameLnameBday($uid);
        echo "</div>  ";

        echo "<div class='row'>";
            $acReq->showAddEmailCPStat($uid);
        echo "</div>  ";

        echo "<div class='row'>";
            $acReq->showDateRegPOBAgeGender($uid);
        echo "</div>  ";

        echo "<div class='row'>";
            $acReq->showEducAttainVoterCivCiti($uid);
        echo "</div>  ";

        echo "<div class='row'>";
            $acReq->showReliTelOccuMonthInc($uid);
        echo "</div>  
        
        <div class='modal-footer'>
                <button type='button' class='btn btn-primary toPartnerInfo'>Next</button>
            </div>
        
        </div>
        ";





        // PARTNER INFO

        echo "<div id='PartnerInfo' style='display:none;'> ";


        echo "<div class='row'>";
        $acReq->showPartnerFnameMnameLnameBday($uid);
        echo "</div>  ";

        echo "<div class='row'>";
        $acReq->showPartnerAgeLUPEducAttainOccuMonthly($uid);
        echo "</div>

        <div class='modal-footer'>
                <button type='button' class='btn btn-secondary backToBasicInfo'>Back</button>
                <button type='button' class='btn btn-primary toHealthIssue'>Next</button>
            </div>
        
        </div>";


        // Health Issue

        echo "<div id='HealthIssue' style='display:none;'> ";

        echo "<div class='row'>";
        $acReq->showHealthIssueCMICLastUpdate($uid);
        echo "</div>

        <div class='modal-footer'>
                <button type='button' class='btn btn-secondary backToPartnerInfo'>Back</button>
                <button type='button' class='btn btn-primary toEmergency'>Next</button>
            </div>
        
        </div>";



        // Emergency Contact INFO

        echo "<div id='EmergencyContact' style='display:none;'> ";


        echo "<div class='row'>";
        $acReq->showEmergencyContactFnameMnameLname($uid);
        echo "</div>  ";

        echo "<div class='row'>";
        $acReq->showEmergencyContactAddCPLUP($uid);
        echo "</div>

        <div class='modal-footer'>
                <button type='button' class='btn btn-secondary backToHealthIssue'>Back</button>
            </div>
        
        </div>";


    }


?>