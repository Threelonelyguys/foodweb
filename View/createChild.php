<?php
// Start the session
  require "./template/template1.php";
  require "./template/navigation.php";
  require "./template/sidenav.php";?>
?>

<html>
  <body>
  <?php
    // define variables and set to empty values
    $childName = $childSchoolName = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // if (empty($_POST["parentName"])) {
      //   $parentNameErr = "parentName is required";
      // } else {
      //   $parentName = test_input($_POST["parentName"]);
      // }

    if (empty($_POST["childName"])) {
      $childNameErr = "childName is required";
    } else {
      $childName = test_input($_POST["childName"]);
    }

    if (empty($_POST["childSchoolName"])) {
      $childSchoolNameErr = "childSchoolName is required";
    } else {
      $childSchoolName = test_input($_POST["childSchoolName"]);
    }

    // if (empty($_POST["class"])) {
    //   $classErr = "class is required";
    // } else {
    //   $class = test_input($_POST["class"]);
    // }

    if(!empty($_POST["childSchoolName"]) && !empty($_POST["childName"])) {
  
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
        
        //tim id cua truong
        $sql = "SELECT * FROM school WHERE schoolName = '$childSchoolName'";
        $result = $conn->query($sql);
        $school = $result -> fetch_assoc();
        $schoolId = $school['schoolId'];

        //them child moi
            $sql = "INSERT INTO children (childName, parentId, schoolId)
            VALUES ('$childName', '$parentId', '$schoolId')";

        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
                
        
        $conn->close();
      } 
    }

        function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
        }

        $childName = $childSchoolName = "";
    ?> 
    
    <div class="main-body">
      <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
		<div class="form-body">
		<div class="form-group">
			<div class="col-sm-offset-4">
			<h1>Add child</h1>
			</div><br>
		</div>
        <div class="form-group">
          <label class="control-label col-sm-2 col-sm-offset-2" for="childName">Child Name:</label>
          <div class="col-sm-4"> 
            <input type="text" class="form-control" name="childName" id="childName" placeholder="Enter child name"><br><br>
          </div>
          <span class="text-danger"> <?php if (isset($childNameErr)) echo "*".$childNameErr;?></span><br>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2 col-sm-offset-2" for="childSchoolName">Child Schoolname:</label>
          <div class="col-sm-4"> 
            <input type="text" class="form-control" name="childSchoolName" id="childSchoolName" placeholder="Enter child's schoolname"><br><br>
          </div>
          <span class="text-danger"> <?php if (isset($childSchoolNameErr)) echo "*".$childSchoolNameErr;?></span><br>
        </div>
        <div class="form-group"> 
          <div class="col-sm-offset-4 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
		</div>
      </form>
    </div>  
  </body>
</html>