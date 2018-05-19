<?php
	session_start();
	$server = "localhost";
	$user = "id5811219_devil";
	$pass = "passport";
	$db = "id5811219_root";
	$conn = new mysqli($server, $user, $pass,$db);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}


	if (isset($_POST['pwd'],$_POST['email']) ){

		$email = ( isset($_POST['email']) &&  $_POST['email']!="" ) ? $_POST['email'] : 'vide';
		$pwd = ( isset($_POST['pwd'] ) &&  $_POST['pwd']!="" ) ? $_POST['pwd'] : 'vide';

		$email = stripcslashes($email);
		$pwd = stripcslashes($pwd);
		$email = mysqli_real_escape_string($conn ,$email);
		$pwd = mysqli_real_escape_string($conn ,$pwd);
		
		$result = mysqli_query($conn,"Select * from users where email= '$email' and pwd = '$pwd'") or die("failed to query the database" .mysqli_error());
		$row = mysqli_fetch_array($result);
		if (($email==$row['email']) && ($pwd == $row['pwd'])) {
			$_SESSION['email']=$email;
			header("Location:https://umake.000webhostapp.com/Main.php");
		} else {
            $_SESSION['flash'] = 'id or password incorrect';
			header("Location:https://umake.000webhostapp.com/Mainf.php");
		}
	}
?> 