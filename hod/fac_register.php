
<?php
session_start();

include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	
	   $check_did = $_SESSION["did"];
		if($check_did !=2){
			 header("location:../index.php");
		}
	}
	
$msg ="";
$ids="";
$name="";
if((isset($_POST["fname"])) && (isset($_POST["fid"])) &&(isset($_POST["pass"])) ){
	$fnames = $_POST["fname"];
	$userid = $_POST["fid"];
	$deg =$_POST["desg"];
	$password = $_POST["pass"];
	//for faculty
	if($deg ==1){
	//retrive 
 	
	$sql = mysqli_query($connect,"select userId,fname from user where did='1' and fname='$fnames' ");
	//retriving id to check
	while($row = mysqli_fetch_array($sql)){
			$ids = $row["userId"];
			$name = $row["fname"];
		}
	 if(($fnames == $name) || ($userid == $ids)){
		$msg = "<div align='center'> <font color='red'>Usuario ya está registrado</font></div>";
		
	 }else{
	// echo "hi";
		//not yet registered so register new faculty with new id and password
		$insert = mysqli_query($connect,"INSERT INTO user (userId,fname,password,did) VALUES ('$userid','$fnames','$password','1') ");
		if($insert){
			$msg = "<div align='center'> <font color='green'>Registro exitoso</font></div>";
		}
	}
	}
	else if($deg==3){
	//retrive 
 	
	$sql = mysqli_query($connect,"select userId,fname from user where did='3' and fname='$fnames' ");
	//retriving id to check
	while($row = mysqli_fetch_array($sql)){
			$ids = $row["userId"];
			$name = $row["fname"];
		}
	 if(($fnames == $name) || ($userid == $ids)){
		$msg = "<div align='center'> <font color='red'>Usuario ya está registrado</font></div>";
		
	 }else{
	// echo "hi";
		//not yet registered so register new faculty with new id and password
		$insert = mysqli_query($connect,"INSERT INTO user (userId,fname,password,did) VALUES ('$userid','$fnames','$password','3') ");
		if($insert){
			$msg = "<div align='center'> <font color='green'>Resgistro exitoso</font></div>";
		}
	}
	}
			
} 


?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
			Sistema de gestión académica
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">SGEWeb<small>&nbsp;&nbsp;</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="fac_register.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registro de la facultad </h3></caption>
			<tbody>
				<th class="danger" colspan="3">	Registro				
				</th>
			
				<tr>
					<td class="active" colspan="2">	
						<input type="text" name="fname" class="form-control" placeholder="NOMBRE" />
					</td>
						<td class="active" colspan="2">	
						<select name="desg" class="form-control">
							<option value=""> SELECCIONE PERMISO</option>
							<option value="1">Facultad</option>
							<option value="3">Principal</option>
						</select>
					</td>
					
					
				</tr>
				<tr>
					<td class="danger" colspan="3">Registrarse en la Facultad	</td>
				</tr>
				<tr>
					<!-- Textbox for faculty signup -->
					<td class="active"><input type="text" name="fid" class="form-control" placeholder="ID DE LA FACULTAD" />	</td>
					<td class="active" colspan="2">	<input type="password" name="pass" class="form-control" placeholder="CONTRASEÑA" /></td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Registro">	
								
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		</div>
	</body>
</html>