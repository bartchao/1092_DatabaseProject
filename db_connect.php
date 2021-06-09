<?php
     header("Content-Type:text/html; charset=utf-8");
     $serverName="DESKTOP-HCC7QEG\SQLEXPRESS";
     $connectionInfo=array("Database"=>"RECEIPT_408530045","UID"=>"Fred","PWD"=>"fred","CharacterSet" => "UTF-8");
     $conn=sqlsrv_connect($serverName,$connectionInfo);
         if($conn){
             //echo "Success!!!<br />";
         }else{
             echo "Error!!!<br />";
             die(print_r(sqlsrv_errors(),true));
         }            
?>