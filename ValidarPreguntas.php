
<?php

include('class/class.php');


if($_SERVER["REQUEST_METHOD"]=="POST")
{

	$respuesta1=$_POST['respuesta1'];
    $respuesta2=$_POST['respuesta2'];
	$id2=$_POST['newid'];
	
	


	$sql = "SELECT * FROM usuarios WHERE respuesta1='$respuesta1'AND respuesta2='$respuesta2' AND codigo=$id2";

	$result=mysqli_query(Conectar::con(),$sql);

	if($row=mysqli_fetch_array($result)){
   
	/*if(($row["respuesta1"]==$respuesta1)&&($row["respuesta2"]==$respuesta2))
	{	*/

		//echo "trajo a ".$id2; 
		$row['id2'];
		//header("location:adminhome.php?id=$row[id]".$enco);
		header("location:RestablecerClave.php?id=$id2");
		//echo "<input  type='text' name='newid' value = '".$_REQUEST['id']."'readonly>";
	}



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
          window.location='ValidarPreguntas.php?id=$id2';
        }
   });
   </script>";
	}

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
 background-image: url("img/olvidoclave.jpg");
 width: 109%;
 height: 120%;
}
	
	</style>
	

<body>
<br><br>
<center>
<div class="card" style="width: 50rem;">
       <div class="card-header bg-info">
         
           <h1 class="text-white">Recuperacion de contraseña</h1>
       </div> 
   </div> 
	<div >
		<br><br>


		<form name="form" action="ValidarPreguntas.php" method="POST">
		
		<?php

  
$id3=$_REQUEST['id'];
echo "<div class='col-md-4' align='left'> 
                  <label for='username'>ID USUARIO:</label>
                  <input  type='text' name='newid' class='form-control' value = '".$id3."' readonly>
                
                  </div>";
        
  
				?>
 
 

            <div class="col-md-4" align="left"> 
           <h4 class="text-white" align="left">¿Cual es tu Heroe de la infancia?</h4>
           <label for='respuesta1'>RESPUESTA 1:</label>
                  <div class="form-row-2">
                      
                    <input class="form-control" type="password" name="respuesta1" id="respuesta1"  placeholder="Digite la respuesta 1" required>
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarRespuesta1()">Mostrar Respuesta 1</input>
                  </div>
                    </div>
                    </p>
                </div>
                <br></br>
                <div class="col-md-4" align="left"> 
           <h4 class="text-white" align="left">¿Cual es tu comida favorita?</h4>
           <label for='respuesta1'>RESPUESTA 2:</label>
                  <div class="form-row-2">
                      
                    <input class="form-control" type="password" name="respuesta2" id="respuesta2"  placeholder="Digite la respuesta 2" required>
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarRespuesta2()">Mostrar Respuesta 2</input>
                  </div>
                    </div>
                    </p>
                </div>
	<br><br>

	
	<br><br>

	<div>
	<br>
		<input type="submit"  value="Verificar"  class="btn btn-success btn-lg" readonly="readonly">
	</div>
  <br>
  <div> 
  <a href="index.php" class="w-10 btn btn-lg btn-primary" style="background-color: red;" type="submit">Volver</a>
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
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>
</html>