<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>View Computer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'computers-manage'; ?>
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
                    <h3 class="p-0 m-3 mb-0">Manage Computers</h3>
                    <label class="p-0 m-3 mt-2">November 29, 2022</label>
                    <div class="container-fluid">
                        <div class="container-fluid p-3 border rounded-3">
                            <table class="table">

                                <!-- table headers -->
                                <thead>
                                    <tr>
                                        <th scope="col">Computer Id </th>                                    
                                        <th scope="col">Computer Status</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Router Id</th>
                                        <th scope="col">Router Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <!-- first row in the table -->
                                <!-- TODO: implement even row width for table cells -->
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>                                    
                                        <td>In Use</td>
                                        <td>John Doe</td>
                                        <td>1</td>
                                        <td>Online</td>
                                        <td><a href="/Internet-Cafe_Web-App/employee/computers/view.php" class="text-decoration-none">Edit</a></td>
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
