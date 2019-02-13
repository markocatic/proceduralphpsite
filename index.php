


<!--
Promeni logo
Namesti one page
Vidi sta ces sa more
Namesti galeriju lepo
Textove preuredi
Namesti authora
Contact
Games zavrsi
Probaj search
Dodaj icon
Meta tagove

-->
<?php
@session_start();
ob_start();
include 'konekcija.inc';


//if(@$_SESSION['id_uloge']=='1') {
//	echo "Dobro je";
//}
 //else {
	// echo "Nije dobor";
 //}


	 



?>

<!DOCTYPE HTML>
<html>
<head>



	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<!--<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">-->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script src="js/js.js"></script>



<title>Gamez Bootstarp Website Template | Home </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/jQuery.lightninBox.css" rel='stylesheet' type='text/css' />
<link href="css/service.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="vote.js"></script>
<script type="text/javascript">
$(function () {

	var filterList = {

		init: function () {

			// MixItUp plugin
			// http://mixitup.io
			$('#portfoliolist').mixitup({
				targetSelector: '.portfolio',
				filterSelector: '.filter',
				effects: ['fade'],
				easing: 'snap',
				// call the hover effect
				onMixEnd: filterList.hoverEffect()
			});

		},

		hoverEffect: function () {

			// Simple parallax effect
			$('#portfoliolist .portfolio').hover(
				function () {
					$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
					$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
				},
				function () {
					$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
					$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
				}
			);

		}

	};

	// Run the show!
	filterList.init();


});
</script>
</head>
<body>
<?php if(@$_SESSION['id_uloga']=='1'){
    include 'header1.php';
} ?>
<?php if(@$_SESSION['id_uloga']=='2'){
    include 'header2.php';
} ?>
<?php if(@$_SESSION['id_uloga']==''){ include 'header.php';} ?>

<div id="wrapper">
	<?php
    $stranica = @$_GET['ime_linka'];
    	switch ($stranica) {
            case 'home': include('home.php');
                        break;

           case 'games': include('games.php');
                        break;

            case 'author': include('author.php');
						break;

            case 'login': include('login.php');
						break;

            case 'register': include('register.php');
						break;
            case 'logout':include('logout.php');
                        break;
            case 'users' :include('users.php');
                        break;
            case 'contact' :include('contact.php');
                        break;
            case 'surveyadmin' :include('surveyadmin.php');
                        break;
            case 'navigacija': include ('navigacija.php');
                        break;
            case 'poruke': include ('poruke.php');
                        break;
            case 'images': include ('images.php');
                        break;
            default: include('home.php');
                        break;
    }
    ?>
</div>

<!-- What New Part starts Here -->
<div class="what-new">
	<div class="container">
		<h3>What's new</h3>
		<div class="blog-news">
			<div class="blog-news-grid">
				<div class="news-grid-left">
					<h4>26</h4>
					<small>of January 2018</small>
				</div>
				<div class="news-grid-right">
					<h4>Monster Hunter: World</h4>
					<p>Monster Hunter: World is an upcoming action role-playing video game in development and to be published by Capcom, and is the sixth primary title in their Monster Hunter franchise. </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="blog-news-grid b_n_g">
				<div class="news-grid-left">
					<h4>23</h4>
					<small>of March 2018</small>
				</div>
				<div class="news-grid-right">
					<h4>A Way Out</h4>
					<p>A Way Out is an upcoming action-adventure video game being developed by Hazelight and published by Electronic Arts under their EA Originals program. </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="blog-news b_n">
			<div class="blog-news-grid">
				<div class="news-grid-left">
					<h4>08</h4>
					<small>of February 2018</small>
				</div>
				<div class="news-grid-right">
					<h4>Dynasty Warriors 9</h4>
					<p>Dynasty Warriors 9 is an upcoming hack and slash video game in development by Omega Force and to be published by Koei Tecmo for PlayStation 4. </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="blog-news-grid b_n_g">
				<div class="news-grid-left">
					<h4>27</h4>
					<small>of March 2018</small>
				</div>
				<div class="news-grid-right">
					<h4>Far Cry 5</h4>
					<p>Far Cry 5 is an upcoming action-adventure first-person shooter video game developed by Ubisoft Montreal for PlayStation 4 and Xbox One. </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- What New Part Endss Here -->
<!-- Footer Starts Here -->
<div class="footer">
	<div class="container">
		<ul class="social">
			<li><i class="fa"></i></li>
			<li><i class="fb"></i></li>
			<li><i class="fc"></i></li>
		</ul>
		<p>2014 Design by <a href="http://w3layouts.com">W3layouts</a></p>
		<p><a href="dokumentacija.pdf">Documentation</a></p>
	</div>

</div>
<!-- Footer Ends Here -->
</body>
</html>
<?php mysqli_close($konekcija); ?>
