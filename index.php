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
					
					<section id="company" class="three">
						<div class="container">

							<header>
								<h2>購票證審核結果查詢</h2>
							</header>
							<?php
								include "db_connect.php";
								if(isset($_POST['PaperSubmit'])){
									$ID = $_POST['uniformid'];
									$sql = 'SELECT * FROM dbo.Paper WHERE UniformID='.$ID." ORDER BY ID DESC"; 
									//echo "<script type='text/javascript'>alert(`".$sql."`)</script>";
									$query = sqlsrv_query($conn,$sql);
									if(sqlsrv_fetch_array($query)==null){
										echo '<h3>查無資料！</h3>';
										echo '<h4><a href="index.php">回首頁</a></h4>';
									}else{
							?>
										<table>
							            <tr>
								            <td>ID</td>
                                            <td>申請日期</td>
                                            <td>審核結果</td>
                                        </tr>
										<?php
											$sql = 'SELECT * FROM dbo.Paper WHERE UniformID='.$ID." ORDER BY ID DESC"; 
											$query = sqlsrv_query($conn,$sql);
											//echo "<script type='text/javascript'>alert(`".$sql."`)</script>";
											while($row=sqlsrv_fetch_array($query))
											{
												//echo "<script type='text/javascript'>alert(`TEST2`)</script>";
												echo "<tr>";
												echo "<td>".$row['ID']."</td>";
												echo "<td>".$row['Date']->format('Y-m-d')."</td>";
												if($row['Accept']===NULL){
													echo "<td>未審核</td>";
												}else if($row['Accept']===0){
													echo "<td>已拒絕</td>";
												}else if($row['Accept']===1){
													echo "<td>審核通過</td>";
												}
												echo "</tr>";
											}
											echo '<h4><a href="index.php">回首頁</a></h4>';
										?>
								<?php	
									}
								}else{
								?>
									<p></p>
									<form method="POST" action="#">
										<div class="row">
											<div class="col-6 col-12-mobile"><input id="uniformid" placeholder="統一編號" type="text" name="uniformid" size="30" value="" required maxlength="8" /></div>
											<div class="col-6 col-12-mobile"><input id="taxid" placeholder="稅籍編號" type="text" name="taxid" size="30" value="" required maxlength="9"/></div>
											<div class="col-12">
												<input type="submit" value="提交" name="PaperSubmit" />
											</div>
										</div>
									</form>
								<?php
								}?>
								
							
						</div>
					</section>

				<!-- About Me -->
					<!-- <section id="admin" class="four">
						<div class="container">

							<header>
								<h2>管理員登入</h2>
							</header>

							
							<form method="post" action="#">
								<div class="row">
									<div class="col-6 col-12-mobile"><input type="text" name="managername" placeholder="帳號" /></div>
									<div class="col-6 col-12-mobile"><input type="password" name="managerpass" placeholder="密碼" /></div>
									 <div class="col-12">
										<textarea name="message" placeholder="Message"></textarea>
									</div> 
									<div class="col-12">
										<input type="submit" value="登入" name="AdminSubmit"/>
									</div>
								</div>
							</form>

						</div>
					</section> -->

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