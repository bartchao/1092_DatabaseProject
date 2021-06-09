<?php
    include "db_connect.php";
	if($_GET['type']=='submit'){
        $id = $_GET['id'];
        $arr=array($_POST["two"],$_POST["three"],$_POST["two_machine"],$_POST["three_machine"]);
        for ( $i=0 ; $i<=3 ; $i++ ) 
        {
            if($arr[$i]==""){
                $arr[$i] = 0;
            }
        }
        $today = date('Y-m-d');
        $sql = "INSERT INTO dbo.Invoice (UniformID,Date,Two,Three,TwoCashier,ThreeCashier) values ('$id','$today','$arr[0]','$arr[1]','$arr[2]','$arr[3]')";
        //echo "<script type='text/javascript'>alert(`".$sql."`)</script>";
        $query = sqlsrv_query($conn,$sql);
        if( $query === false )  
        {  
            if( ($errors = sqlsrv_errors() ) != null)  
            {  
                foreach( $errors as $error)  
                {  
                    echo "SQLSTATE: ".$error[ 'SQLSTATE']."\n";  
                    echo "code: ".$error[ 'code']."\n";  
                    echo "message: ".$error[ 'message']."\n";  
                    echo "<script type='text/javascript'>alert(`System Internal Error`)</script>";
                }  
            }  
        }else{
            echo "<script type='text/javascript'>alert(`已提交申請`)</script>";
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
							<form method="POST" action="apply_invoice2.php?id=<?php echo $_GET['id']?>&type=submit">
                            <h4>公司統一編號：<?php echo $_GET['id']?><br><br></h4>
										<div class="row">
											
                                            <div class="col-6 col-12-mobile"><input id="two" placeholder="二聯式發票" type="number" name="two" size="50" value="" min="0" /></div>
                                            <div class="col-6 col-12-mobile"><input id="three" placeholder="三聯式發票" type="number" name="three" size="50" value="" min="0" ></div>
                                            <div class="col-6 col-12-mobile"><input id="two_machine" placeholder="二聯式收銀機發票" type="number" name="two_machine" size="50" value="" min="0"/></div>
                                            <div class="col-6 col-12-mobile"><input id="three_machine" placeholder="三聯式收銀機發票" type="number" name="three_machine" size="50" value="" min="0" /></div>
                                            <div class="col-12">
												<input type="submit" value="提交" name="submit" />
											</div>
										</div>
									</form>
							</form>
							

						</div>
					

			

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