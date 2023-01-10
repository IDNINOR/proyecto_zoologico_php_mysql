<?php
include("./class/class.php");
//crear el objeto
$emp=new Especie();
$emp->insertare($_REQUEST['id_especie'],$_REQUEST['nombre_cientifico'],$_REQUEST['id_estado_extincion_fk'],$_REQUEST['id_nombre_vulgar_fk'],$_REQUEST['id_familia_fk'],$_REQUEST['id_zoo_fk']);
?>