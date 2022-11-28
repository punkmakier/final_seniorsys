
<?php 
include  '../Model/Pagination.php' ;
$cond = "WHERE `UserUniqueID` = '".$_SESSION['userUniqueID']."'";
$paginate=new Pagination("notifications","notifications.php",3,$cond) ;
?>
<div class="container mt-5">
    <h3>Notifications</h3>
    <div class="ps-5 pe-5 mt-5">

<?php   
    foreach($paginate->getData() as $data){
?>
<div class="alert <?php if($data["Status"] == "Approved") {echo "alert-success";} else{ echo "alert-danger";}?>" role="alert">
        <h4 class="alert-heading"><?php echo $data["Title"] ?></h4>
        <p><?php echo $data["Message"] ?></p>
        <hr>
        <p class="mb-0">Date <?php if($data["Status"] == "Approved") {echo "Approved";} else{ echo "Disapproved";}?>: <?php echo $data["DateAdded"] ?></p>
        </div>
    


<?php }?>
</div>     
<div class="mt-5 text-center">
    <?php $paginate->paginate_links(); ?>
</div>
</div>