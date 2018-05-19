<?php 
  session_start();
  if(isset($_SESSION['email'])){
      header('Location:https://umake.000webhostapp.com/Main.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Umake.com : Développer votre site maintenant!</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="css/own.css" type="text/css" >
  </head>
  <body>
  	
    <header>
      	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        	<div class="container">
          		<a class="navbar-brand" href="Mainf.php">Umake</a>
          		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
          		<div class="collapse navbar-collapse" id="navbarNav">
            		<ul class="navbar-nav mr-auto">
              			<li class="nav-item">
                			<a class="nav-link" href="Mainf.php">Home</a>
              			</li>
              			<li class="nav-item">
                			<a class="nav-link" href="Aboutf.php">About</a>
              			</li>
              			<li class="nav-item">
                			<a class="nav-link" href="#contact">Contact</a>
              			</li>
            		</ul>
            		<button class="btn btn-primary" id="getstarted" data-toggle="modal" data-target="#loginModal">Get Started/Connect</button>
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

    <h1 class="display-3  text-center text-muted ">Nos Templates</h1>

    <div class="container">
      <div id="slider4" class="carousel slide mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
          <li class="active" data-target="#slider4" data-slide-to="0"></li>
          <li data-target="#slider4" data-slide-to="1"></li> 
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-roll" src="img/imgVelocity.jpg" alt="First Slide">
            <div class="carousel-caption d-none d-md-block">
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-roll" src="img/imgTokyo.jpg" alt="Second Slide">
            <div class="carousel-caption d-none d-md-block">
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
          </div>
        </div>
        <a href="#slider4" class="carousel-control-prev" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>

        <a href="#slider4" class="carousel-control-next" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
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
            		<h5 class="modal-title" id="modal-title">Login</h5>
            		<button class="close" data-dismiss="modal">&times;</button>
          		</div>

          		<div class="modal-bodys">

            		<div class="modal-col1" id="offline">
              			<form action="server/m1.php" method="POST" id="loginform">
                			<div class="form-group">
                  				<label for="email">Email</label>
                  				<input type="email" required placeholder="abc@abc.com" class="form-control" id="email" name="email">
                			</div>
                			<div class="form-group">
                  			<label for="pwd">Password</label>
                  			<input type="password" placeholder="Password" class="form-control" id="pwd" name="pwd">
                			</div>
                      <div class="modal-footer"  >
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" id="login" type="submit" value="Login"/>
                      </div>
              			</form>
                    <?php 
                      if (isset($_SESSION['flash'])){
                    
                        echo '<div class="alert alert-warning">
                          <strong>Warning</strong> Please check your informations : '.$_SESSION['flash'].'
                        </div>';
                        unset($_SESSION['flash']);
                      }
                    ?>
                    <button class="btn btn-primary" id="Signup">You dont have account yet ?</button>
            		</div>

            		<div class="modal-col1" id="signupp">
            			<form style="display:flex; flex-direction:column; " action="server/m11.php" method="POST">
            				<div class="form-group" style="display:flex; flex-direction: row; margin-right:20px;">
              					<div style="margin-right:20px;">
                					<p for="name">First Name</p>
                					<input type="text" id="Sifname" name="Sifname" class="form-control form-control-sm" placeholder="Enter firstname">
                				</div>
                				<div >
                					<p for="name">Last Name</p>
                					<input type="text" id="Silname" name="Silname" class="form-control form-control-sm" placeholder="Enter last name">
                				</div>
            				</div>
            				<div class="form-group">
                				<label for="Siemail">Email address</label>
                				<input type="email" required id="Siemail" name="Siemail" class="form-control" placeholder="Enter email">
                				<small class="form-text text-muted">Your email will not be shared</small>
            				</div>
            				<div class="form-group">
                				<label for="password">Password</label>
                				<input type="password" id="password" name="password" class="form-control" placeholder="Type in your password" >
                				<small class="form-text text-muted" id="Salert">More then 6 letters</small>
            				</div>
            				<div class="form-group">
                				<label for="Cpassword">Confirm your password</label>
                				<input type="password" id="Cpassword" name="Cpassword" class="form-control" placeholder="Type again your password">
                				<small class="form-text text-muted " id="Calert">Type your password again</small>
            				</div>
            				<div class="modal-footer">
                			<input class="btn btn-primary" id="submit" value="Register" type="submit" />
            				</div>

            			</form>
                  <button class="btn btn-secondary"  id="cancelsub">Already have an account ?</button>
            		</div>

          		</div>
        	</div>
      	</div>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript""></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/Mainf.js" type="text/javascript"></script>



    
  </body>

</html>