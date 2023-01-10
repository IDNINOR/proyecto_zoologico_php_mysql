<?php
session_start();
include("./class/class.php");
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

//creacion de l objeto
$zo=new Animal();

if(isset($_POST['grabar']) && $_POST['grabar']=="si"){
  $zo->editar_animal($_POST['id_animal'],$_POST['fecha_nac'],$_POST['id_pais_origen_fk'],$_POST['id_continente_fk'],$_POST['id_especie_fk'],$_POST['id_sexo_fk']);
  exit();
}
$reg=$zo->animal_id($_GET['id']);
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
    <title>GESTION DE ANIMALES</title>
  </head>
  <body onload="limpiara();">
  
  <div class="container "align="center">
   <div class="card">
       <div class="card-header bg-info">
           <h3 class="text-white">ACTUALIZACION DE ANIMALES</h3>
       </div> 
   </div> 
   <div class="card-body">
        <div class="row-3">
            <div class="col-md-9" align="left">
            <form name="form4" action="editaranimal.php" method="POST">
            <input type="hidden" name="grabar" value="si">
                   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                <label for="id_animal">CODIGO:</label>                
                <input type="number" id ="id_animal" name="id_animal" class="form-control" placeholder="Digite el Codigo" value="<?php echo $reg[0]['id_animal'];?>">  
                </div>
                <br>
                <div class="col-md-9" align="left">
        <label for='fecha_nac'>Digite la fecha de nacimiento:</label>
        <input type="date" id="fecha_nac" name="fecha_nac" class="form-control" placeholder="Digite la fecha de nacimiento" value="<?php echo $reg[0]['fecha_nac'];?>">
      </div>
      <br>
      <div class="col-md-9" align="left">
        <label for='id_pais_origen_fk'>Digite el pais de origen:</label>
        <select name="id_pais_origen_fk" class="form-control">
              <option value="">Seleccione</option>
                <?php
                $p= new Pais;
                $r=$p->ver_pais();
                
                for($i=0;$i<count($r);$i++){
                    
                    $idp=$r[$i]['id_pais'];
                    $pa=$r[$i]['pais'];
                ?>
                        
                        <option value="<?php echo $idp; ?>"><?php echo $pa; ?></option>
                <?php
                }
                ?>
              </select>
      </div>
      <br>
      <div class="col-md-9" align="left">
        <label for="id_continente_fk">Digite el continente de origen:</label>
        <select name="id_continente_fk" class="form-control">
              <option value="">Seleccione</option>
                <?php
                $conti= new Continente;
                $rc=$conti->ver_continentes();
                
                for($i=0;$i<count($rc);$i++){
                    
                    $idp=$rc[$i]['id_continente'];
                    $pa=$rc[$i]['continente'];
                ?>
                        
                        <option value="<?php echo $idp; ?>"><?php echo $pa; ?></option>
                <?php
                }
                ?>
              </select>
      </div>
      <br>
      <div class="col-md-9" align="left">
        <label for="id_especie_fk">Seleccione la especie:</label>
        <select name="id_especie_fk" class="form-control">
              <option value="">Seleccione</option>
                <?php
                $conti= new Especie;
                $rc=$conti->ver_especie();
                
                for($i=0;$i<count($rc);$i++){
                    
                    $idp=$rc[$i]['id_especie'];
                    $pa=$rc[$i]['nombre_cientifico'];
                ?>
                        
                        <option value="<?php echo $idp; ?>"><?php echo $pa; ?></option>
                <?php
                }
                ?>
              </select>
      </div>
      <br>
      <div class="col-md-9" align="left">
        <label for="id_sexo_fk">Seleccione sexo:</label>
        <select name="id_sexo_fk" class="form-control">
              <option value="">Seleccione</option>
                <?php
                $conti= new Sexo;
                $rc=$conti->ver_sexo();
                
                for($i=0;$i<count($rc);$i++){
                    
                    $idp=$rc[$i]['id_sexo'];
                    $pa=$rc[$i]['sexo'];
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
    <input type="reset-btn-lg" value="Volver" class="btn btn-info btn-lg"onclick="window.location='animalinsert.php?id'" > 
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