<?php

session_start();
$user=$_SESSION['username'];

$insert=false;
$update=false;
$delete=false;
$server="localhost";
$username="root";
$password="";
$dbname="todolist";

$con=mysqli_connect($server,$username,$password,$dbname);

if(!$con){
  die("connection failed due to ".mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno=$_GET['delete'];
  $sql="DELETE FROM `todolist`.`todolist` WHERE `sno`='$sno'";
  if($con->query($sql) == true){
    $delete = true;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['snoEdit'])){
    $sno=$_POST["snoEdit"];
    $title=$_POST["titleEdit"];
    $description=$_POST["descriptionEdit"];
    $sql="UPDATE `todolist`.`todolist` SET `description` = '$description',`title` = '$title' WHERE `todolist`.`sno` = '$sno';";
    if($con->query($sql) == true){
      $update = true;
    }
  }

  else if(empty($_POST['title']) || empty($_POST['description'])){
    echo "<div class='alert alert-danger' style='margin-bottom:0'>
    <strong></strong>you have to fill all the details.
    </div>";
  }

  else{
    $title=$_POST["title"];
    $description=$_POST["description"];
    $sql1="INSERT INTO `todolist`.`todolist` (`title`, `description`, `date`,`name`) VALUES ('$title', '$description', current_timestamp(),'$user');";
   if($con->query($sql1) == true){
    $insert = true; 
  }
  // $con->close();
}}
?>