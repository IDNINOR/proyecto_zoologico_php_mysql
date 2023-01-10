<?php
session_start();
include('class/class.php');
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

$db =  Conectar::con();
$ani="animal";
$query=$db->query("select * from animal ");
$animal = array();
$n=0;
while($r=$query->fetch_object()){ $animal[]=$r; $n++;}

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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <style>
body {
 background-image: url("img/zool.jpg");
 width: 109%;
 height: 120%;
}
</style>
    <title>GESTION DE ANIMALES</title>
  </head>
  <body onload="limpiara();">
  <br>

  <div class="container"align="center">
   <div class="card" style="width: 50rem;" >
       <div class="card-header bg-danger">
           <h3 class="text-white" align="center">Registro de animales</h3>
       </div> 
  </div> 
  <div class="card-body">
    <div class="row-3">
      <div class="col-md-9" align="left">
        <form name="form4" action="insertaranimal.php" method="post">
          <label for="id_animal">CODIGO:</label>    
          <input type="number" id ="id_animal" name="id_animal" class="form-control" placeholder="Digite el Codigo">
          </div>
          <br>
      <div class="col-md-9" align="left">
        <label for='fecha_nac'>Digite la fecha de nacimiento:</label>
        <input type="date" id="fecha_nac" name="fecha_nac" class="form-control" placeholder="Digite la fecha de nacimiento">
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
        <label for="id_sexo_fk">Seleccione el sexo:</label>
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
              <input type="button-btn-lg" value="Registrar animal" class="btn btn-success btn-lg" title="Registrar animal" onclick="validara()" readonly="readonly" >
              </div>
              <div class="col-md-9"> 

              <br></br>

              </div>
                    <div class="col-md-9"> 
                      <input type="reset-btn-lg" value="Limpiar" class="btn btn-info btn-lg" onclick="limpiara()"  readonly="readonly" >
                    </div>
                    <div class="col-md-9"> 
                    <br></br>
                  </div>
                  <div class="col-md-9">
                  <input type="reset-btn-lg" value="Volver" class="btn btn-info btn-lg"onclick="window.location='adminhome.php?id'" > 
                  </div>
                  <div class="col-md-9"> 
                    <br></br>
                  </div>
      </div>
      </form>
    </div>
  </div>
</div>

<hr>
<?php
    //crear el objeto de la clase Especie
    $emp=new Animal;
    $use="animal";
    $reg=$emp->ver_animal();
?>

<div class="card-footer">
   <table class="table table-striped">
     <thead>
       <tr>
         <th>CODIGO</th>
         <th>FECHA DE NACIMIENTO</th>
         <th>PAÍS DE ORIGEN</th>
         <th>CONTINENTE</th>
         <th>ESPECIE</th>
         <th>SEXO</th>
         
       </tr>
     </thead>

     <?php
     
//traer los datos de la funcion ver_especie
   for($i=0;$i<count($reg);$i++){
     echo "<tr>
     <td>".$reg[$i]['id_animal']."</td>
     <td>".$reg[$i]['fecha_nac']."</td>
     <td>".$reg[$i]['pais']."</td>
     <td>".$reg[$i]['continente']."</td>
     <td>".$reg[$i]['nombre_cientifico']."</td>
     <td>".$reg[$i]['sexo']."</td>
     
     ";
     
 
 ?>
<td> 
<button class="btn btn-warning" onclick=window.location='./editaranimal.php?id=<?php echo $reg[$i]['id_animal'];?>'>
<span class="material-icons">edit_note</span>
</button>
   </td>
<td><button class="btn btn-danger" onclick="eliminar('eliminaranimal.php?id=<?php echo $reg[$i]['id_animal'];?>')">
<span class="material-icons">delete_sweep </span>
  </td>
  </tr>
      <?php } 
  

      ?>   
      </table>
      </div>

  </body>
  </html>