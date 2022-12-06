<!DOCTYPE html>
<!-- TODO: fix navbar not filling all available height -->
<html style="min-height: 100%; height: 100%">
    <head>
        <title>View User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'users-view'; ?>
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
                    <h3 class="p-0 m-3 mb-0">View User</h3>
                    <label class="p-0 m-3 mt-2">November 29, 2022</label>
                    <div class="container-fluid">
                        <div class="container-fluid p-3 border rounded-3">
                            <table class="table table-striped">

                                <!-- first row in the table -->
                                <!-- use syntax for adding new rows -->
                                <!-- TODO: table contents reflects number of users in database users table -->
                                <tbody>
                                    <tr>
                                        <th scope="row">User ID</th>
                                        <td>000021</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Full Name</th>
                                        <td>John Maginot Doe</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile Phone No.</th>
                                        <td>09456123614</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>john.doe@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date</th>
                                        <td>11-29-2022</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Time In</th>
                                        <td>01:33:14 PM</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Time Out</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fee</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Remark</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>Not Yet Updated </td>
                                    </tr>
                                </tbody>
                                         
                            </table>
                        </div>
                    </div>
                    <h3 class="p-0 m-3 mt-4">Check Out</h3>
                    <div class="container-fluid">
                        <div class="container-fluid p-3 border rounded-3 mb-4">
                            <form>
                                <div class="row mb-3">
                                    <label for="user-fee" class="col-sm-1 col-form-label">Remark</label>
                                    <div class="col">
                                        <input type="text" id="user-fee" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="user-fee" class="col-sm-1 col-auto col-form-label">Fee</label>
                                    <div class="col">
                                        <input type="text" id="user-fee" class="form-control">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3 align-content-lg-end">Submit</button>        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
