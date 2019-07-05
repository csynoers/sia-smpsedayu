<?php
    require_once('../../config/db.php');
    session_start();
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Informasi Forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Nested Media Objects</h2>
  <p>Media objects can also be nested (a media object inside a media object):</p><br>
  <div class="media">
    <div class="media-left">
      <img src="https://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object" style="width:45px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      
      <!-- Nested media object -->
      <div class="media">
        <div class="media-left">
          <img src="https://www.w3schools.com/bootstrap/img_avatar2.png" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">John Doe <small><i>Posted on February 20, 2016</i></small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

          <!-- Nested media object -->
          <div class="media">
            <div class="media-left">
              <img src="https://www.w3schools.com/bootstrap/img_avatar3.png" class="media-object" style="width:45px">
            </div>
            <div class="media-body">
              <h4 class="media-heading">John Doe <small><i>Posted on February 21, 2016</i></small></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          
        </div>
        
        <!-- Nested media object -->
        <div class="media">
          <div class="media-left">
            <img src="https://www.w3schools.com/bootstrap/img_avatar4.png" class="media-object" style="width:45px">
          </div>
          <div class="media-body">
            <h4 class="media-heading">Jane Doe <small><i>Posted on February 20, 2016</i></small></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        
      </div>
    </div>
    
    <!-- Nested media object -->    
    <div class="media">
      <div class="media-left">
        <img src="https://www.w3schools.com/bootstrap/img_avatar5.png" class="media-object" style="width:45px">
      </div>
      <div class="media-body">
        <h4 class="media-heading">Jane Doe <small><i>Posted on February 19, 2016</i></small></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>

  </div>
</div>

</body>
</html>

