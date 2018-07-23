<?php
require 'metodos.php';
$id=$_GET['id'];
$id_proveedor=$_GET['id'];
$id_libro=$_GET['id_libro'];
$id=$_GET['id_autor'];
$obj= new vista_libreria();
$obj->delete_autor($id);
//$obj->delete_libauto($id);
$obj->delete_prov($id_proveedor);
$obj->delete_libro($id_libro);
        
?>

