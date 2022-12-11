<?php session_start();
if(!isset($_SESSION['eid']))
{
    header("location: https://localhost/Internet-Cafe_Web-App/user/login.php");
    die();
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
$conn = new mysqli("localhost:3310","root","password","cafe");
if($conn->connect_error)
{
    die("Connect Error (".$conn->errno.") :".$conn->connect_error);
}
    $brand=$_POST["brand"];
    $monitor=$_POST["monitor"];
    $keyboard=$_POST["keyboard"];
    $mouse=$_POST["mouse"];
    $surgep=$_POST["surgep"];
    $surgeb=$_POST['surgeb'];
    $os=$_POST['os'];
    $router=$_POST['router'];
    //current db does not use router so as to check if insertion is valid
    $sql="INSERT INTO cafe_computer (C_BRAND,C_MONITOR,C_KEYBOARD,C_MOUSE,C_SURGE_PROTECTOR,C_SURGE_BATTERY_TYPE,C_SYSTEM) VALUES ('$brand','$monitor','$keyboard','$mouse','$surgep','$surgeb','$os')";
    if($conn->query($sql))
    {
        header("location: https://localhost/Internet-Cafe_Web-App/employee/dashboard.php");
        die();
    }
    else
    {
        echo "An error has occurred please try again later";
    }
}
else
{
    ?>
<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>Add User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'computers-add'; ?>
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
                    <h3 class="p-0 m-3 mb-0">Add Computer</h3>
                    <label class="p-0 m-3 mt-2">November 29, 2022</label>
                    <div class="container-fluid">
                        <div class="container-fluid">
                            
                            <!-- form inputs -->
                            <!-- TODO: Better layout the inputs -->
                            <!-- TODO: Have form data be sent to database -->
                            <form class="border rounded-2" action='https://localhost/Internet-Cafe_Web-App/employee/computers/add.php' method='post'>
                                <!--<div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-mobile-number">Status</label>
                                    <input type="text" class="form-control" id="computer-status">
                                </div> -->
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-name">Brand</label>
                                    <input type="text" name='brand'class="form-control" id="computer-brand">
                                </div>
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-mobile-number">Monitor</label>
                                    <input type="text" name='monitor'class="form-control" id="computer-monitor">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Keyboard</label>
                                    <input type="text" name='keyboard'class="form-control" id="computer-keyboard">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Mouse</label>
                                    <input type="text" name='mouse'class="form-control" id="computer-mouse">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Surge Protector</label>
                                    <input type="text" name='surgep'class="form-control" id="computer-surge-protector">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Surge Battery Type</label>
                                    <input type="text" name='surgeb' class="form-control" id="computer-surge-battery-type">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">System</label>
                                    <input type="text" name='os' class="form-control" id="computer-system">
                                </div>
                                <!--<div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Desk Location</label>
                                    <input type="text"  class="form-control" id="computer-desk-location">
                                </div> -->
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Router ID</label>
                                    <input type="text" name='router' class="form-control" id="computer-router-id">
                                </div>
                                
                            <!-- TODO: append user id to hyperlink to be used by the user-update-record.html page -->
                            <button type="submit" class="btn btn-primary m-3 align-content-lg-end">Submit</button>                               
                            </form>       
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php } ?>