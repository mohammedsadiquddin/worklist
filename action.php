<?php
if($delete){
    echo "<div class='alert alert-success' style='margin-bottom:0'>
    <strong>Success!</strong>your record has been deleted successfully.
    </div>";
  }

  else if($insert){
    echo "<div class='alert alert-success' style='margin-bottom:0'>
    <strong>Success!</strong>your record has been inserted successfully.
    </div>";
  }

  else if($update){
    echo "<div class='alert alert-success' style='margin-bottom:0'>
    <strong>Success!</strong>your record has been updated successfully.
    </div>";
  }
?>