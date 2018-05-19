<?php
	session_start();
	libxml_use_internal_errors(true);

	$server = "localhost";
	$user = "id5811219_devil";
	$pass = "passport";
	$db = "id5811219_root";
	$conn = new mysqli($server, $user, $pass,$db);
	$email= $_SESSION['email'];
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	function rrmdir($dir) { 
	   if (is_dir($dir)) { 
	     $objects = scandir($dir); 
	     foreach ($objects as $object) { 
	       if ($object != "." && $object != "..") { 
	         if (is_dir($dir."/".$object))
	           rrmdir($dir."/".$object);
	         else
	           unlink($dir."/".$object); 
	       } 
	     }
	     rmdir($dir); 
	   } 
 	}

	function editmode($url){
		$html=new DOMDocument();
		libxml_use_internal_errors(true);
		$html->loadHTMLFile($url);
		$allows=array('p','a','h1','h3','div','h2','h5');
		foreach($html->getElementsByTagName('*') as $element ){
			if(in_array($element->tagName, $allows)){
				$element->setAttribute('contenteditable','true');
			}
		}
		foreach($html->getElementsByTagName('img') as $element ){
			if($element->getAttribute('class')=="fullwith-image"){
				$element->setAttribute('class', 'fullwith-imagee');
			}
		}

		$html->saveHTMLFile($url);
		return true;
	}

	function rdymode($url){
		$html=new DOMDocument();
		libxml_use_internal_errors(true);
		$html->loadHTMLFile($url);
		foreach($html->getElementsByTagName('*') as $element ){
			$element->setAttribute('contenteditable','false');
		}
		foreach($html->getElementsByTagName('img') as $element ){
			if($element->getAttribute('class')=="fullwith-imagee"){
				$element->setAttribute('class', 'fullwith-image');
			}
		}
		$html->saveHTMLFile($url);
		return true;
	}



	if (isset($_SESSION['Selectedsite'])){
		$code =explode('.',$_SESSION['Selectedsite']);
		$resultc= mysqli_query($conn,"Select codes,noms,theme,eadmin,egraphiste,epublicateur,eediteur,rdy from sites where codes= '$code[0]'");
  		$rowc= mysqli_fetch_array($resultc);
  		
		if(isset($_POST['edPS'])){
			$_SESSION['currentcode']=$code[0];
          	$_SESSION['url']='sites/'.$code[0];
          	if ($rowc['theme'] == "TT"  ) {
          	    $_SESSION['nurl']='sites/'.$code[0].'/tokyo.html';
          	}
          	if ($rowc['theme'] == "VT"  ) {
          	    $_SESSION['nurl']='sites/'.$code[0].'/Velocity.html';
          	}
          	if ($rowc['rdy']==0){			
          		header("Location:https://umake.000webhostapp.com/Workspace.php");			
			}else{
			    $resultNS= mysqli_query($conn,"UPDATE `sites` SET rdy=0 where codes= '$code[0]'") or null;
                if($resultNS){
                    editmode('../'.$_SESSION['nurl']);
                    header("Location:https://umake.000webhostapp.com/Workspace.php");			
                }
			}
		}

		if(isset($_POST['saveNS'])){
			$Sitename = (isset($_POST['Sitename'])&& $_POST['Sitename'] !="" ) ? $_POST['Sitename'] : '';
			$Sitep = (isset($_POST['Sitep'])&&$_POST['Sitep'] !="" ) ? $_POST['Sitep'] : '';
			$Siteg = (isset($_POST['Siteg'])&&$_POST['Siteg'] !="" ) ? $_POST['Siteg'] : '';
			$Sitee = (isset($_POST['Sitee'])&&$_POST['Sitee'] !="" ) ? $_POST['Sitee'] : '';
			$resulto1= mysqli_query($conn,"Select * from users where email= '$Sitep'");
			$rowo1=mysqli_fetch_array($resulto1);
			$resulto2= mysqli_query($conn,"Select * from users where email= '$Siteg'");
			$rowo2=mysqli_fetch_array($resulto2);
			$resulto3= mysqli_query($conn,"Select * from users where email= '$Sitee'");
			$rowo3=mysqli_fetch_array($resulto3);
			if(($Sitep=="n/a" || $rowo1!=null )&&($Siteg=="n/a" || $rowo2!=null )&&($Sitee=="n/a" || $rowo3!=null ) && (!empty($Sitename))){
					$resultNS= mysqli_query($conn,"UPDATE `sites` SET noms='$Sitename',egraphiste='$Siteg',epublicateur='$Sitep',eediteur='$Sitee',rdy=1 where codes= '$code[0]'") or null ;
					unset($_SESSION['Selectedsite']);
					if(!$resultNS ){
						$_SESSION['flash1'] = 'Server error, Try again later please';
						header("Location:https://umake.000webhostapp.com/Main.php");
					}else{
						$_SESSION['flash1'] = 'New site proprities saved';
						header("Location:https://umake.000webhostapp.com/Main.php");			
					}
			} else {
				$_SESSION['flash1'] = 'Staff member introduced doesnt exist/or name is empty';
				header("Location:https://umake.000webhostapp.com/Main.php");		
			}
			

		}

		if(isset($_POST['sdNS'])){
			$Sitename = (isset($_POST['Sitename'])&& $_POST['Sitename'] !="" ) ? $_POST['Sitename'] : '';
			$Sitep = (isset($_POST['Sitep'])&&$_POST['Sitep'] !="" ) ? $_POST['Sitep'] : '';
			$Siteg = (isset($_POST['Siteg'])&&$_POST['Siteg'] !="" ) ? $_POST['Siteg'] : '';
			$Sitee = (isset($_POST['Sitee'])&&$_POST['Sitee'] !="" ) ? $_POST['Sitee'] : '';

			$resulto1= mysqli_query($conn,"Select * from users where email= '$Sitep'");
			$rowo1=mysqli_fetch_array($resulto1);
			$resulto2= mysqli_query($conn,"Select * from users where email= '$Siteg'");
			$rowo2=mysqli_fetch_array($resulto2);
			$resulto3= mysqli_query($conn,"Select * from users where email= '$Sitee'");
			$rowo3=mysqli_fetch_array($resulto3);
			if(($Sitep=="n/a" || $rowo1!=null)&&($Siteg=="n/a" || $rowo2!=null)&&($Sitee=="n/a" || $rowo3!=null)){
					$resultNS= mysqli_query($conn,"UPDATE `sites` SET noms='$Sitename',egraphiste='$Siteg',epublicateur='$Sitep',eediteur='$Sitee',rdy=1 where codes= '$code[0]'") or null;
					unset($_SESSION['Selectedsite']);
					if(!$resultNS){
						$_SESSION['flash1'] = 'Server error, Try again later please';
						header("Location:https://umake.000webhostapp.com/Main.php");
					}else{
						$_SESSION['flash1'] = 'New site proprities saved';
						rdymode('../'.$_SESSION['nurl']);
						header("Location:https://umake.000webhostapp.com/Main.php");			
					}
			} else {
				$_SESSION['flash1'] = 'Staff member introduced doesnt exist';
				header("Location:https://umake.000webhostapp.com/Main.php");		
			}
		}

		if(isset($_POST['delS'])){
			$resultDS= mysqli_query($conn," DELETE FROM `sites` WHERE codes= '$code[0]'")or null;
			if($resultDS  == null ){
				$_SESSION['flash1'] = 'Server error, Try again later please';
				header("Location:https://umake.000webhostapp.com/Main.php");
			}else{
				unset($_SESSION['Selectedsite']);
				rrmdir('../sites/'.$code[0]);
				$_SESSION['flash1'] = 'Site deleted';
				header("Location:https://umake.000webhostapp.com/Main.php");			
			}
		}
		
	}else{
		$_SESSION['flash1'] = 'Server error, Try again later please';
		header("Location:https://umake.000webhostapp.com/Main.php");	
	}


?>