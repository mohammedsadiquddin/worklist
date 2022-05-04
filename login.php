<?php
 $login=false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){  
 include 'dbconnect.php';
 $username=$_POST["username"];
 $password=$_POST["password"];

 $sql="select * FROM userinformation where username='$username'";
 $result=mysqli_query($conn,$sql);
 $num=mysqli_num_rows($result);
 if($num==1){
   while($row=mysqli_fetch_assoc($result)){
     if(password_verify($password,$row['password'])){
      $login=true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;
      header("location: index.php");
     }
     else{
      echo '<div class="alert alert-danger" role="alert">
      The password that you have entered is incorrect!
    </div>'; 
     }
   }
 }
 else if(empty($username) || empty($password)){
//   echo '<div class="alert alert-danger" role="alert">
//   you have to fill all the details!
// </div>'; 
 }
 else{
  echo '<div class="alert alert-danger" role="alert">
  kindly signup before log in!
  </div>';
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
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
  </head>
  <body>
  <?php
  if($login){
    echo '<div class="alert alert-success" role="alert">
    you are logged in!
  </div>'; 
  }
  ?>
  <form action="login.php" method="POST">
   <div class="container">
    <h1>Log in to open WorkList</h1>
    <p>does not have an account yet? <a href="signup.php">signup</a></p>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" Required style="width:50%">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" Required  placeholder="password" style="width:50%">
  </div>
  <button type="submit" class="btn btn-primary">Log in</button>
</div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>