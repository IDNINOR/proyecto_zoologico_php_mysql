<?php
session_start();
include("./class/class.php");
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

//creacion de l objeto
$emp=new Usuario();

if(isset($_POST['grabar']) && $_POST['grabar']=="si"){
  $id2=$_POST['newid2'];
  if ($_POST['pass'] != $_POST['confirm'])
  {
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Error!',
    text:'Las claves no coinciden',
    icon : 'error',
   }).then((result)=>{
        if(result.value){
          window.location='editaradmin.php?id=$id2';
        }
   });
   </script>";

  }else{

    $emp->editarAdmin($_POST['pass'],$_POST['newid2'],$_POST['respuesta1'],$_POST['respuesta2']);
    exit();

  }



}
$reg=$emp->usu_id($_GET['id']);
?>
<!doctype html>
<html lang="es">
  <head>
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

	
	</style>
    <title>GESTION DE USUARIOS</title>
  </head>
  <body>
  <br><br>

<center>

  <div class="container">
   <div class="card" style="width: 30rem;">
       <div class="card-header bg-info">
         
           <h3 class="text-white">Editar datos</h3>
       </div> 
   </div> 
<div class="card-body">
     
           <div>
               <form name="form" action="editarAdmin.php" method="post">
                   <input type="hidden" name="grabar" value="si">
                  

                   <?php
		
        $id3=$_REQUEST['id'];
        echo "<div class='col-md-4' align='left'> 
                          <label for='username'>ID USUARIO:</label>
                          <input  type='text' name='newid2' class='form-control' value = '".$id3."' readonly>
                        </div>";
        
          
                        ?>
            </div>
            <br>

            <div class="col-md-4" align="left"> 
                  <label for='username'>USUARIO:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo $reg[0]['usuario'];?>">
                </div>
                <br>

            <div class="col-md-4" align="left"> 
                <label for='pass'>Contraseña:</label>
                  <div class="form-row-2">
                      
                  <input type="password" id="pass" name="pass" class="form-control" value="<?php echo $reg[0]['clave'];?>" required>
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarContrasena()">Mostrar contraseña</input>
                  </div>
                    </div>
                    </p>
                </div>

                <div class="col-md-4" align="left"> 
                <label for='pass'>Confirmar contraseña:</label>
                  <div class="form-row-2">
                      
                  <input type="password" id="confirm" name="confirm" class="form-control"  value="" required> 
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarConclave()">Mostrar contraseña confirmada</input>
                  </div>
                    </div>
                    </p>
                </div>
                <div class="col-md-4"> 
                    <div class="card-header bg-dark">
           <h3 class="text-white" align="center">Preguntas de seguridad</h3>
       </div> 
       
                  
                </div>
                <br>
                <div class="col-md-4" align="left"> 
           <h4 class="text-white" align="left">¿Cual es tu Heroe de la infancia?</h4>
           <label for='respuesta1'>RESPUESTA 2:</label>
                  <div class="form-row-2">
                      
                    <input class="form-control" type="password" name="respuesta1" id="respuesta1" value="<?php echo $reg[0]['respuesta1'];?>">
                  
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
                      
                    <input class="form-control" type="password" name="respuesta2" id="respuesta2"  value="<?php echo $reg[0]['respuesta2'];?>">
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarRespuesta2()">Mostrar Respuesta 2</input>
                  </div>
                    </div>
                    </p>
                </div>
               
                

                
                
                <div class="col-md-4"> 
                  
                </div>

                <br>

	
	

                  <div class="col-md-6"> 
                    <input type="submit" value="Actualizar" class="btn btn-success" title="Editar">
                  </div>
                  </form>
</center>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./jquery/jquery-3.6.0.min.js"></script>

    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>