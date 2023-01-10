<?php
session_start();
include("./class/class.php");
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

//creacion de l objeto
$zo=new Zoo();

if(isset($_POST['grabar']) && $_POST['grabar']=="si"){
  $zo->editar_zoo($_POST['id'],$_POST['nombre'],$_POST['tam'],$_POST['pres_an']);
  exit();
}
$reg=$zo->zoo_id($_GET['id']);
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
    <title>GESTION DE Zoologicos</title>
  </head>
  <body onload="limpiarz();">
  
  <div class="container "align="center">
   <div class="card">
       <div class="card-header bg-info">
           <h3 class="text-white">ACTUALIZACION DE ZOOLÓGICOS</h3>
       </div> 
   </div> 
    <div class="card-body">
       <div class="row">
           <div class="col-md-3">
               <form name="form2" action="editarzoo.php" method="post">
                   <input type="hidden" name="grabar" value="si">
                   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            </div>   
        </div>
           
                  <br>

                  <div class="col-md-9" align="left"> 
                  <label for="nombre">NOMBRE:</label>
                  <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Digite el Nombre del zoológico" value="<?php echo $reg[0]['nombre'];?>">
            </div>
                
            <br>
                
            <div class="col-md-9" align="left"> 
                  <label for="tam">TAMAÑO:</label>
                  <input type="number" id="tam" name="tam" class="form-control" placeholder="Digite el Tamaño del zoológico en KM cuadrados" value="<?php echo $reg[0]['tamano'];?>">
            </div>

            <br>
                
            <div class="col-md-9" align="left"> 
                  <label for="pres_an">PRESUPUESTO ANUAL:</label>
                  <input type="number" id="pres_an" name="pres_an" class="form-control" placeholder="Digite el presupuesto anual " value="<?php echo $reg[0]['presupuesto_anual'];?>">
            </div>
            
            <br>
                
                    
                <div class="col-md-6"> 
                  <br></br>
                 </div>
                 <input type="submit" value="EDITAR" class="btn btn-success" title="Editar" >
                <!-- onclick="window.location='zooinsert.php'" > -->
                 </div> 
                <div class="col-md-6"> 
                  <br></br>
                </div>
                  <div class="col-md-6"> 
                    <input type="reset-btn-lg" value="Volver" class="btn btn-info btn-lg"onclick="window.location='zooinsert.php'" >  
                  </div>
                  <div class="col-md-6"> 
                  <br></br>
                </div>
                </div>
                
                  </div>
                  <div class="col-md-6"> 
                  <br></br>

                  
                  <div class="col-md-6"> 
                  <br></br>
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