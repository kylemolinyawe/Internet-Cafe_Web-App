<?php
$user='root';
$password='password';
$database='cafe';
$servername='localhost:3310';
$mysqli=new mysqli($servername,$user,$password,$database);
if($mysqli->connect_error)
{
    die('Connection Error ('.$mysqli->connect_errno.'): '.$mysqli->connect_error);
    //TODO: display a back button to previous page.
}
else
{
?>


<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>Employee Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'dashboard'; ?>
    </head>
    
    <body style="margin: 0; height: 100%; max-height: 100%">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
                <!-- left section nav bar column -->
                <?php include 'side-nav.php';?>
                
                <!-- right section column -->
                <div class="col-10 m-0 p-0 h-100">
                    
                    <!-- top bar -->
                    <?php include 'top-nav.php';?>
                    
                    <!-- content section -->
                    <h3 class="p-0 m-3 mb-0">Dashboard</h3>
                    <label class="p-0 m-3 mt-2">November 29, 2022</label>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col p-2 m-3 bg-primary text-light">
                                <table>
                                    <tbody>
                                        <tr>
                                            <!--TODO: add gear icon to the right -->
                                            <td><h3>2</h3></td> <!-- TODO: get number of users logged on the user table for the day -->
                                        </tr>
                                        <tr>
                                            <td>Total Users</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col p-2 m-3 bg-primary text-light">
                                <table>
                                    <tbody>
                                        <tr>
                                            <!--TODO: add gear icon to the right -->
                                            <td><h3>6</h3></td> <!-- TODO: get total number of computers in database -->
                                        </tr>
                                        <tr>
                                            <td>Total Computers</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php


}

?>