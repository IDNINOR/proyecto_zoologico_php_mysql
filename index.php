

<?php


include('class/class.php');


session_start();






if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["usuario"];
	$password=$_POST["clave"];
	//$id=$_POST["id"];

	$sql="select * from usuarios where usuario='".$username."' AND clave='".$password."' ";

	$result=mysqli_query(Conectar::con(),$sql);

	if($row=mysqli_fetch_array($result)){

	
	
		//$sql2="SELECT id from login where username ='$username'";
		$_SESSION["tipo_usuario"]=$username;
        
		$row["codigo"];
		header("location:usuariohome.php?id=$row[codigo]");

		if($row["tipo_usuario"]=="administrador"){
	{
		
		$_SESSION["tipo_usuario"]=$username;
		
		$enco=base64_encode(generateRandomString(15));
	//echo "<input  type='text' name='newid' value = '".$id."'readonly>";+
	$row["codigo"];
		header("location:adminhome.php?id=$row[codigo]");
	}
	}
}

	else
	{
		//echo "username or password incorrect";

		echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Error!',
    text:'El usuario es incorrecto',
    icon : 'error',
   }).then((result)=>{
        if(result.value){
          window.location='index.php';
        }
   });
   </script>";
	}

}

function generateRandomString($length = 15) { 
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
} 


?>









<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
<link href="https://bootswatch.com/4/superhero/bootstrap.css" rel="stylesheet" />	
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" language="javascript" href="./bootstrap/css/bootstrap.min.css">

    <!--sweetalert-->
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
  <!-- script JS-->
  <script type="text/javascript" language="javascript" src="js/funciones.js"></script>

  <!--ICONOS Google Materials-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	  <style>
body {
 background-image: url("img/zool.jpg");
 width: 109%;
 height: 120%;
}
	
	</style>

<body>

<center>
<br>
	<h1>Bienvenido al sistema de Zoologicos</h1>
	<h1>Grupo UD</h1>
	<br><br>
	<h3>Inicio de sesión</h3>
	
	<div >
		


		<form name="form" action=<?php echo "index.php?=".base64_encode(generateRandomString(15))?> method="POST">

	<div class="col-md-4" align="left">
		<label>USUARIO</label>
		<input type="text" name="usuario" class="form-control" required>
	</div>
	<br>

	<div class="col-md-4" align="left">
		<label>CONTRASEÑA</label>
		<input type="password" name="clave" class="form-control" required>
	</div>
	<br>

	<div>
	<br>
		<input type="submit"  value="Ingresar"  class="btn btn-success btn-lg" readonly="readonly">
	</div>
	<br><br>
	<div>
	<br>
	<br>
	</div>
    <p>
	No estas registrado?
		  <?php 
		 $regi="Registrese aqui"; 
		  echo "<a href=registrousuarios.php?=".base64_encode(generateRandomString(15))."> ".$regi."</a>";?>

  	</p>
	  Olvidaste tu contraseña?
		  <?php 
		 $clave="Restablece tu contraseña"; 
		  echo "<a href=OlvidoClave.php?=".base64_encode(generateRandomString(15))."> ".$clave."</a>";?>

  	</p>
	</form>


	<br><br>
 </div>
</center>
 <!-- Optional JavaScript; choose one of the two! -->
 <script src="./jquery/jquery-3.6.0.min.js"></script>

<script src="./sw/dist/sweetalert2.all.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>
</html>