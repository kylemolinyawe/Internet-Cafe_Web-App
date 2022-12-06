<!-- Top nav bar -->
<nav class="navbar navbar-expand-lg bg-light justify-content-center">
    <div class="w-75">
        
        <div class="navbar navbar-nav nav-pills ps-3 pe-3" id="navbarSupportedContent">
            <a class="navbar-brand" href="/Internet-Cafe_Web-App/user/landing.php">Branding here</a>
            
            <!-- Links -->
            <ul class="navbar-nav mb-2 mb-lg-0 ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/Internet-Cafe_Web-App/user/services.php">Services</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link  <?php if($currentPage == 'reservation'){echo 'disabled';}?>" href="/Internet-Cafe_Web-App/user/reservation.php">Reservation</a>
                </li>                      
                <li class="nav-item">
                    <a class="btn btn-primary" href="/Internet-Cafe_Web-App/user/login.php">Login</a>
                </li>
                
            </ul>
            
        </div>
        
    </div>
</nav>
