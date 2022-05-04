<?php
$sql="SELECT * FROM `todolist`.`todolist`";
    $result=mysqli_query($con,$sql);
    $sno=0;
    while($row=mysqli_fetch_assoc($result)){
      $sno+=1;
      echo "<tr>
      <th scope='row'>".$sno."</th>
      <td>".$row['title']."</td>
      <td style='padding:8px 5px;'>".$row['description']."</td>
      <td> <button class='edit' type='submit' id=".$row['sno']." style='background-color:blue;border: 2px solid blue;border-radius: 10px;color:white;'>edit</button> <button class='delete' id=d".$row['sno']." style='background-color:red;border: 2px solid red;
      border-radius: 10px;color:white';>Delete</button>
      </td>
    </tr>";
    }
    ?>