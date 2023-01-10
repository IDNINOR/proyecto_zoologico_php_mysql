<?php
session_start();
include('class/class.php');
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

$db =  Conectar::con();
$query=$db->query("select * from zoo");
$zoo = array();
$n=0;
?>

<!doctype html>
<html lang="es">
  <head>
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
    <link href="https://bootswatch.com/4/superhero/bootstrap.css" rel="stylesheet" />	
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="js/jspdf.plugin.autotable.min.js"></script>
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
      body {
        background-image: url("img/atardecer.jpg");
        width: 109%;
        height: 120%;
        }
	</style>


    <title>ZOOLÓGICOS</title>
  </head>


  <body >

<hr>

<?php
    //crear el objeto de la clase Especie
    $emp=new Especie;
    $reg=$emp->verusuario_especie();
    
?>

<div class="card-footer">
   <table class="table table-striped">
     <thead>
       <tr>
         <th>NOMBRE CIENTIFICO</th>
         <th>ESTADO EXTINCIÓN</th>
         <th>NOMBRE VULGAR</th>
         <th>ZOOLÓGICO</th>
         
       </tr>
     </thead>

     <?php
     
//traer los datos de la funcion ver_especie
   for($i=0;$i<count($reg);$i++){
     echo "<tr>
     <td>".$reg[$i]['nombre_cientifico']."</td>
     <td>".$reg[$i]['estado_extincion']."</td>
     <td>".$reg[$i]['nombre_vulgar']."</td>
     <td>".$reg[$i]['nombre']."</td>
     
     ";
     
   }
 ?>
  </tr>
      </table>
      </div>

<div class="col-md-9">
    <input type="reset-btn-lg" value="Volver" class="btn btn-info btn-lg"onclick="window.location='usuariohome.php?id'" > 
    </div>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./jquery/jquery-3.6.0.min.js"></script>

    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>