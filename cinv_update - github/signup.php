<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">
    <link href="Styling.css" rel="stylesheet">

<!-- Boostrap template -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>

          
 <!-- input bacground image-->    
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
    <!--  Create Navigation bar-->
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
            <a href="contact.form">
              Contract Us
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
            <a href="login.php" > 
                <input class="btn btn-success" type="button" value="Login" >
            </a>
            <a href="signup.php">
            <input class="btn btn-success" type="button" value="Sign Up">
            </a>
            
        </form>
      </div>
  </div>
  </nav>

<!--Sign up form-->
<div id="sign-up">
		<form style="background-color: transparent;
		font-family: 'Vollkorn', serif;
		padding-top: 10%;
		padding-left: 40%;
		max-width: 100%;
		width: auto;" 
		method="post" onsubmit="myaction.collect_data(event, 'signup')">
			<div class="col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">
				
				<div class="h2">Signup</div>
				
				<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
				<input name="firstname" type="text" class="form-control p-3" placeholder="First name" >
				</div>
				<div><small class="js-error js-error-firstname text-danger"></small></div>

				<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-person-square"></i></span>
				<input name="lastname" type="text" class="form-control p-3" placeholder="Last name" >
				</div>
				<div><small class="js-error js-error-lastname text-danger"></small></div>

				<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
				<select class="form-select" name="idGroup">
					<option selected value="">--Select Identify As--</option>
					<option value="Student">Student</option>
					<option value="Teacher">Teacher</option>
				</select>
				</div>
				<div><small class="js-error js-error-idGroup text-danger"></small></div>
				
				<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
				<input name="email" type="text" class="form-control p-3" placeholder="Email" >
				</div>
				<div><small class="js-error js-error-email text-danger"></small></div>
				
				<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
				<input name="password" type="password" class="form-control p-3" placeholder="Password" >
				</div>
				<div><small class="js-error js-error-password text-danger"></small></div>

				<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
				<input name="retype_password" type="password" class="form-control p-3" placeholder="Retype Password" >
				</div>

				<div class="progress mt-3 d-none">
				<div class="progress-bar" role="progressbar" style="width: 50%;" >Working... 25%</div>
				</div>

				<button class="mt-3 btn btn-primary col-12">Signup</button>
				<div class="m-2">
					Already have an account? <a href="login.php">login here</a>
				</div>

				</div>
		</form>
</div>	
</body>
</html>

<script>
	
	var myaction  = 
	{
		collect_data: function(e, data_type)
		{
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select");
			let myform = new FormData();
			myform.append('data_type',data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			myaction.send_data(myform);
		},

		send_data: function (form)
		{

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			//reset the prog bar
			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{
						//all good
						myaction.handle_result(ajax.responseText);
					}else{
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function(e){

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			});

			ajax.open('post','ajax.php', true);
			ajax.send(form);
		},

		handle_result: function (result)
		{
			console.log(result);
			var obj = JSON.parse(result);
			if(obj.success)
			{
				alert("Profile created successfully");
				window.location.href = 'login.php';
			}else{

				//show errors
				let error_inputs = document.querySelectorAll(".js-error");

				//empty all errors
				for (var i = 0; i < error_inputs.length; i++) {
					error_inputs[i].innerHTML = "";
				}

				//display errors
				for(key in obj.errors)
				{
					document.querySelector(".js-error-"+key).innerHTML = obj.errors[key];
				}
			}
		}
	};

</script>
