<?php
    include "db_connect.php";
	if(isset($_POST['submit'])){
		$ID = $_POST['uniformid'];
		$TaxID = $_POST['taxid'];
		$sql = 'SELECT TOP(1) Accept FROM Paper,Company WHERE Paper.UniformID='.$ID.' AND Company.TaxID='.$TaxID." ORDER BY Paper.ID DESC"; 
		//echo "<script type='text/javascript'>alert(`查無資料！或是審核尚未通過！`)</script>";
		$query = sqlsrv_query($conn,$sql);	
		if($row = sqlsrv_fetch_array($query)){
			//echo "<script type='text/javascript'>alert(".$row['Accept'].")</script>";
			if($row['Accept']==1){
				header("Location:apply_invoice2.php?id=".$ID);
				
			}else if($row['Accept']==0){
				echo "<script type='text/javascript'>alert(`購票證審核未通過`)</script>";
				
			}else if($row['Accept']==NULL){
				echo "<script type='text/javascript'>alert(`請稍後，尚未審核`)</script>";
				
			}
			
		}else{
			echo "<script type='text/javascript'>alert(`查無資料！請先申請購票證`)</script>";
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
					<!-- <section id="top" class="one dark cover">
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
					</section> -->

				<!-- Portfolio -->
					<section id="ticket" class="two">
						<div class="container">

							<header>
								<h2>發票申請/修改資料</h2>
							</header>

							<p></p>
							<form method="POST" action="#">
										<div class="row">
											<div class="col-6 col-12-mobile"><input id="uniformid" placeholder="統一編號" type="text" name="uniformid" size="30" value="" required maxlength="8" /></div>
											<div class="col-6 col-12-mobile"><input id="taxid" placeholder="稅籍編號" type="text" name="taxid" size="30" value="" required maxlength="9"/></div>
											<div class="col-12">
												<input type="submit" value="提交" name="submit" />
											</div>
										</div>
									</form>
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