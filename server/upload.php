<?php
	session_start();
	$allows = array('jpg','jpeg','png','gif','tiff');

	if (isset($_POST['addup'])) {
		if (isset($_SESSION['currentcode'])){
			$file=$_FILES['file'];
			$fileName=$_FILES['file']['name'];
			$filetmpname=$_FILES['file']['tmp_name'];
			$fileSize=$_FILES['file']['size'];
			$fileError=$_FILES['file']['error'];
			$fileType=$_FILES['file']['type'];
			$fileExt=explode('.',$fileName);
			$filerExt=strtolower(end($fileExt));
			if (in_array($filerExt, $allows)) {
				if ($fileError===0) {
					if ($fileSize < 1000000) {
						$newname = uniqid('',true).".".$filerExt;
						$filedest = '../sites/'.$_SESSION['currentcode'].'/media/'.$newname;
						move_uploaded_file($filetmpname,$filedest);
						header("Location:http://localhost/Umake/Workspace.php");     
					}else{
						echo"ur file is too big";
					}
				}else{
					echo"Error uploading ur file try again later please";
				}
			}else{
				echo"Type of file not supported";
			}
		}else{
			echo'';
		}

	}
?>