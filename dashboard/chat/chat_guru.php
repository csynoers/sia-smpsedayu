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
    <section class="post-new-forum">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Post New Forum</div>
                <div class="panel-body">
                    <form method="POST" action="simpan_pesan.php">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['noinduk'] ?>">
                        <div class="form-group">
                            <textarea rows="5" name="post" class="form-control" placeholder="Isi Pesan Disini ..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end /.post-new-forum -->

    <section class="forums-content">
        <div class="container">
            <?php
            function query_result($conn, $sql)
            {
                $sql = "SELECT * FROM forums";
                $result = mysqli_query($conn, $sql);
                return [
                    'fetch_assoc' => mysqli_fetch_assoc($result),
                    'num_rows' => mysqli_num_rows( $result ),
                ];
            }
            echo '<pre>';
            print_r( query_result( $conn= $connect, $sql="SELECT * FROM forums" ) );
            echo '</pre>';
            ?>
        </div>
    </section>
    <!-- end /.forums-content -->

<div class="container">
  <h2>Dynamic Tabs</h2>
  <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

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

