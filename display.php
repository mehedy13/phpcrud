<?php
session_start()
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    



<div class="container">
<?php

if(isset($_SESSION['status'])){
  ?>

 
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hey! </strong>  <?php echo $_SESSION['status'];?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

   <?php 
    unset($_SESSION['status']);
}

?>

<div>
<button class=" btn btn-primary my-5"> <a href="user.php" class="text-light text-decoration-none">Add User</a></button>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

<?php
include 'connect.php';

$sql="select * from crud";

$result=mysqli_query($con,$sql);

if($result){
    while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $password=$row['password'];
    
    echo'<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$name.'</td>
    <td>'.$email.'</td>
    <td>'.$mobile.'</td>
    <td>'.$password.'</td>
    <td>
<button><a href="edit.php?editid='.$id.'" class="btn btn-primary text-light">Edit</a></button>
<button><a href="delete.php?deleteid='.$id.'" class="btn btn-danger">Delete</a></button>

</td>
  </tr>';
}
}

?>

  </tbody>
</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>