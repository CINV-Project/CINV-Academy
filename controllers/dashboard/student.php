<div class="tw-max-w-[1000px] tw-m-auto tw-p-[16px]">
  <?php flash_message()->display(); ?>
  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      Cinv Academy
    </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="Styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn+SC&display=swap" rel="stylesheet">
      
 <!-- create background cover -->     
<style>
body {
  background-image: url('images/background2%20(1).jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
      
      
<!-- Navigation bar-->
</head>
<body>
    <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#home">
            CINV ACADEMY
          </a>
          <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
            <span class="sr-only">
              Toggle navigation
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
      </div>
      <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="#home">
            <span class="glyphicon glyphicon-home"> </span> Home</a>
          </li>
            <li>
            <a href="#">
              Calendar
            </a>
          </li>
          <li>
            <a href="#">
              Connection
            </a>
          </li>
            <li>
            <a href="#">
              Discussion
            </a>
          </li>
            <li>
            <a href="note.php">
              Note
            </a>
          </li>
          <li>
              <a class="dropdown-toggle" type="button" data-toggle="dropdown">Department
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Computer Science</a></li>
                <li><a href="#">English</a></li>
                <li><a href="#">Math</a></li>
            </ul>
          </li>
            <li>
            <a href="#contact.php">
              Contract Us
            </a>
          </li>
        </ul>
   
<!-- drop-down for user -->       
    <form class="navbar-form navbar-right">
      <?php if (is_logged_in()) : ?>
        <?php include_once __DIR__ . '/user_dropdown.php' ?>
      <?php else : ?>
        <form class="navbar-form navbar-right">
          <a data-native href="<?= base_path("login") ?>">
            <input class="btn btn-success" type="button" value="Login or Signup">
          </a>
        </form>
      <?php endif ?>
    </form>
      
<!-- Searching bar -->        
          
        <form class="navbar-form navbar-right" role="search">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info">
                Go
              </button>
            </span>
            <label for="search" class="sr-only">
              Search
            </label>
            <input type="text" id="search" class="form-control" placeholder="Search">
            <span class="glyphicon glyphicon-search form-control-feedback">
            </span>
          </div>
        </form>
<!-- end of searching bar -->
                     
     </div>
  </div>
  </nav>
    
<!-- end of nav-bar -->       
    
<br>
<br>
<br>

<!-- Boostrap template -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
  <script src="js/bootstrap.min.js">
  </script>
      
      
      
 <!-- input bacground image-->    
<!--
<style>
body {
  background-image: url('images/main.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
-->

      
      
<!-- detail of functionnal -->

      
      
<div class="basic-1">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-6">
				<div class="text-container" style="margin-top:15px;">
					<h2> Connect with professors! <h2>
					<p> <small>Easy, convenient, and quick meetings with professors.</small> </p>
					<p> <small>Flexible meeting schedules for both students and professors</small> </p>
                    <p> <a class="btn btn-lg" href="#"> Connecting </a> </p>
				</div>
				<!-- end of class container -->

			</div>
				<!-- end of col -->

			<div class="col-lg-6">
				<div class="image-container">
					<img class="img-fluid" src="https://www.naishare.com/assets/images/details-1-office-worker.svg " alt="alternative">
				</div>
                                
				<!-- end of image container -->
			</div>
			<!-- end of col -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container -->
</div>

        

<div class="basic-2">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-6">
				<div class="text-container" style="margin-top:15px;">
					<h2> Improve your knowledge! <h2>
					<p> <small>Connections with professors and other students help facilitate learning.</small> </p>
					<p> <small>Learn whatever you want, and whenever you want!</small> </p>
                        <p> <a class="btn btn-lg" href="#"> Connecting </a> </p>
				</div>
				<!-- end of class container -->

			</div>
				<!-- end of col -->

			<div class="col-lg-6">
				<div class="image-container">
					<img class="img-fluid" src="https://www.naishare.com/assets/images/header-teamwork.svg " alt="alternative">
				</div>
                                
				<!-- end of image container -->
			</div>
			<!-- end of col -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container -->
</div>
      

<div class="basic-3">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-6">
				<div class="text-container" style="margin-top:15px;">
					<h2> Discuss with classmates! <h2>
            <p> <small>Have a quick question to ask, but don't want to ask a professor?</small> </p>
            <p> <small>Want to help other students out with their questions?</small> </p>
            <p> <small>The Discussion page is the place for that!</small></p>
                        <p> <a class="btn btn-lg" href="#"> Discussion </a> </p>
				</div>
				<!-- end of class container -->

			</div>
				<!-- end of col -->

			<div class="col-lg-6">
				<div class="image-container">
					<img class="img-fluid" src="https://www.naishare.com/assets/images/details-2-office-team-work.svg" alt="alternative">
				</div>
                                
				<!-- end of image container -->
			</div>
			<!-- end of col -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container -->
</div>
        
<!-- Footer --> 
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4" >
                <div class="footer-col" >
                    <h4>About Cinv Academy</h4>
                    <p> something write here!
                    </p>
                </div>
            </div>
            
            <div class="col-md-4" >
                <div class="footer-col middle" >
                    <h4>Privacy policy</h4>
                    <p> something write here!
                    </p>
                </div>
            </div>
            
            
            <div class="col-md-4" >
                <div class="footer-col last" >
                    <h4>Social Media or something here!</h4>
                    <p> Write something here!
                    </p>
                </div>
            </div>
            
        </div>
    </div>
    
</div>

<!-- copy right -->
<div class="copyright" >
    <div class="container" >
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small"> "Copyright &copy; 2023" < link here! > Cinv Academy "-All rights reseverd" 
                </p>
            </div>
        </div>
    </div>
</div>
        
        
</body>
</html>
</div>