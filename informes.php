<?php
 $conexion=mysqli_connect("localhost","root","","zoo")
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Informes</title>

</head>
<body>
    <h1 align="center" class="titulo">Bienvenido al modulo de informes</h1>

    <Section>
        <h2>Modulos de informacion</h2>
        <div class="container">
            
        <div class="carta">
            <h3 class="fondousu">Usuarios</h3>
            <p class="fondousu">A continuacion se mostraran la cantidad de usuarios que existen en el sistema asi como quienes son </p>
            <h2 class="fondousu">Nombre de Usuarios</h2>
            <?php
           
            $sql="SELECT usuario FROM usuarios WHERE tipo_usuario=\"usuario\" ";
            $result=mysqli_query($conexion,$sql);

            while($mostrar=mysqli_fetch_array($result))
            {
            ?>
             <?php echo $mostrar["usuario"] ?>
             <br>
            <?php
            }
            ?>
         <h2 class="fondousu">Cantidad de Usuarios </h2>
         <?php
           
           $sql="SELECT COUNT(usuario) AS cantidad FROM usuarios WHERE tipo_usuario=\"usuario\" ";
           $result=mysqli_query($conexion,$sql);

           while($mostrar=mysqli_fetch_array($result))
           {
           ?>
            <?php echo $mostrar["cantidad"] ?>
            <br>
           <?php
           }
           ?>
           

           <button><a href="informeusuarios.php" class="w-10 btn btn-lg btn-primary" style="background-color: rgb(0, 174, 255);" type="submit">Generar PDF usuarios</a></button>     
           
 
        </div>
        <div class="carta">
            <h3 class="fondoadm">Administradores</h3>
            <p class="fondoadm">A continuacion se mostraran la cantidad de Administradores que existen en el sistema asi como quienes son</p>

            <h2 class="fondoadm">Nombre de administradores</h2>
            <?php
           
           $sql="SELECT usuario FROM usuarios WHERE tipo_usuario=\"administrador\" ";
           $result=mysqli_query($conexion,$sql);

           while($mostrar=mysqli_fetch_array($result))
           {
           ?>
            <?php echo $mostrar["usuario"] ?>
            <br>
           <?php
           }
           ?>
           <h2 class="fondoadm">Cantidad de Administradores</h2>
           <?php
           
           $sql="SELECT COUNT(usuario) AS cantidad FROM usuarios WHERE tipo_usuario=\"administrador\" ";
           $result=mysqli_query($conexion,$sql);

           while($mostrar=mysqli_fetch_array($result))
           {
           ?>
            <?php echo $mostrar["cantidad"] ?>
            <br>
           <?php
           }
           ?>
            <button><a href="informeadministradores.php" class="w-10 btn btn-lg btn-primary" style="background-color: blueviolet;" type="submit">Generar PDF Administradores</a></button>
        </div>
        <div class="carta">
            <h3 class="fondozoo">Zoologicos</h3>
            <p class="fondozoo">A continuacion se mostraran la cantidad de Zoologicos que existen en el sistema asi como sus nombres</p>
            <h2 class="fondozoo">Nombre de Zoologicos</h2>
            <?php
           
           $sql="SELECT nombre FROM zoo  ";
           $result=mysqli_query($conexion,$sql);

           while($mostrar=mysqli_fetch_array($result))
           {
           ?>
            <?php echo $mostrar["nombre"] ?>
            <br>
           <?php
           }
           ?>
           <h2 class="fondozoo">Cantidad de Zoologicos</h2>
           <?php
           
           $sql="SELECT COUNT(nombre) AS cantidad FROM zoo  ";
           $result=mysqli_query($conexion,$sql);

           while($mostrar=mysqli_fetch_array($result))
           {
           ?>
            <?php echo $mostrar["cantidad"] ?>
            <br>
           <?php
           }
           ?>
            <button><a href="informeszoologicos.php" class="w-10 btn btn-lg btn-primary" style="background-color: rgb(132, 239, 132);" type="submit">Generar PDF Zoologicos</a></button>
        </div>
        <div class="carta">
            <h3 class="fondoesp">Especies</h3>
            <p class="fondoesp">A continuacion se mostraran la cantidad de Especies que existen en el sistema asi como cuales son</p>
            <h2 class="fondoesp">Nombre Cientifico de las especies </h2>
            <?php
           
           $sql="SELECT nombre_cientifico FROM especie  ";
           $result=mysqli_query($conexion,$sql);

           while($mostrar=mysqli_fetch_array($result))
           {
           ?>
            <?php echo $mostrar["nombre_cientifico"] ?>
            <br>
           <?php
           }
           ?>
           <h2 class="fondoesp">Cantidad de Especies</h2>
           <?php
           
           $sql="SELECT COUNT(nombre_cientifico) AS cantidad FROM especie  ";
           $result=mysqli_query($conexion,$sql);

           while($mostrar=mysqli_fetch_array($result))
           {
           ?>
            <?php echo $mostrar["cantidad"] ?>
            <br>
           <?php
           }
           ?>
            <button><a href="informeespecies.php" class="w-10 btn btn-lg btn-primary" style="background-color: grey;" type="submit">Generar PDF Especies</a></button>
        </div>
    </Section>
</body>
</html>