<?php
session_start();
    require_once("config.php"); //required to implement this for calling DB
    class AdminAccount extends config{
        

        public function showAllAdmin(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT * FROM `admininfo`";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "<tr>
                    <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'],0,1).". ".$res['LastName']."</td>
                    <td class='text-center'>$res[Username]</td>
                    <td class='text-center'>$res[EmpID]</td>
                    <td class='text-center'>$res[Email]</td>
                    <td class='text-center'>$res[PhoneNo]</td>
                    <td class='text-center'>$res[Position]</td>
                    <td class='text-center'>
                        <a class='btn btn-danger deleteAdmin' id='$res[EmpID]'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }
        }

        public function deleteAdminAccount($id){
            $con = $this->openConnection();
            $sqlQuery = "DELETE FROM `admininfo` WHERE `EmpID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function deleteSrAccountSelected($id){
            $con = $this->openConnection();
            $sqlQuery = "DELETE FROM `srpersonalinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                $sqlQuery2 = "DELETE FROM `srparterinfo` WHERE `UserUniqueID`='$id'";
                $stmt2 = $con->prepare($sqlQuery2);
                $stmt2->execute();

                $sqlQuery3 = "DELETE FROM `srhealthissue` WHERE `UserUniqueID`='$id'";
                $stmt3 = $con->prepare($sqlQuery3);
                $stmt3->execute();

                $sqlQuery4 = "DELETE FROM `sremercontact` WHERE `UserUniqueID`='$id'";
                $stmt4 = $con->prepare($sqlQuery4);
                $stmt4->execute();
                return true;
            }else{
                return false;
            }

        }

        public function adminLoginAccount($username, $password){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `EmpID`,`FirstName`,`MiddleName`,`LastName`,`Position` FROM `admininfo` WHERE `Username`='$username' AND `Password`='$password'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    $_SESSION['empID'] = $res['EmpID'];
                    $_SESSION['adminFname'] = $res['FirstName'];
                    $_SESSION['adminMname'] = $res['MiddleName'];
                    $_SESSION['adminLname'] = $res['LastName'];
                    $_SESSION['adminPos'] = $res['Position'];
                }
                return true;
            }
            else{
                return false;
            }
        }


        // LastName
        public function showAdminLastName($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `LastName` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['LastName'];
                }
                return true;
            }
            else{
                return false;
            }
        }
        // MiddleName2
        public function showAdminMiddleName2($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `MiddleName` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo substr($res['MiddleName'],0,1);
                }
                return true;
            }
            else{
                return false;
            }
        }
        // FirstName
        public function showAdminFirstName($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `FirstName` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['FirstName'];
                }
                return true;
            }
            else{
                return false;
            }
        }
        // MiddleName
        public function showAdminMiddleName($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `MiddleName` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['MiddleName'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // AccountRole
        public function showAdminAccountRole($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `AccountRole` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['AccountRole'];
                }
                return true;
            }
            else{
                return false;
            }
        }
        // Position
        public function showAdminPosition($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Position` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Position'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // EmpID
        public function showAdminEmpID($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `EmpID` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['EmpID'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Email
        public function showAdminEmail($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Email` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Email'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // PhoneNo
        public function showAdminPhoneNo($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `PhoneNo` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['PhoneNo'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Username
        public function showAdminUsername($empid){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Username` FROM `admininfo` WHERE `EmpID`='$empid'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Username'];
                }
                return true;
            }
            else{
                return false;
            }
        }



        // Show Announcement
        public function showAllAnnouncement(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT * FROM `announcement`";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "<tr>
                    <td class='text-center'>$res[Title]</td>
                    <td class='text-center'>$res[Description]</td>
                    <td class='text-center'>$res[PostedBy]</td>
                    <td class='text-center'>$res[PostedByPosition]</td>
                    <td class='text-center'>$res[DateCreated]</td>
                    <td class='text-center'>
                        <a class='btn btn-danger deleteAnnouncement' id='$res[id]'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteMessage($id){
            $con = $this->openConnection();
            $sqlQuery = "DELETE FROM `message` WHERE `id`='$id'";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteAnnouncement($id){
            $con = $this->openConnection();
            $sqlQuery = "DELETE FROM `announcement` WHERE `id`='$id'";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        

        
        public function updateMessage($id){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `message` SET `Status`='Read' WHERE `id`='$id'";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }



       


    }
?>