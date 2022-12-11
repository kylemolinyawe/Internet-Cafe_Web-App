<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $seatNo=$_POST["seat"];
    $dateNow=$_POST["date"];
    $timeIn=$_POST["timein"];
    $timeOut=$_POST["timeout"];
    $name=$_SESSION["uid"];
    
    $mysqli = new mysqli("localhost:3310","root","password","cafe");
    if($mysqli->connect_error)
    {
        die("Connect Error (".$mysqli->connect_errno."): ".$mysqli->connect_error);
    }
    else
    {
        $namef=$_SESSION['uid'];
        $newSQL = "INSERT INTO timeslot (TS_TIME_IN, TS_DURATION, TS_TIME_OUT, TS_DATE_ADDED, USER_ID, C_COMP_ID) VALUES ('$timeIn',TIMEDIFF('$timeOut','$timeIn'),'$timeOut','$dateNow','$namef','$seatNo')";
        if($mysqli->query($newSQL))
        {
            //instantly redirect back to reservation page if working
            header("location: https://localhost/Internet-Cafe_Web-App/user/reservation.php");
            die();
            ?>
        <?php
        }
        else
        {
            echo "An error has occurred when making a reservation, please try again later.";
        }
    }
}
?>

