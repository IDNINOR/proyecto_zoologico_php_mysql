<?php
session_start();
include('class/class.php');
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}


$db =  Conectar::con();
$usu="usuario";
$query=$db->query("select * from usuarios where tipo_usuario='$usu'");
$usuarios = array();
$n=0;
while($r=$query->fetch_object()){ $usuarios[]=$r; $n++;}

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
 background-image: url("img/olvidoclave.jpg");
 width: 109%;
 height: 120%;
}
	
	</style>
    <title>GESTION DE EMPLEADOS</title>
  </head>
  <body onload="limpiar();">
  <br>

  <div class="container"align="center">
   <div class="card" style="width: 50rem;" >
       <div class="card-header bg-danger">
           <h3 class="text-white" align="center">Registro usuarios</h3>
       </div> 
   </div> 
   <div class="card-body">
       <div class="row-3">
           <div class="col-md-9" align="left">
               <form name="form" action="insertarusuario.php" method="post">
			        <label for="id_u">CODIGO:</label>
                   <input type="number" id ="id_u" name="id_u" class="form-control" placeholder="Digite el Codigo">   
            </div>
           
                  <br>
                
                <div class="col-md-9" align="left"> 
                  <label for='username'>USUARIO:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Digite el Nombre de usuario">
                </div>
                <br>
                
                <div class="col-md-9" align="left"> 
                <label for='pass'>PASSWORD:</label>
                  <div class="form-row-2">
                      
                  <input type="password" id="pass" name="pass" class="form-control" placeholder="Digite la contraseña">
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarContrasena()">Mostrar contraseña</input>
                  </div>
                    </div>
                    </p>
                </div>

                <br>
                
                          
                <div class="col-md-9" align="left">
                <label for='pass'>TIPO DE USUARIO:</label>
                <br>


                
                    <select name="usertype" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="usuario">Usuario</option>
                    </select>

               
						
                    </div>
                    <br></br>
                    <div class="col-md-9"> 
                    <div class="card-header bg-dark">
           <h3 class="text-white" align="center">Preguntas de seguridad</h3>
       </div> 
       
                  
                </div>
                <br>
                <div class="col-md-9" align="left"> 
           <h4 class="text-white" align="left">¿Cual es tu Heroe de la infancia?</h4>
           <label for='respuesta1'>RESPUESTA 2:</label>
                  <div class="form-row-2">
                      
                    <input class="form-control" type="password" name="respuesta1" id="respuesta1"  placeholder="Digite la respuesta 1">
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarRespuesta1()">Mostrar Respuesta 1</input>
                  </div>
                    </div>
                    </p>
                </div>

                

                

                <br></br>
                
                <div class="col-md-9" align="left"> 
           <h4 class="text-white" align="left">¿Cual es tu comida favorita?</h4>
           <label for='respuesta1'>RESPUESTA 2:</label>
                  <div class="form-row-2">
                      
                    <input class="form-control" type="password" name="respuesta2" id="respuesta2"  placeholder="Digite la respuesta 2">
                  
                      <div class="col" align="left">
                      <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarRespuesta2()">Mostrar Respuesta 2</input>
                  </div>
                    </div>
                    </p>
                </div>
                
                    
                <div class="col-md-9"> 
                  <br></br>
                </div>
                <div class="col-md-9"> 
                  <input type="button-btn-lg" value="Registrar usuario"
                    class="btn btn-success btn-lg" title="Registrar Usuario" onclick="validar()" readonly="readonly" >
                  </div>
                <div class="col-md-9"> 
                  <br></br>
                </div>
                <div class="col-md-9"> 
                  <input type="reset-btn-lg" value="Limpiar" class="btn btn-info btn-lg" onclick="limpiar()"  readonly="readonly" >
                </div>
                <div class="col-md-9">
                  <br></br>
                </div>
                <!-- <p></p> -->
                <div class="col-md-6"> 
                  <input type="reset-btn-lg" value="Volver" class="btn btn-info btn-lg"onclick="window.location='adminhome.php?id'" > 
                </div>
                <div class="col-md-9"> 
                  <br></br>
                </div>     
              </form>                
              
              <button id="GenerarPDFusuarios" class="btn btn-light">Crear PDF usuarios </button>         
                
                
              
           </div>
       </div>
   </div>
 
 </div>
<hr>

<?php
//crear el objeto de la clase Usuario
$emp=new Usuario;
$use="usuario";
$reg=$emp->ver_usu();


?>
<div class="card-footer">
   <table class="table table-striped">
     <thead>
       <tr>
         <th>CODIGO</th>
         <th>NOMBRE USUARIO</th>
         <th>TIPO USUARIO</th>
         <th>RESPUESTA 1</th>
         <th>RESPUESTA 2</th>
         
       </tr>
     </thead>

     <?php
     
//traer los datos de la funcion ver_usuario
   for($i=0;$i<count($reg);$i++){
     echo "<tr>
     <td>".$reg[$i]['codigo']."</td>
     <td>".$reg[$i]['usuario']."</td>
     <td>".$reg[$i]['tipo_usuario']."</td>
     <td>".$reg[$i]['respuesta1']."</td>
     <td>".$reg[$i]['respuesta2']."</td>
     
     ";
     
 
 ?>
<td> 
<button class="btn btn-warning" onclick=window.location='./editarusuario.php?id=<?php echo $reg[$i]['codigo'];?>'>
<span class="material-icons">edit_note</span>
</button>
   </td>
<td><button class="btn btn-danger" onclick="eliminar('eliminarusuario.php?id=<?php echo $reg[$i]['codigo'];?>')">
<span class="material-icons">delete_sweep </span>
  </td>
  </tr>
      <?php } 
  

      ?>   
         
         
         <script>
$("#GenerarPDFusuarios").click(function(){
  var pdf = new jsPDF();
  pdf.text(20,20,"Datos Usuarios Zoologicos");

  var columns = ["Codigo", "Usuario", "Tipo Usuario", "Respuesta1", "Respuesta2"];
  var data = [
<?php foreach($usuarios as $c):?>
 [<?php echo $c->codigo; ?>, "<?php echo $c->usuario; ?>", "<?php echo $c->tipo_usuario; ?>", "<?php echo $c->respuesta1; ?>", "<?php echo $c->respuesta2; ?>"],
<?php endforeach; ?>  
  ];

  pdf.autoTable(columns,data,
    { margin:{ top: 25  }}
  );

  pdf.save('usuarios.pdf');

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