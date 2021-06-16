<?php
    include "db_connect.php";
    if(isset($_POST['Submit'])){
        $uniformid = $_POST['uniformid'];
        $taxid = $_POST['taxid'];
        $cname = $_POST['companyname'];
        $pname = $_POST['personname'];
        $date = date("Y-m-d");
        $tel = $_POST['tel'];
        $type = $_POST['type'];
        if($_POST['getname']!=""){
            $getname = $_POST['getname'];
            $gettel = $_POST['gettel'];
            $getid = $_POST['getid'];
            $sql = 'SELECT * FROM [dbo].[Person] WHERE ID = '.$getid;
            $query = sqlsrv_query($conn,$sql);
            if($row=sqlsrv_fetch_array($query)==null)
            {
               //已存在
               $sql = "INSERT INTO [dbo].[Person] (Name,Tel,ID) values('$getname','$gettel','$getid')";
               //echo "<script type='text/javascript'>alert(`".$sql."`)</script>";
               $query = sqlsrv_query($conn,$sql);
              /*  if( $query === false )   */
               /* {  
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
               } */
            }
            $sql = 'SELECT * FROM [dbo].[Company] WHERE UniformID = '.$uniformid;
            if($row=sqlsrv_fetch_array($query)==null)
            {
               //已存在
               $sql = "INSERT INTO [dbo].[Company] (UniformID,TaxID,CompanyName,PersonName,Tel) values('$uniformid','$taxid','$cname','$pname','$tel')";
               //echo "<script type='text/javascript'>alert(`".$sql."`)</script>";
               $query = sqlsrv_query($conn,$sql);
               /* if( $query === false )  
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
               } */
            }
            $sqlpaper = "INSERT INTO [dbo].[Paper] (UniformID,Type,PID,GID,Date,Accept) values ('$uniformid','$type','$getid',NULL,'$date',NULL)";
            $query = sqlsrv_query($conn,$sqlpaper);
            /* if( $query === false )  
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
            } */
        }else if($_POST['officename']!=""){
            $name = $_POST['officename'];
            $id = $_POST['officeid'];
            $tel = $_POST['officetel'];
            $sql = 'SELECT * FROM [dbo].[Office] WHERE ID = '.$id;
            $query = sqlsrv_query($conn,$sql);
            if($row=sqlsrv_fetch_array($query)==null)
            {
               //Not exist
               $sql = "INSERT INTO [dbo].[Office] (Name,ID,Tel) values('$name','$id','$tel')";
                $query = sqlsrv_query($conn,$sql);
                /* if( $query === false )  
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
                } */
            }
            $sql = 'SELECT * FROM [dbo].[Company] WHERE UniformID = '.$uniformid;
            if($row=sqlsrv_fetch_array($query)==null)
            {
               //Not exist
               $sql = "INSERT INTO [dbo].[Company] (UniformID,TaxID,CompanyName,PersonName,Tel) values('$uniformid','$taxid','$cname','$pname','$tel')";
               //echo "<script type='text/javascript'>alert(`".$sql."`)</script>";
               $query = sqlsrv_query($conn,$sql);
               /* if( $query === false )  
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
               } */
            }
            $sqlpaper = "INSERT INTO [dbo].[Paper] (UniformID,Type,PID,GID,Date,Accept)            
            values ('$uniformid','$type',NULL,'$id,'$date',NULL)";
            $query = sqlsrv_query($conn,$sqlpaper);
           /*  if( $query === false )  
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
            } */
        }
        //$sql = "INSERT INTO [dbo].[AcceptPaper] (PaperID,Accept) values ('$ID','$taxid','$cname','$pname','$type','$tel',NULL,'$id','$date')";
        echo "<script type='text/javascript'>alert(`申請成功`)</script>";
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
								<h2>購票證申請</h2>
							</header>

							
  
						</div>
					</section> -->

				<!-- Portfolio -->
					<section id="ticket" class="two">
                        <form method="POST" action="#">
						        <div class="container">
                                    <header>
                                        <h2>購票證申請/修改資料</h2>
                                    </header>
                                    <div class="row">
                                        <div class="col-6 col-12-mobile"><input id="uniformid" placeholder="統一編號" type="text" name="uniformid" size="30" value="" required maxlength="8" /></div>
                                        <div class="col-6 col-12-mobile"><input id="taxid" placeholder="稅籍編號" type="text" name="taxid" size="30" value="" required maxlength="9"/></div>
                                        <div class="col-6 col-12-mobile"><input id="companyname" placeholder="公司名稱" type="text" name="companyname" size="30" value="" required maxlength="50"/></div>
                                        <div class="col-6 col-12-mobile"><input id="personname" placeholder="負責人"type="text" name="personname" size="30" value="" required maxlength="10"/></div>
                                        <div class="col-6 col-12-mobile"><input id="type" type="text" placeholder="領用原因" name="type" size="30" value="" required maxlength="50"/></div>
                                        <div class="col-6 col-12-mobile"><input id="tel" type="text" placeholder="電話 "name="tel" size="30" value="" required maxlength="10"/></div>
                                    </div>
                                </div>
									<!-- <div class="col-6 col-12-mobile"><input id="date" placeholder="申請日期" type="date" name="date" size="30" value="" required maxlength="10"/></div> -->
                                <div class="container">    
                                    <header>
								        <h3>實際領取人</h3>
							        </header>
                                    <div class="row">
                                        <div class="col-6 col-12-mobile"><input id="getname" type="text" placeholder="領取人姓名 "name="getname" size="30" value=""  maxlength="10"/></div>
                                        <div class="col-6 col-12-mobile"><input id="gettel" type="text" placeholder="領取人電話 "name="gettel" size="30" value=""  maxlength="10"/></div>
                                        <div class="col-6 col-12-mobile"><input id="getid" type="text" placeholder="領取人身分證字號 "name="getid" size="30" value=""  maxlength="10"/></div>
                                    </div>
                                </div>
                                <div class="container"> 
                                    <header>
								        <h3>受託事務所</h3>
							        </header>
                                    <div class="row">
                                        <div class="col-6 col-12-mobile"><input id="officename" type="text" placeholder="事務所名稱 "name="officename" size="30" value=""  maxlength="10"/></div>
                                        <div class="col-6 col-12-mobile"><input id="officeid" type="text" placeholder="扣繳編號 "name="officeid" size="30" value=""  maxlength="5"/></div>
                                        <div class="col-6 col-12-mobile"><input id="officetel" type="text" placeholder="事務所電話 "name="officetel" size="30" value=""  maxlength="10"/></div>
                                    </div>
                                    <div class="col-12">
										<input type="submit" value="提交" name="Submit" />
									</div>
                        </form>
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