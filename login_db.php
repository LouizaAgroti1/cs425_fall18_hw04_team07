<?php
$conn = mysqli_connect("localhost","root","","pv system");
if(!$conn){
    die("Connection error: " . mysqli_connect_error());	
}
?>