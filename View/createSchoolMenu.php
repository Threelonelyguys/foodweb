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
    // define variables and set to empty values
    $schoolNameErr = "";
    $schoolName = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // if (empty($_POST["class"])) {
      //   $classErr = "class is required";
      // } else {
      //   $class = test_input($_POST["class"]);
      // }

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

        $userId = $_SESSION['userid'];
        
        //tim id cua truong
        $sql = "SELECT * FROM user WHERE userid = $userId";
        $result = $conn->query($sql);
        $user = $result -> fetch_assoc();
        $schoolId = $user['schoolId'];


        $dayTimes = ["morning", "lunch", "afternoon", "dinner", "extraDinner"];
        $weekDays = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];

        foreach ($weekDays as $weekDay) {
          //tim menuId 
          $sql = "SELECT * FROM schoolmenu WHERE schoolid = $schoolId and weekDay = '$weekDay'";
          $result = $conn->query($sql);
          $menu = $result -> fetch_assoc();
          $menuId = $menu['menuId'];

          foreach ($dayTimes as $dayTime) {
            insert($weekDay, $dayTime, $menuId, $conn);
          }
        }
    
         
        $conn->close();
      
    }
        //chuan hoa xau
        function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
        }

        function insert($weekDay, $dayTime, $menuId, $conn) {
          //xoa cac du lieu cu(khi sua menu mon an)
          $sql = "DELETE FROM foodlist WHERE menuid = $menuId and dayTime = '$dayTime";
          $conn->query($sql);

          //them cac mon an moi
          foreach (explode(";", $_POST[$dayTime."-".$weekDay]) as $line) {
            //tim id cua mon an do
            $data = test_input($line);

            if($data != "") {
              $sql = "SELECT * FROM foods WHERE foodename = '$data'";
            
              $re = $conn->query($sql);
              $food = $re -> fetch_assoc();
              $foodid = $food['foodid'];

              //them mon an
              $sql = "INSERT INTO foodlist (foodId, foodName, menuId, dayTime)
              VALUES ('$foodid', '$line', $menuId, '$dayTime')";

              if ($conn->query($sql) === TRUE) {
              } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }
          }   
        }

        $schoolName = "";
    ?> 

    <style type="text/css">
      th, tr {
        padding : 0;
      }
    </style>
      <h1>Add menu for school</h1>
      <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
        <div class="form-group">
          <label class="control-label col-sm-2" for="schoolMenu">School Menu:</label>
          <div>
            <table class="table table-bordered">
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
              </thead> 

              <tbody>
                <tr>
                  <th>Morning</th>
                  <th><input type="text" name ="morning-monday"></input></th>
                  <th><input type="text" name ="morning-tuesday"></input></th>
                  <th><input type="text" name ="morning-wednesday"></input></th>
                  <th><input type="text" name ="morning-thursday"></input></th>
                  <th><input type="text" name ="morning-friday"></input></th>
                  <th><input type="text" name ="morning-saturday"></input></th>
                  <th><input type="text" name ="morning-sunday"></input></th>
                </tr>

                <tr>
                  <th>Lunch</th>
                  <th><input type="text" name ="lunch-monday"></input></th>
                  <th><input type="text" name ="lunch-tuesday"></input></th>
                  <th><input type="text" name ="lunch-wednesday"></input></th>
                  <th><input type="text" name ="lunch-thursday"></input></th>
                  <th><input type="text" name ="lunch-friday"></input></th>
                  <th><input type="text" name ="lunch-saturday"></input></th>
                  <th><input type="text" name ="lunch-sunday"></input></th>
                </tr>

                <tr>
                  <th>Afternoon</th>
                  <th><input type="text" name ="afternoon-monday"></input></th>
                  <th><input type="text" name ="afternoon-tuesday"></input></th>
                  <th><input type="text" name ="afternoon-wednesday"></input></th>
                  <th><input type="text" name ="afternoon-thursday"></input></th>
                  <th><input type="text" name ="afternoon-friday"></input></th>
                  <th><input type="text" name ="afternoon-saturday"></input></th>
                  <th><input type="text" name ="afternoon-sunday"></input></th>
                </tr>

                <tr>
                  <th>Dinner</th>
                  <th><input type="text" name ="dinner-monday"></input></th>
                  <th><input type="text" name ="dinner-tuesday"></input></th>
                  <th><input type="text" name ="dinner-wednesday"></input></th>
                  <th><input type="text" name ="dinner-thursday"></input></th>
                  <th><input type="text" name ="dinner-friday"></input></th>
                  <th><input type="text" name ="dinner-saturday"></input></th>
                  <th><input type="text" name ="dinner-sunday"></input></th>
                </tr>

                <tr>
                  <th>Extra dinner</th>
                  <th><input type="text" name ="extraDinner-monday"></input></th>
                  <th><input type="text" name ="extraDinner-tuesday"></input></th>
                  <th><input type="text" name ="extraDinner-wednesday"></input></th>
                  <th><input type="text" name ="extraDinner-thursday"></input></th>
                  <th><input type="text" name ="extraDinner-friday"></input></th>
                  <th><input type="text" name ="extraDinner-saturday"></input></th>
                  <th><input type="text" name ="extraDinner-sunday"></input></th>
                </tr>
              </tbody>
            </table>
          </div>    
        </div>

        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
  </div>
  </body>
</html>