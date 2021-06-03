<?php
        #include "db_connect.php";
			if(isset($_POST['AdminSubmit'])){
				$username=$_POST['managername'];
				$password=$_POST['managerpass'];
				if($username=='admin'){
					if($password=='admin'){
						echo "<script type='text/javascript'>alert(`登入成功!點我跳轉!`)</script>";
						echo '<meta http-equiv=REFRESH CONTENT=0;url=admin.php>';
						//echo '<h3><a href="manager.php">登入成功!點我跳轉!</a></h3>';
					}else{
						echo "<script type='text/javascript'>alert(`密碼錯誤!!`);</script>";
						echo '<meta http-equiv=REFRESH CONTENT=0;url=#>';
						//echo '<h3><a href="login.php">密碼錯誤!點我跳轉!</a></h3>';
					}
				}else{
					echo "<script type='text/javascript'>No this username</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=#>';
				}
			}

?>
<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>財政部中區國稅局</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/logo.jpeg" alt="" /></span>
							<h1 id="title">統一發票<br>購票證</h1>
							<p>財政部中區國稅局</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								
								
							</ul>
						</nav>

				</div>

				

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Hi! I'm <strong>Prologue</strong>, a <a href="http://html5up.net/license">free</a> responsive<br />
								site template designed by <a href="http://html5up.net">HTML5 UP</a>.</h2>
								<p>Ligula scelerisque justo sem accumsan diam quis<br />
								vitae natoque dictum sollicitudin elementum.</p>
							</header>

							<footer>
								<a href="#company" class="button scrolly">Magna Aliquam</a>
							</footer>

						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

							<header>
								<h2>公司登入</h2>
							</header>

							<p></p>
							<form method="POST" action="#">
								<div class="row">
									<div class="col-6 col-12-mobile"><input type="text" name="username" placeholder="公司統一編號" required /></div>
									<div class="col-6 col-12-mobile"><input type="password" name="password" placeholder="密碼" /></div>
									<div class="col-12">
										<input type="submit" value="登入" />
									</div>
								</div>
							</form>
							

						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>管理員登入</h2>
							</header>

							
							<form method="post" action="#">
								<div class="row">
									<div class="col-6 col-12-mobile"><input type="text" name="managername" placeholder="帳號" /></div>
									<div class="col-6 col-12-mobile"><input type="password" name="managerpass" placeholder="密碼" /></div>
									<!-- <div class="col-12">
										<textarea name="message" placeholder="Message"></textarea>
									</div> -->
									<div class="col-12">
										<input type="submit" value="登入" name="AdminSubmit"/>
									</div>
								</div>
							</form>

						</div>
					</section>

			

			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; 408530045 趙品清</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>