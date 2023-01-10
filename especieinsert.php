<?php
session_start();
include('class/class.php');
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

$db =  Conectar::con();
$usu="usuario";
$query=$db->query("select * from especie");
$especies = array();
$n=0;
while($r=$query->fetch_object()){ $especies[]=$r; $n++;}

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
    <title>GESTION DE ESPECIES</title>
  </head>
  <body onload="limpiare();">
    <br>

    <div class="container"align="center">
    <div class="card" style="width: 50rem;" >
        <div class="card-header bg-danger">
            <h3 class="text-white" align="center">Registro de especies</h3>
        </div> 
    </div> 
    <div class="card-body">
        <div class="row-3">
            <div class="col-md-9" align="left">
            <form name="form3" action="insertarespecie.php" method="POST">
                <label for="id_especie">CODIGO:</label>                
                <input type="number" id ="id_especie" name="id_especie" class="form-control" placeholder="Digite el Codigo">  
                </div>
                <br>
                <div class="col-md-9" align="left"> 
                  <label for='nombre_cientifico'>NOMBRE CIENTIFICO:</label>
                <input type="text" id="nombre_cientifico" name="nombre_cientifico" class="form-control" placeholder="Digite el Nombre Cientifico">
                </div>
                <br>
                <div class="col-md-9" align="left">
                <label for="id_estado_extincion_fk">ESTADO DE EXTINCIÓN:</label>
                <br>
                <select name="id_estado_extincion_fk" class="form-control">
                <option value="">Seleccione</option>
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
    <input type="button-btn-lg" value="Registrar especie" class="btn btn-success btn-lg" title="Registrar especie" onclick="validare()" readonly="readonly" >
</div>
      
<div class="col-md-9"> 

<br></br>

</div>
      <div class="col-md-9"> 
        <input type="reset-btn-lg" value="Limpiar" class="btn btn-info btn-lg" onclick="limpiare()"  readonly="readonly" >
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




            </form>        
                
                        
                    
                    
                
        </div>
    </div>
    
    </div>
<hr>
<?php
    //crear el objeto de la clase Especie
    $emp=new Especie;
    $use="especie";
    $reg=$emp->ver_especie();
?>

<div class="card-footer">
   <table class="table table-striped">
     <thead>
       <tr>
         <th>CODIGO</th>
         <th>NOMBRE CIENTIFICO</th>
         <th>ESTADO EXTINCIÓN</th>
         <th>NOMBRE VULGAR</th>
         <th>FAMILIA</th>
         <th>ZOOLÓGICO</th>
         
       </tr>
     </thead>

     <?php
     
//traer los datos de la funcion ver_especie
   for($i=0;$i<count($reg);$i++){
     echo "<tr>
     <td>".$reg[$i]['id_especie']."</td>
     <td>".$reg[$i]['nombre_cientifico']."</td>
     <td>".$reg[$i]['estado_extincion']."</td>
     <td>".$reg[$i]['nombre_vulgar']."</td>
     <td>".$reg[$i]['familia']."</td>
     <td>".$reg[$i]['nombre']."</td>
     
     ";
     
 
 ?>
<td> 
<button class="btn btn-warning" onclick=window.location='./editarespecie.php?id=<?php echo $reg[$i]['id_especie'];?>'>
<span class="material-icons">edit_note</span>
</button>
   </td>
<td><button class="btn btn-danger" onclick="eliminar('eliminarespecie.php?id=<?php echo $reg[$i]['id_especie'];?>')">
<span class="material-icons">delete_sweep </span>
  </td>
  </tr>
      <?php } 
  

      ?>   
      </table>
      </div>



        <!-- Optional JavaScript; choose one of the two! -->
        <script src="./jquery/jquery-3.6.0.min.js"></script>

        <script src="./sw/dist/sweetalert2.all.min.js"></script>
        <!-- Option 1: Bootstrap Bundle with Popper 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
        <script src="./bootstrap/js/bootstrap.min.js"></script>
        
  </body>
</html>