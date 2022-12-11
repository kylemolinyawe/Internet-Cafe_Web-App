<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php
        $currentPage = 'users-add';
        
        $conn = new mysqli("localhost:3310", "root", "dragonorange22", "internet_cafe");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $table_schema = "internet_cafe";

        ?>  
    </head>
    
    <body style="margin: 0; min-height: 100%">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
               <!-- left section nav bar column -->
                <?php include '../side-nav.php'; ?>
                
                <!-- right section column -->
                <div class="col-10 m-0 p-0 h-100">
                    
                    <!-- top bar -->
                    <?php include '../top-nav.php';?>
                    
                    <!-- content section -->
                    <div class='container-fluid p-3'>
                        <h3 class="p-0 m-0 mb-0">Add User</h3>
                        <label class="p-0 m-0 mt-2 mb-3">November 29, 2022</label>

                        <!-- input form container -->
                        <div class="container-fluid p-0 m-0">

                            <!-- form inputs -->
                            <!-- TODO: fix alignment to match with h3 element -->
                            <form class="border rounded-2" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-name">User Name</label>
                                    <input type="text" class="form-control" name="user_name" placeholder="Enter username">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Desk Location</label>
                                    <input type="text" class="form-control" name="desk_location" placeholder="">
                                </div>  
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-name">Time In</label>
                                    <input type="text" class="form-control" name="ts_time_in" placeholder="ex. 10:32">
                                </div>
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-mobile-number">Duration</label>
                                    <input type="text" class="form-control" name="ts_duration" placeholder="">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Time Out</label>
                                    <input type="text" class="form-control" name="ts_time_out" placeholder="ex. 19:32">
                                </div>   
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Bill</label>
                                    <input type="text" class="form-control" name="bill_amount" placeholder="ex. 19:32">
                                </div>  
                                <button type="submit" class="btn btn-primary m-3 align-content-lg-end">Submit</button>                               
                            </form>  
                            
                        </div>
                        
                        <?php 
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {   
                            
                            $currentDate = date("Y-m-d");
                            
                            $user_name = $_POST['user_name'];
                                                    
                            $desk_location = $_POST['desk_location'];
                            
                            $ts_time_in = $_POST['ts_time_in'];
                            $ts_duration = $_POST['ts_duration'];
                            $ts_time_out = $_POST['ts_time_out'];
                            
                            $bill_amount = $_POST['bill_amount'];
                            
                            // bill
                            $sql = "insert into bill (bill_amount, bill_status, bill_date_added)"
                                    . "values ('$bill_amount', '0', '$currentDate')";
                            $query = $conn -> query($sql);
                            
                            // get recently inserted bill id
                            $sql = "select LAST_INSERT_ID()";
                            $bill_id = $conn -> insert_id;
                            
                            // username
                            $sql = "insert into user (user_name, user_date_added) "
                                    . "values ('$user_name', '$currentDate')";
                            $query = $conn -> query($sql);
                            $user_id = $conn -> insert_id;
                            
                            $sql = "insert into bill (user_id) values ('$user_id')";
                            
                            // timeslot 
                            $sql = "insert into timeslot (ts_time_in, ts_duration, ts_time_out, user_id, desk_location, ts_date_added, bill_id)"
                                    . "values ('$ts_time_in', '$ts_duration', '$ts_time_out', '$user_id', '$desk_location', '$currentDate', '$bill_id')";
                            $query = $conn -> query($sql);
                            
                            
                            
                            echo "success!";
                        }
                        ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
