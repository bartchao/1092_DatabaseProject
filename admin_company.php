
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
								<li><a href="admin_taxpaper.php">購票證審核</a></li>
								<li><a href="admin_invoice.php">發票審核</a></li>
                                <li><a href="admin_company.php">公司資料</a></li>
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
								<h2>公司資料</h2>
								
							</header>

						</div>
					</section>
				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">
						<table>
							<tr>
								<td>統一編號</td>
								<td>稅籍編號</td>
								<td>公司名</td>
								<td>負責人</td>
                                <td>電話</td>
							</tr>
							<?php
								include "db_connect.php";
								$sql = 'SELECT * FROM dbo.Company';
								$query = sqlsrv_query($conn,$sql);
								while($row=sqlsrv_fetch_array($query))
            					{
									echo "<tr>";
									echo "<td><a href=admin_company_detail.php?id=".$row['UniformID'].">".$row['UniformID']."</a></td>";
									echo "<td>".$row['TaxID']."</td>";
									echo "<td>".$row['CompanyName']."</td>";
                                    echo "<td>".$row['PersonName']."</td>";
                                    echo "<td>".$row['Tel']."</td>";
									echo "</tr>";
								}
							?>
							
						</table>
							
							

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
