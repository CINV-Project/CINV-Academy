
<?php
	session_start();
  require('config.inc.php');
  require('functions.php');
  
  if($row)
    {
      $row = $row[0];
    }

	// if(!logged_in()){
	// 	header("Location: index.php");
	// 	die;
	// }

	// $user_id = $_GET['id'] ?? $_SESSION['USER']['id'];

	// $query = "select * from users where id = '$user_id' limit 1";
	// $row = query($query);

	// if($row)
	// {
	// 	$row = $row[0];
	// }
?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Boostrap template -->
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="Styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src="js/bootstrap.min.js"></script>
             
    <!-- create background cover -->     
    <style>
    body {
    background-image: url('images/background2%20(1).jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    }
    </style>
</head>

<body>
<header class="class_2" >
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
              <li >
                <a href="student.php">
                <span class="glyphicon glyphicon-home"> </span> Home</a>
              </li>
                <li>
                <a href="fullcalendar.php">
                  Calendar
                </a>
              </li>
                <li>
                <a href="./forum.php">
                  Discussion
                </a>
              </li>
              <li>
                  <a class="dropdown-toggle" type="button" data-toggle="dropdown">Department
                    <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="./compSci.php">Computer Science</a></li>
                    <li><a href="./english.php">English</a></li>
                    <li><a href="./math.php">Math</a></li>
                </ul>
              </li>
                <li >
                <a href="profile.php">
                  Profile
                </a>
              </li>
              <!-- drop-down for user -->   
            </ul>
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
</header>      

<!-- start body -->

<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/calendar.jpg" class="aboutImage">
                <a href="./fullcalendar.php"><h2> Events Calendar</h2></a>
                <p>looking for free events occurrence, or create an event for everyone can join!</p>
            </div>
            <div class="col-md-6">
                <img src="images/selflearning2.jpg"class="aboutImage">
                <a href="./compSci.php"><h2>Text Book</h2></a>
                <p>looking for all the free text book, and we can help you share some!</p>
            </div>
            <div class="col-md-6">
                <img src="images/discussion2.jpg" class="aboutImage">
                <a href="./forum.php"><h2>Discussion Board</h2></a>
                <p>Looking for the answer? or any question need to be answer? We got it! </p>
            </div>
            <div class="col-md-6">
                <img src="images/connecting2.jpg" class="aboutImage">
                <h2>Conncecting with teacher</h2>
                <p>We can online connecting between student with professor/volunteer/tutor </p>
            </div>
        
        </div>
    </div> 
      
</div>      
      
<!-- Create Carousel -->     
      
      <!-- assign the container for carousel -->
      <div id="promise" class="container-fuild">
          <div class="carousel slide " id="myCarousel" data-ride="carousel" >
                <!--list of carousel-->
                <ol class="carousel-indicators">
                    <li data-target="myCarousel" data-slide-to="0" class="active">
                    </li>
                    <li data-target="myCarousel" data-slide-to="1">
                    </li>
                </ol>
              
              <!--list of images showing -->
              <div class="carousel-inner">
                  <div class="item active">
                      <img src="images/classroom.jpg">
                      <div class="carousel-caption">
                          <h2> Engaging lectures with professor by online connection.
                          </h2>
                      </div>
                  </div> 
                  <div class="item">
                      <img src="images/education space.jpg">
                      <div class="carousel-caption">
                          <h2>Learning on your own schedule
                          </h2>
                      </div>
                  </div>
                  
                  
                  <!--control previous and next slice -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"> </span>
                      <span class="sr-only">Previous </span>
                  
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"> </span>
                      <span class="sr-only">next </span>
                  
                  </a>
                  <a>
                  
                  </a>
              </div>
              
          </div>
      
      </div>
      


        
<!-- Footer --> 
<div class="footer" style="padding-top: 10%;max-width: 100%;width: auto;">
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
                <p class="p-small">Copyright &copy; 2023" < link here! > Cinv Academy "-All rights reseverd</p>
            </div>
        </div>
    </div>
</div>
           
        
</body>
</html>