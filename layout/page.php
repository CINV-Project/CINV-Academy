<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo isset($page_title) ? $page_title : 'Welcome to CINV Academy' ?>
  </title>
  <link href="/static/css/bootstrap.min.css" rel="stylesheet">
  <link href="/static/css/Styling.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Vollkorn+SC&display=swap" rel="stylesheet">


  <style>

  </style>
  <!--  Create Navigation bar-->
</head>

<body>
  <?php include 'chunks/navbar.php' ?>

  <!-- Boostrap template -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
  <script src="/static/js/bootstrap.min.js">
  </script>

  <!-- Preact entrypoint -->
  <script src="/static/js/frontend_build.js" defer></script>
  <script>
    new EventSource('/esbuild').addEventListener('change', () => location.reload())
  </script>
  
  <!-- input bacground image-->
  <style>
    body {
      background-image: url('/static/images/background2%20(1).jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>

  <?php echo isset($body_content) ? $body_content : '' ?>

  <?php include 'chunks/footer.php' ?>
</body>

</html>