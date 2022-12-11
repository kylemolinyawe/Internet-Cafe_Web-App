<?php session_start();
if(!isset($_SESSION['sysid']))
{
    header("location: https://localhost/Internet-Cafe_Web-App/user/login.php");
    die();
}
    ?>
<!DOCTYPE html>
<html style="height: 100%;">
    <head>
        <title>sysadmin-add</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php
        $currentPage = 'add';
        
        $conn = new mysqli("localhost:3310", "root", "dragonorange22", "internet_cafe");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $table_schema = "internet_cafe";
        
        // if visiting this page for the first time selected button defaults to bill
        if(empty($_GET['category'])){
            $table_name = 'bill';
        } else{
            $table_name = $_GET['category'];
        }
        ?>  
        
    </head>
    
    <body style="min-height: 100%;">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
               <!-- left section nav bar column -->
                <?php include 'side-nav.php'; ?>
                
                <!-- right section column -->
                <div class="col-10 m-0 p-0 h-100">
                    
                    <!-- top bar -->
                    <?php include 'top-nav.php';?>
                    
                    <!-- content section -->
                    <div class="container-fluid p-3">
                        <h3>Add Record</h3>
                        <label class="mb-3"><?php echo date("d F Y") ?></label>
                        
                        <?php
                        if (!empty($_POST)){
                            
                        }                           
                        ?>
                        
                        <!-- button navigation -->
                        <p class="mb-1">Select a table to add to:</p>                        
                        <div class="container-fluid border rounded-3 mb-3 p-0">
                            <ul class="nav nav-pills">
                                <?php // code for generating categories based on the tables of the database
                                    $query = $conn -> query("show tables");
                                    
                                    // get which link is active
                                    // and print the categories as <li> items of the ul
                                    while($row = $query ->fetch_array()){                                                                              
                                        $active;                                      
                                        if($table_name == $row[0]){
                                            $active = 'active link-light';
                                        } else{
                                            $active = 'link-dark';
                                        }
                                                                           
                                        echo "<li class=nav-item>";
                                            echo "<a href='add.php?category=$row[0]' class='nav-link $active'>" . ($row[0]) . "</a>";
                                        echo "</li>";
                                    }
                                ?>
                            </ul>                           
                        </div>
                        
                            <!-- form inputs -->
                            <p class="mb-1">Fields:</p>   
                            <form class="border rounded-2" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">                                                              
                                <?php // generate form fields based on the attributes of a table
                                $query = $conn -> query("show columns from $table_name");
                                $firstId = false;
                                while($row = $query->fetch_array()){
                                    
                                    $currentDate = date("Y-m-d");
                                    
                                    // case for date, disables the input and has the value set as the date today
                                    if(str_contains($row[0], 'date_added')){
                                        echo "<div class='m-0 p-3'>";
                                            echo "<label class='mb-2' for='user-email'>" . $row[0] . "</label>";
                                            echo "<input type='text' class='form-control' value='$currentDate' disabled>";
                                            echo "<input type='hidden' class='form-control' value='$currentDate' id='$row[0]' name='$row[0]'>";
                                        echo "</div>";
                                                                               
                                        continue;
                                    } 
                                    
                                    // case for id, since they are auto-incremented in the db we instead
                                    // disable input and display the next id that will be auto-incremented  
                                    elseif(str_contains($row[0], 'id') && !($firstId)){
                                        
                                        $sql= $conn -> query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$table_schema' AND TABLE_NAME = '$table_name'");
                                        $result = $sql -> fetch_assoc();
                                        $nextIncrement = $result['AUTO_INCREMENT'];
                                        
                                        // auto-increment returns nothing if there are no rows in a table
                                        if(empty($nextIncrement)){
                                            echo "<div class='m-0 p-3'>";
                                            echo "<label class='mb-2' for='user-email'>" . $row[0] . "</label>";
                                            echo "<input type='text' class='form-control' value='1' disabled>";
                                            echo "</div>";
                                        } else{
                                            echo "<div class='m-0 p-3'>";
                                            echo "<label class='mb-2' for='user-email'>" . $row[0] . "</label>";
                                            echo "<input type='text' class='form-control' value='$nextIncrement' disabled>";
                                            echo "</div>";
                                        }                                        
                                        
                                        $firstId = true;
                                        
                                        continue;
                                    }
                                    
                                    // create form fields
                                    echo "<div class='m-0 p-3'>";
                                        echo "<label class='mb-2' for='user-email'>" . $row[0] . "</label>";
                                        echo "<input type='text' class='form-control' id='$row[0]' name='$row[0]'>";
                                    echo "</div>";
                                }                               
                                ?>        
                                <input type="hidden" name="category" value=$table_name>
                                <button type="submit" class="btn btn-primary m-3 align-content-lg-end">Submit</button>                               
                            </form>                                                                                  
                    </div>
                    
                        <?php // process form inputs to update database row
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {   
                                                               
                                switch($table_name){
                                    
                                    case "bill":

                                        $bill_amount = $_POST['bill_amount'];
                                        $bill_status = $_POST['bill_status'];                                      
                                        $bill_date_added = $_POST['bill_date_added'];
                                        $user_id = $_POST['user_id'];

                                        $sql = "INSERT INTO bill (bill_amount, bill_status, bill_date_added, user_id) "
                                                . "VALUES ('$bill_amount', '$bill_status', '$bill_date_added', '$user_id')";

                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }

                                        break;
                                        
                                    case "cafe_computer":

                                        $c_cpu = $_POST['c_cpu'];
                                        $c_monitor = $_POST['c_monitor'];
                                        $c_keyboard = $_POST['c_keyboard'];
                                        $c_mouse = $_POST['c_mouse'];
                                        $c_surge_protector = $_POST['c_surge_protector'];
                                        $c_surge_battery_type = $_POST['c_surge_battery_type'];
                                        $c_system = $_POST['c_system'];
                                        $c_date_added = $_POST['c_date_added'];
                                        $router_id = $_POST['router_id'];            
                                        
                                        $sql = "INSERT INTO cafe_computer (c_cpu, c_monitor, c_keyboard, c_mouse, c_surge_protector, c_surge_battery_type, c_system, c_date_added, router_id) "
                                                . "VALUES ('$c_cpu', '$c_monitor', '$c_keyboard', '$c_mouse', '$c_surge_protector', '$c_surge_battery_type', '$c_system', '$c_date_added', '$router_id')";
                                        
                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }                                        
                                                                                
                                        break;

                                    case "employee":
                                        
                                        $emp_name = $_POST['emp_name'];
                                        $emp_email = $_POST['emp_email'];
                                        $emp_phone = $_POST['emp_phone'];
                                        $emp_hire_date = $_POST['emp_hire_date'];
                                        $job_id = $_POST['job_id'];
                                        $w_comp_id = $_POST['w_comp_id'];
                                        
                                        $sql = "INSERT INTO employee (emp_name, emp_email, emp_phone, emp_hire_date, job_id, w_comp_id) "
                                                . "VALUES('$emp_name', '$emp_email', '$emp_phone', '$emp_hire_date', '$job_id', '$w_comp_id')";
                                            
                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }                                        
                                        
                                        
                                        break;
                                        
                                    case "internet_router":
                                        
                                        $router_brand = $_POST['router_brand'];
                                        $router_serial_number = $_POST['router_serial_number'];
                                        $online_status = $_POST['online_status'];
                                        $router_date_added = $_POST['router_date_added'];
                                        
                                        $sql = "INSERT INTO internet_router (router_brand, router_serial_number, online_status, router_date_added) "
                                                . "VALUES('$router_brand', '$router_serial_number', '$online_status', '$router_date_added')";
                                        
                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }         
                                        break;
                                        
                                        
                                    case "membership":
                                        
                                        $mm_name = $_POST['mm_name'];
                                        $mm_status = $_POST['mm_status'];
                                        
                                        $sql = "INSERT INTO membership (mm_name, mm_status) VALUES ('$mm_name', '$mm_status')";
                                        
                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }         
                                        break;
                                    
                                    /*
                                    case "reservation":
                                        
                                        $res_time_in = $_POST['res_time_in'];
                                        $res_time_out = $_POST['res_time_out'];
                                        $res_date = $_POST['res_date'];
                                        $res_date_added = $_POST['res_date_added'];
                                        
                                        break;
                                    * 
                                    */
                                        
                                        
                                    case "timeslot":
                                        
                                        $ts_time_in = $_POST['ts_time_in'];
                                        $ts_duration = $_POST['ts_duration'];
                                        $ts_time_out = $_POST['ts_time_out'];
                                        $ts_date_added = $_POST['ts_date_added'];
                                        $user_id = $_POST['user_id'];
                                        $c_comp_id = $_POST['c_comp_id'];     
                                        
                                        $sql = "INSERT INTO timeslot (ts_time_in, ts_duration, ts_time_out, ts_date_added, user_id, c_comp_id)"
                                                . "VALUES ('$ts_time_in', '$ts_duration', '$ts_time_out', '$ts_date_added', '$user_id', '$c_comp_id')";
                                                    
                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }  
                                        
                                        break;
                                    
                                    case "user":
                                        
                                        $user_name = $_POST['user_name'];
                                        $user_email = $_POST['user_email'];
                                        $user_phone = $_POST['user_phone'];
                                        $user_date_added = $_POST['user_date_added'];
                                        $mm_id = $_POST['mm_id'];
                                        
                                        $sql = "INSERT INTO user (user_name, user_email, user_phone, user_date_added, mm_id)"
                                                . "VALUES ('$user_name', '$user_email', '$user_phone', '$user_date_added', '$mm_id')";
                                        
                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }  
                                        
                                        break;
                                        
                                    case "work_computer":
                                        
                                        $w_cpu = $_POST['w_cpu'];
                                        $w_monitor = $_POST['w_monitor'];
                                        $w_keyboard = $_POST['w_keyboard'];
                                        $w_mouse = $_POST['w_mouse'];
                                        $w_surge_protector = $_POST['w_surge_protector'];
                                        $w_surge_battery_type = $_POST['w_surge_battery_type'];
                                        $w_system = $_POST['w_system'];
                                        $w_date_added = $_POST['w_date_added'];
                                        $router_id = $_POST['router_id'];
                                        
                                         
                                        $sql = "INSERT INTO work_computer (w_cpu, w_monitor, w_keyboard, w_mouse, w_surge_protector, w_surge_battery_type, w_system, w_date_added, router_id)"
                                                . "VALUES ('$w_cpu', '$w_monitor', '$w_keyboard', '$w_mouse', '$w_surge_protector', '$w_surge_battery_type', '$w_system', '$w_date_added', '$router_id')";
                                        
                                        
                                        if ($conn->query($sql) === TRUE) {

                                            echo "New record created successfully";

                                        } else {

                                            echo "Error: " . $sql . "<br>" . $conn->error;

                                        }
                                        
                                        
                                        break;
                                }
                            }
                  
                        ?>
                    
                </div>
            </div>
        </div>
    </body>
</html>
