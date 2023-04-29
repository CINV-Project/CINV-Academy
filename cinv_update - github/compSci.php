<?php 

	require 'functions.php';

    require 'dbConfig.php';
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
      CINV Academy
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


<!--Start of Page -->

<?php
$sql = $db->query("Select * from subject where subject='compSci'");

echo "<table>";
echo "<tr><th>Textbook Name</th><th>Link</th></tr>";

while($row = mysqli_fetch_array($sql)){
    echo "<tr><td>";
    echo $row['textbookName'];
    echo "</td><td>";
    echo $row['textbookLink'];
    echo "</td></tr>";
}
echo "</table>";
?>
<style>
      table {
        border-collapse: separate;
        border-spacing: 0 15px;
      }
      th {
        background-color: #4287f5;
        color: white;
      }
      th,
      td {
        width: 150px;
        text-align: center;
        border: 1px solid black;
        padding: 5px;
      }
      h2 {
        color: #4287f5;
      }
    </style>

    <!--Add a textbook -->

<div class="wrapper">
    <form class="form-signin">       
      <h2 class="form-signin-heading">Please Fill in the form to Assign Materials</h2>
      Textbook Name: <input type="text" name="textbookName">
      <br>
      Textbook Link: <input type="text" name="textbookLink">    
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>   
    </form>
  </div>
  <style>
body {
	background: #eee !important;	
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}
</style>
<?php
if(isset($_GET["textbookName"])){
    $textbookName = $_GET["textbookName"];
    $textbookLink = $_GET["textbookLink"];
}
if(isset($textbookName)){
    $sql = "INSERT INTO subject VALUES ('compSci', '$textbookName', '$textbookLink')";


    if($db->query($sql) == TRUE){
        echo "Success";
        header("refresh:1; url=student.php");
    }else{
        echo "Failed";
    }
}
?>

</body>
</html>