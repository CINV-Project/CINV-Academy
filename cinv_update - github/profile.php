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


	<div class="text-center p-1"><a href="users.php">All users</a></div>
	<div class="button" style="font:500;padding-top: 5%;
		text-align:center; ">
	<h2> <a class="btn btn-lg" href="users.php"> Search for teacher profiles </a>
	</h2>
	</div>
	<div class="container" style="
		font-family: 'Vollkorn', serif;
		padding-top: 10%;
		padding-left: 30%;
		padding-bottom: 5%;
		max-width: 100%;
		width: auto;
		">
		<?php if(!empty($row)):?>
			<div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
				<div class="col-md-4 text-center">
					<img src="<?=get_image($row['image'])?>" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
					<div>

						<?php if(user('id') == $row['id']):?>

							<a href="profile-edit.php">
								<button class="mx-auto m-1 btn-sm btn btn-primary">Edit</button>
							</a>
							<a href="profile-delete.php">
								<button class="mx-auto m-1 btn-sm btn btn-warning text-white">Delete</button>
							</a>
							<a href="logout.php">
								<button class="mx-auto m-1 btn-sm btn btn-info text-white">Logout</button>
							</a>
						<?php endif;?>
					</div>
				</div>
				<div class="col-md-8">
					<div class="h2">User Profile</div>
					<table class="table table-striped">
						<tr><th colspan="2">User Details:</th></tr>
						<tr><th><i class="bi bi-envelope"></i> Email</th><td><?=esc($row['email'])?></td></tr>
						<tr><th><i class="bi bi-person-circle"></i> First name</th><td><?=esc($row['firstname'])?></td></tr>
						<tr><th><i class="bi bi-person-square"></i> Last name</th><td><?=esc($row['lastname'])?></td></tr>
						<tr><th><i class="bi bi-person"></i> Group</th><td><?=esc($row['idGroup'])?></td></tr>
					</table>
				</div>
			</div>
	</div>
	<?php else:?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif;?>

</body>
</html>