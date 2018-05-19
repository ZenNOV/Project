<?php 
  include'server/m.php';
  if(!isset($_SESSION['email'])){
    header("Location:http://localhost/Umake/Mainf.php");
  }        
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Umake.com : About</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="css/own.css" type="text/css" >
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
          <div class="container">
              <a class="navbar-brand" href="Main.php">Umake</a>
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="Main.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="About.php">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <button class="btn btn-primary" id="getstarted" data-toggle="modal" data-target="#loginModal">Account</button>
              </div>
          </div>
        </nav>
    </header>

    <nav class="navbar-expand-sm bg-light bg-dark" >
        
            <ul class="navbar-nav"  >
              <li class="nav-item" >
                <a class="nav-link" href="#">Francais</a>
              </li>
              <li class="nav-item" >
               <a class="nav-link" href="#">Anglais</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="#">Arabe</a>
              </li>
            </ul>
    </nav>

    <div  id ="mainbackground">
      <div class="container">
        <h1 class="display-4 font-weight-bold text-center">Developper votre Site mainetenant<br> <small class="text-muted">Umake, Le  premier CMS algerian a votre disposition pour concevoir votre site web rapidement et <strong>gratuitement.</strong></small></h1>
      </div>
    </div>

    <h1 class="display-3  text-center text-muted ">About us</h1>
    <div class="container">
        <p> 
          Bonjour<br> Ce site d'abord n'est pas le meilleur site possible, il n est pas parfait:<br>- parlant des squelettes vous allez trouver deux squelettes seulement une qui est valid a utilisation l'autre n est pas encore préte donc la squelette a utiliser est Velocity<br>- les 2 squelettes ne sont pas de ma création, ce sont des squelette tirés de webflow.com apres une demande d'autorisation j'ai eu la permission de les utiliser seulement pour des butes non commercial<br>- Dans ce CMS, Un user peut c réer plusieurs sites.<br>-  un user peut étre assigner un membre de staff dans plusieur site aussi (graphiste publicateur editeur).<br>-  Nous avons pas vraiment compris la difference entre le plublicateur et l'editeur alors l'attribution entre le publicateur et l'editeur et la méme.  
        </p>
    </div>

    <hr>

    <footer class="footer-wrap">
      
      <div class="floating">
        <h3 class="text-muted">More infos?</h3>
        <ul class="text-muted">
          <li>blaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</li>
          <li>blaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</li>
          <li>blaaaaaaaaaaaaaaaaaaaaaaaaaaawwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</li>
          <li>blaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab</li>
        </ul>
      </div>
      <div class="floating">
        <video width="100%" height="100%" controls>
          <source src="................." type="video/mp4">
        </video>
      </div>
      <div class="floating " id="contact">
        <h3 class="text-muted">Contact:</h3>
        <p class="text-muted"><strong>Address:</strong> BP 32 EL ALIA, BAB EZZOUAR ALGER, ALGERIE| <strong>Telephone:</strong>+213(0)21247607|<strong>Email:</strong>Working on it<p>
      </div>
      <p class="text-secondary text-center">&copy;2018 , USTHB uni, All Rights Reserved</p>
    </footer>

    
        <div class="modal" id="loginModal">
        <div class="modal-Acc">
          <div class="modal-contents">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Account</h5>
                <button class="close" data-dismiss="modal">&times;</button>
        
              </div>
              <div class="modal-bodys">

                <div class="modal-col1" id="online">
                    <div class="list-group mb-5" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-Vossites" href="#" data-toggle="list">Vos sites</a>
                        <a class="list-group-item list-group-item-action" id="list-Settings" href="#" data-toggle="list">Settings</a>
                        <a class="list-group-item list-group-item-action" name="decon" id="list-Deconnect" href="server/m.php?decon=1">Deconnecter</a>
                    </div>
                </div>

                <div class="modal-col2" id="Settings">
                    <h4 class="text-dark mb-3">Settings</h4>
                    <h5 class="text-primary">Account info</h5>
                    <form action="server/mm.php" method="POST">

                      <div class="form-group"  style="display:flex; flex-direction:row; ">
                        <div style="display:flex; flex-direction: column; margin-right:20px;" >
                          <label for="name">First Name</label>
                          <?php 
                            if (isset($_SESSION['fill'])){
                              echo'<input type="text" id="Sefname" name ="Sefname" class="form-control form-control-sm" value="'. $row['fname'].'">';
                            }else{
                              echo'<input type="text" id="Sefname" name ="Sefname" class="form-control form-control-sm" placeholder="Enter firstname">';
                            }
                          ?>
                        </div>
                        <div style="display:flex; flex-direction: column;">
                          <label for="name">Last Name</label>
                          <?php 
                            if (isset($_SESSION['fill'])){
                              echo'<input type="text" id="Selname" name ="Selname" class="form-control form-control-sm" value="'. $row['lname'].'">';
                            }else{
                              echo'<input type="text" id="Selname" name ="Selname" class="form-control form-control-sm" placeholder="Enter last name">';
                            }
                          ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <?php 
                              if (isset($_SESSION['fill'])){
                                echo'<input type="text" id="Seemail" name ="Seemail" class="form-control form-control-sm" value='. $row['email'].'>';
                              }else{
                                echo'<input type="text" id="Seemail" name ="Seemail" class="form-control form-control-sm" placeholder="Enter email">';
                              }
                            ?>
                            <small class="form-text text-muted">You will recieve confirmation mail in case you modify email</small>
                        </div>
                      </div>

                      <div class="form-group" style="display:flex; flex-direction:row; ">
                        <div class="form-group" style="display:flex; flex-direction: column; margin-right:20px; ">
                          <label for="Sepwd">New password</label>
                          <?php 
                            if (isset($_SESSION['fill'])){
                              echo'<input type="password" id="Sepwd" name ="Sepwd" class="form-control form-control-sm" value='. $row['pwd'].'>';
                            }else{
                              echo'<input type="password" id="Sepwd" name ="Sepwd"class="form-control form-control-sm" placeholder="Enter your new password">';
                            }
                          ?>
                          <small class="form-text text-muted">Your password</small>
                        </div>
                        <div style="display:flex; flex-direction: column;">
                          <label for="Senpwd">Confirm new password</label>
                          <input type="password" id="Senpwd" name ="Senpwd" class="form-control form-control-sm" placeholder="Re enter your new password">
                          <small id="semsg" class="form-text text-muted"></small>
                        </div>
                      </div>
  
                      <h5 class="text-primary">Profile info</h5>

                      <div class="form-group" style="display:flex; flex-direction:row; ">
                          <div style="display:flex; flex-direction: column; margin-right:20px;" >
                            <label for="city">City</label>
                            <?php 
                              if (isset($_SESSION['fill'])){
                                echo'<input type="text" id="city" name ="city" class="form-control form-control-sm" value='. $row['city'].'>';
                              }else{
                                echo'<input type="text" id="city" name ="city" class="form-control form-control-sm" placeholder="Enter City">';
                              }
                            ?>
                          </div>
                          <div style="display:flex; flex-direction: column;">
                            <label for="countr">Country</label>
                            <?php 
                              if (isset($_SESSION['fill'])){
                                echo'<input type="text" id="country" name ="country" class="form-control form-control-sm" value='. $row['country'].'>';
                              }else{
                                echo'<input type="text" id="country" name ="country" class="form-control form-control-sm" placeholder="Enter country">';
                              }
                            ?>
                          </div>
                      </div>

                      <div class="form-group">
                        <input type="checkbox" id="Sehire" name="Sehire" class="form-check-input"> Available for hire ?
                      </div>

                      <div class="modal-footer">
                        <input class="btn btn-primary" id="SaveNS" value="Save new settings" type="submit" />
                      </div>
                    </form>   
                </div>

                <div class="modal-col2" id="Vossites">
                  <?php 
                      if (isset($_SESSION['flash1'])){
                    
                        echo '<div class="alert alert-warning">
                          <strong>Notice:</strong> Please check your informations : '.$_SESSION['flash1'].'
                        </div>';
                        
                      }
                      unset($_SESSION['flash1']);
                  ?>
                  <h4 class="text-dark">Vos Sites</h4>
                    <button class="btn btn-primary mb-3" id="Addproj">Add project</button>
                    <div id="accordion" role="tablist" > 

                      <div class="cards">
                          <div class="card-header" role="tab" id="heading">
                            <h5 class="mb-0"><a href="#collapse1" data-parent="#accordion" data-toggle="collapse"  >
                              Administrateur
                            </a></h5>
                          </div>

                          <div id="collapse1" class="collapse show">
                            <div class="card-body">
                              <div class="gallery">
                                <?php
                                  if($resulta != false){
                                    while ($rowa = mysqli_fetch_assoc($resulta)) {
                                      if($rowa["theme"] =="VT"){
                                        echo '<a href="#" class="galleryitem Vel" name="a('.$rowa['codes'].'">
                                  <img width="150" height="150" src="img/imgVelocity.jpg">
                                  <h4>Select '.$rowa["noms"].'</h4>
                                  </a> ';
                                      } 
                                      if($rowa["theme"] =="TT"){
                                        echo '<a href="#" class="galleryitem Tok" name="a('.$rowa['codes'] .'">
                                  <img width="150" height="150" src="img/imgTokyo.jpg">
                                  <h4>Select '.$rowa["noms"].'</h4>
                                  </a> ';
                                      } 
                                    }                                    
                                  }
                                ?>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="cards">
                          <div class="card-header" role="tab" id="heading">
                            <h5 class="mb-0"><a href="#collapse2" data-parent="#accordion" data-toggle="collapse">
                              Publicateur
                            </a></h5>
                          </div>

                          <div id="collapse2" class="collapse">
                            <div class="card-body">
                                <?php
                                  if($resultp != false){
                                    while ($rowp = mysqli_fetch_assoc($resultp)) {
                                      if($rowp["theme"] =="VT"){
                                        echo '<a href="#" class="galleryitem Vel" name="p('.$rowp['codes'] .'" id="Vel">
                                  <img width="150" height="150" src="img/imgVelocity.jpg">
                                  <h4>Select '.$rowp["noms"].'</h4>
                                  </a> ';
                                      }
                                      if($rowp["theme"] =="TT"){
                                        echo '<a href="#" class="galleryitem" name="p('.$rowp['codes'] .'" id="Tok">
                                  <img width="150" height="150" src="img/imgTokyo.jpg">
                                  <h4>Select '.$rowp["noms"].'</h4>
                                  </a> ';
                                      } 
                                    }
                                  }
                                ?>
                            </div>
                          </div>
                      </div>

                      <div class="cards">
                          <div class="card-header" role="tab" id="heading">
                            <h5 class="mb-0"><a href="#collapse3" data-parent="#accordion" data-toggle="collapse">
                              Editeur
                            </a></h5>
                          </div>

                          <div id="collapse3" class="collapse">
                            <div class="card-body">
                                 <?php
                                  if($resulte != false){
                                    while ($rowe = mysqli_fetch_assoc($resulte)) {
                                      if($rowe["theme"] =="VT"){
                                        echo '<a href="#" class="galleryitem Vel" name="e('.$rowe['codes'] .'" id="Vel">
                                  <img width="150" height="150" src="img/imgVelocity.jpg">
                                  <h4>Select '.$rowe["noms"].'</h4>
                                  </a> ';
                                      }
                                      if($rowe["theme"] =="TT"){
                                        echo '<a href="#" class="galleryitem Tok" name="e('.$rowe['codes'] .'" id="Tok">
                                  <img width="150" height="150" src="img/imgTokyo.jpg">
                                  <h4>Select '.$rowe["noms"].'</h4>
                                  </a> ';
                                      } 
                                    }
                                  }
                                ?>                             
                            </div>
                          </div>
                      </div>

                      <div class="cards">
                          <div class="card-header" role="tab" id="heading">
                              <h5 class="mb-0"><a href="#collapse4" data-parent="#accordion" data-toggle="collapse">
                              Graphist
                              </a></h5>
                          </div>

                          <div id="collapse4" class="collapse">
                              <div class="card-body">
                                <?php
                                if($resultg != false){
                                  while ($rowg = mysqli_fetch_assoc($resultg)) {
                                    if($rowg["theme"] =="VT"){
                                      echo '<a href="#" class="galleryitem Vel" name="g('.$rowg['codes'] .'" id="Vel">
                                <img width="150" height="150" src="img/imgVelocity.jpg">
                                <h4>Select '.$rowg["noms"].'</h4>
                                </a> ';
                                    }
                                    if($rowa["theme"] =="TT"){
                                      echo '<a href="#" class="galleryitem Tok" name="g('.$rowg['codes'] .'" id="Tok">
                                <img width="150" height="150" src="img/imgTokyo.jpg">
                                <h4>Select '.$rowg["noms"].'</h4>
                                </a> ';
                                    } 
                                  }
                                }
                                ?>                                
                              </div>
                          </div>
                      </div>

                    </div>
                </div>

                <div class="modal-col2" id="Parsite">
                    <form style="display:flex; flex-direction:column; " action="server/mmm.php" method="POST">

                      <div class="form-group" >
                        <div class="form-group" >
                          <label for="Sitename">Site Name</label>
                          <input type="form-text" id="Sitename" name ="Sitename" class="form-control form-control-sm" >
                          <small class="form-text text-muted">Change name if you like</small>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Your staff members :</label>
                        <div style="display:flex; flex-direction: column;">
                          <label for="name">Publicateur</label>
                          <input type="form-text" id="Sitep" name ="Sitep" class="form-control form-control-sm" onkeyup="showResult(this.value)" placeholder="Select un publicateur">
                          
                          <small class="form-text text-muted">You can change your publicateur</small>
                          <label for="name">Editeur</label>
                          <input type="form-text" id="Sitee" name ="Sitee" class="form-control form-control-sm" onkeyup="showResult(this.value)" placeholder="Select un editeur">
                          <small class="form-text text-muted">You can change your editeur </small>
                          <label for="name">Graphiste</label>
                          <input type="form-text" id="Siteg" name ="Siteg" class="form-control form-control-sm" onkeyup="showResult(this.value)" placeholder="Select un Graphiste">
                          <small class="form-text text-muted">You can change your Graphiste </small>
                        </div>
                      </div>
                      
                        <div id="sitelink">
                            <p id="sitelien">
                              
                            </p>
                        </div>

                      <div class="modal-footer">                        
                        <button class="btn btn-danger" id="delS" name="delS">Delete</button>
                        <button class="btn btn-secondary" id="edPS" name="edPS">Edit</button>
                        <input class="btn btn-primary" id="saveNS" name="saveNS" value="Save" type="Submit" />
                        <input class="btn btn-primary" id="sdNS" name="sdNS" value="Save & Deploy" type="Submit" />
                      </div>
                    
                    </form>   
                    <div class="modal-footer">
                      <button class="btn btn-secondary" id="canPS" name="canPS">cancel</button>
                    </div>
                </div>

                <div class="modal-col2" id="Addproject">
                    <h4 class="text-dark mb-3">Selectionner template</h4>
                    <button class="btn btn-primary mb-3" id="Canproj">Cancel</button>
                    <div class="gallery"  >

                      <a href="#"  class="galleryitem" id="VelClick" name="VT">
                        <img width="250" height="300" src="img/imgVelocity.jpg">
                        <h4>Select Velocity</h4>
                      </a>

                      <a href="#" class="galleryitem" id="TokClick" name="TT">
                        <img width="250" height="300" src="img/imgTokyo.jpg">
                        <h4>Select Tokyo</h4>
                      </a>
                    </div>
                </div>


                <div class="modal-col2"   id="saves" >
                  <form action="server/m.php"  method="POST">
                    <div class="form-group">
                      <label for="namesave">Site name</label>
                      <input type="text" id="namesave" name="nnsite" class="form-control form-control-sm" placeholder="Enter name of your site here">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" id="Csaveup" >Cancel</button>
                        <input type="submit" class="btn btn-primary" id="saveup" value="Open designer"/>
                    </div>
                  </form>
                </div>

              </div>
          </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript""></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/own.js" type="text/javascript"></script>


    
  </body>

</html>
