<?php
session_start();

include('class/class.php');
if(!isset($_SESSION["tipo_usuario"]))
{
	header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
<link href="https://bootswatch.com/4/superhero/bootstrap.css" rel="stylesheet" />	
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
<body>
<?php
		
        $id3=$_REQUEST['id'];
        echo " <input  type='hidden' name='newid' class='form-control' value = '".$id3."' readonly> ";
        
          
                        ?>

<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 300px;">
<div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" >  <img src="img/perfil1.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong>&nbsp <?php echo  $_SESSION["tipo_usuario"];?>  </strong> </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            
            <li><a class="dropdown-item bg-secondary" href=<?php echo "editaradmin.php?id=".$id3?> >Editar Datos</a></li>
            <li><a class="dropdown-item bg-secondary" href="#">Perfil</a></li>
            <li>
                <hr class="dropdown-divider bg-primary">
            </li>
            <li><a class="dropdown-item bg-primary" href="cerrarsesion.php">Cerrar sesion</a></li>
        </ul>
		
    </div>    
<hr>

    <ul class="nav nav-pills flex-column mb-auto" >
        <!-- <li class="nav-item"> <a href="#" class="nav-link active" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li> -->
        <!-- <li> <a href="#" class="nav-link text-white">&nbsp&nbsp&nbsp<i class="fas fa-dashboard">&nbsp</i><span class="ms-2">Menu</span> </a> </li> -->
        <li> <a href="usuarioinsert.php" class="nav-link text-white"> <i class="fas fa-users">&nbsp</i><span class="ms-2">Usuarios</span> </a> </li>
        <li> <a href="zooinsert.php" class="nav-link text-white"> <i class="fas fa-paw"></i>&nbsp<span class="ms-2">Zoologicos</span> </a> </li>
        <li> <a href="especieinsert.php" class="nav-link text-white"> <i class="fas fa-feather-alt">&nbsp</i><span class="ms-2">Especies</span> </a> </li>
        <li> <a href="animalinsert.php" class="nav-link text-white"> <i class="fas fa-otter">&nbsp</i><span class="ms-2">Animales</span> </a> </li>

        <li> <a href="informes.php" class="nav-link text-white"> <i class="fas fa-clipboard">&nbsp</i><span class="ms-2">Modulos de informacion</span> </a> </li>

		</ul>
    <hr>
    
</div>


<?php
//$id2=$_request['newid'];

// echo "<input  type='text' name='newid' value = '".$_REQUEST['id']."'readonly>";
 ?>


</body>
<!-- Optional JavaScript; choose one of the two! -->
<script src="./jquery/jquery-3.6.0.min.js"></script>

<script src="./sw/dist/sweetalert2.all.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="./bootstrap/js/bootstrap.min.js"></script>
</html>