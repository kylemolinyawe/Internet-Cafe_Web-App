<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>Manage Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <?php
        $currentPage = 'users-manage';
        
        $conn = new mysqli("localhost:3310", "root", "dragonorange22", "internet_cafe");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $table_schema = "internet_cafe";

        ?>  
        <style>
            .clickable-row{
                cursor: pointer;
            }
            .clickable-row:hover{
                background-color: gainsboro;
            }
        </style>
    </head>
    
    <body style="margin: 0; height: 100%; max-height: 100%">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
                <!-- left section nav bar column -->
                <?php include '../side-nav.php';?>
                
                <!-- right section column -->
                <div class="col-10 m-0 p-0 h-100">
                    
                    <!-- top bar -->
                    <?php include '../top-nav.php';?>
                    
                    <!-- content section -->
                    <div class="container-fluid p-3 m-0">
                        <h3 class="p-0 m-0 mb-0">Manage Users</h3>
                        <label class="p-0 m-0 mt-2 mb-3">November 29, 2022</label>

                            <div class="container-fluid p-3 m-0 border rounded-3">
                                <table class="table">

                                    <!-- table headers -->
                                    <thead>
                                        <tr>
                                            <th scope="col">User Name</th>                                    
                                            <th scope="col">Desk Location</th>
                                            <th scope="col">Bill Amount</th>
                                            <th scope="col">Bill Status</th>
                                            <th scope="col">Time In</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Time Out</th>               
                                        </tr>
                                    </thead>

                                    <!-- display current users in cafe -->
                                    <tbody>
                                            <?php
                                                $sql = "SELECT * FROM timeslot";
                                                $query = $conn -> query($sql);



                                                while($array = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                                    $ts_id;
                                                    $user_id;
                                                    $desk_location;
                                                    $bill_id;
                                                    
                                                    foreach($array as $key => $value){
                                                        switch($key){
                                                            case "ts_id":
                                                                $ts_id = $value;
                                                            case "user_id":
                                                                $user_id = $value;
                                                            case "desk_location":
                                                                $desk_location = $value;
                                                            case "bill_id":
                                                                $bill_id = $value;
                                                        }
                                                    }

                                                    echo "<tr class='clickable-row' data-href=details.php?user=$user_id&desk=$desk_location&bill=$bill_id&ts=$ts_id>";

                                                    foreach($array as $key => $value){                                                

                                                        switch($key){
                                                            case "user_id":

                                                                $sql = "select user_name from user where user_id = $value";
                                                                $query2 = $conn -> query($sql); 
                                                                $row = mysqli_fetch_array($query2, MYSQLI_NUM);
                                                                echo "<td>" . $row[0] . "</td>";

                                                                break;

                                                            case "desk_location":                                                    
                                                                echo "<td>" . $value . "</td>"; 
                                                                break;

                                                            case "bill_id":

                                                                $sql = "select bill_amount from bill where bill_id = $value";
                                                                $query2 = $conn -> query($sql);
                                                                $row = mysqli_fetch_array($query2, MYSQLI_NUM);
                                                                echo "<td>" . $row[0] . "</td>";

                                                                $sql = "select bill_status from bill where bill_id = $value";
                                                                $query2 = $conn -> query($sql);
                                                                $row = mysqli_fetch_array($query2, MYSQLI_NUM);
                                                                if($row[0] == 0){
                                                                    echo "<td>" . "Pending" . "</td>";
                                                                } else{
                                                                    echo "<td>" . "Paid" . "</td>";
                                                                }

                                                                break;

                                                            case "ts_time_in":
                                                                echo "<td>" . $value . "</td>"; 
                                                                break;

                                                            case "ts_duration":
                                                                echo "<td>" . $value . "</td>"; 
                                                                break;

                                                            case "ts_time_out":
                                                                echo "<td>" . $value . "</td>"; 
                                                                break;

                                                        }

                                                    }
                                                    echo "</tr>";
                                                }

                                            ?>
                                        
                                    <script>
                                        jQuery(document).ready(function($) {
                                            $(".clickable-row").click(function() {
                                                window.location = $(this).data("href");
                                            });
                                        });
                                    </script>

                                    </tbody>

                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
