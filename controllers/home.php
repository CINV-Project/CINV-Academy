<div class="tw-max-w-[1000px] tw-m-auto tw-p-[16px]">
  <?php flash_message()->display(); ?>
</div>
<!-- Create Home section -->
<div class="jumbotron" id="home">
  <div class="container">
    <h1>CINV ACADEMY</h1>
    <h2> Cinv Academy is narrowing the online learning environment, by making it more interactive and accessible!</h2>
    <p> <a class="btn" href="#"> Join Us Now! </a> </p>
  </div>

</div>

<!-- Create Section Showing course detail -->


<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="/static/images/note2.jpg" class="aboutImage">
        <h2>Taking Notes</h2>
        <p>We can take notes and save it here!</p>
      </div>
      <div class="col-md-6">
        <img src="/static/images/selflearning2.jpg" class="aboutImage">
        <h2>Self Learning</h2>
        <p>Some introduction of self learning</p>
      </div>
      <div class="col-md-6">
        <img src="/static/images/discussion2.jpg" class="aboutImage">
        <h2>Discussion board</h2>
        <p>Something about discussion board</p>
      </div>
      <div class="col-md-6">
        <img src="/static/images/connecting2.jpg" class="aboutImage">
        <h2>Connecting with people</h2>
        <p>We can online connecting between student with professor/volunteer/tutor </p>
      </div>

    </div>
  </div>

</div>

<!-- Create Carousel -->

<!-- assign the container for carousel -->
<div id="promise" class="container-fuild">
  <div class="carousel slide " id="myCarousel" data-ride="carousel">
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
        <img src="/static/images/classroom.jpg">
        <div class="carousel-caption">
          <h2> Engaging lectures with professor by online connection.
          </h2>
        </div>
      </div>
      <div class="item">
        <img src="/static/images/education space.jpg">
        <div class="carousel-caption">
          <h2>Self learning
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
        <span class="sr-only">next </span>

      </a>
      <a>

      </a>
    </div>

  </div>

</div>