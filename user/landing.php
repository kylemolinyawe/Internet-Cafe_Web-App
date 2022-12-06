<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>Landing</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'landing'; ?>
    </head>
    
    <body style="margin: 0; height: 100%; max-height: 100%">
        <div class="container-fluid h-100">
            <div class="row">
                  
                    <!-- top nav bar -->
                    <?php include 'top-nav.php';?>

            </div>
            
            <!-- main content -->         
            <div class="row justify-content-center">
                <div class="w-75 ps-3 pe-3">
                    <h1 class="mt-5">tagline or whatever</h1>
                    <p class="mb-4">Description about the website here</p>
                    <a href="/Internet-Cafe_Web-App/user/reservation.php" class="btn btn-primary col-auto form-control-lg">Reserve Now</a>
                </div>
                
            </div>
        </div>
    </body>
</html>
