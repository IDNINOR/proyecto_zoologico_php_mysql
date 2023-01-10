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
    $emp->editarUsuario($_POST['id'],$_POST['username'],$_POST['pass'],$_POST['respuesta1'],
    $_POST['respuesta2']);
    exit();
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
    <title>GESTION DE USUARIOS</title>
  </head>
  <body onload="limpiar();">

  <div class="container "align="center">
   <div class="card">
       <div class="card-header bg-info">
           <h3 class="text-white">ACTUALIZACION DE USUARIOS</h3>
       </div> 
   </div> 
<div class="card-body">
       <div class="row">
           <div class="col-md-3">
               <form name="form" action="editarusuario.php" method="post">
                   <input type="hidden" name="grabar" value="si">
                   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            </div>
            
             
            </div>
           
                  <br>

                <div class="col-md-6" align="left"> 
                  <label for='username'>USUARIO:</label>
                <input type="text" id="username" name="username" class="form-control"  value="<?php echo $reg[0]['usuario'];?>">
                </div>
                <br>

                <div class="col-md-6" align="left"> 
                <label for='pass'>PASSWORD:</label>
                  <div class="form-row-2">
                      
                  <input type="password" id="pass" name="pass" class="form-control"  value="<?php echo $reg[0]['clave'];?>">
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarContrasena()">Mostrar contraseña</input>
                  </div>
                    </div>
                    </p>
                </div>

                <br>
                

                <br></br>
                    <div class="col-md-6"> 
                    <div class="card-header bg-dark">
           <h3 class="text-white" align="center">Preguntas de seguridad</h3>
       </div> 
       
                  
                </div>
                <br>
                <div class="col-md-6" align="left"> 
           <h4 class="text-white" align="left">¿Cual es tu Heroe de la infancia?</h4>
           <label for='respuesta1'>RESPUESTA 2:</label>
                  <div class="form-row-2">
                      
                    <input class="form-control" type="password" name="respuesta1" id="respuesta1"   value="<?php echo $reg[0]['respuesta1'];?>">
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarRespuesta1()">Mostrar Respuesta 1</input>
                  </div>
                    </div>
                    </p>
                </div>


                <br></br>
                
                <div class="col-md-6" align="left"> 
           <h4 class="text-white" align="left">¿Cual es tu comida favorita?</h4>
           <label for='respuesta1'>RESPUESTA 2:</label>
                  <div class="form-row-2">
                      
                    <input class="form-control" type="password" name="respuesta2" id="respuesta2"   value="<?php echo $reg[0]['respuesta2'];?>">
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarRespuesta2()">Mostrar Respuesta 2</input>
                  </div>
                    </div>
                    </p>
                </div>
                
                    
                <div class="col-md-6"> 
                  <br></br>
                </div>
                <input type="submit" value="EDITAR" class="btn btn-success" title="Editar">
                  </div>
                  <div class="col-md-6"> 
                  <br></br>
                </div>
                  <div class="col-md-6"> 
                    <input type="reset-btn-lg" value="Volver" class="btn btn-info btn-lg"onclick="window.location='usuarioinsert.php'" >
                  </div>
                  <div class="col-md-6"> 
                  <br></br>
                </div>
                </div>                
                  </div>
                  </form>


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./jquery/jquery-3.6.0.min.js"></script>

    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>