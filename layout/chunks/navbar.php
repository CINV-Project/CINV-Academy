<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a data-native class="navbar-brand" href="#home">
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
          <a data-native href="<?= base_path("") ?>#home">
            <span class="glyphicon glyphicon-home"> </span> Home</a>
        </li>
        <li>
          <a data-native href="<?= base_path("") ?>#about">
            About
          </a>
        </li>
        <li>
          <a data-native href="<?= base_path("") ?>#promise">
            Our Promise
          </a>
        </li>
        <li>
          <a data-native class="dropdown-toggle" type="button" data-toggle="dropdown">Department
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a data-native href="#">Computer Science</a></li>
            <li><a data-native href="#">English</a></li>
            <li><a data-native href="#">Math</a></li>
          </ul>
        </li>
        <li>
          <a data-native href="<?= base_path("contact") ?>">
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
      <?php if (is_logged_in()) : ?>
        <?php include_once __DIR__ . '/user_dropdown.php' ?>
      <?php else : ?>
        <form class="navbar-form navbar-right">
          <a data-native href="<?= base_path("login") ?>">
            <input class="btn btn-success" type="button" value="Login or Signup">
          </a>
        </form>
      <?php endif ?>
    </div>
  </div>
</nav>
<style>
  body {
    padding-top: 56px;
  }
</style>