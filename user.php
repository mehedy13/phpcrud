
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
    <form  method="post">
    <div class="form-group">
            <label class="form-label my-3">Name</label>
            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Please Enter Your Name">
    </div>
    <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"  placeholder="Please Enter Your Email"  autocomplete="off">
    </div>
    <div class="form-group">
            <label class="form-label">Mobile</label>
            <input type="mobile" name="mobile" class="form-control" autocomplete="off" placeholder="Please Enter Your Mobile Number">
    </div>
    <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Please Enter Your Password" autocomplete="off">
    </div>
  <button type="submit" name="submit" class="btn btn-primary my-3">Submit</button>
</form>
    </div>
   
  </body>
</html>

<?php

session_start();
include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="insert into crud (name,email,mobile,password)
    values('$name','$email','$mobile','$password')";

    $result=mysqli_query($con, $sql);

    if($result){

      $_SESSION['status']="Data Inserted Successfully";
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>


