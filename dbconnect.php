<?php
$server="localhost";
$username="root";
$password="";
$dbname="userinformation";

$conn=mysqli_connect($server,$username,$password,$dbname);

if(!$conn){
    die("connecting to database failed due to ".mysqli_connect_error());
}
?>
