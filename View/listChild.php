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

    $parentId = $_SESSION['userid'];

    //tim tat ca cac con cua parent         
    $sql = "SELECT * FROM children WHERE parentId = '$parentId'";       
    $re = $conn->query($sql);

    echo "<table class='table table-bordered'>
      <thead>
        <tr>
          <th class='col-sm-5'>Name</th>
          <th class='col-sm-5'>School</th>
          <th class='col-sm-2'></th>
        </tr>
      </thead> <tbody>";

    while($child = $re -> fetch_assoc()) {
      echo "<tr><td>".$child["childName"]."</td>";

      $schoolId = $child["schoolId"];
      $sql = "SELECT * FROM school WHERE schoolId = '$schoolId'";
        $result = $conn->query($sql);
        $school = $result -> fetch_assoc();
        $schoolName = $school['schoolName'];

       echo "<td>".$schoolName."</td><td><span><form  method = 'post' action='showChildMenu.php?schoolId=$schoolId'><button class='btn btn-success'>show</button></form><br/></span></td>"; 
    }
    
    echo "</tbody></table>
    <span><form  method = 'post' action='./createChild.php'><button class='btn btn-success'><span class='glyphicon glyphicon-plus'></span>Add</button></form><br/></span>";     
        
    $conn->close();
    ?>
	</div>
  </body>
</html>