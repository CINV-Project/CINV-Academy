<?php //defined('APP') or die('direct script access denied!'); ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
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

          
 <!-- input bacground image-->    
<style>
body {
  background-image: url('images/background2%20(1).jpg');
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
          <li>
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
        
            <a href="login.inc.php"> 
                <input class="btn btn-success" type="button" value="Login" >
            </a>
            <a href="signup.inc.php">
            <input class="btn btn-success" type="button" value="Sign Up">
            </a>
            
        </form>
      </div>
  </div>
  </nav>
<!-- end of nav bar -->  

<div class="signup" style="
		font-family: 'Vollkorn', serif;
		padding-top: 10%;
		padding-left: 40%;
		padding-bottom: 5%;
		max-width: 100%;
		width: auto;"> 
	<h1 class="class_27"  >
		Sign Up
	</h1>
	<img src="assets/images/signup.png" style="width: 80px;
	height: 80px;
	object-fit: cover;" >
	<form onsubmit="signup.submit(event)" method="post" class="class_57" >
		<div class="class_30" >
			<div class="class_58" >
				<label class="class_32"  >
					Username:
				</label>
				<input placeholder="Username" type="text" name="username" class="class_33"  required="true">
			</div>
			<div class="class_58" >
				<label class="class_32"  >
					Email:
				</label>
				<input placeholder="Email" type="email" name="email" class="class_33"  required="true">
			</div>
      <!-- <div class="class_58">
      <label class="class_32"  >
					Belong to Group:
			</label>
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
				<select class="form-select" name="groupId">
					<option selected value="">--Select Identify As--</option>
					<option value="Student">Student</option>
					<option value="Teacher">Teacher</option>
				</select>
				</div> -->
			<div class="class_58" >
				<label class="class_32"  >
					Password:
				</label>
				<input placeholder="Password" type="password" name="password" class="class_33" required="true">
			</div>
			<div class="class_58" >
				<label class="class_36"  >
					Retype Password:
				</label>
				<input placeholder="Retype Password" type="password" name="retype_password" class="class_33" required="true">
			</div>
			<div style="padding: 10px;">Already have an account? <a href="login.inc.php">Click here to login!</a></div>
			<div class="class_59" >
				<button class="class_60"  >
					Signup
				</button>
				<div class="class_40" >
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	
	var signup = {
 
		show: function(){
			document.querySelector(".js-signup-modal").classList.remove('hide');
			document.querySelector(".js-login-modal").classList.add('hide');
		},

		hide: function(){
			document.querySelector(".js-signup-modal").classList.add('hide');
		},

		submit: function(e){

			e.preventDefault();
			let inputs = e.currentTarget.querySelectorAll("input");
			let form = new FormData();

			for (var i = inputs.length - 1; i >= 0; i--) {
				form.append(inputs[i].name, inputs[i].value);
			}

			form.append('data_type', 'signup');
			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange',function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200){

						//console.log(ajax.responseText);
						let obj = JSON.parse(ajax.responseText);
						alert(obj.message);

						if(obj.success)
							window.location.herf = 'index.php';
					}else{
						alert("Please check your internet connection");
					}
				}
			});

			ajax.open('post','ajax.inc.php', true);
			ajax.send(form);
		},


	};

</script>