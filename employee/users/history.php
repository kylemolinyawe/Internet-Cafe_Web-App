<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>Users History</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'users-history'; ?>
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
                    <h3 class="p-0 m-3 mb-0">View Users History</h3>
                    <label class="p-0 m-3 mt-2">November 29, 2022</label>
                    
                    <!-- search bar -->
                    <form class="">
                        <div class="row g-3 align-items-center">
                            <div class="col-4 m-3 me-0">
                                <input type="text" id="user-search" class="form-control" placeholder="Search for a record">
                            </div>
                            
                            <!-- TODO: replace search button with an icon instead -->
                            <div class="col-auto m-3 ms-0">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    
                    
                    <div class="container-fluid">
                        <div class="container-auto p-3 m-1 border rounded-3">
                            <table class="table">

                                <!-- table headers -->
                                <thead>
                                    <tr>
                                        <th scope="col">Entry Id</th>                                    
                                        <th scope="col">User Name</th>
                                        <th scope="col">Time Out</th>
                                        <th scope="col">Computer Id</th>
                                        <th scope="col">Status</th>               
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                
                                <!-- first row in the table -->
                                <!-- use the below syntax for adding new rows -->
                                <!-- TODO: table contents reflects number of users in database users table -->
                                <tbody>
                                    <tr>
                                        <th scope="row">000142</th>                                    
                                        <td>Jane Doe</td>
                                        <td>10:32:01 AM</td>
                                        <td>01</td>
                                        <td>Check Out</td>
                                        <td><a href="/Internet-Cafe_Web-App/employee/users/view.php" class="text-decoration-none">Update</a></td>
                                    </tr>
                                </tbody>
                                         
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
