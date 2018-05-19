<?php
	session_start();
	$server = "localhost";
	$user = "id5811219_devil";
	$pass = "passport";
	$db = "id5811219_root";
	$conn = new mysqli($server, $user, $pass,$db);
	$email= $_SESSION['email'];
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	$Seemail = (isset($_POST['Seemail'])&& $_POST['Seemail'] !="" ) ? $_POST['Seemail'] : '';
	$Sepwd = (isset($_POST['Sepwd'])&&$_POST['Sepwd'] !="" ) ? $_POST['Sepwd'] : '';
	$Senpwd = (isset($_POST['Senpwd'])&&$_POST['Senpwd'] !="" ) ? $_POST['Senpwd'] : '';
	$Selname = (isset($_POST['Selname'])&&$_POST['Selname'] !="" ) ? $_POST['Selname'] : '';
	$Sefname = (isset($_POST['Sefname'])&&$_POST['Sefname'] !="" ) ? $_POST['Sefname'] : '';
	$city = (isset($_POST['city'])&&$_POST['city'] !="" ) ? $_POST['city'] : '';
	$country = (isset($_POST['country'])&&$_POST['country'] !="" ) ? $_POST['country'] : '';

	$Seemail = stripcslashes($Seemail);
	$Sepwd = stripcslashes($Sepwd);		
	$Senpwd = stripcslashes($Senpwd);		
	$Seemail = mysqli_real_escape_string($conn ,$Seemail);
	$Sepwd = mysqli_real_escape_string($conn ,$Sepwd);
	$Senpwd = mysqli_real_escape_string($conn ,$Senpwd);
	$Selname = stripcslashes($Selname);
	$Sefname = stripcslashes($Sefname);
	$Selname = mysqli_real_escape_string($conn ,$Selname);
	$Sefname = mysqli_real_escape_string($conn ,$Sefname);	
	$city = stripcslashes($city);
	$city = mysqli_real_escape_string($conn ,$city);
	$country = stripcslashes($country);
	$country = mysqli_real_escape_string($conn ,$country);
Sehire);

	if (($Sepwd == $Senpwd) || ($Senpwd == "")){
		$resultse = mysqli_query($conn,"UPDATE users SET email='$Seemail',pwd='$Sepwd',fname='$Sefname',lname='$Selname',city='$city',country='$country' WHERE email='$email'") or null;
		if($resultse  == null ){
			$_SESSION['flash1'] = 'Server error, Try again later please';
			header("Location:http://localhost/Umake/Main.php");
		}else{
			$_SESSION['flash1'] = 'New settings saved, in case u changed email plz validate through the mail we sent you';
			header("Location:http://localhost/Umake/Main.php");			
		}
	}else{
		$_SESSION['flash1'] = 'password doesnt match';
		header("Location:http://localhost/Umake/Main.php");
	}

?> 