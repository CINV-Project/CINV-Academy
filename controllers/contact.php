<div class="container-fluid">
  <div class="row">
    <div class="col-sm-offset-1 col-sm-10 contactForm">
      <h1>Contact us:</h1>

      <!--Function of form -->
      <?php

      //error messages
      $missingName = '<p><strong>Please enter your name!</strong></p>';
      $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
      $invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
      $missingMessage = '<p><strong>Please enter a message!</strong></p>';

      //if the user has submitted the form
      if (array_key_exists("submit", $_POST)) {

        //Get user input
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $errors = '';
        //check for errors
        if (!$name) {
          $errors .= $missingName;
        } else {
          $name = htmlspecialchars($name);
        }
        if (!$email) {
          $errors .= $missingEmail;
        } else {
          $email = filter_var($email, FILTER_SANITIZE_EMAIL);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= $invalidEmail;
          }
        }
        if (!$message) {
          $errors .= $missingMessage;
        } else {
          $message = htmlspecialchars($message);
        }

        //if there are any errors
        if ($errors) {
          //print error message
          $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        } else {
          $to = "nhatst9@gmail.com"; //to admin email
          $subject = "Contact";
          $message = "
        <p>Name: $name.</p>
        <p>Email: $email.</p>
        <p>Message:</p>
        <p><strong>$message</strong></p>";
          $headers = "Content-type: text/html";
          if (mail($to, $subject, $message, $headers)) {
            $resultMessage = '<div class="alert alert-success">Thanks for your message. We will get back to you as soon as possible!</div>';
          } else {
            $resultMessage = '<div class="alert alert-warning">Unable to send Email. Please try again later!</div>';
          }
        }
        echo $resultMessage;
      }
      ?>
      <!-- Out look of form -->
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo array_key_exists("name", $_POST) ? $_POST["name"] : ''; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo array_key_exists("email", $_POST) ? $_POST["email"] : ''; ?>">
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea name="message" id="message" class="form-control" rows="5"><?php echo array_key_exists("message", $_POST) ? $_POST["message"] : ''; ?></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message">

      </form>
    </div>
  </div>
</div>