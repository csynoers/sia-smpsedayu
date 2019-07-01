<?php 

session_start();
require_once 'config/db.php';
require_once 'layout/header.php'; 

?>
<!-- begin intro section -->
<section class="intro" id="intro">

<!-- begin intro-slider -->
<div class="intro-slider">

<!-- begin single slide -->
<div class="item one">

<div class="container">

<div class="row">

<div class="col-md-12">												
	
	<?php 
		if (!isset($_SESSION['username'])) {
	?>
	
	<h2>Sistem pembelajaran E-leaning</h2><br>
	<h3>SMP N 1 Sedayu</h3>
	<ul class="list-inline" style="padding-top:30px; ">
		<li>
			<a href="signIn" class="btn btn-custom">
				<i class="fa fa-user"></i>
				Silahkan Masuk!
			</a>
		</li>
	</ul>
	<?php
		}else {
	?>
	<h1>
		<?php echo "{$_SESSION['nama']}"; ?> | <a href="logout.php"><i class="fa fa-power-off"></i></a>
	</h1>
	<ul class="list-inline">
		<li>
			<h3>
				<a href="dashboard/" class="btn btn-send">
					<i class="fa fa-window"></i>
					Dashboard!
				</a>									
			</h3>
		</li>
	</ul>
	<?php
		}
	?>

</div>
</div>
</div>
</div>
<!-- end single slide -->
</div>
<!-- end intro slider -->

</section>


<section class="extra" id="extra">
<div class="container">

<div class="row">
<div class="col-md-12 tabs">

<?php 
if (!isset($_SESSION['username'])) {
?>
<!-- begin download section -->
<section class="download" id="signIn">
<div class="container">

<div class="row">
<div class="col-md-12">
<div class="section-head wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
<h1>Sign In !</h1>
<span class="underline"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<form method="POST" action="login.php" role="form">
	<div class="form-group">
		<input type="text" name="username" style="height:60px;width:100%;font-size:20px;color:#000;"
		 class="video form-control" placeholder="Please Enter Username" required>
	</div>
	<div class="form-group">
		<input type="password" name="password" style="height:60px;width:100%;font-size:20px;color:#000;"
		 class="video form-control" placeholder="Please Enter Password" required>
	</div>
	<div class="form-group">
		<button type="submit" name="signin" style="width:100%;font-size:20px;" class="btn btn-custume">Sign In</button>
	</div>
</form>
</div>
<div class="col-sm-3"></div>
</div>
</div>

</div>
</section>
<!-- end download section -->
<?php
}
?>

<?php require_once'layout/footer.php'; ?>