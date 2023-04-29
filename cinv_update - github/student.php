
<?php 

	require 'functions.php';

	if(!is_logged_in())
	{
		redirect('login.php');
	}

	$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

	$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);

	if($row)
	{
		$row = $row[0];
	}

?>

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
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">

  <!-- Boostrap template -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
  <script src="js/bootstrap.min.js">
  </script>
             
 <!-- create background cover -->     
<style>
body {
  background-image: url('images/plainBackground.png');
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
          <a class="navbar-brand" href="student.php">
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
            <a href="student.php">
            <span class="glyphicon glyphicon-home"> </span> Home</a>
          </li>
            <li>
            <a href="fullcalendar.php">
              Calendar
            </a>
          </li>
          <li>
            <a href="#">
              Connection
            </a>
          </li>
            <li>
            <a href="./discussion.php">
              Discussion
            </a>
          </li>
          <li>
              <a class="dropdown-toggle" type="button" data-toggle="dropdown">Department
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="compSci.php">Computer Science</a></li>
                <li><a href="#">English</a></li>
                <li><a href="#">Math</a></li>
            </ul>
          </li>
            <li>
            <a href="profile.php">
              Profile
            </a>
          </li>
        </ul>
   
<!-- drop-down for user -->       
    <form class="navbar-form navbar-right">
            <a class="btn btn-success" type="button" data-toggle="dropdown">Hello, <?php echo $_SESSION["PROFILE"]['firstname'];?>
                <img src="<?= get_image($_SESSION['PROFILE']['image'])?>" 
                    style="	margin-right:5px;
                    width: 20px;
                    height:20px;
                    object-fit:cover;
                    border-radius: 50%;" >
                <span class="caret"> </span>
              </a>
                  <ul class="dropdown-menu">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Log out</a></li>
                  </ul>  
            
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
    
    
<!-- detail of functionnal -->
   
<div class="basic-1">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-6">
				<div class="text-container" style="margin-top:15%;">
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
        <!-- Note: I think this should be something else, such as "view course materials" -->
					<!-- <h2> Improve your knowledge! <h2>
					<p> <small>Connections with professors and other students help facilitate learning.</small> </p>
					<p> <small>Learn whatever you want, and whenever you want!</small> </p>
                        <p> <a class="btn btn-lg" href="#"> Connecting </a> </p> -->
          <h2> Improve your knowledge! <h2>
					<p> <small>View various course materials to learn on your own time!</small> </p>
					<p> <small>Easy, quick, and convenient access to educational materials!</small> </p>
                        <p> <a class="btn btn-lg" href="#"> PLACEHOLDER FOR MATERIALS! </a> </p>
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
<!-- Footer --> 

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4" >
                <div class="footer-col" >
                    <h4>About CINV Academy</h4>
                    <p> Making learning more interactive and accessible
                    </p>
                </div>
            </div>
            
            <div class="col-md-4" >
                <div class="footer-col middle" >
                    <h4>Create an account</h4>
                    <p>Start learning today with our fast and secure login system!
                    </p>
                </div>
            </div>
            
            
            <div class="col-md-4" >
                <div class="footer-col last" >
                    <h4>Have questions or comments?</h4>
                    <p>Contact us to let us know! 
                      <!-- maybe add a link here to "contact" page? -->
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
                <!-- <p class="p-small"> "Copyright C 2023" < link here! > Cinv Academy "-All rights reseverd" 
                </p> -->
                <p class="p-small"> "Copyright 2023" Cinv Academy "-All rights reseverd" 
                </p>
                <!-- note: we don't actually have a copyright... -->
            </div>
        </div>
    </div>
</div>          
        
</body>
</html>