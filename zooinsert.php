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
/* while($r=$query->fetch_object()){ $usuario[]=$r; $n++;}*/

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


  <body onload="limpiarz();">
  <br>

  <div class="container"align="center">

   <div class="card" style="width: 50rem;" >
       <div class="card-header bg-danger">
           <h3 class="text-white" align="center">INSERTAR ZOOLÓGICOS</h3>
       </div> 
   </div> 

   <div class="card-body">
       <div class="row-3">
           <div class="col-md-9" align="left">
               <form name="form2" action="insertarzoo.php" method="post">
			   <label for="id_z">CODIGO:</label>
               <input type="number" id ="id_z" name="id_z" class="form-control" placeholder="Digite el Codigo">   
           </div>
           
            <br>
                
            <div class="col-md-9" align="left"> 
                  <label for="nombre">NOMBRE:</label>
                  <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Digite el Nombre del zoológico">
            </div>
                
            <br>
                
            <div class="col-md-9" align="left"> 
                  <label for="tam">TAMAÑO:</label>
                  <input type="number" id="tam" name="tam" class="form-control" placeholder="Digite el Tamaño del zoológico en KM cuadrados">
            </div>

            <br>
                
            <div class="col-md-9" align="left"> 
                  <label for="pres_an">PRESUPUESTO ANUAL:</label>
                  <input type="number" id="pres_an" name="pres_an" class="form-control" placeholder="Digite el presupuesto anual ">
            </div>
            
            <br>

            <div class="col-md-9" align="left">
              <label for="id_pais">PAIS:</label>
              <br>
              <select name="id_pais" class="form-control">
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
              <label for="id_ciudad">CIUDAD:</label>
              <br>
              <select name="id_ciudad" class="form-control">
              <option value="">Seleccione</option>
                <?php
                $c= new Ciudad;
                $re=$c->ver_ciudad();
                
                for($i=0;$i<count($re);$i++){
                    
                    $idc=$re[$i]['id_ciudad'];
                    $ci=$re[$i]['ciudad'];
                ?>
                        
                        <option value="<?php echo $idc; ?>"><?php echo $ci; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            
            <br>

<div class="col-md-9"> 
    <input type="button-btn-lg" value="Registrar zoológico" class="btn btn-success btn-lg" title="Registrar Zoologico" onclick="validarz()" readonly="readonly" >
</div>
      
<div class="col-md-9"> 

<br></br>

</div>
      <div class="col-md-9"> 
        <input type="reset-btn-lg" value="Limpiar" class="btn btn-info btn-lg" onclick="limpiarz()"  readonly="readonly" >
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
    
    <!-- <button id="GenerarPDFzoo" class="btn btn-light" > Crear PDF Zoologicos </button> -->
   
</div>
</div>
</div>

</div>
<hr>

<?php
//crear el objeto de la clase zoo
$zo=new Zoo;
// $use="usuario";
$reg=$zo->ver_zoo();
?>

<div class="card-footer">
   <table class="table table-striped">
     <thead>
     <tr>
         <th>CODIGO</th>
         <th>NOMBRE</th>
         <th>TAMAÑO</th>
         <th>PRESUPUESTO ANUAL</th>
         <th>PAIS</th>
         <th>CIUDAD</th>
        </tr>
     </thead>

     <?php
     
     //traer los datos de la funcion ver_zoo
     for($i=0;$i<count($reg);$i++){
       echo "<tr>
       <td>".$reg[$i]['id_zoo']."</td>
       <td>".$reg[$i]['nombre']."</td>
       <td>".$reg[$i]['tamano']."</td>
       <td>".$reg[$i]['presupuesto_anual']."</td>
     <td>".$reg[$i]['pais']."</td>
     <td>".$reg[$i]['ciudad']."</td>
     ";

    ?>
    <td> 
      <button class="btn btn-warning" onclick=window.location='./editarzoo.php?id=<?php echo $reg[$i]["id_zoo"];?>'>
      <span class="material-icons">edit_note</span>
      </button>
    </td>
    
    <td>
        <button class="btn btn-danger" onclick="eliminar('eliminarzoo.php?id=<?php echo $reg[$i]['id_zoo'];?>')">
        <span class="material-icons">delete_sweep </span>
    </td>
   </tr>
    
    <?php 
    } 
    ?>   
         
         
         <script>
          $("#GenerarPDFzoo").click(function(){
            var pdf = new jsPDF();
           pdf.text(20,20,"Datos Zoologicos");
           var columns = ["Codigo", "Nombre", "Tamaño", "Presupuesto Anual", "Pais", "Ciudad"];
           var data = [
           <?php foreach($zoo as $c):?>
           [<?php echo $c->id_zoo; ?>, "<?php echo $c->nombre; ?>", "<?php echo $c->tamano; ?>", "<?php echo $c->presupuesto_anual; ?>", "<?php echo $c->pais; ?>", "<?php echo $c->ciudad; ?>"],
           <?php endforeach; ?>  
           ];

            pdf.autoTable(columns,data,
           { margin:{ top: 25  }}
            );

            pdf.save('zoos.pdf');             
            });


        </script> 

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