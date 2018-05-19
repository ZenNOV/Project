<?php
    include'server/m.php';
    $_SESSION['savedonce']=1;
    $dir=$_SESSION['url'];
    $di=opendir($dir);
    $files=array();
    $diup=opendir($dir.'/media');
    $filesup= array();
    $response='<p class="textmuted"> No files here </p>';
    $responseup='<p class="textmuted"> No files here, Upload some plz  </p>';

    while (($file=readdir($di)) !== false){
        $splitFile = explode('.', $file);
        if ($file != "." and $file != ".." and count($splitFile)>1 ){
            $splitFile = explode('.', $file);
            if($splitFile[1] == "html"){
                array_push($files, $file);
            }
        }
    }
    
    while (($file=readdir($diup)) !== false){
        if ($file != "." and $file != ".."){
            array_push($filesup, $file);
        }
    }
    
    closedir($di);
    closedir($diup);
    sort($filesup);
    sort($files);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-Equiv="Cache-Control" Content="no-cache" />
    <meta http-Equiv="Pragma" Content="no-cache" />
    <meta http-Equiv="Expires" Content="0" />
    <title>Umake.com : Workspace</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="css/ownW.css" type="text/css" >
    <link rel="stylesheet" href="css/own.css" type="text/css" >
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="Main.php">Umake</a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#" id="paes">Pages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="uphot">Uploads</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="saveup" >Save</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="lowerbody">
      <div class="iframecol-1">
      <?php
        if(isset($_SESSION['nurl'])){
          echo'<iframe  src="'.$_SESSION['nurl'].'" id="choice"> </iframe>';
        }else{
          echo'<iframe  src="" id="choice"> </iframe>';
        }
      ?>
      </div>

      <div class="iframecol-2" id="settings">
        <form>
          <div class="modal-headers">
            <h5 class="modal-title" id="modaltitleset"></h5>

          </div>
          <div class="form-group">
            <label for="inputset" class="text-white"><h4>Source:</h4></label>
            <input class="btn btn-block dropdown-toggle allo" id="inputset" name="inputset" value ="nothing" type="button" data-toggle="dropdown">
            </button>
            <div class="dropdown-menu allo">
              <?php
                if (count($filesup)==0){
                  echo($responseup);
                }else{
                  foreach ($filesup as $file){
                  echo "<a href='#'  class='uploadedimg' name='$file'>
                  <p class='filetext'>'$file'</p></a>";
                  }
                }
              ?>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary" id="savenimg" name="savenimg">save</button>
          </div>
        </form>
      </div>

      <div class="iframecol-2" id="settingslink">
        <form>
          <div class="modal-headers">
            <h5 class="modal-title" id="modaltitlelinkset"></h5>
          </div>
          <div class="form-group">
            <label for="inputset" class="text-white"><h4>Reference:</h4></label>
            <input class="btn btn-block dropdown-toggle allo" id="inputsetlink" name="inputset" placeholder="www.example.com" value="https://www.example.com" type="url" >
            </button>
          </div>

          <div class="modal-footer">
            <input class="btn btn-primary" id="savenlink" value="save" type="button" name="savenlink">
          </div>
        </form>
      </div>
      
      

    </div>

    <div class="modal" id="Settings">
      <div class="modal-Acc">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modaltitle"></h5>
          </div>
          
          <div   id="Pages" style="margin-left:20px;">
              <?php
                if (count($files)==0){
                  echo($response);
                }else{
                  foreach ($files as $file){
                  echo " <a href='#' class='subpage' name='$file'>
                  <p class='filetext'>$file</p></a>";
                  }
                }
              ?>
          </div>

          <?php
            if(isset($_SESSION['perm'])){
              if($_SESSION['perm']!='e'){
                echo'<div   id="uploads" style="margin-left:20px;">
                  <div class="modal-footer"   >
                    <form action="server/upload.php" method="POST" enctype="multipart/form-data">';
                      
                        if (count($filesup)==0){
                          echo($responseup);
                        }else{
                          foreach ($filesup as $file){
                          echo " <a href='#' alass='displayupload'  name='$file'>
                          <p class='filetext'>$file</p></a>";
                          }
                        }
                      
                      echo'<div class="form-group" style="display: flex; flex-direction: column; text-align: : center;"  >
                        <label for="file"> File input</label>
                        <input type="file" name="file" id="file" class="form-control-file mb-3">
                        <button class="btn btn-primary" id="addup" name="addup">Add file</button>
                      </div>
                    </form>
                  </div>
              </div>';
            }else{
              echo'<div   id="uploads" style="margin-left:20px;"><p>hors de votre privilége</p>';

            }
            }
 
    
              
          ?>


        </div>
      </div>
    </div>


    <div class="modal" id="Imgdisplay">
      <div class="modal-Acc">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="Imgdisplaytitle"></h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          
          
        </div>
        
      </div>
      
    </div>
    





  


 






    

    <script src="js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript""></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/ownW.js" type="text/javascript"></script>

    
  </body>

</html>
