<?php

    require_once("../Model/config.php"); //required to implement this for calling DB

    class AndroidRequest extends config{


        public function androidLogin($username, $password){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT `UserUniqueID` FROM `srpersonalinfo` WHERE `Username`='$username' AND `Password`='$password'");
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo  $res['UserUniqueID'];
                }
                return true;
            }
            else{
                echo "Failed";
            }
        }
        public function showCompleteName($id){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT `FirstName`,`MiddleName`,`LastName` FROM `srpersonalinfo` WHERE `UserUniqueID`='$id'");
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo  $res['FirstName']." ".substr($res['MiddleName'], 0,1).". ".$res['LastName'];
                }
                return true;
            }
            else{
                echo "Failed";
            }
        }

        public function HomeDisplayUserInfo($uniqueID){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT s.Status, s.FirstName, s.MiddleName, s.LastName, a.* FROM srpersonalinfo as s, announcement as a WHERE `UserUniqueID`='$uniqueID' order by a.id DESC LIMIT 1");
            $stmt->execute();
            $accountInfoObj = array();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $accountInfoObj[] = array(
                        "Status" => $res['Status'],
                        "CompleteName" => $res['FirstName']." ".substr($res['MiddleName'], 0,1).". ".$res['LastName'],
                        "AnnouncementTitle" => $res['Title'],
                        "AnnouncementDesc" => $res['Description'],
                        "AnnouncementByAndPosition" => $res['PostedBy']." | ".$res['PostedByPosition'],
                        "AnnoncementDatePosted" => $res['DateCreated']
                    );

                    echo json_encode($accountInfoObj, JSON_PRETTY_PRINT);
                   
                }
                return true;
            }
            else{
                echo "Failed";
            }
        }

        public function androidSendMssg($fname,$title,$desc){
            $con = $this->openConnection();
            $stmt = $con->prepare("INSERT INTO `message` (`Subject`,`Description`,`MessageBy`) VALUES('$title','$desc','$fname')");
            if($stmt->execute()){
                echo "Message Sent";
            }else{
                echo "Failed";
            }
    
        }


        public function androidUserInfoShowToUpdate($uniqueID){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT `Username`, `Email` FROM srpersonalinfo WHERE `UserUniqueID`='$uniqueID'");
            $stmt->execute();
            $accountInfoObj = array();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $accountInfoObj[] = array(
                        "Username" => $res['Username'],
                        "Email" => $res['Email']
                    );

                    echo json_encode($accountInfoObj, JSON_PRETTY_PRINT);
                   
                }
                return true;
            }
            else{
                echo "Failed";
            }
        }






        public function androidCheckOldPass($oldpass,$newPass,$uname,$email,$userid){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT `Password` FROM `srpersonalinfo` WHERE `UserUniqueID`='$userid'");
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    if($res['Password'] == md5($oldpass)){
                       $stmt2 = $con->prepare("UPDATE `srpersonalinfo` SET `Password`='$newPass', `Username`='$uname',`Email`='$email' WHERE `UserUniqueID`='$userid'");
                        if($stmt2->execute()){
                            echo "Success";
                        }
                    }else{
                        echo "Incorrect";
                    }
                }
            }
            
    
        }

        public function androidUpdateAccount($uname,$email,$password,$userid){
            $con = $this->openConnection();
            $stmt = $con->prepare("UPDATE `srpersonalinfo` SET `Username`='$uname', `Email`='$email',`Password`='$password' WHERE `UserUniqueID`='$userid'");
            if($stmt->execute()){
                echo "Success";
            }else{
                echo "Failed";
            }
    
        }

        public function viewBasicAllInfoByUser($uid){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT * FROM `srpersonalinfo` WHERE `UserUniqueID`='$uid'");
            $stmt->execute();
            $showData = array();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $showData[] = array(
                        "FirstName" => $res['FirstName'],
                        "MiddleName" => $res['MiddleName'],
                        "LastName" => $res['LastName'],
                        "Address" => $res['Address'],
                        "Birthdate" => $res['Birthdate'],
                        "PlaceOfBirth" => $res['PlaceOfBirth'],
                        "Age" => $res['Age'],
                        "Gender" => $res['Gender'],
                        "EducAttainment" => $res['EducAttainment'],
                        "VoterStatus" => $res['VoterStatus'],
                        "CivilStatus" => $res['CivilStatus'],
                        "Citizenship" => $res['Citizenship'],
                        "Religion" => $res['Religion'],
                        "CellphoneNo" => $res['CellphoneNo'],
                        "TeleNumber" => $res['TeleNumber'],
                        "Occupation" => $res['Occupation'],
                        "MonthlyIncome" => $res['MonthlyIncome']
                    );
                    echo json_encode($showData, JSON_PRETTY_PRINT);
                }
            }else{
                echo "Failed";
            }
        }




        public function viewPartnerAllInfoByUser($uid){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT * FROM `srparterinfo` WHERE `UserUniqueID`='$uid'");
            $stmt->execute();
            $showData = array();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $showData[] = array(
                        "FirstName" => $res['FirstName'],
                        "MiddleName" => $res['MiddleName'],
                        "LastName" => $res['LastName'],
                        "Birthdate" => $res['Birthdate'],
                        "Age" => $res['Age'],
                        "EducAttainment" => $res['EducAttainment'],
                        "Occupation" => $res['Occupation'],
                        "MonthlyIncome" => $res['MonthlyIncome']
                    );
                    echo json_encode($showData, JSON_PRETTY_PRINT);
                }
            }else{
                echo "Failed";
            }
        }

        public function viewAllStatusData($uid){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT p.BasicInfoStatus, pr.SrPartnerInfoStatus, h.SrHealthIssueStatus, e.SrEmerContactStatus FROM `srpersonalinfo` as p INNER JOIN `srparterinfo` as pr on p.`UserUniqueID` = pr.UserUniqueID INNER JOIN `srhealthissue` as h ON p.`UserUniqueID` = h.UserUniqueID INNER JOIN `sremercontact` as e ON p.UserUniqueID = e.UserUniqueID WHERE p.UserUniqueID = '$uid';");
            $stmt->execute();
            $showData = array();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $showData[] = array(
                        "BasicInfoStatus" => $res['BasicInfoStatus'],
                        "SrPartnerInfoStatus" => $res['SrPartnerInfoStatus'],
                        "SrHealthIssueStatus" => $res['SrHealthIssueStatus'],
                        "SrEmerContactStatus" => $res['SrEmerContactStatus'],
                    );
                    echo json_encode($showData, JSON_PRETTY_PRINT);
                }
            }else{
                echo "Failed";
            }
        }

        



        public function SnrHSCMIC($uniqueID){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `CMIC` FROM `srhealthissue` WHERE `UserUniqueID`='$uniqueID'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
                if($stmt->rowCount() > 0){
                    while($res = $stmt->fetch()){
                        echo $res['CMIC'];
                    }
                    return true;
                }
                else{
                    return false;
                }
            }

            public function updateHealthIssue($CMIC,$uniqueID){
                $con = $this->openConnection();
                $sqlQuery = "UPDATE `srhealthissue` SET `CMIC`='$CMIC', `DateUpdated`= now(),`SrHealthIssueStatus`='Yes' WHERE `UserUniqueID` = '$uniqueID'";
                $stmt = $con->prepare($sqlQuery);
                
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }


        

        public function viewEmergencyAllInfoByUser($uid){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT * FROM `sremercontact` WHERE `UserUniqueID`='$uid'");
            $stmt->execute();
            $showData = array();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $showData[] = array(
                        "FirstName" => $res['FirstName'],
                        "MiddleName" => $res['MiddleName'],
                        "Lastname" => $res['Lastname'],
                        "Address" => $res['Address'],
                        "CellphoneNumber" => $res['CellphoneNumber'],
 
                    );
                    echo json_encode($showData, JSON_PRETTY_PRINT);
                }
            }else{
                echo "Failed";
            }
        }

        public function updateEmergencyContact($lname,$fname,$mname,$addr,$cp,$uid){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `sremercontact` SET `Lastname`='$lname',`FirstName`='$fname',`MiddleName`='$mname',`Address`='$addr',`CellphoneNumber`='$cp',
            `DateUpdated`= now(),`SrEmerContactStatus`='Yes' WHERE `UserUniqueID`='$uid'";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }





        public function viewAllNotifications($uid){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT * FROM `notifications` WHERE `UserUniqueID`='$uid'");
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $showData = array();
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $temp = array(
                        "Status" => $res['Status'],
                        "Title" => $res['Title'],
                        "Message" => $res['Message'],
                        "DateAdded" => $res['DateAdded']
                    );

                    array_push($showData,$temp);
                    
    
                }


                echo json_encode($showData, JSON_PRETTY_PRINT);

                
            }else{
                echo "Failed";
            }
        }
        




    }





?>