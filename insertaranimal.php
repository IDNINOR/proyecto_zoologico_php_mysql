<?php
include("./class/class.php");
//crear el objeto
$animal=new Animal();
$animal->insertara($_REQUEST['id_animal'],$_REQUEST['fecha_nac'],$_REQUEST['id_pais_origen_fk'],$_REQUEST['id_continente_fk'],$_REQUEST['id_especie_fk'],$_REQUEST['id_sexo_fk']);
?>