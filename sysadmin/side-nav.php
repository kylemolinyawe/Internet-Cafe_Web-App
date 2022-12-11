<!-- side nav bar -->
<div class="col m-0 p-0" style="min-height: 100%;">
    <ul class="nav nav-pills flex-column bg-dark h-100">
        <li>
            <h2 class="text-light p-3 m-0">SysAdmin</h2>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/sysadmin/dashboard.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 <?php if($currentPage == 'dashboard'){echo 'active';}?>">Dashboard</a>
        </li>

        <!-- database -->
        <li class="nav-item">
            <label class="text-light p-3 m-0 pb-2">Database</label>       
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/sysadmin/view.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5
                    <?php if($currentPage == 'view'){echo 'active';}?>">View Tables</a>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/sysadmin/add.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5
                    <?php if($currentPage == 'add'){echo 'active';}?>">Add Record</a>
        </li>             
    </ul>
</div>

