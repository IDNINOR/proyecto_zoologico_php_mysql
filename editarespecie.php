<?php
session_start();
include("./class/class.php");
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

//creacion de l objeto
$zo=new Especie();

if(isset($_POST['grabar']) && $_POST['grabar']=="si"){
  $zo->editar_e($_POST['id_especie'],$_POST['nombre_cientifico'],$_POST['id_estado_extincion_fk'],$_POST['id_nombre_vulgar_fk'],$_POST['id_familia_fk'],$_POST['id_zoo_fk']);
  exit();
}
$reg=$zo->especie_id($_GET['id']);
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
    <title>GESTION DE ESPECIES</title>
  </head>
  <body onload="limpiare();">
  
  <div class="container "align="center">
   <div class="card">
       <div class="card-header bg-info">
           <h3 class="text-white">ACTUALIZACION DE ESPECIES</h3>
       </div> 
   </div> 
   <div class="card-body">
        <div class="row-3">
            <div class="col-md-9" align="left">
            <form name="form3" action="editarespecie.php" method="POST">
            <input type="hidden" name="grabar" value="si">
                   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                <label for="id_especie">CODIGO:</label>                
                <input type="number" id ="id_especie" name="id_especie" class="form-control" placeholder="Digite el Codigo" value="<?php echo $reg[0]['id_especie'];?>">  
                </div>
                <br>
                <div class="col-md-9" align="left"> 
                  <label for='nombre_cientifico'>NOMBRE CIENTIFICO:</label>
                <input type="text" id="nombre_cientifico" name="nombre_cientifico" class="form-control" placeholder="Digite el Nombre Cientifico" value="<?php echo $reg[0]['nombre_cientifico'];?>">
                </div>
                <br>
                <div class="col-md-9" align="left">
                <label for="id_estado_extincion_fk">ESTADO DE EXTINCIÓN:</label>
                <br>
                <select name="id_estado_extincion_fk" class="form-control">
                <option value=''>Seleccione</option>
                <?php
                $p= new Extincion;
                $r=$p->ver_extincion();                
                for($i=0;$i<count($r);$i++){                    
                    $idp=$r[$i]['id_estado_extincion'];
                    $pa=$r[$i]['estado_extincion'];
                ?>                        
                    <option value="<?php echo $idp; ?>"><?php echo $pa; ?></option>
                <?php
                }
                ?>
                </select>
                </div>
                <br>
                <div class="col-md-9" align="left">
                <label for="id_nombre_vulgar_fk">NOMBRE VULGAR:</label>
                <br>
                <select name="id_nombre_vulgar_fk" class="form-control">
                <option value="">Seleccione</option>
                <?php
                $p= new nom_vulgar;
                $r=$p->ver_nombre_vulgar();                
                for($i=0;$i<count($r);$i++){                    
                    $idp=$r[$i]['id_nombre_vulgar'];
                    $pa=$r[$i]['nombre_vulgar'];
                ?>                        
                    <option value="<?php echo $idp; ?>"><?php echo $pa; ?></option>
                <?php
                }
                ?>
                </select>
                </div>
                <br>
                <div class="col-md-9" align="left">
                <label for="id_familia_fk">FAMILIA:</label>
                <br>
                <select name="id_familia_fk" class="form-control">
                <option value="">Seleccione</option>
                <?php
                $p= new Familia;
                $r=$p->ver_familia();                
                for($i=0;$i<count($r);$i++){                    
                    $idp=$r[$i]['id_familia'];
                    $pa=$r[$i]['familia'];
                ?>                        
                    <option value="<?php echo $idp; ?>"><?php echo $pa; ?></option>
                <?php
                }
                ?>
                </select>
                </div>
                <br>
                <div class="col-md-9" align="left">
                <label for="id_zoo_fk">Zoológico:</label>
                <br>
                <select name="id_zoo_fk" class="form-control">
                <option value="">Seleccione</option>
                <?php
                $p= new Zoo;
                $r=$p->ver_zoo();                
                for($i=0;$i<count($r);$i++){                    
                    $idp=$r[$i]['id_zoo'];
                    $pa=$r[$i]['nombre'];
                ?>                        
                    <option value="<?php echo $idp; ?>"><?php echo $pa; ?></option>
                <?php
                }
                ?>
                </select>
                </div>
                <br>
    
    <div class="col-md-9"> 
      <br></br>
    </div>
                                     
                
       
                    
                <div class="col-md-9"> 
                  <br></br>
                 </div>
                 <input type="submit" value="EDITAR" class="btn btn-success" title="Editar" >
                <!-- onclick="window.location='zooinsert.php'" > -->
                 </div> 
                <div class="col-md-6"> 
                  <br></br>
                </div>
                <div class="col-md-9">
    <input type="reset-btn-lg" value="Volver" class="btn btn-info btn-lg"onclick="window.location='especieinsert.php?id'" > 
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