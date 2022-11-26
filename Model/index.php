
<!DOCTYPE html>
<html lang="en">
<head>
  <title>php pagination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:#f8f9fa;">

<div class="container">
    <br>
  <h1  style="font-weight:bold;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif" align="center">php pagination oop with bootstrap  by skmcoder </h1>
  <br>
  <?php   
    //start pagination part 
    include  'Pagination.php' ;
     //simple options
     $paginate=new Pagination("users",basename(__FILE__),4,2) ;
    //for more options
      // $paginate=new paginate("user","index.php",6,2,'&&sort=asc',"order by id asc") ;
    
  ?>
 <?php 
  //show links 
  $paginate->paginate_links();
  ?>
    <table class="table table-light table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        <?php   
          foreach($paginate->getData() as $data){
        ?>
      <tr>
        <td><?php echo $data["id"] ?></td>
        <td><?php echo $data["username"] ?></td>
        <td><?php echo $data["password"] ?></td>
      </tr>
       
      <?php  }?>
    </tbody>
  </table>

  
</div>

</body>
</html>