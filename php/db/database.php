<?php
//sql connector
$con = mysqli_connect ("sql1.njit.edu", "it49", "A%MH77l6S@CD!S", "it49");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>