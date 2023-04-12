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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
          <li >
            <a href="#home">
            <span class="glyphicon glyphicon-home"> </span> Home</a>
          </li>
            <li>
            <a href="./fullcalendar.php">
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
                <li><a href="#">Computer Science</a></li>
                <li><a href="#">English</a></li>
                <li><a href="#">Math</a></li>
            </ul>
          </li>
            <li class="active">
            <a href="profile.php">
              Profile
            </a>
          </li>
        </ul>
   
<!-- drop-down for user -->       
    <form class="navbar-form navbar-right">
            <a class="btn btn-success" type="button" data-toggle="dropdown">Hello <?php echo $_SESSION["PROFILE"]['firstname'];?>
                <span class="caret"></span></a>
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

	<?php if(!empty($row)):?>
	
		<div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg" 
		style="font-family: 'Vollkorn', serif;
		padding-top: 10%;
		padding-left: 30%;
		padding-bottom: 5%;
		max-width: 100%;
		width: auto;
		">
			<div class="col-md-4 text-center">
				<img src="<?=get_image($row['image'])?>" class="js-image img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
				<div>
					<div class="mb-3">
					  <label for="formFile" class="form-label">Click below to select an image</label>
					  <input onchange="display_image(this.files[0])" class="js-image-input form-control" type="file" id="formFile">
					</div>
					<div><small class="js-error js-error-image text-danger"></small></div>
				</div>
			</div>
			<div class="col-md-8">
				
				<div class="h2">Edit Profile</div>

				<form method="post" onsubmit="myaction.collect_data(event, 'profile-edit')">
					<table class="table table-striped">
						<tr><th colspan="2">User Details:</th></tr>
						<tr><th><i class="bi bi-envelope"></i> Email</th>
							<td>
								<input value="<?=$row['email']?>" type="text" class="form-control" name="email" placeholder="Email">
								<div><small class="js-error js-error-email text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="bi bi-person-circle"></i> First name</th>
							<td>
								<input value="<?=$row['firstname']?>" type="text" class="form-control" name="firstname" placeholder="First name">
								<div><small class="js-error js-error-firstname text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="bi bi-person-square"></i> Last name</th>
							<td>
								<input value="<?=$row['lastname']?>" type="text" class="form-control" name="lastname" placeholder="Last name">
								<div><small class="js-error js-error-lastname text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="bi bi-person"></i> Identify As</th>
							<td>
								<select name="idGroup" class="form-select form-select mb-3" aria-label=".form-select-lg example">
								  <option value="">--Select Group--</option>
								  <option selected value="<?=$row['idGroup']?>"><?=$row['idGroup']?></option>
								  <option value="Student">Student</option>
								  <option value="Teacher">Teacher</option>
								</select>
								<div><small class="js-error js-error-idGroup text-danger"></small></div>
							</td>
						</tr>
						
						<tr><th><i class="bi bi-key"></i> Password</th>
							<td>
								<input type="password" class="form-control" name="password" placeholder="Password (leave empty to keep old password)">
								<div><small class="js-error js-error-password text-danger"></small></div>
							</td>
						</tr>
						<tr><th><i class="bi bi-key-fill"></i> Retype Password</th>
							<td>
								<input type="password" class="form-control" name="retype_password" placeholder="Retype Password">
							</td>
						</tr>

					</table>

					<div class="progress my-3 d-none">
					  <div class="progress-bar" role="progressbar" style="width: 50%;" >Working... 25%</div>
					</div>

					<div class="p-2">
						
						<button class="btn btn-primary float-end">Save</button>
						
						<a href="profile.php">
							<label class="btn btn-secondary">Back</label>
						</a>

					</div>
				</form>

			</div>
		</div>

	<?php else:?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="profile.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif;?>

</body>
</html>

<script>

	var image_added = false;

	function display_image(file)
	{
		var img = document.querySelector(".js-image");
		img.src = URL.createObjectURL(file);

		image_added = true;
	}
 
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

			if(image_added)
			{
				myform.append('image',document.querySelector('.js-image-input').files[0]);
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
				alert("Profile edited successfully");
				window.location.reload();
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
