<?php
    require_once("config.php"); //required to implement this for calling DB
    session_start();
    class SeniorAccount extends config{
        

        // LOGIN HERE
        public function SeniorLoginAccount($username,$password){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `UserUniqueID` FROM `srpersonalinfo` WHERE `Username` = '$username' AND `Password`='$password'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    $_SESSION['userUniqueID'] = $res['UserUniqueID'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        
        // Unique ID
        public function SnrUserUniqueID($uniqueID){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `UserUniqueID` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['UserUniqueID'];
                }
                return true;
            }
            else{
                return false;
            }
        }


 
       // Last Name
       public function SnrLastName($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `LastName` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['LastName']." ";
                }
                return true;
            }
            else{
                return false;
            }
        }

               // First Name
       public function SnrFirstName($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `FirstName` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['FirstName']." ";
                }
                return true;
            }
            else{
                return false;
            }
        }


               // Middle Name
       public function SnrMiddleName($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `MiddleName` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['MiddleName']." ";
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Birthdate
       public function SnrBirthdate($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Birthdate` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Birthdate'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Address
       public function SnrAddress($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Address` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Address'];
                }
                return true;
            }
            else{
                return false;
            }
        }

                // Email
       public function SnrEmail($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Email` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
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

        // Email
       public function SnrCellphoneNo($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `CellphoneNo` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['CellphoneNo'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // BirthCert
       public function SnrBirthCert($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `BirthCert` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['BirthCert'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // BrgyClear
       public function SnrBrgyClear($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `BrgyClear` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['BrgyClear'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Username
       public function SnrUsername($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Username` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
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
        // Status
       public function SnrStatus($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Status` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Status'];
                }
                return true;
            }
            else{
                return false;
            }
        }

          // PlaceOfBirth
       public function SnrPlaceOfBirth($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `PlaceOfBirth` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['PlaceOfBirth'];
                }
           
                return true;
            }
            else{
                return false;
            }
        }

          // Age
       public function SnrAge($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Age` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Age'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Gender
       public function SnrGender($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Gender` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                   if($res['Gender'] == ""){
                    echo "- Select -";
                   }
                   else{
                    echo $res['Gender'];
                   }
                }
                return true;
            }
            else{
                return false;
            }
        }

        // EducAttainment
       public function SnrEducAttainment($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `EducAttainment` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['EducAttainment'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // VoterStatus
       public function SnrVoterStatus($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `VoterStatus` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                   if($res['VoterStatus'] == ""){
                    echo "- Select - ";
                   }
                   else{
                    echo $res['VoterStatus'];
                   }
                }
                return true;
            }
            else{
                return false;
            }
        }

        // CivilStatus
       public function SnrCivilStatus($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `CivilStatus` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    if($res['CivilStatus'] == ""){
                        echo "- Select -";
                       }
                       else{
                        echo $res['CivilStatus'];
                       }
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Citizenship
       public function SnrCitizenship($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Citizenship` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Citizenship'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Religion
       public function SnrReligion($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Religion` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Religion'];
                }
                return true;
            }
            else{
                return false;
            }
        }


        // TeleNumber
       public function SnrTeleNumber($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `TeleNumber` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['TeleNumber'];
                }
                return true;
            }
            else{
                return false;
            }
        }


        // Occupation
       public function SnrOccupation($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Occupation` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Occupation'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // MonthlyIncome
       public function SnrMonthlyIncome($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `MonthlyIncome` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['MonthlyIncome'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // BasicInfoStatus
       public function SnrBasicInfoStatus($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `BasicInfoStatus` FROM `srpersonalinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['BasicInfoStatus'];
                }
                return true;
            }
            else{
                return false;
            }
        }
        




        // -------------------------------------------------- PARTNER'S INFO -------------------------------------------------

    // LastName
    public function SnrPartnerInfoLastName($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `LastName` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
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
  // FirstName
  public function SnrPartnerInfoFirstName($uniqueID){
    $con = $this->openConnection();
    $sqlQuery = "SELECT `FirstName` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
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
    public function SnrPartnerInfoMiddleName($uniqueID){
      $con = $this->openConnection();
      $sqlQuery = "SELECT `MiddleName` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
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

      // Birthdate
    public function SnrPartnerInfoBirthdate($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Birthdate` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Birthdate'];
                }
                return true;
            }
            else{
                return false;
            }
        }
        
     // Age
     public function SnrPartnerInfoAge($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Age` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Age'];
                }
                return true;
            }
            else{
                return false;
            }
        }


        // EducAttainment
     public function SnrPartnerInfoEducAttainment($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `EducAttainment` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['EducAttainment'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // Occupation
     public function SnrPartnerInfoOccupation($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Occupation` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Occupation'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // MonthlyIncome
     public function SnrPartnerInfoMonthlyIncome($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `MonthlyIncome` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['MonthlyIncome'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // SrPartnerInfoStatus
     public function SnrPartnerInfoStatus($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `SrPartnerInfoStatus` FROM `srparterinfo` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['SrPartnerInfoStatus'];
                }
                return true;
            }
            else{
                return false;
            }
        }




        // ----------------------------- HEALTH ISSUE -------------------------

        // CMIC
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

         // SrHealthIssueStatus
     public function SnrHealthIssueStatus($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `SrHealthIssueStatus` FROM `srhealthissue` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    if($res['SrHealthIssueStatus'] == ""){
                        echo "- Select Health Issue -";
                       }
                       else{
                        echo $res['SrHealthIssueStatus'];
                       }
                }
                return true;
            }
            else{
                return false;
            }
        }



        //  ------------------------------------------------- EMERGENCY CONTACT ---------------------------------------------
        

    // Lastname
     public function SnrEmergencyContactLastname($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Lastname` FROM `sremercontact` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Lastname'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // FirstName
     public function SnrEmergencyContactFirstName($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `FirstName` FROM `sremercontact` WHERE `UserUniqueID`='$uniqueID'";
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
     public function SnrEmergencyContactMiddleName($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `MiddleName` FROM `sremercontact` WHERE `UserUniqueID`='$uniqueID'";
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

        // Address
     public function SnrEmergencyContactAddress($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `Address` FROM `sremercontact` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Address'];
                }
                return true;
            }
            else{
                return false;
            }
        }
         // CellphoneNumber
     public function SnrEmergencyContactCellphoneNumber($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `CellphoneNumber` FROM `sremercontact` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['CellphoneNumber'];
                }
                return true;
            }
            else{
                return false;
            }
        }

        // SrEmerContactStatus
     public function SnrEmergencyContactStatus($uniqueID){
        $con = $this->openConnection();
        $sqlQuery = "SELECT `SrEmerContactStatus` FROM `sremercontact` WHERE `UserUniqueID`='$uniqueID'";
        $stmt = $con->prepare($sqlQuery);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['SrEmerContactStatus'];
                }
                return true;
            }
            else{
                return false;
            }
        }



        public function updateStatusAccount($status,$uniqueID){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `srpersonalinfo` SET `Status`='$status' WHERE `UserUniqueID`='$uniqueID'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();

        }


        // Show Title Announcement
        public function showLastAnnouncementTitle(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Title` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Title'];
                }
            }
        }

        // Show Description Announcement
        public function showLastAnnouncementDescription(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Description` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Description'];
                }
            }
        }

        // Show PostedBy Announcement
        public function showLastAnnouncementPostedBy(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `PostedBy` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['PostedBy'];
                }
            }
        }

        // Show PostedByPosition Announcement
        public function showLastAnnouncementPostedByPosition(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `PostedByPosition` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['PostedByPosition'];
                }
            }
        }

        // Show DateCreated Announcement
        public function showLastAnnouncementDateCreated(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `DateCreated` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['DateCreated'];
                }
            }
        }


        


    }



 



?>