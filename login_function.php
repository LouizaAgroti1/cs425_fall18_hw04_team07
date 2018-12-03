<?php
session_start();
include_once 'login_db.php';
if(isset($_POST['Login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM `user` WHERE Username='$username'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows > 0){
		$row = mysqli_fetch_assoc($rs);
		if($row['Attempts']>5){
			echo '<script type="text/javascript">alert("Sorry but you can not login again!");
       		 window.location.replace("index.php");
        	</script>';
		}
		if(password_verify($password,$row['Password'])){
			$sql_update = "UPDATE user SET Attempts=0 WHERE Username='$username'";
			$rs_update = mysqli_query($conn,$sql_update);
			if(!$rs_update){
				echo '<script type="text/javascript">alert("DATABASE ERROR!");
       		 	window.location.replace("index.php");
        		</script>';
			}
			echo '<script type="text/javascript">alert("Welcome!!!");
       		 window.location.replace("map.html");
        	</script>';
		}
		else{
			$sql_update = "UPDATE user SET Attempts=(Attempts+1) WHERE Username='$username'";
			$rs_update = mysqli_query($conn,$sql_update);
			if(!$rs_update){
				echo '<script type="text/javascript">alert("DATABASE ERROR!");
       		 	window.location.replace("index.php");
        		</script>';
			}
			echo '<script type="text/javascript">alert("WRONG PASSWORD OR USERNAME!");
       		 window.location.replace("index.php");
        	</script>';
		}
	}
	else{
		echo '<script type="text/javascript">alert("WRONG PASSWORD OR USERNAME!");
       		 window.location.replace("index.php");
        	</script>';
	}
}else if(isset($_POST['Register'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$hashPassword = password_hash($password,PASSWORD_BCRYPT);
	
	$sql = "INSERT INTO user (Username, Password) value('".$username."','".$hashPassword."')";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		echo '<script type="text/javascript">alert("Registration Successful!!!");
       		 window.location.replace("map.html");
        	</script>';
	}
}
?>