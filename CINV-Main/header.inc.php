<?php
include "header.php";
?>

<header class="class_2" >
	<!-- <div class="class_3" >
		<img src="assets/images/slack.png" class="class_4" >
	</div> -->


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


	<div class="class_9" style="display:flex;align-items: center;justify-content: center;"  >
		<?php if(logged_in()):?>
			<a href="profile.php">
				<img src="<?= get_image($_SESSION['USER']['image'])?>" class="class_10" >
			</a>
			<a href="profile.php">
				<span>Hi, <?= $_SESSION['USER']['username']?></span>
			</a>
		<?php else:?>
			<span style="cursor:pointer;" onclick="login.show()">Login</span>
		<?php endif;?>

	</div>
</header>
<script>
	
	var user = {

		logout: function(){

			let form = new FormData();
			form.append('data_type', 'logout');
			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange',function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200){
						let obj = JSON.parse(ajax.responseText);
						alert(obj.message);

						window.location.href = "index.php";
					}else{
						alert("Please check your internet connection");
					}
				}
			});

			ajax.open('post','ajax.inc.php', true);
			ajax.send(form);
		}
	};
</script>
