<!-- side nav bar -->
<div class="col m-0 p-0 h-100">
    <ul class="nav nav-pills flex-column bg-dark h-100" style="height: auto">
        <li>
            <h2 class="text-light p-3 m-0">SysAdmin</h2>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/sysadmin/dashboard.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 <?php if($currentPage == 'dashboard'){echo 'active';}?>">Dashboard</a>
        </li>

        <!-- database -->
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/sysadmin/computer%20log.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 <?php if($currentPage == 'computer log'){echo 'active';}?>">Database</a>
        </li>
               
    </ul>
</div>

