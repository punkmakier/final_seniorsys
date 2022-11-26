<?php 
error_reporting(0);
ini_set('display_errors', 0);
    include  '../Model/Pagination.php' ;
    $paginate=new Pagination("announcement","userdashboard.php",1) ;

?>
<style>
    li{
        list-style-type: none;
    }
</style>

<div class="container mt-3">
    <h4 class="mt-3" style="color: #1c3456;">Welcome back!  <b><?php $snrAccountDetails->SnrFirstName($sessionID);  $snrAccountDetails->SnrMiddleName($sessionID); $snrAccountDetails->SnrLastName($sessionID);  ?></b></h4>
    <input type="hidden" id="status" value="<?php $snrAccountDetails->SnrStatus($sessionID);?>">
    
    <div class='alert alert-warning' role='alert' id="alertStatus">
        <div id="alertVerification"><b>Note:</b> Your account is <b class='text-danger'>Unverified.</b> You can not apply any of our services. Please complete your personal information <a href='accountsettings.php'><b>HERE</b></a></div>
    </div>

    <div class="container-fluid mt-5 ps-lg-5 pe-lg-5 ">
        <h2 class="text-center" style="color: #1c3456;">Announcement</h2>

        <?php   
          foreach($paginate->getData() as $data){
        ?>



        <h4><?php echo $data["Title"] ?></h4>
        <p class="mt-4"><?php echo $data["Description"] ?></p>
        <label class="mt-3"><b><?php echo $data["PostedBy"] ?> | <?php echo $data["PostedByPosition"] ?></b><br><small>Date Posted: <?php echo $data["DateCreated"] ?></small></label>

        <div class="mt-5 text-center">
            <?php $paginate->paginate_links(); ?>
        </div>
        <?php }?>

        <div class="mt-5">
            <h3>OSCA Office Information</h3>
            <li><i class="fa-solid fa-address-card"></i>&nbsp;093200000</li>
            <li><i class="fa-solid fa-envelope"></i>&nbsp;osca@gmail.com</li>
            <li><i class="fa-solid fa-phone"></i>&nbsp;12654156156</li>
        </div>
    </div>

        <input id="SnrPartnerInfoStatus_u" type="hidden" value="<?php $snrAccountDetails->SnrPartnerInfoStatus($sessionID); ?>">
    <input id="basicInfo_u" type="hidden" value="<?php $snrAccountDetails->SnrBasicInfoStatus($sessionID); ?>">
    <input type="hidden" value="<?php $snrAccountDetails->SnrHealthIssueStatus($sessionID); ?>" id="SnrHealthIssueStatus_u">
    <input type="hidden" value="<?php $snrAccountDetails->SnrEmergencyContactStatus($sessionID); ?>" id="SnrEmergencyContactStatus_u">

    <form action="" id="triggerForm">
        <input type="hidden" id="trigger" name="trigger">
    </form>

</div>


<script>
    $(document).ready(function(){

        var basicInfoStatus = $("#basicInfo_u").val();
        var SnrPartnerInfoStatus = $("#SnrPartnerInfoStatus_u").val();
        var SnrHealthIssueStatus = $("#SnrHealthIssueStatus_u").val();
        var SnrEmergencyContactStatus = $("#SnrEmergencyContactStatus_u").val();
        var checkStatus = $("#status").val();
        if(basicInfoStatus == "Yes" &&  SnrPartnerInfoStatus == "Yes" &&  SnrHealthIssueStatus == "Yes" && SnrEmergencyContactStatus == "Yes"){
            if(checkStatus == "Verified"){
                $("#alertVerification").html("<div class='alert-dismissible fade show' role='alert'><strong>Congratulations!</strong> Your account is fully verified, you can now use our services.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                $("#alertStatus").addClass("alert-success");
                $("#alertStatus").removeClass("alert-warning");
                $("#Services").css("display","block");
                $("#trigger").val("Verified");

            }
            else{
                $("#alertVerification").html("<span>Your verification is under review. Please wait for the approval of your request. Status: <b class='text-warning'>Pending.</b></span>");            
                $("#alertStatus").css("display","block");
                $("#Services").css("display","none");
                $("#trigger").val("Pending");

                var data =  $("#triggerForm").serialize();

                $.ajax({
                    type: "POST",
                    url: "../Controller/SeniorCitizenFunction.php",
                    data: data,
                    success: function(response){

                    }
                })
            }
            //     $trigerValue = $("#trigger").val("Pending");

        //     if($trigerValue == "Pending"){
        //         $("#trigger").val("Pending");
        //     }


        //     var data =  $("#triggerForm").serialize();
        //     $.ajax({
        //         type: "POST",
        //         url: "../Controller/SeniorCitizenFunction.php",
        //         data: data,
        //         success: function(reponse){
        //             null;
        //         }
        //     })


        // }else{
        //     $("#trigger").val("Unverified");
        //     var data =  $("#triggerForm").serialize();
        //     $.ajax({
        //         type: "POST",
        //         url: "../Controller/SeniorCitizenFunction.php",
        //         data: data,
        //         success: function(reponse){
        //             null;
        //         }
        //     })

        }
        else{
            $("#trigger").val("Unverified");
            $("#alertStatus").css("display","block");

            var data =  $("#triggerForm").serialize();
                $.ajax({
                    type: "POST",
                    url: "../Controller/SeniorCitizenFunction.php",
                    data: data,
                    success: function(reponse){
            
                    }
                })
        }


        
    })
</script>

