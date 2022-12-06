<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>Reservation</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <?php $currentPage = 'reservation'; ?>
    </head>
    
    <body style="margin: 0; height: 100%; max-height: 100%">       
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>     
        <div class="container-fluid h-100">
            <div class="row">
                  
                    <!-- top nav bar -->
                    <?php include 'top-nav.php';?>

            </div>
            
            <!-- main content -->         
            <div class="row justify-content-center">
                <div class="w-75 ps-3 pe-3">
                    <h1 class="mt-5 mb-3">Reserve a seat</h1>
                    
                    
                    <!-- Seating arrangement -->
                    <div class="bg-secondary w-75 mx-auto ps-auto pe-auto">
                        <div class="bg-primary m-auto text-center mb-2" style="width: 40px; height: 40px "><h5 class="text-light">01</h5></div>
                        <div class="bg-primary m-auto text-center mb-2" style="width: 40px; height: 40px "><h5 class="text-light">01</h5></div>
                    </div>

                    
                    
                    <!-- form input -->
                    <form class="border rounded-2 mt-3">
                        <div class="m-0 p-3 pb-1 mt-3">
                            <div class="row">
                                <label for="user-fee" class="col-sm-1 col-auto col-form-label required"">Seat No.</label>
                                <div class="col">
                                    <input type="text" id="user-fee" class="form-control" placeholder="Enter an available seat">
                                </div>
                            </div>
                        </div>
                        <div class="m-0 p-3 pb-1 mb-4">
                            <div class="row">
                                
                                <label for="user-fee" class="col-sm-1 col-auto col-form-label required">Date</label>
                                <div class="col">
                                    <input type="date" id="user-date" class="form-control">
                                </div>
                                
                                <!-- TODO: add dropdown -->
                                <label for="user-time" class="col-sm-1 col-auto col-form-label" required>Time In</label>
                                <div class="col">
                                    <input type="time" id="user-time" class="form-control" min="07:00" max="20:00" value="07:00">
                                </div>
                                
                                <label for="user-duration" class="col-sm-1 col-auto col-form-label">Time Out</label>
                                <div class="col">
                                        <input type="time" id="user-time" class="form-control" min="07:00" max="20:00" value="09:00">
                                </div>
                                

                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Reserve Now">
                        </div>
                                              
                    </form>
                    
                </div>              
            </div>
            
        </div>
    </body>
</html>
