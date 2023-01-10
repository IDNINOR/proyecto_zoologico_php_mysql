<?php
include("./class/class.php");
//crear el objeto
$zo=new Zoo();
$zo->insertarz($_REQUEST['id_z'],$_REQUEST['nombre'],$_REQUEST['tam'],$_REQUEST['pres_an'],$_REQUEST['id_pais'],$_REQUEST['id_ciudad']);
?>