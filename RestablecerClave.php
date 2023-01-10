<?php

include("./class/class.php");

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
          window.location='RestablecerClave.php?id=$id2';
        }
   });
   </script>";

  }else{

    $emp->modificarClave($_POST['pass'],$_POST['newid2']);
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
    <title>GESTION DE USUARIOS</title>
  </head>
  <body>
  <br><br>

<center>

  <div class="container">
   <div class="card" style="width: 30rem;">
       <div class="card-header bg-info">
         
           <h3 class="text-white">Restablecer Contraseña</h3>
       </div> 
   </div> 
<div class="card-body">
     
           <div>
               <form name="form" action="RestablecerClave.php" method="post">
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
                  
                </div>

                <br>

	
	

                  <div class="col-md-6"> 
                    <input type="submit" value="Cambiar Contraseña" class="btn btn-success" title="Editar">
                  </div>
                  <br>
                  <div>
                  <a href="index.php" class="w-10 btn btn-lg btn-primary" style="background-color: red;" type="submit">Volver</a>
                  </div>
                  </form>
</center>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./jquery/jquery-3.6.0.min.js"></script>

    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    
  </body>
</html>