<?php include 'db.php';?>

<?php include 'del.php';?>

<?php include 'ins.php';?>

<?php include 'up.php';?>

<?php
// session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
  header("location: login.php");
  exit();
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <title>WorkList</title>
  </head>
  <body>
  <div class="modal" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="index.php" method="POST">
      <input type="text" name="snoEdit" id="snoEdit">
  <div class="mb-3 my-3">
  <label for="titleEdit" class="form-label">Title</label>
    <input name="titleEdit" type="text" class="form-control" id="titleEdit" aria-describedby="emailHelp" Required style="width:18vw">
    </div>
  <div class="mb-3">
    <h6>Description</h6>
  <label for="descriptionEdit"></label>
    <textarea name="descriptionEdit" id="descriptionEdit" cols="20" rows="5" Required style="width:25vw"></textarea>
  </div>
  </div>
      <div class="modal-footer" style="display:block;">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" style="background-color:red;">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin=true;
}
else{
  $loggedin=false;
}

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">WorkList</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>';
     if(!$loggedin){
       echo '
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">login</a>
        </li><li class="nav-item">
          <a class="nav-link active" aria-current="page" href="signup.php">signup</a>  
          ';}
     if($loggedin){
       echo '
        </li><li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">logout</a>
        </li>
      </ul>
      </div>
      </div>
      </nav>';}
      ?>
<div class="container" style="display:flex;justify-content:center;">
<form action="index.php" method="POST">
  <div class="mb-3 my-3">
  <h2 style="color:maroon">welcome <?php 
  echo $_SESSION['username']?> to WorkList</h2>
  <h2>Add a note</h2>
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" Required aria-describedby="emailHelp" style="width:25vw">
  </div>
  <div class="mb-3">
  <h6>Description</h6>
  <textarea name="description" id="descr" cols="20" rows="5" style="width:40vw" Required></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom:4vh">submit</button>
</form>
</div>
<!-- <?php
if(empty($_POST['title']) && empty($_POST['description'])){
  echo "<div class='alert alert-danger' style='margin-bottom:0'>
  <strong></strong>you have to fill all the details.
  </div>";
}
?> -->

<div class="container">
  <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php include 'fetching.php';?>
  </tbody>
</table>
</div>

<!--  Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
      } );
      </script>
<script src="action.js"></script>

</body>
</html>