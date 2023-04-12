
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
            <li class="active">
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
            <li >
            <a href="profile.php">
              Profile
            </a>
          </li>
        </ul>
   
<!-- drop-down for user -->       
    <form class="navbar-form navbar-right">
            <a class="btn btn-success" type="button" data-toggle="dropdown"> Hello, <?php echo $_SESSION["PROFILE"]['firstname']; ?>
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
                     