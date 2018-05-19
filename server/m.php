<?php
  function xcopy($source, $dest, $permissions = 0777){
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
    return true;
}
	session_start();
	$server = "localhost";
	$user = "id5811219_devil";
	$pass = "passport";
	$db = "id5811219_root";
	$conn = new mysqli($server, $user, $pass,$db);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	if (isset($_SESSION['email']) ){
		$email=$_SESSION['email'];

		$result = mysqli_query($conn,"Select * from users where email= '$email'");
		$row = mysqli_fetch_array($result);
		$_SESSION['fill'] =1;

		$resulta = mysqli_query($conn,"Select codes,theme,noms from sites where eadmin= '$email'") or null;
		$resultg = mysqli_query($conn,"Select codes,theme,noms from sites where egraphiste= '$email'") or null;
		$resultp = mysqli_query($conn,"Select codes,theme,noms from sites where epublicateur= '$email'") or null;
		$resulte = mysqli_query($conn,"Select codes,theme,noms from sites where eediteur= '$email'") or null;

		if (isset($_GET['q'])){
      		$q=explode('(',$_GET['q']);
            $_SESSION['perm']=$q[0];
      		$resultq= mysqli_query($conn,"Select codes,noms,theme,egraphiste,epublicateur,eediteur,rdy from sites where codes= '$q[1]'");
      			
      		$rowq= mysqli_fetch_array($resultq);
      		if ($rowq['theme'] == "TT"  ) {
          	    $_SESSION['nurl']='sites/'.$q[1].'/tokyo.html';
          	}
          	if ($rowq['theme'] == "VT"  ) {
          	    $_SESSION['nurl']='sites/'.$q[1].'/Velocity.html';
          	}
      		$_SESSION['Selectedsite']=$q[1];  		
      		unset($_GET['q']);
      		echo $rowq['noms']."&".$rowq['egraphiste']. "&" . $rowq[ 'epublicateur']. "&". $rowq['eediteur']."&".$rowq['rdy'];
  	    }

      	if (isset($_GET['s'])){
            if (!isset($_SESSION['savedonce'])){
                echo"no";
            }else{
                $_SESSION['nurl']= $_GET['s'];
                echo"yes";
            }
      	}

        if(isset($_GET['decon'])){
            session_unset();
            header("Location:https://umake.000webhostapp.com/Mainf.php");
        }

        if (isset($_POST['VT'])){
            $e = ( isset($_POST['VT']) &&  $_POST['VT']!="" ) ? $_POST['VT'] : '';
    
            if ( isset($_POST['VT']) &&  $_POST['VT']!="" && $_POST['VT']!="Open designer" ){
                $results = mysqli_query($conn,"Select max(codes) from sites") or null;
                $t=mysqli_fetch_array($results)[0] +1;
                $results = mysqli_query($conn,"Insert into sites(codes,noms,theme,eadmin) values('$t','$e','VT','$email')") or die("failed to query the database" .mysqli_error($conn));
                $results = mysqli_query($conn,"Select codes from sites where codes='$t'") or null;
        
                if ($results !=null ){
                    $a=mkdir('../sites/'.$t, 0777, true);
                    $a=mkdir('../sites/'.$t.'/media', 0777, true);
                    xcopy('../templates/VT' , '../sites/'.$t);  
                    $_SESSION['currentcode']=$t;
                    $_SESSION['url']='sites/'.$t;
                    $_SESSION['nurl']='sites/'.$t.'/Velocity.html';
                    $_SESSION['perm']='a';
                    header("Location:https://umake.000webhostapp.com/Workspace.php");     
                }else{
                    echo"there has been an error please try again shortly";
                    header("Location:https://umake.000webhostapp.com/Main.php");
                }
            }else{
                $_SESSION['flash1'] = 'Please select a name for ur site before openning designer ';
                header("Location:https://umake.000webhostapp.com/Main.php");
            }
        }

        if(isset($_POST['TT'])){
            $e = ( isset($_POST['nnsite']) &&  $_POST['nnsite']!="" ) ? $_POST['nnsite'] : '';
            if ( isset($_POST['nnsite']) &&  $_POST['nnsite']!=""){
                $results = mysqli_query($conn,"Select max(codes) from sites") or null;
                $t=mysqli_fetch_array($results)[0] +1;
                $results = mysqli_query($conn,"Insert into sites(codes,noms,theme,eadmin) values('$t','$e','TT','$email')") or die("failed to query the database" .mysqli_error($conn));
                $results = mysqli_query($conn,"Select codes from sites where codes='$t'") or null;
                echo($t);
                if ($results ){
                    $a=mkdir('../sites/'.$t, 0777, true);
                    $a=mkdir('../sites/'.$t.'/media', 0777, true);
                    xcopy('../templates/TT' , '../sites/'.$t);  
                    $_SESSION['currentcode']=$t;
                    $_SESSION['url']='sites/'.$t;
                    $_SESSION['nurl']='sites/'.$t.'/tokyo.html';
                    $_SESSION['perm']='a';
                    header("Location:https://umake.000webhostapp.com/Workspace.php");     
                }else{
                    echo"there has been an error please try again shortly";
                    header("Location:https://umake.000webhostapp.com/Main.php");
                }
            }else{
                $_SESSION['flash1'] = 'Please select a name for ur site before openning designer ';
                header("Location:https://umake.000webhostapp.com/Main.php");
            }
        }

        if(isset($_GET['click'])){
          unset($_SESSION['savedonce']);
          echo"yes";
        }
	}
?> 