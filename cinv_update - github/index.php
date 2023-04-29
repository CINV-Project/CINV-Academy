<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      MainPage
    </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="Styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">
      

<!-- Boostrap template -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
<script src="js/bootstrap.min.js"></script>
  <script src="javascript.js"></script>

          
 <!-- input bacground image-->    
<style>
body {
  /* background-image: url('images/background2%20(1).jpg'); */
  background-image: url('images/plainBackground.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>  

    <!--  Create Navigation bar-->
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
            <a href="#about">
              About
            </a>
          </li>
          <li>
            <a href="#promise">
              Our Promise
            </a>
          </li>
          <!-- <li>
              <a class="dropdown-toggle" type="button" data-toggle="dropdown">Department
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Computer Science</a></li>
                <li><a href="#">English</a></li>
                <li><a href="#">Math</a></li>
            </ul>
          </li> -->
            <li>
            <a href="contactform.php">
              Contact Us
            </a>
          </li>
        </ul>
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
        
        <form class="navbar-form navbar-right">
          >
            <a href="login.php"> 
                <input class="btn btn-success" type="button" value="Login" >
            </a>
            <a href="signup.php">
            <input class="btn btn-success" type="button" value="Sign Up">
            </a>
            
        </form>
      </div>
  </div>
  </nav>
     
<!-- Create Home section -->
<div class="jumbotron" id="home">
    <div class="container">
        <h1>CINV ACADEMY</h1>
        <!-- <h2> Cinv Academy is narrowing the online learning environment, by making it more interactive and accessible!</h2> -->
        <h2> CINV Academy makes online learning easier with a focus on interactivity and accessibility!</h2>
         <p>  <a class="btn btn-lg" href="signup.php"> Join Us Now! </a>
            <!-- <button type="button" class="btn" data-target="signup.php"> 
        Join Us Now!
      </button>-->
        </p> 
    </div>
      
</div>

      
      
<!-- Create Section Showing course detail -->   
      
      
<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/calendar.jpg" class="aboutImage">
                <h2>Calendar</h2>
                <p>See upcoming meetings or schedule appointments!</p>
            </div>
            <div class="col-md-6">
                <img src="images/selflearning2.jpg"class="aboutImage">
                <h2>Self Learning</h2>
                <p>Learn at your own pace in your own way!</p>
            </div>
            <div class="col-md-6">
                <img src="images/discussion2.jpg" class="aboutImage">
                <h2>Discussion board</h2>
                <p>Chat with students and professors to ask and answer questions!</p>
            </div>
            <div class="col-md-6">
                <img src="images/connecting2.jpg" class="aboutImage">
                <h2>Connect with a professor</h2>
                <p>Connect online with a professor for one-on-one learning!</p>
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
                          <h2> Engaging lectures with professors by an online connection.
                          </h2>
                      </div>
                  </div> 
                  <div class="item">
                      <img src="images/education space.jpg">
                      <div class="carousel-caption">
                          <h2>Learn on your own schedule
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
                      <span class="sr-only"> Next </span>
                  
                  </a>
                  <a>
                  
                  </a>
              </div>
              
          </div>
      
      </div>
      
<!-- footer -->
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
                <p class="p-small"> "Copyright 2023" CINV Academy "-All rights reseverd" 
                </p>
                <!-- note: we don't actually have a copyright... -->
            </div>
        </div>
    </div>
</div>  

            
      

    
  </body>
</html>