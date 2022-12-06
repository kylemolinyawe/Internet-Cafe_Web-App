<!DOCTYPE html>
<html style="min-height: 100%; height: 100%">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $currentPage = 'login'; ?>
    </head>
    
    <body style="margin: 0; height: 100%; max-height: 100%">
        <div class="container-fluid h-100">
            <div class="row h-100">
                
                <!-- TODO: add image here as background -->
                <div class="col bg-primary">
                </div>
                
                <!-- Login panel -->
                <div class="col-sm-5 pt-5">
                    <div class="h-75 w-75 m-3 mt-5 p-5 mx-auto">
                        <div class="mb-5">
                            <h1 class="">Login</h1>
                            <p>Welcome to (website name).</p>
                        </div>
                        <form class="mb-5">
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" id="login-email" placeholder="Email address">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg" id="login-password" placeholder="Password (8+ characters)">
                            </div>
                            <div class="mt-4 mb-3">
                                <button type="submit" class="btn btn-primary w-100 form-control-lg">Submit</button>
                            </div>
                            <div class="text-lg-end">
                                <p>Return to <a href="/Internet-Cafe_Web-App/user/landing.php" class="text-decoration-none">Landing Page</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>          
        </div>
    </body>
</html>
