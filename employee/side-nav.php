<!-- side nav bar -->
<div class="col m-0 p-0 h-100">
    <ul class="nav nav-pills flex-column bg-dark h-100" style="height: auto">
        <li>
            <h2 class="text-light p-3 m-0">Admin</h2>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/employee/dashboard.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 <?php if($currentPage == 'dashboard'){echo 'active';}?>">Dashboard</a>
        </li>

        <!-- users operations -->
        <li class="nav-item">
            <label class="text-light p-3 m-0 pb-2">Users</label>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/employee/users/add.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5 <?php if($currentPage == 'users-add'){echo 'active';}?>">Add User</a>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/employee/users/manage.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5 <?php if($currentPage == 'users-manage'){echo 'active';}?>" >Manage Users</a>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/employee/users/history.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5 <?php if($currentPage == 'users-history'){echo 'active';}?>" >View History</a>
        </li>

        <!-- computers operations -->
        <li class="nav-item">
            <label class="text-light p-3 m-0 pb-2">Computers</label>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/employee/computers/add.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5 <?php if($currentPage == 'computers-add'){echo 'active';}?>">Add Computer</a>
        </li>
        <li class="nav-item">
            <a href="/Internet-Cafe_Web-App/employee/computers/manage.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5 <?php if($currentPage == 'computers-manage'){echo 'active';}?>" >Manage Computers</a>
        </li>
        <li class="nav-item"> 
            <a href="/Internet-Cafe_Web-App/employee/computers/history.php" class="nav-item nav-link rounded-0 text-light p-3 m-0 ps-5 <?php if($currentPage == 'computers-history'){echo 'active';}?>" >View History</a>
        </li>                     
    </ul>
</div>

