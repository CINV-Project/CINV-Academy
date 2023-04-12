<!--contactform.php-->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      Contactform
    </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="Styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">
      

<!-- Boostrap template -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="javascript.js"></script>

        <style>
            h1{
                color:deepskyblue;   
            }
            .contactForm{
                border:1px solid #7c73f6;
                margin-top: 50px;
                border-radius: 15px;
            }
            @media only screen and (max-width:768px){
                body{
                    background-image: url('images/background2%20(1).jpg') center center fixed;
                    background-size: auto;
                    }
            }
        </style>
    </head>
<body>
 
    
    <!-- background image -->
<style>
body {
  background-image: url('images/background2%20(1).jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
    
    
    <!--  Create Navigation bar-->
  <body>
    <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
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
            <a href="index.php">
            <span class="glyphicon glyphicon-home"> </span> Home</a>
          </li>
            <li>
            <a href="index.php">
              About
            </a>
          </li>
          <li>
            <a href="index.php">
              Our Promise
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
            <a href="login.html" > 
                <input class="btn btn-success" type="button" value="Login" >
            </a>
            <a href="#">
            <input class="btn btn-success" type="button" value="Sign Up">
            </a>
            
        </form>
      </div>
  </div>
  </nav>

<!-- end of navigation bar -->
    
    
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Contact us:</h1>
            
<!--Function of form -->            
<?php

//Get user input
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

//error messages
$missingName = '<p><strong>Please enter your name!</strong></p>'; 
$missingEmail = '<p><strong>Please enter your email address!</strong></p>'; 
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>'; 
$missingMessage = '<p><strong>Please enter a message!</strong></p>'; 

//if the user has submitted the form
if($_POST["submit"]){
    //check for errors
    if(!$name){
        $errors .= $missingName;  
    }else{
        $name = filter_var($name,FILTER_SANITIZE_STRING);   
    }
    if(!$email){
        $errors .= $missingEmail;   
    }else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors .=$invalidEmail;   
        }
    }
    if(!$message){
        $errors .= $missingMessage;
    }else{
        $message = filter_var($message, FILTER_SANITIZE_STRING);   
    }
 
        //if there are any errors
    if($errors){
        //print error message
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';   
    }else{
        $to = "admin@gmail.com"; //to admin email
        $subject = "Contact";
        $message = "
        <p>Name: $name.</p>
        <p>Email: $email.</p>
        <p>Message:</p>
        <p><strong>$message</strong></p> "; 
        $headers = "Content-type: text/html";
        if(mail($to, $subject, $message, $headers)){
           //$resultMessage = '<div class="alert alert-success"> Thanks for your message. We will get back to you as soon as possible!</div>';  
            header("Location: thanksforyourmessage.php");
        }else{
            $resultMessage = '<div class="alert alert-warning">Unable to send Email. Please try again later!</div>';  
        }
    }
    echo $resultMessage;
}
?>
            <!-- Out look of form -->
            <form action="contactform.php" method="post">
                <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo $_POST["name"];?>">
                </div>
                <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $_POST["email"];?>">
                </div>
                <div class="form-group">
                <label for="message">Message:</label>
                    <textarea name="message" id="message" class="form-control" rows="5"><?php echo $_POST["message"];?></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message">
            
            </form>
        </div>
    </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        </body>
</html>
<?php ob_flush(); ?>