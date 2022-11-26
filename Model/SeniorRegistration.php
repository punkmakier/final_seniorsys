<?php
    require_once("config.php"); //required to implement this for calling DB

    class SeniorRegistration extends config{
        private $UserUniqueID;
        private $LastName;
        private $FirstName;
        private $MiddleName;
        private $Birthdate;
        private $Address;
        private $Email;
        private $CellphoneNo;
        private $BirthCert;
        private $BrgyClear;
        private $Username;
        private $Password;


        public function __construct($UserUniqueID,$LastName,$FirstName,$MiddleName,$Birthdate,$Address,$Email,$CellphoneNo,$BirthCert,$brgyClear,$Username,$Password){
            $this->UserUniqueID = $UserUniqueID;
            $this->LastName = $LastName;
            $this->FirstName = $FirstName;
            $this->MiddleName = $MiddleName;
            $this->Birthdate = $Birthdate;
            $this->Address = $Address;
            $this->Email = $Email;
            $this->CellphoneNo = $CellphoneNo;
            $this->BirthCert = $BirthCert;
            $this->BrgyClear = $brgyClear;
            $this->Username = $Username;
            $this->Password = $Password;
        }

        public function SeniorRegistration(){
            $con = $this->openConnection();
            $sqlQuery = "INSERT INTO `srpersonalinfo` (`UserUniqueID`,`LastName`,`FirstName`,`MiddleName`,`Birthdate`,`Address`,`Email`,`CellphoneNo`,`BirthCert`,`BrgyClear`,`Username`,`Password`)
            VALUES('$this->UserUniqueID','$this->LastName','$this->FirstName','$this->MiddleName','$this->Birthdate','$this->Address','$this->Email','$this->CellphoneNo','$this->BirthCert','$this->BrgyClear','$this->Username','$this->Password')";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                $sqlQuery2 = "INSERT INTO `srparterinfo` (`UserUniqueID`) VALUES('$this->UserUniqueID')";
                $stmt2 = $con->prepare($sqlQuery2);
                $stmt2->execute();

                $sqlQuery3 = "INSERT INTO `srhealthissue` (`UserUniqueID`) VALUES('$this->UserUniqueID')";
                $stmt3 = $con->prepare($sqlQuery3);
                $stmt3->execute();

                $sqlQuery4 = "INSERT INTO `sremercontact` (`UserUniqueID`) VALUES('$this->UserUniqueID')";
                $stmt4 = $con->prepare($sqlQuery4);
                $stmt4->execute();

                $sqlQuery5 = "INSERT INTO `reqburialasst` (`UserUniqueID`) VALUES('$this->UserUniqueID')";
                $stmt5 = $con->prepare($sqlQuery5);
                $stmt5->execute();
                
                return true;
            }
            else{
                return false;
            }
        }

    }



?>