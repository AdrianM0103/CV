<?php
$servername = "localhost";
$dbusername = "id20024164_phpbbuser";
$dbpassword = "n(Ngm<z741H|\W!l";
$dbname = "id20024164_phpbbdb";

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if(!$conn){
    die("Connection failed! ".mysqli_connect_error());
}
?>
