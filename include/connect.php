<?php
	$host="localhost:3307";
	$db_user="root";
	$db_pass="";
	$db_connect = "sge_tusolutionweb";
	//connecting to the mysql server
	//$connect = mysqli_connect($host,$db_user,$db_pass);
	$connect = new mysqli($host, $db_user, $db_pass, $db_connect);
	//checking whether the connection is successful or not
	//if($connect){
		//connection successful so now connecting to database
	//	$db_connect=mysqli_select_db($db_name);
		//again checking whether the db is selected or not
	//	if($db_connect){
			
	//	}
			
	//}
	//else{
	//	echo "Sorry connection error";
	//	die();
	//}
	if ($connect->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $connect->connect_errno . ") " . $connect->connect_error;
	}

	echo $connect->host_info . "\n";
?>