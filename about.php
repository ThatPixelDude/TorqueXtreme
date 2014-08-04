<?php
	session_start();
	
	require 'mysqlCon.inc.php';
	
	require 'midSignedInCheck.inc.php';
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
	
		<title>About | Torque Xtreme</title>

		<meta name="description" content="Your question's title cannot be empty." />
		
		<script src="jquery.js"></script>
		
		<meta name="keywords" content="automobiles, bikes, motorcycles, cars, parts, automotive, questions, answers, reviews" />
		
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

		<link rel="icon" href="favicon.png" type="image/x-icon" />
		
		<style type="text/css">
			@font-face
			{
				font-family:'Armata';
				src:url('armata.otf');
			}

			@font-face
			{
				font-family:'Yukari';
				src:url('yukari.ttf');
			}

			*
			{
				margin:0px;
				padding:0px;
			}

			html, body
			{
				min-height:100%;
				min-width:100%;
				position:absolute;
			}

			body
			{
				background-color:#ffffff;
				background-image:url('whiteGrid.png');
			}

			#topStripe
			{
				width:100%;
				position:absolute;
				top:0px;
				height:50px;
				background-color:#2b2b2b;
				z-index:1;
			}

			#bottomStripe
			{
				width:100%;
				position:absolute;
				bottom:0px;
				height:5px;
				background-color:#c92828;
			}

			#nav
			{
				width:960px;
				display:block;
				margin:auto;
				height:50px;
				z-index:10;
				position:relative;
			}

			#logo
			{
				width:200px;
				float:left;
				padding:5px;
				background-color:#f2f2f2;
				border:10px solid #2b2b2b;
				background-image:url('whiteGrid.png');
			}

			#navLinks
			{
				float:right;
				margin-top:10px;
			}

			#navLinks a
			{
				color:#f2f2f2;
				margin:25px;
				font-family:Yukari;
				text-decoration:none;
				font-size:20px;
			}

			#navLinks a span
			{
				color:#c92828;
			}

			#container
			{
				width:960px;
				display:block;
				margin:auto;
				margin-top:85px;
			}

			#right
			{
				width:740px;
				float:right;
				padding:10px;
				padding-top:0px;
			}

			#left
			{
				width:180px;
				float:left;
				padding:10px;
				padding-top:0px;
				line-height:50px;
			}

			#left p
			{
				font-family:Yukari;
				width:150px;
				text-align:center;
				display:block;
				margin:auto;
				background-color:#2b2b2b;
				margin-top:25px;
				margin-bottom:25px;
				font-size:20px;
			}

			#left p a
			{
				text-decoration:none;
				color:#f2f2f2;
			}
			
			#footer
			{
				text-align:center;
				font-family:Armata;
				font-size:12px;
				opacity:0.5;
				position:absolute;
				bottom:10px;
				width:100%;
			}

			#footer a
			{
				text-decoration:none;
				color:black;
			}

			#heading
			{
				font-family:Armata; 
				color:#c92828; 
				font-size:30px; 
			}

			#right p
			{
				font-family:Armata; 
				text-align:justify;
				line-height:23px;
				word-spacing:5px;
			}
		</style>
	</head>
	
	<body>
		<div id="topStripe"></div>
		
		<div id="bottomStripe"></div>
		
		<div id="nav">
			<a href="home.php"><img id="logo" src="logoSmall.png" /></a>
			
			<div id="navLinks">
				<a href="questions.php">Questions</a>
				
				<a href="reviews.php">Reviews</a>
				
				<?php if(isset($_SESSION['id'])): ?>
					<a href="user.php?id=<?php echo $_SESSION['id']; ?>">Account</a>
					
					<a href="signOut.php">Sign Out</a>
				<?php endif; ?>
			</div>
		</div>
		
		<div id="container">
			<div id="right">
				<br /><br />
				<p id="heading">About:</p> <br /> <br />

				<p>Torque Xtreme is a platform built exclusively for all the automotive enthusiasts to able to come together and discuss topics that they are interested in. It is still in development and work is being done consistently to make it better and better.</p>
				
				<br />

				<p>Our goal is to help build a healthy community which can be a source of knowledge for anyone seeking something automotive-related and also where people can write reviews and share their thoughts to help others in making better purchases.</p>
			</div>
			
			<div id="left">
				
			</div>

			<div style="clear:both;"></div> <br /><br />
		</div>
		
		<script type="text/javascript">
			$('#navLinks a, #left p a').hover(function() {
				$(this).css('color','#c92828');
			}, function() {
				$(this).css('color','#f2f2f2');
			});
		</script>

		<div id="footer">
			<p>&copy; Torque Xtreme 2014 &nbsp;&nbsp; | &nbsp;&nbsp; <a href="about.php">About</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="contact.php">Contact</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="sitemap.xml">Sitemap</a></p>
		</div>
	</body>
</html>