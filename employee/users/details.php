<!DOCTYPE html>
<!-- TODO: fix navbar not filling all available height -->
<html style="min-height: 100%; height: 100%">
    <head>
        <title>View User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php
        $currentPage = 'users-details';
        $currentCategory = 'router';
        
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
    
    <body style="margin: 0; min-height: 100%;">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
                <!-- left section nav bar column -->
                <?php include '../side-nav.php';?>
                
                <!-- right section column -->
                <div class="col-10 m-0 p-0 h-100">
                    
                    <!-- top bar -->
                    <?php include '../top-nav.php';?>
                    
                    <!-- content section -->
                    <h3 class="p-0 m-3 mb-0">View Record</h3>
                    <label class="p-0 m-3 mt-2">November 29, 2022</label>
                    <div class="container-fluid">
                        <div class="container-fluid p-3 border rounded-3 mb-5">
                            <h3 class="mb-3">Timeslot</h3>
                            <table class="table table-striped">

                                <!-- first row in the table -->
                                <!-- use syntax for adding new rows -->
                                <!-- TODO: table contents reflects number of users in database users table -->
                                <tbody>
                                    <?php
                                    
                                    
                                    $query = $conn -> query("SELECT * FROM timeslot WHERE ts_id = $_GET[ts]");
                                    
                                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                        

                                        foreach($row as $key => $value){
                                            $key = str_replace('_', ' ', $key);
                                            $key = str_replace('Ts', 'Timeslot', $key);
                                            
                                            echo "<tr>";
                                            echo "<th scope=row class=col-3>" . ucwords($key) . "</th>";
                                            echo "<td>" . $value . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    
                                    ?>
                                   
                                </tbody>                                        
                            </table>
                            <h3 class="mb-3">User</h3>
                            <table class="table table-striped">

                                <!-- first row in the table -->
                                <!-- use syntax for adding new rows -->
                                <!-- TODO: table contents reflects number of users in database users table -->
                                <tbody>
                                    <?php
                                    
                                    
                                    $query = $conn -> query("SELECT * FROM user WHERE user_id = $_GET[user]");
                                    
                                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                        

                                        foreach($row as $key => $value){
                                            $key = str_replace('_', ' ', $key);
                                            
                                            echo "<tr>";
                                            echo "<th scope=row class=col-3>" . ucwords($key) . "</th>";
                                            echo "<td>" . $value . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    
                                    ?>
                                   
                                </tbody>                                        
                            </table>
                            <h3 class="mb-3">Bill</h3>
                            <table class="table table-striped">

                                <!-- first row in the table -->
                                <!-- use syntax for adding new rows -->
                                <!-- TODO: table contents reflects number of users in database users table -->
                                <tbody>
                                    <?php
                                    
                                    
                                    $query = $conn -> query("SELECT * FROM bill WHERE bill_id = $_GET[bill]");
                                    
                                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                        

                                        foreach($row as $key => $value){
                                            $key = str_replace('_', ' ', $key);
                                            
                                            if(str_contains($key, "bill status")){
                                                if($value == 0){
                                                    echo "<tr>";
                                                    echo "<th scope=row class=col-3>" . ucwords($key) . "</th>";
                                                    echo "<td>" . "Pending" . "</td>";
                                                    echo "</tr>";
                                                } else {
                                                    echo "<tr>";
                                                    echo "<th scope=row class=col-3>" . ucwords($key) . "</th>";
                                                    echo "<td>" . "Paid" . "</td>";
                                                    echo "</tr>";
                                                }
                                                continue;
                                            }
                                            
                                            echo "<tr>";
                                            echo "<th scope=row class=col-3>" . ucwords($key) . "</th>";
                                            echo "<td>" . $value . "</td>";
                                            echo "</tr>";
                                        }
                                    }                                   
                                    ?>
                                    
                                </tbody>                            
                            </table>  
                            <div class="container-fluid p-0 m-0">
                                <?php
                                    echo "<a href='paid.php?user=$_GET[user]&desk=$_GET[desk]&bill=$_GET[bill]&ts=$_GET[ts]' class='btn btn-primary m-0 mt-0 text-lg-end'>";
                                 ?> 
                                    Mark as Paid
                                </a>
                                <?php
                                    echo "<a href='delete.php?user=$_GET[user]&desk=$_GET[desk]&bill=$_GET[bill]&ts=$_GET[ts]' class='btn btn-danger m-0'>";
                                ?>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </body>
</html>
