<?php
    require_once("config.php"); //required to implement this for calling DB
    require_once '../vendors/phpmailer/PHPMailerAutoload.php';
    class Services extends config{
        
        

        public function uploadReqestPension($uniqueID, $seniorID, $threeSign){

            $con = $this->openConnection();
            $sqlQuery = $con->prepare("INSERT INTO `reqpension` (`UserUniqueID`,`SrCitId`,`ThreeSignature`) VALUES('$uniqueID','$seniorID','$threeSign') ");
            if($sqlQuery->execute()){
                return true;
            }else{
                return false;
            }

        }
        public function uploadReqestSeniorID($uniqueID,$picture,$valid){
            $con = $this->openConnection();
            $sqlQuery = $con->prepare("INSERT INTO `reqsrid` (`UserUniqueID`,`TwoByTwoPic`,`ValidIDBirthCert`) VALUES('$uniqueID','$picture','$valid') ");
            if($sqlQuery->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function uploadReqestBurial($uniqueID,$seniorID,$deathCert, $cod){
            $con = $this->openConnection();
            $sqlQuery = $con->prepare("UPDATE `reqburialasst` SET `SeniorID`='$seniorID', `DeathCert`='$deathCert',`CauseOfDeath`='$cod', `DateRequested`= now(), `BurStatus`='Pending' WHERE `UserUniqueID`='$uniqueID'");
            if($sqlQuery->execute()){
                return true;
            }else{
                return false;
            }
        }



        public function showRequestPension(){
            $con = $this->openConnection();
            $sqlQuery =  $con->prepare("SELECT sr.FirstName, sr.MiddleName, sr.LastName, sr.Address, sr.Age, sr.Gender, sr.UserUniqueID, sr.UserUniqueID, r.SrCitId, r.ThreeSignature FROM `srpersonalinfo` AS sr INNER JOIN `reqpension` as r ON sr.UserUniqueID = r.UserUniqueID WHERE r.Status='Pending'");
            $sqlQuery->execute();

            if($sqlQuery->rowCount() > 0){
                while($res = $sqlQuery->fetch()){
                    echo "
                        <tr>
                            <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'], 0, 1).". ".$res['LastName']."</td>
                            <td class='text-center'>$res[Address]</td>
                            <td class='text-center'>$res[Age]</td>
                            <td class='text-center'>$res[Gender]</td>
                            <td class='text-center'><img src='../assets/SeniorID/$res[SrCitId]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                            <td class='text-center'><img src='../assets/Signatures/$res[ThreeSignature]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                            <td class='text-center'>
                            <a class='btn btn-primary approveReqPension' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-up'></i></a>
                            <a class='btn btn-danger disapproveReqPension' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-down'></i></a>
                        </tr>
                    
                    
                    ";
                    
                }
                return true;
            }else{
                return false;
            }
        }

        public function showRequestSeniorID(){
            $con = $this->openConnection();
            $sqlQuery =  $con->prepare("SELECT sr.UserUniqueID, sr.FirstName, sr.MiddleName, sr.LastName, sr.Address, sr.Age, sr.Gender, r.TwoByTwoPic, r.ValidIDBirthCert FROM `srpersonalinfo` AS sr INNER JOIN `reqsrid` as r ON sr.UserUniqueID = r.UserUniqueID WHERE r.Status = 'Pending'");
            $sqlQuery->execute();

            if($sqlQuery->rowCount() > 0){
                while($res = $sqlQuery->fetch()){
                    echo "
                        <tr>
                            <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'], 0, 1).". ".$res['LastName']."</td>
                            <td class='text-center'>$res[Address]</td>
                            <td class='text-center'>$res[Age]</td>
                            <td class='text-center'>$res[Gender]</td>
                            <td class='text-center'><img src='../assets/PictureCopy/$res[TwoByTwoPic]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                            <td class='text-center'><img src='../assets/ValidCertificate/$res[ValidIDBirthCert]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                            <td class='text-center'>
                            <a class='btn btn-primary approveReqSeniorID' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-up'></i></a>
                            <a class='btn btn-danger disapproveReqSeniorID' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-down'></i></a>
                        </td>
                        </tr>
                    
                    
                    ";
                    
                }
                return true;
            }else{
                return false;
            }
        }





        public function showRequestBurialAsst(){
            $con = $this->openConnection();
            $sqlQuery =  $con->prepare("SELECT sr.FirstName, sr.MiddleName, sr.LastName, sr.Address, sr.Age, sr.Gender, sr.UserUniqueID, r.SeniorID, r.DeathCert, r.CauseOfDeath FROM `srpersonalinfo` AS sr INNER JOIN `reqburialasst` as r ON sr.UserUniqueID = r.UserUniqueID WHERE r.BurStatus = 'Pending'" );
            $sqlQuery->execute();

            if($sqlQuery->rowCount() > 0){
                while($res = $sqlQuery->fetch()){
                    echo "
                        <tr>
                            <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'], 0, 1).". ".$res['LastName']."</td>
                            <td class='text-center'>$res[Address]</td>
                            <td class='text-center'>$res[Age]</td>
                            <td class='text-center'>$res[Gender]</td>
                            <td class='text-center'>$res[CauseOfDeath]</td>
                            <td class='text-center'><img src='../assets/BurialSeniorID/$res[SeniorID]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                            <td class='text-center'><img src='../assets/BurialCOD/$res[DeathCert]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                            
                            <td class='text-center'><a class='btn btn-primary approveBurialAsst' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-up'></i></a>
                            <a class='btn btn-danger disapproveBurialAsst' id='$res[UserUniqueID]'><i class='fa-solid fa-thumbs-down'></i></a>
                        </td>
                        </tr>
                    
                    
                    ";
                    
                }
                return true;
            }else{
                return false;
            }
        }

        public function showDissease(){
            $con = $this->openConnection();
            $sqlQuery =  $con->prepare("SELECT sr.FirstName, sr.MiddleName, sr.LastName, sr.Address, sr.Age, sr.Gender, sr.UserUniqueID, r.SeniorID, r.DeathCert, r.CauseOfDeath FROM `srpersonalinfo` AS sr INNER JOIN `reqburialasst` as r ON sr.UserUniqueID = r.UserUniqueID WHERE r.BurStatus = 'Approve'" );
            $sqlQuery->execute();
            if($sqlQuery->rowCount() > 0){
                while($res = $sqlQuery->fetch()){
                    echo "
                        <tr>
                            <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'], 0, 1).". ".$res['LastName']."</td>
                            <td class='text-center'>$res[Address]</td>
                            <td class='text-center'>$res[Age]</td>
                            <td class='text-center'>$res[Gender]</td>
                            <td class='text-center'>$res[CauseOfDeath]</td>
                            <td class='text-center'><img src='../assets/BurialSeniorID/$res[SeniorID]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                            <td class='text-center'><img src='../assets/BurialCOD/$res[DeathCert]' style='width: 80px; cursor: pointer;' class='zoomable'></td>
                        </tr>     
                    ";
                    
                }
                return true;

            }else{
                return false;
            }
        }


        public function approveBurialReq($id,$date){
            $con = $this->openConnection();
            $stmt = $con->prepare("UPDATE `reqburialasst` SET `BurStatus`='Approve' WHERE `UserUniqueID`='$id'");
            if($stmt->execute()){
                $sqlQuery =  $con->prepare("SELECT sr.Email FROM `srpersonalinfo` AS sr INNER JOIN `reqburialasst` as r ON sr.UserUniqueID = '$id'");
                $sqlQuery->execute();
                $fetchData = $sqlQuery->fetch();
                $emailAdd = ($fetchData['Email']);

                $title = "Burial Assitance Request";
                $Body1 = "Your Burial Assistance request was Approve. Your request will be release this date on ".$date;
                $Body = "Your Burial Assistance request was <b style='color: green;'>Approve</b>. Your request will be release this date on <b>".$date."</b>";
                
                
                $sqlQuery1 =  $con->prepare("INSERT INTO `notifications` (`UserUniqueID`,`Title`,`Message`,`Status`) VALUES('$id','$title','$Body1','Approved')");
                $sqlQuery1->execute();
                
                $mail = new PHPMailer;

            
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
                $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
                $mail->addAddress($emailAdd, 'Senior Citizen User');     // Add a recipient
            
                $mail->isHTML(true);                                  // Set email format to HTML
            
                $mail->Subject = $title;
                $mail->Body    = $Body;
            
            
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    return true;
                }

                return true;
            }
            else{
                return false;
            }
        }



        
        public function disapproveBurialReq($id){
            $con = $this->openConnection();
            $stmt = $con->prepare("UPDATE `reqburialasst` SET `BurStatus`='Disapprove' WHERE `UserUniqueID`='$id'");
            if($stmt->execute()){
                $sqlQuery =  $con->prepare("SELECT sr.Email FROM `srpersonalinfo` AS sr INNER JOIN `reqburialasst` as r ON sr.UserUniqueID = '$id'");
                $sqlQuery->execute();
                $fetchData = $sqlQuery->fetch();
                $emailAdd = ($fetchData['Email']);

                $title = "Burial Assitance Request";
                $Body = "Your Burial Assistance request was <b style='color: red;'>Disapprove</b>. ";
                $mail = new PHPMailer;

                $Body1 = "Your Burial Assitance Request was Disapprove.";
                $sqlQuery1 =  $con->prepare("INSERT INTO `notifications` (`UserUniqueID`,`Title`,`Message`,`Status`) VALUES('$id','$title','$Body1','Disapproved')");
                $sqlQuery1->execute();
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
                $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
                $mail->addAddress($emailAdd, 'Senior Citizen User');     // Add a recipient
            
                $mail->isHTML(true);                                  // Set email format to HTML
            
                $mail->Subject = $title;
                $mail->Body    = $Body;
            
            
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    return true;
                }

                return true;
            }
            else{
                return false;
            }
        }




        public function approvePensioReq($id,$date){
            $con = $this->openConnection();
            $stmt = $con->prepare("UPDATE `reqpension` SET `Status`='Approve' WHERE `UserUniqueID`='$id'");
            if($stmt->execute()){
                $sqlQuery =  $con->prepare("SELECT sr.Email FROM `srpersonalinfo` AS sr INNER JOIN `reqpension` as r ON sr.UserUniqueID = '$id'");
                $sqlQuery->execute();
                $fetchData = $sqlQuery->fetch();
                $emailAdd = ($fetchData['Email']);

                $stmt2 = $con->prepare("UPDATE `srpersonalinfo` SET `PensionerStatus`='Yes' WHERE `UserUniqueID`='$id'");
                $stmt2->execute();

                $title = "Pension Request";
                $Body = "Your Pension Request was <b style='color: green;'>Approve</b>. Your request will be release this date on <b>".$date."</b>";
                $mail = new PHPMailer;

                $Body1 = "Your Pension request was Approve. Your request will be release this date on ".$date;

                $sqlQuery1 =  $con->prepare("INSERT INTO `notifications` (`UserUniqueID`,`Title`,`Message`,`Status`) VALUES('$id','$title','$Body1','Approved')");
                $sqlQuery1->execute();
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
                $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
                $mail->addAddress($emailAdd, 'Senior Citizen User');     // Add a recipient
            
                $mail->isHTML(true);                                  // Set email format to HTML
            
                $mail->Subject = $title;
                $mail->Body    = $Body;
            
            
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    return true;
                }

                return true;
            }
            else{
                return false;
            }
        }


        public function disapprovePensioReq($id){
            $con = $this->openConnection();
            $stmt = $con->prepare("UPDATE `reqpension` SET `Status`='Disapprove' WHERE `UserUniqueID`='$id'");
            if($stmt->execute()){
                $sqlQuery =  $con->prepare("SELECT sr.Email FROM `srpersonalinfo` AS sr INNER JOIN `reqpension` as r ON sr.UserUniqueID = '$id'");
                $sqlQuery->execute();
                $fetchData = $sqlQuery->fetch();
                $emailAdd = ($fetchData['Email']);
                
                $stmt2 = $con->prepare("UPDATE `srpersonalinfo` SET `PensionerStatus`='No' WHERE `UserUniqueID`='$id'");
                $stmt2->execute();

                $title = "Pension Request";
                $Body = "Your Pension Request was <b style='color: red;'>Disapprove</b>.";
                $mail = new PHPMailer;

                $Body1 = "Your Pension Request was Disapprove.";
                $sqlQuery1 =  $con->prepare("INSERT INTO `notifications` (`UserUniqueID`,`Title`,`Message`,`Status`) VALUES('$id','$title','$Body1','Disapproved')");
                $sqlQuery1->execute();
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
                $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
                $mail->addAddress($emailAdd, 'Senior Citizen User');     // Add a recipient
            
                $mail->isHTML(true);                                  // Set email format to HTML
            
                $mail->Subject = $title;
                $mail->Body    = $Body;
            
            
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    return true;
                }

                return true;
            }
            else{
                return false;
            }
        }



        public function approveSeniorIDReq($id,$date){
            $con = $this->openConnection();
            $stmt = $con->prepare("UPDATE `reqsrid` SET `Status`='Approve' WHERE `UserUniqueID`='$id'");
            if($stmt->execute()){
                $sqlQuery =  $con->prepare("SELECT sr.Email FROM `srpersonalinfo` AS sr INNER JOIN `reqsrid` as r ON sr.UserUniqueID = '$id'");
                $sqlQuery->execute();
                $fetchData = $sqlQuery->fetch();
                $emailAdd = ($fetchData['Email']);

                $title = "Senior ID Request";
                $Body = "Your Senior ID Request was <b style='color: green;'>Approve</b>. Your request will be release this date on <b>".$date."</b>";
                $mail = new PHPMailer;

                $Body1 = "Your Senior ID request was Approve. Your request will be release this date on ".$date;

                $sqlQuery1 =  $con->prepare("INSERT INTO `notifications` (`UserUniqueID`,`Title`,`Message`,`Status`) VALUES('$id','$title','$Body1','Approved')");
                $sqlQuery1->execute();
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
                $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
                $mail->addAddress($emailAdd, 'Senior Citizen User');     // Add a recipient
            
                $mail->isHTML(true);                                  // Set email format to HTML
            
                $mail->Subject = $title;
                $mail->Body    = $Body;
            
            
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    return true;
                }

                return true;
            }
            else{
                return false;
            }
        }


        public function disapproveSeniorIDReq($id){
            $con = $this->openConnection();
            $stmt = $con->prepare("UPDATE `reqsrid` SET `Status`='Disapprove' WHERE `UserUniqueID`='$id'");
            if($stmt->execute()){
                $sqlQuery =  $con->prepare("SELECT sr.Email FROM `srpersonalinfo` AS sr INNER JOIN `reqsrid` as r ON sr.UserUniqueID = '$id'");
                $sqlQuery->execute();
                $fetchData = $sqlQuery->fetch();
                $emailAdd = ($fetchData['Email']);

                $title = "Senior ID Request";
                $Body = "Your Senior ID Request was <b style='color: red;'>Disapprove</b>.";
                $mail = new PHPMailer;

                $Body1 = "Your Senior ID Request was Disapprove.";
                $sqlQuery1 =  $con->prepare("INSERT INTO `notifications` (`UserUniqueID`,`Title`,`Message`,`Status`) VALUES('$id','$title','$Body1','Disapproved')");
                $sqlQuery1->execute();

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'klintoiyas@gmail.com';                 // SMTP username
                $mail->Password = 'nnkvpptsjbfxflmj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                $mail->setFrom('klintoiyas@gmail.com', 'Mailer');
                $mail->addAddress($emailAdd, 'Senior Citizen User');     // Add a recipient
            
                $mail->isHTML(true);                                  // Set email format to HTML
            
                $mail->Subject = $title;
                $mail->Body    = $Body;
            
            
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    return true;
                }

                return true;
            }
            else{
                return false;
            }
        }





    }



?>