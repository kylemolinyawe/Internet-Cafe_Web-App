<!DOCTYPE html>
<!-- TODO: fix navbar not filling all available height -->
<html style="min-height: 100%; height: 100%">
    <head>
        <title>View User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php
        $currentPage = 'details';
        
        $conn = new mysqli("localhost:3310", "root", "dragonorange22", "internet_cafe");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $table_schema = "internet_cafe";
        ?>  
    </head>
    
    <body style="min-height: 100%">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
                <!-- left section nav bar column -->
                <?php include 'side-nav.php';?>
                
                <!-- right section column -->
                <div class="col-10 m-0 p-0 h-100">
                    
                    <!-- top bar -->
                    <?php include 'top-nav.php';?>
                    
                    <!-- content section -->
                    <div class="container-fluid p-3">
                        <h3 class="p-0 mb-0">View Record</h3>
                        <label class="p-0 m-0 mb-3 pt-1"><?php echo date("d F Y") ?></label>
                        
             
                            <!--view section -->
                            <div class="container-fluid p-3 mb-4 border rounded-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Field Name</th>
                                                <th>Value</th>                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $table = $_GET['table'];
                                            $field = $_GET['field'];
                                            $id = $_GET['id'];     

                                            $sql = "SHOW COLUMNS from $table";
                                            $query = $conn->query($sql);

                                            $field_names = [];

                                            // get field names
                                            while($row = $query->fetch_array()){
                                                array_push($field_names, $row[0]);
                                            }


                                            $sql = "SELECT * FROM $table WHERE $field = $id";                                           
                                            $query = $conn -> query($sql);

                                            $i = 0;

                                            // generate table row elements using field names and their corresponding values
                                            while($row = mysqli_fetch_array($query, MYSQLI_NUM)){
                                                foreach($row as $column){
                                                    echo "<tr>";
                                                    echo "<th class='col-3'>" . $field_names[$i++] . "</th>";
                                                    echo "<td>" . $column . "</td>";                                                   
                                                    echo "</tr>";
                                                }                                          
                                            }
                                            

                                            ?>    
                                            
                                            <tr>
                                            
                                        </tbody>                                       
                                    </table>
                            </div>

                            <!-- modify section -->
                            <h3 class="p-0 m-0 mb-3">Modify</h3>
                            <div class="container-fluid p-3 mb-4 border rounded-3">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Field Name</th>
                                            <th>Modified Value</th>      
                                            <th>Original Value</th>     
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- form inputs -->
                                            
                                            <?php 
                                            
                                            $sql = "SELECT * FROM $table WHERE $field = $id";                                           
                                            $query = $conn -> query($sql);
                                            
                                            $i = 0;
                                            $once = true;
                                            
                                            // each created text input has a name corresponding to their field name
                                            while($row = mysqli_fetch_array($query, MYSQLI_NUM)){
                                                foreach($row as $column){
                                                    if(str_contains($field_names[$i], "date_added")){
                                                        $i++;
                                                        continue;
                                                    }
                                                    
                                                    if($i == 0){
                                                        $i++;
                                                        continue;
                                                    } if(str_contains($field_names[$i], "date_added")){
                                                        $i++;
                                                        continue;
                                                    }
                                                    
                                                    
                                                    echo "<tr>";
                                                    echo "<th class='col-3'>" . $field_names[$i] . "</th>";
                                                    echo "<td class='col-4'><input type=text name=$field_names[$i]></td>";
                                                    echo "<td>" . $column . "</td>";
                                                    echo "</tr>";
                                                    
                                                    $i++;
                                                }                                          
                                            }

                                            ?>
                                                                                                          
                                    </tbody>
                                    </form>
                                </table>
                                    <div class="container-fluid p-0">
                                        <button type="submit" class="btn btn-primary m-0 mt-3">Modify</button>
                                        <?php
                                        echo "<a href='delete.php?table=$table&field=$field&id=$id' class='btn btn-danger m-0 mt-3 text-lg-end'>";
                                        ?>
                                            Delete
                                        </a>
                                    </div>
                                </form>
                            </div>
                            
                            <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {   
                                    
                                    $once = true;
                                    
                                    foreach($field_names as $field_name){
                                        if(str_contains($field_name, "date_added")){
                                            $i++;
                                            continue;
                                        }

                                        if($once){
                                            $once = false;
                                            continue;
                                        } 
                                        $value = $_POST[$field_name];
                                        
                                        // check if each field name in _POST has a value
                                        if(!empty($_POST[$field_name])){
                                            echo $field_name . " is set to " . $value;
                                            
                                            $sql = "UPDATE $table SET $field_name = '$_POST[$field_name]' WHERE $field = $id";
                                            echo "<meta http-equiv='refresh' content='0'>";
                                            
                                            if($conn -> query ($sql)){
                                                echo "success!";
                                            } else{
                                                echo "failed!";
                                            }
                                            
                                            
                                            echo "<br>";
                                        } else{
                                            echo $field_name .  " has no value.";
                                            echo "<br>";
                                        }
                                    }
                                   
                                }
                            ?>
                      
                    </div>   
                </div>
            </div>
        </div>
        
    </body>
</html>
