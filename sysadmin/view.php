<?php session_start();
if(!isset($_SESSION['sysid']))
{
    header("location: https://localhost/Internet-Cafe_Web-App/user/login.php");
    die();
}
    ?>
<!DOCTYPE html>
<html class="h-100">
    <head>
        <title>View Tables</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <?php
        $currentPage = 'view';
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
        
        <style>
            .clickable-row{
                cursor: pointer;
            }
            .clickable-row:hover{
                background-color: gainsboro;
            }
        </style>
        
         
    </head>
    
    <body class="h-100">
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
                        <h3 class="p-0 mb-0">View Tables</h3>
                        <label class="p-0 m-0 mb-3"><?php echo date("d F Y") ?></label>

                        <!-- search bar -->
                        <form class="">
                            <div class="row g-3 align-items-center">
                                <div class="col-4 m- me-0">
                                    <input type="text" id="user-search" class="form-control" placeholder="Search for a record">
                                </div>

                                <!-- TODO: replace search button with an icon instead -->
                                <div class="col-auto m-3 ms-0">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <!-- button navigation for each table in the database -->
                        <div class="container-fluid border rounded-3 mb-3 mt-2 p-0">
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
                                            echo "<a href='view.php?category=$row[0]' class='nav-link $active'>" . ($row[0]) . "</a>";
                                        echo "</li>";
                                    }
                                ?>
                            </ul>                           
                        </div>

                        <!-- tables have categories of all tables in the database -->                  
                        <div class="container-fluid p-3 m-0 border rounded-3">
                            <table class="table">

                                <!-- table headers -->
                                <thead>
                                    <tr>
                                        <?php 
                                        $query = $conn->query("SHOW COLUMNS from $table_name");
                                        

                                        // gets all the column names of a table
                                        while($row = $query->fetch_array()){
                                            echo "<th scope=col>" . ($row['0']) . "</th>";
                                        }

                                        
                                        ?>
                                    </tr>
                                </thead>
                                
                                <!-- table rows -->
                                <tbody>

                                        <?php
                                        $query = $conn -> query("SELECT * FROM $table_name");

                                        // nested loop to render each attribute value on the table
                                        while($row = mysqli_fetch_array($query, MYSQLI_NUM)){
                                            echo "<tr class=clickable-row data-href=details.php?category=$table_name&id=$row[0]>";
                                            foreach($row as $column){                                              
                                                echo "<td style='word-wrap: break-word;'>" . $column . "</td>";
                                            }
                                            echo "</tr>";
                                            echo "</a>";
                                        }                                           
                                        ?>
                                    
                                    <!-- jquery script for making bootstrap <tr> elements clickable -->
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
