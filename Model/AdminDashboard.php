<?php
    require_once("config.php"); //required to implement this for calling DB

    class AdminDashboard extends config{
        

        public function countSeniorUser(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`UserUniqueID`) AS `userCount` FROM srpersonalinfo";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }

        public function countAdminUser(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`AccountRole`) AS `userCount` FROM admininfo";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }

        public function countUnreadMessage(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `userCount` FROM message WHERE `Status`='Unread'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }

        public function countSeniorRequestAccount(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`UserUniqueID`) AS `userCount` FROM `srpersonalinfo` WHERE `Status`='Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }

        public function countPendingPensionReq(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `reqPensionCount` FROM `reqpension` WHERE `Status`='Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['reqPensionCount'];
            }
        }

        public function countPendingSeniorIDReq(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `reqSeniorIDCount` FROM `reqsrid` WHERE `Status`='Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['reqSeniorIDCount'];
            }
        }

        public function countPendingBurialAsstReq(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `reqBurialAsstCount` FROM `reqburialasst` WHERE `BurStatus`='Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['reqBurialAsstCount'];
            }
        }

        public function countApprovedPensionReq(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `reqApprovePensionCount` FROM `reqpension` WHERE `Status`='Approve'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['reqApprovePensionCount'];
            }
        }

        public function countApprovedSeniorIDReq(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `reqApproveSeniorIDCount` FROM `reqsrid` WHERE `Status`='Approve'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['reqApproveSeniorIDCount'];
            }
        }

        public function countApprovedBurialReq(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `reqApproveBurialCount` FROM `reqburialasst` WHERE `BurStatus`='Approve'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['reqApproveBurialCount'];
            }
        }


    }



?>