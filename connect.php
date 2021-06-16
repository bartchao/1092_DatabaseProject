<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
        #include "db_connect.php";
		
			$username=$_POST['managername'];
			$password=$_POST['managerpass'];
			if($username=='admin'){
				if($password=='admin'){
					echo "<script type='text/javascript'>登入成功!點我跳轉!</script>";
					//echo '<h3><a href="manager.php">登入成功!點我跳轉!</a></h3>';
				}else{
					echo "<script type='text/javascript'>alert(`密碼錯誤!!`);</script>";
					//echo '<h3><a href="login.php">密碼錯誤!點我跳轉!</a></h3>';
				}
			}else{
				echo "<script type='text/javascript'>No this username</script>";
			}
		

       

       
    

?>