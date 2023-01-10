<?php
function conectar(){


$host="localhost";
$user="root";
$password="";
$db="user";

/// relizamos la conexion a la BD
$link=mysqli_connect($host,$user,$password) or die ("Error al conectar la base de datos".mysqli_error($link));
mysqli_select_db($link,$db) or die ("Error al seleccionar la base de datos".mysqli_error($link));
return $link;

}







?>