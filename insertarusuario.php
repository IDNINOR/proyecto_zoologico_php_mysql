<?php
include("./class/class.php");
//crear el objeto
$emp=new Usuario();
$emp->insertar($_REQUEST['id_u'],$_REQUEST['username'],$_REQUEST['pass'],$_REQUEST['usertype'],$_REQUEST['respuesta1'],$_REQUEST['respuesta2']);
?>