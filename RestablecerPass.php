<?php
session_start();
include('class/class.php');
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{

	$clave=$_POST['pass'];
	$id2=$_POST['newid2'];
	
	
$sql="select * from login where usuario=$usario";
$result=mysqli_query(Conectar::con(),$sql);

if($row=mysqli_fetch_array($result)){
    $sql="UPDATE login SET password='$clave' where id=$id2";
	//$sql = "SELECT * FROM login WHERE respuesta1='$respuesta1'AND respuesta2='$respuesta2' AND id=$id2";

	$result=mysqli_query(Conectar::con(),$sql);

	if($row=mysqli_fetch_array($result)){

  

	if($row["pass"]==$clave)
	{	

		echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito!',
    text:'La contraseña se ha cambiado con exito',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='login.php';
        }
   });
   </script>";
	}
}else{

  echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'ERROR!',
    text:'El usuario no existe',
    icon : 'error',
   }).then((result)=>{
        if(result.value){
          window.location='login.php';
        }
   });
   </script>";
}	
	
}
	


/*
	else
	{
		//echo "username or password incorrect";

		echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Error!',
    text:'Las respuestas no coinciden',
    icon : 'error',
   }).then((result)=>{
        if(result.value){
          window.location='RestablecerClave.php?id=$id2';
        }
   });
   </script>";
	}
*/
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
	

<body>

<center>
<br>
	<h1>Recuperacion de contraseña</h1>
	<br><br><br><br>
	<div >
		<br><br>


		<form name="form" action="RestablecerClave.php" method="POST">
		
		<?php
		
$id3=$_REQUEST['id'];
echo "<div class='col-md-9' align='center'> 
                  <label for='username'>NUM ID:</label>
                  <input  type='text' name='newid2' class='form-control' value = '".$id3."' readonly>
                </div>";

  
				?>
 
 

	    
                   
                <br></br>
                <div class="col-md-9" align="left"> 
           <h4 class="text-white" align="left">Por favor ingrese la nueva contraseña</h4>
       
                </div>
                <div class="col-md-9" align="left"> 
                  <label for='pass'>PASSWORD:</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Digite la contraseña">
                </div>
	<br><br>

	
	<br><br>

	<div>
	<br>
		<input type="submit"  value="Verificar"  class="btn btn-success btn-lg" readonly="readonly">
	</div>
	<br><br>
	<div>
	<br>
	<br>
	</div>
    
	</form>


	<br><br>
 </div>
</center>
 <!-- Optional JavaScript; choose one of the two! -->
 <script src="./jquery/jquery-3.6.0.min.js"></script>

<script src="./sw/dist/sweetalert2.all.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<!-- <script src="./bootstrap/js/bootstrap.min.js"></script> -->

</body>
</html>