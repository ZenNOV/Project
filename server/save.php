<?php
	session_start();
	$html=new DOMDocument();
	$lien='';
	$d=explode('/',$_SESSION['nurl']);
	$lien='../'.$_SESSION['url'].'/'.end($d);

	libxml_use_internal_errors(true);
	$html->loadHTMLFile($lien);

	if (isset($_SESSION['currentcode'])){
		$data = file_get_contents( "php://input" ); //$data is now the string '[1,2,3]';
		$data = json_decode( $data );
		if (isset($data)){
			foreach($data as $d){
				$r=explode('&',$d);
				$element = $html->getElementById($r[0]);
				$element->nodeValue=explode('<',$r[1])[0];
				echo($element->nodeValue);
			}
			$html->saveHTMLFile($lien);
			$_SESSION['savedonce']=1;
		}

		if(isset($_GET['si'])){
			$r=explode('(',$_GET['si']);
			$element = $html->getElementById($r[0]);
			if(('http://localhost/Umake/sites/'.$_SESSION['currentcode'].'/'.$element->getAttribute('src'))!=end($r)){
				$element->setAttribute('src','media/'.end($r));
			}
			$html->saveHTMLFile($lien);
        	echo($element->getAttribute('src'));
		}

		if(isset($_GET['sl'])){
			$d=$_GET['sl'];
			$r= explode('(',$d);
			$element = $html->getElementById($r[0]);
			$element->setAttribute('href',end($r));
			$html->saveHTMLFile($lien);
			echo($element->tagName);

        	echo"yes";

		}

		if(isset($_GET['safeexit'])){
			if(isset($_SESSION['savedonce'])){
				echo"yes";
			}else{
				echo"no";
			}
		}
	}
?>