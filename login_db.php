<?php
$conn = mysqli_connect("localhost","admin","1234","PV System");
if(!$conn){
    die("Connection error: " . mysqli_connect_error());	
}
?>