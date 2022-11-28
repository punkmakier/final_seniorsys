<?php
    require_once("config.php"); //required to implement this for calling DB

    class AccountRequested extends config{
        

        public function showSeniorAccountRequested(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT * FROM srpersonalinfo WHERE `Status`='Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                        <tr>
                            <td class='text-center'>$res[LastName]</td>
                            <td class='text-center'>$res[Address]</td>
                            <td class='text-center'>$res[Age]</td>
                            <td class='text-center'>$res[Gender]</td>
                            <td class='text-center'>$res[CellphoneNo]</td>
                            <td class='text-center'>
                                <a class='btn btn-primary btnRequestApprove' title='Approve' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-up'></i></a>
                                <a class='btn btn-danger btnRequestDisapprove' title='Dispprove' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-down'></i></a>
                            </td>
                        </tr>
                    ";
                }
            }
        }

        public function showAllSeniorAccount(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT sr.* FROM `reqburialasst` as r INNER JOIN `srpersonalinfo` as sr ON r.`UserUniqueID`= sr.`UserUniqueID` WHERE r.BurStatus = 'N/A' OR r.BurStatus = 'Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    $bday = substr($res['Birthdate'],5,2);
                    $monthNum  = $bday;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('M'); 
                    echo "<tr>
                    <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'],0,1).". ".$res['LastName']."</td>
                    <td class='text-center'>$res[Address]</td>
                    <td class='text-center'>$res[Age]</td>
                    <td class='text-center'>$res[Gender]</td>
                    <td class='text-center'>$res[Status]</td>
                    <td class='text-center'>".$monthNum."</td>
                    <td class='text-center'><b style='padding: 3px 6px; background-color:";
                    
                    if($res['PensionerStatus'] == "Yes") { echo "green;";} else{echo "red;";}
                    echo "color: white; border-radius: 10px;'>$res[PensionerStatus]</b></td>
                    <td class='text-center'>
                        <a class='btn btn-primary viewSelectedSr' id='$res[UserUniqueID]'><i class='fa-solid fa-eye'></i></a> 
                        <a class='btn btn-danger deleteThisSrCitizenAcct' id='$res[UserUniqueID]'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }
        }









        //  SHOW ALL INFORMATION SENIOR CITIZEN SELECTED

        
        public function showBirthCertBrgyClearFnameMnameLnameBday($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `BirthCert`,`BrgyClear`,`FirstName`,`MiddleName`,`LastName`,`Birthdate` FROM `srpersonalinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "<div class='col'>
                        <label for='exampleInputEmail1' class='form-label '><b>Birth Certificate</b></label>
                        <img src='../assets/BirthCertificates/$res[BirthCert]' width='200' alt=''>
                    </div>
                    
                    <div class='col'>
                        <label for='exampleInputEmail1' class='form-label '><b>Barangay Clearance</b></label>
                        <img src='../assets/BarangayClearance/$res[BrgyClear]' width='200' alt=''>
                    </div>

                    <div class='col'>
                        <div class='mb-2'>
                            <label for='exampleInputEmail1' class='form-label'><b>First Name</b></label>
                            <input type='text' class='form-control' value='$res[FirstName]' readonly>
                        </div>
                        <div class='mb-2'>
                            <label for='exampleInputEmail1' class='form-label'><b>Last Name</b></label>
                            <input type='text' class='form-control' value='$res[LastName]' readonly>
                        </div>
                    </div>
                    <div class='col'>
                        <div class='mb-2'>
                            <label for='exampleInputEmail1' class='form-label'><b>Middle Name</b></label>
                            <input type='text' class='form-control' value='$res[MiddleName]' readonly>
                        </div>
                        <div class='mb-2'>
                            <label for='exampleInputEmail1' class='form-label'><b>Birthdate</b></label>
                            <input type='date' class='form-control' value='$res[Birthdate]' readonly>
                        </div>
                    </div>
                    
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }



        public function showAddEmailCPStat($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Address`,`Email`,`CellphoneNo`,`Status` FROM `srpersonalinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Address</b></label>
                        <input type='text' class='form-control' value='$res[Address]' readonly>
                    </div>
                    </div>
                    
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Email</b></label>
                        <input type='text' class='form-control' value='$res[Email]' readonly>
                    </div>
                    </div>

                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Cellphone Number</b></label>
                        <input type='text' class='form-control' value='$res[CellphoneNo]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Status</b></label>
                        <input type='text' class='form-control' value='$res[Status]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }

        public function showDateRegPOBAgeGender($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `DateRegistered`,`PlaceOfBirth`,`Age`,`Gender` FROM `srpersonalinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Date Registered</b></label>
                        <input type='text' class='form-control' value='$res[DateRegistered]' readonly>
                    </div>
                    </div>
                    
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Place of Birth</b></label>
                        <input type='text' class='form-control' value='$res[PlaceOfBirth]' readonly>
                    </div>
                    </div>

                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Age</b></label>
                        <input type='text' class='form-control' value='$res[Age]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Gender</b></label>
                        <input type='text' class='form-control' value='$res[Gender]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }

        public function showEducAttainVoterCivCiti($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `EducAttainment`,`VoterStatus`,`CivilStatus`,`Citizenship` FROM `srpersonalinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Educational Attainment</b></label>
                        <input type='text' class='form-control' value='$res[EducAttainment]' readonly>
                    </div>
                    </div>
                    
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Voter Status</b></label>
                        <input type='text' class='form-control' value='$res[VoterStatus]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Civil Status</b></label>
                        <input type='text' class='form-control' value='$res[CivilStatus]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Citizenship</b></label>
                        <input type='text' class='form-control' value='$res[Citizenship]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }

        public function showReliTelOccuMonthInc($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Religion`,`TeleNumber`,`Occupation`,`MonthlyIncome` FROM `srpersonalinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Religion</b></label>
                        <input type='text' class='form-control' value='$res[Religion]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Telephone Number</b></label>
                        <input type='text' class='form-control' value='$res[TeleNumber]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Occupation</b></label>
                        <input type='text' class='form-control' value='$res[Occupation]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Monthly Income</b></label>
                        <input type='text' class='form-control' value='$res[MonthlyIncome]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }





        public function showPartnerFnameMnameLnameBday($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `FirstName`,`MiddleName`,`LastName`,`Birthdate` FROM `srparterinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>First Name</b></label>
                        <input type='text' class='form-control' value='$res[FirstName]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Middle Name</b></label>
                        <input type='text' class='form-control' value='$res[MiddleName]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Last Name</b></label>
                        <input type='text' class='form-control' value='$res[LastName]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Birthdate</b></label>
                        <input type='text' class='form-control' value='$res[Birthdate]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }


   

        public function showPartnerAgeLUPEducAttainOccuMonthly($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Age`,`EducAttainment`,`Occupation`,`DateUpdated`,`MonthlyIncome` FROM `srparterinfo` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Age</b></label>
                        <input type='text' class='form-control' value='$res[Age]' readonly>
                        <label for='exampleInputEmail1' class='form-label'><b>Monthly Income</b></label>
                        <input type='text' class='form-control' value='$res[MonthlyIncome]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Educational Attainment</b></label>
                        <input type='text' class='form-control' value='$res[EducAttainment]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Occupation</b></label>
                        <input type='text' class='form-control' value='$res[Occupation]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Last Update</b></label>
                        <input type='text' class='form-control' value='$res[DateUpdated]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }



        public function showHealthIssueCMICLastUpdate($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `CMIC`,`DateUpdated` FROM `srhealthissue` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Current Medical Illnesses Complained</b></label>
                        <input type='text' class='form-control' value='$res[CMIC]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Last Updated</b></label>
                        <input type='text' class='form-control' value='$res[DateUpdated]' readonly>
                    </div>
                    </div>
        
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }






        public function showEmergencyContactFnameMnameLname($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `FirstName`,`MiddleName`,`LastName` FROM `sremercontact` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>First Name</b></label>
                        <input type='text' class='form-control' value='$res[FirstName]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Middle Name</b></label>
                        <input type='text' class='form-control' value='$res[MiddleName]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Last Name</b></label>
                        <input type='text' class='form-control' value='$res[LastName]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }

        public function showEmergencyContactAddCPLUP($id){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Address`,`CellphoneNumber`,`DateUpdated` FROM `sremercontact` WHERE `UserUniqueID`='$id'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Address</b></label>
                        <input type='text' class='form-control' value='$res[Address]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Cellphone Number</b></label>
                        <input type='text' class='form-control' value='$res[CellphoneNumber]' readonly>
                    </div>
                    </div>
                    <div class='col'>
                    <div class='mb-2'>
                        <label for='exampleInputEmail1' class='form-label'><b>Last Update</b></label>
                        <input type='text' class='form-control' value='$res[DateUpdated]' readonly>
                    </div>
                    </div>
                    ";

                }
                return true;
            }
            else{
                return false;
            }
        }
    }



?>