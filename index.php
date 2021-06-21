
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
							<h1 id="title"><a href = "index.php">統一發票<br>購票證</a></h1>
							<p>財政部中區國稅局</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="apply_paper.php">購票證申請</a>
								<li><a href="apply_invoice.php">發票申請</a>
								<li><a href="login.php">管理員登入</a>
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
								<h2>歡迎！</h2>
								<footer>
								<a href="#paper" class="button scrolly">公司登入查詢</a>
								</footer>
							</header>

						</div>
					</section>

				<!-- Portfolio -->
					
					<section id="paper" class="three">
						<div class="container">

							<header>
								<h2>公司登入查詢結果</h2>
							</header>
									<form method="POST" action="company_view.php">
										<div class="row">
											<div class="col-6 col-12-mobile"><input id="uniformid" placeholder="統一編號" type="text" name="uniformid" size="30" value="" required maxlength="8" /></div>
											<div class="col-6 col-12-mobile"><input id="taxid" placeholder="稅籍編號" type="text" name="taxid" size="30" value="" required maxlength="9"/></div>
											<div class="col-12">
												<input type="submit" value="提交" name="Submit" />
											</div>
										</div>
									</form>
						</div>
					</section>


			</div>

			

		<!-- Footer -->
			 <!-- <div id="footer">
					<ul class="copyright">
						<li>&copy; 408530045 趙品清</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
			</div>  -->

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