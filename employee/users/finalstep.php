<?php session_start();
if(!isset($_SESSION['eid']))
{
    header("location: https://localhost/Internet-Cafe_Web-App/user/login.php");
    die();
}
    ?>
<?php
$conn = new mysqli("localhost:3310","root","password","cafe");
if($conn->connect_error)
{
    die("Connect Error (".$conn->errno.") :".$conn->connect_error);
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST["user-name"];
    $mobileNo=$_POST["mobile-no"];
    $email=$_POST["email"];
    $pw=$_POST["pass"];
    
    $sql="INSERT INTO users (USER_NAME,USER_PASS,USER_PHONE,USER_EMAIL) VALUES ('$username',$pw,'$mobileNo','$email')";
    if($conn->query($sql))
    {
       ?>
<!doctype html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title> Success! </title>
    
    </head>
    <body>
        Success
        <form action='add.php'>
            <input type="submit" class='btn btn-primary mt-4' value="Go back" />
        </form>
    </body>
</html>
<?php
    }
    else
    {echo "<script>location.href='add.php';</script>";
        die();
    }
}
?>