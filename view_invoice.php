<?php
    include "db_connect.php";
    $id = $_GET['id'];
    if(isset($_POST['accept'])){
        $sql = 'UPDATE dbo.Invoice SET Accept=1 WHERE ID='.$id;
        $query = sqlsrv_query($conn,$sql);
        echo "<script type='text/javascript'>alert(`已儲存`)</script>";
        echo '<meta http-equiv="refresh" content="0;url=admin_invoice.php">';
    }else if(isset($_POST['deny'])){
        $sql = 'UPDATE dbo.Invoice SET Accept=0 WHERE ID='.$id;
        $query = sqlsrv_query($conn,$sql);
        echo "<script type='text/javascript'>alert(`已儲存`)</script>";
        echo '<meta http-equiv="refresh" content="0;url=admin_invoice.php">';
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
								<li><a href="admin_taxpaper.php">購票證審核</a></li>
								<li><a href="admin_invoice.php">發票審核</a></li>
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
					</section>
 -->
				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">
							<?php
								include "db_connect.php";
                                $id = $_GET['id'];
								$sql = 'SELECT * FROM dbo.Invoice WHERE ID ='.$id;
								$query = sqlsrv_query($conn,$sql);
								while($row=sqlsrv_fetch_array($query))
            					{
									echo "<h4>ID：".$row['ID']."</h4>";
                                    echo "<h4>統一編號：".$row['UniformID']."</h4>";
                                    echo "<h4>申請日期：".$row['Date']->format('Y-m-d')."</h4>";
                                    echo "<h4>二聯式發票：".$row['Two']."</h4>";
                                    echo "<h4>三聯式發票：".$row['Three']."</h4>";
                                    echo "<h4>二聯式收銀機發票：".$row['TwoCashier']."</h4>";
                                    echo "<h4>三聯式收銀機發票：".$row['ThreeCashier']."</h4>";
                                    if($row['Accept']===NULL){
										echo "<h4>狀態：未審核</h4>";
									}else if($row['Accept']===0){
										echo "<h4>狀態：已拒絕</h4>";
									}else if($row['Accept']===1){
										echo "<h4>狀態：已接受</h4>";
									}
								}
							?>
                            <form method="post" action="#">
								<div class="row">
									<div class="col-12">
										<input type="submit" value="接受" name="accept"/>
                                        <input type="submit" value="拒絕" name="deny"/>
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
