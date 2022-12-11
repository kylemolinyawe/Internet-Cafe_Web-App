<?php session_start();
if(!isset($_SESSION['eid']))
{
    header("location: https://localhost/Internet-Cafe_Web-App/user/login.php");
    die();
}
    ?>
<?php
$conn = new mysqli("localhost:3310","root","password","cafe");
if($conn->connect_error)
{
    die("Connect Error (".$conn->errno.") :".$conn->connect_error);
}

?>
<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'users-add'; ?>
    </head>
    
    <body style="margin: 0; height: 100%; max-height: 100%">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
               <!-- left section nav bar column -->
                <?php include '../side-nav.php'; ?>
                
                <!-- right section column -->
                <div class="col-10 m-0 p-0 h-100">
                    
                    <!-- top bar -->
                    <?php include '../top-nav.php';?>
                    
                    <!-- content section -->
                    <h3 class="p-0 m-3 mb-0">Add User</h3>
                    <label class="p-0 m-3 mt-2">November 29, 2022</label>
                    
                    <!-- input form container -->
                    <div class="container-fluid">
                        <div class="container-fluid">
                            
                            <!-- form inputs -->
                            <!-- TODO: fix alignment to match with h3 element -->
                            <form class="border rounded-2" action='finalstep.php' method='post'>
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-name">User name</label>
                                    <input type="text" name='user-name' class="form-control" id="user-name" placeholder="Enter username">
                                </div>
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-name">User name</label>
                                    <input type="password" name='pass' class="form-control" id="user-name" placeholder="Enter password">
                                </div>
                                <div class="m-0 p-3 pb-1">
                                    <label class="mb-2" for="user-mobile-number">Mobile number</label>
                                    <input type="text" name='mobile-no' class="form-control" id="user-mobile-number" placeholder="Enter mobile no.">
                                </div>
                                <div class="m-0 p-3">
                                    <label class="mb-2" for="user-email">Email</label>
                                    <input type="text" name='email' class="form-control" id="user-email" placeholder="Enter email">
                                </div>                            
                                <button type="submit" class="btn btn-primary m-3 align-content-lg-end">Submit</button>                               
                            </form>       
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
