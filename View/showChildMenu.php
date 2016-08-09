<?php
// Start the session
  require "./template/template1.php";
  require "./template/navigation.php";
  require "./template/sidenav.php";?>
?>

<html>
  <body>
  <div class="main-body">
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_data";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $dayTimes = ["morning", "lunch", "afternoon", "dinner", "extraDinner"];
    $weekDays = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];

    $menuIds = [];
	$schoolId = isset($_GET['schoolId'])? $_GET['schoolId']:1;
    foreach ($weekDays as $weekDay) {
      array_push($menuIds,getMenuId($schoolId, $weekDay, $conn));
    }

    echo "<table class='table table-bordered'>
      <thead>
        <tr>
          <th class='col-sm-1'></th>
          <th class='col-sm-1'>Monday</th>
          <th class='col-sm-1'>Tuesday</th>
          <th class='col-sm-1'>Wednesday</th>
          <th class='col-sm-1'>Thursday</th>
          <th class='col-sm-1'>Friday</th>
          <th class='col-sm-1'>Saturday</th>
          <th class='col-sm-1'>Sunday</th>
        </tr>
      </thead> <tbody>";

    $pos = 0;

    foreach ($dayTimes as  $dayTime) {
      echo "<tr><td>".$dayTime."</td>";
      foreach ($weekDays as $weekDay) {
        $menuId = $menuIds[$pos];
        
        if($pos == 6) $pos = 0;
        else $pos++;

        $sql = "SELECT * FROM foodlist WHERE menuId = $menuId and dayTime = '$dayTime'";
        $re = $conn->query($sql);

        echo "<td>";

        while ($food = $re -> fetch_assoc()) {
          echo $food['foodName']."<br/>"; 
        }

        echo "</td>";
      }
      echo "</tr>";
    }

    echo "</tbody></table>";
    
    $conn->close();

    function getMenuId($schoolId, $weekDay, $conn) {
      //tim menuid
      $sql = "SELECT * FROM schoolmenu WHERE schoolId = $schoolId and weekDay = '$weekDay'";       
      $result = $conn->query($sql);
      $school = $result -> fetch_assoc();
      $menuId = $school['menuId'];

      return $menuId;
    }
    ?>
	</div>
  </body>
</html>