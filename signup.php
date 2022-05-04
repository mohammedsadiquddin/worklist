<?php
 $insert=false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){  
 include 'dbconnect.php';
 $username=$_POST["username"];
 $password=$_POST["password"];
 $cpassword=$_POST["cpassword"];

 
 $existsql="SELECT * FROM `userinformation` WHERE username = '$username'";
 $result=mysqli_query($conn,$existsql);
 $numexistrows=mysqli_num_rows($result);
 if($numexistrows>0){
  echo '<div class="alert alert-danger" role="alert">
  username already exists!
  </div>';
 }

else if(empty($username) || empty($password) || empty($cpassword)){
//   echo '<div class="alert alert-danger" role="alert">
//   you have to fill all the details!
//  </div>'; 
 }

 else{
 if($password == $cpassword){
 $hash=password_hash($password,PASSWORD_DEFAULT);
 $sql="INSERT INTO `userinformation` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
 $result=mysqli_query($conn,$sql);
 if($result){
   $insert=true;
 }
 }
 else{
  echo '<div class="alert alert-danger" role="alert">
  passwords do not match!
</div>';
 }
}
 }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>
  <?php
  if($insert){
    echo '<div class="alert alert-success" role="alert">
    Account is created!
    <a href="login.php">click here to log in</a>
  </div>';
  exit();
  // echo '<a href="https://www.youtube.com/">click here</a>';
  }
  ?>
  <form action="signup.php" method="POST">
   <div class="container">
     <h1>Sign Up</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="username" aria-describedby="emailHelp" Required style="width:50%">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" Required placeholder="password" style="width:50%">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1" Required placeholder="confirm password" style="width:50%">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
</div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>