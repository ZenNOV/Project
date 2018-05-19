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

	if (($_POST['Siemail'] !="") && ($_POST['password'] != "") && ($_POST['Silname'] !="") && ($_POST['Sifname'] !="")){

		$Siemail = (isset($_POST['Siemail'])&& $_POST['Siemail'] !="" ) ? $_POST['Siemail'] : '';
		$password = (isset($_POST['password'])&&$_POST['password'] !="" ) ? $_POST['password'] : '';
		$Cpassword = (isset($_POST['Cpassword'])&&$_POST['Cpassword'] !="" ) ? $_POST['Cpassword'] : '';
		$Silname = (isset($_POST['Silname'])&&$_POST['Silname'] !="" ) ? $_POST['Silname'] : '';
		$Sifname = (isset($_POST['Sifname'])&&$_POST['Sifname'] !="" ) ? $_POST['Sifname'] : '';

		$Siemail = stripcslashes($Siemail);
		$password = stripcslashes($password);
		$Cpassword = stripcslashes($Cpassword);
		$Cpassword = mysqli_real_escape_string($conn ,$Cpassword);

		$Siemail = mysqli_real_escape_string($conn ,$Siemail);
		$password = mysqli_real_escape_string($conn ,$password);
		$Silname = stripcslashes($Silname);
		$Sifname = stripcslashes($Sifname);
		$Silname = mysqli_real_escape_string($conn ,$Silname);
		$Sifname = mysqli_real_escape_string($conn ,$Sifname);
		if ($password == $Cpassword){
			$result = mysqli_query($conn,"INSERT INTO `users`(`email`, `pwd`, `fname`, `lname`) VALUES ('$Siemail','$password','$Sifname','$Silname') ") or null;
            if($result!=null){
    			$resultcheck = mysqli_query($conn,"Select * from users where email= '$Siemail' and pwd = '$password'");
    			$row = mysqli_fetch_array($resultcheck);
    
    			if (($Siemail==$row['email']) && ($password == $row['pwd'])) {
    				$_SESSION['email']=$Siemail;
    				header("Location:https://umake.000webhostapp.com/Main.php");
    			} 
            }else {
				$_SESSION['flash'] = 'Account already exist';
				header("Location:https://umake.000webhostapp.com/Mainf.php");
			}
		}else{
			$_SESSION['flash'] = 'Password doesnt match';
			header("Location:https://umake.000webhostapp.com/Mainf.php");
		}
	}else{
		$_SESSION['flash'] = 'Missing forms';
		header("Location:https://umake.000webhostapp.com/Mainf.php");

	}


?>