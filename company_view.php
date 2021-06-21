<?php
    include "db_connect.php";
    if(isset($_POST['Submit'])){
        $UID = $_POST['uniformid'];
        $TID = $_POST['taxid'];
        $sql = 'SELECT * FROM dbo.Company WHERE UniformID='.$UID." AND TaxID=".$TID; 
        echo "<script type='text/javascript'>alert(`".$sql."`)</script>";
        $query = sqlsrv_query($conn,$sql);
        if(sqlsrv_fetch_array($query)==null){
            echo "<script type='text/javascript'>alert(`身分驗證錯誤!`)</script>";
            echo "<script type='text/javascript'>window.location.replace('index.php')</script>";
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
					<section id="paper" class="three">
						<div class="container">
							<header>
								<h2>購票證審核結果查詢</h2>
							</header>
							<?php
                                include "db_connect.php";
                                $sql = 'SELECT * FROM dbo.Paper WHERE UniformID='.$UID." ORDER BY ID DESC"; 
                                $query = sqlsrv_query($conn,$sql);
                                $row = sqlsrv_fetch_array($query);
                                if($row==null){
                                    echo '<h3>查無資料！</h3>';
                                    
                                }else{
							?>
									<table>
							        <tr>
								        <td>ID</td>
                                        <td>申請日期</td>
                                        <td>審核結果</td>
                                    </tr>
									<?php
									 $sql = 'SELECT * FROM dbo.Paper WHERE UniformID='.$UID." ORDER BY ID DESC"; 
									 $query = sqlsrv_query($conn,$sql);
										while($row = sqlsrv_fetch_array($query))
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
                                }
    }
                            ?>
                                    </table>
                        </div>
					</section>
                    <section id="invoice" class="two">
					    <div class="container">
                            <header>
                                <h2>發票審核結果查詢</h2>
                            </header>
                            <?php
                                $sql = 'SELECT * FROM dbo.Invoice WHERE UniformID='.$UID." ORDER BY ID DESC"; 
                                $query = sqlsrv_query($conn,$sql);
                                $row=sqlsrv_fetch_array($query);
                                if($row==null){
                                    echo '<h3>查無資料！</h3>';                                      
                                }else{
                            ?>
                            <table>
						        <tr>
						            <td>ID</td>
                                    <td>申請日期</td>
									<td>申請內容</td>
                                    <td>審核結果</td>
                                </tr>
                            <?php                                 
								$sql = 'SELECT * FROM dbo.Invoice WHERE UniformID='.$UID." ORDER BY ID DESC"; 
                                $query = sqlsrv_query($conn,$sql);
                                    while($row = sqlsrv_fetch_array($query))
                                    {
                                                //echo "<script type='text/javascript'>alert(`TEST2`)</script>";
                                        echo "<tr>";
                                        echo "<td>".$row['ID']."</td>";
                                        echo "<td>".$row['Date']->format('Y-m-d')."</td>";
                                        echo "<td>二聯式:".$row['Two']."<br>三聯式:".$row['Three']."<br>二聯式收銀機:".$row['TwoCashier']."<br>三聯式收銀機:".$row['ThreeCashier']."</td>";
                                        if($row['Accept']===NULL){
                                            echo "<td>未審核</td>";
                                        }else if($row['Accept']===0){
                                            echo "<td>已拒絕</td>";
                                        }else if($row['Accept']===1){
                                            echo "<td>審核通過</td>";
                                        }
                                            echo "</tr>";
                                    }
                                        
                                }                    
    
						
								?>
							</table>
                        </div>
                    </section>
                    <section id="home" class="four">
						<div class="container">

							
								<footer>
								<a href="index.php" class="button scrolly">首頁</a>
								</footer>


						</div>
					</section>

			</div>

			


			 <div id="footer">
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