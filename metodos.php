<?php
require 'conexion.php';
class vista_libreria{
    private $db;
    private $reglib= array();
    private $regaut=array();
    private $reginvent=array();
    private $regprov=array();
            function __construct() {
        $this->db= Conexion::conexion();
    }
public function mostrar_registro(){
    $sql='SELECT * FROM libro';
    $statement= $this->db->query($sql);
    while($fila=$statement->fetch(PDO::FETCH_ASSOC)){
        $this->reglib[]=$fila;
    }                                                                   
    return $this->reglib;
}
public function mostrar_autor(){
    $sql1='SELECT * FROM autor';
    $statement= $this->db->query($sql1);
    while($fila2=$statement->fetch(PDO::FETCH_ASSOC)){
        $this->regaut[]=$fila2;
    }
    return $this->regaut;
}

public function insertar_registro($isbn,$titulo,$fecha,$tomo,$edicion,$paginas,$editorial,$genero){
    $statement= $this->db->prepare('INSERT INTO libro (isbn,titulo,fecha,tomo,edicion,genero,paginas,editorial) VALUES (:isbn,:titulo,:fecha,:tomo,:edicion,:genero,:paginas,:editorial)');
    $statement->bindParam(':isbn', $isbn);
    $statement->bindParam(':titulo', $titulo);
    $statement->bindParam(':fecha', $fecha);
    $statement->bindParam(':tomo', $tomo);
    $statement->bindParam(':edicion', $edicion);
    $statement->bindParam(':genero', $genero);
    $statement->bindParam(':paginas', $paginas);
    $statement->bindParam(':editorial', $editorial);
    $statement->execute();
    header('location:registrolib.php');
    
}
public function obtener_libro(){
    $id_libro=$_GET['id_libro'];
    $statement= $this->db->prepare('SELECT * FROM libro WHERE id_libro=:id_libro');
    $statement->bindParam(':id_libro', $id_libro);
    $statement->execute();
    $valor=$statement->fetch();
    return $valor;
}
public function update_libro($isbn,$titulo,$fecha,$tomo,$edicion,$paginas,$editorial,$genero,$id_libro){
    $statement= $this->db->prepare('UPDATE libro SET isbn=:isbn,titulo=:titulo,fecha=:fecha,tomo=:tomo,edicion=:edicion,paginas=:paginas,editorial=:editorial,genero=:genero WHERE id_libro=:id_libro');
    $statement->bindParam(':isbn', $isbn);
    $statement->bindParam(':titulo', $titulo);
    $statement->bindParam(':fecha', $fecha);
    $statement->bindParam(':tomo', $tomo);
    $statement->bindParam(':edicion', $edicion);
    $statement->bindParam(':paginas', $paginas);
    $statement->bindParam(':editorial', $editorial);
    $statement->bindParam(':genero', $genero);
    $statement->bindParam(':id_libro', $id_libro);
    $statement->execute();
    header('location:updatelib.php');
}
public function delete_libro($id_libro){
 $id_libro=$_GET['id_libro'];
    $statement= $this->db->prepare('DELETE FROM libro WHERE id_libro=:id_libro');
    $statement->bindParam(':id_libro', $id_libro);
    $statement->execute();
    header('location:updatelib.php');
}

public function insertar_autor($nombre,$nacionalidad,$dob){
    $statement= $this->db->prepare('INSERT INTO autor (nombre,nacionalidad,dob) VALUES (:nombre,:nacionalidad,:dob)');
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam('nacionalidad', $nacionalidad);
    $statement->bindParam(':dob', $dob);
    $statement->execute();
    header('location:registroau.php');

}
public function insertar_autorpop($autor,$nacionalidad,$dob){
    $statement= $this->db->prepare('INSERT INTO autor (nombre,nacionalidad,dob) VALUES (:nombre,:nacionalidad,:dob)');
    $statement->bindParam(':nombre', $autor);
    $statement->bindParam('nacionalidad', $nacionalidad);
    $statement->bindParam(':dob', $dob);
    $statement->execute();
    header('location:registrolib.php');

}
public function delete_autor($id){
    $id=$_GET['id_autor'];
    $statement= $this->db->prepare('DELETE FROM autor WHERE id_autor=:id');
    $statement->bindParam(':id', $id);
    $statement->execute();
    
//header('location:updateau.php');
}
    

/*public function delete_libauto($id){
    $statement= $this->db->prepare('DELETE FROM lib_autor WHERE id_autor=:id');
    $statement->bindParam(':id', $id);
    $statement->execute();
    header('location:index.php');*/


public function obtener_autor(){
    $id=$_GET['id'];
    $statement= $this->db->prepare('SELECT * FROM autor WHERE id_autor=:id_autor');
    $statement->bindParam(':id_autor', $id);
    $statement->execute();
    $valor=$statement->fetch();
    return $valor;
            
}


public function update_autor($autor,$nacionalidad,$dob,$id){
    $statement= $this->db->prepare('UPDATE autor SET nombre=:nombre,nacionalidad=:nacionalidad,dob=:dob WHERE id_autor=:id');
    $statement->bindParam(':nombre', $autor);
    $statement->bindParam(':nacionalidad', $nacionalidad);
    $statement->bindParam(':dob', $dob);
    $statement->bindParam(':id', $id);
    $statement->execute();
    header('location:updateau.php');
    
}
public function mostrar_inventario(){
    $sql2='SELECT * FROM inventario';
    $statement= $this->db->query($sql2);
    while($fila3=$statement->fetch(PDO::FETCH_ASSOC)){
        $this->reginvent[]=$fila3;
    }
    return $this->reginvent;
}
public function insert_inventario($idlibro,$cantidad,$stock,$estado,$proveedor){
    $statement= $this->db->prepare('INSERT INTO inventario (id_libro,cantidad,stock,estado,proveedor) VALUES (:idlibro,:cantidad,:stock,:estado,:proveedor) ');
    $statement->bindParam(':idlibro', $idlibro);
    $statement->bindParam(':cantidad', $cantidad);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':estado', $estado);
    $statement->bindParam(':proveedor', $proveedor);
    $statement->execute();
    header('location:inventario.php');
    
}
public function insert_libauto($id_autor,$id_libro){
    $statement= $this->db->prepare('INSERT INTO lib_autor (id_libro,id_autor) VALUES (:id_libro,:id_autor) ');
    $statement->bindParam(':id_libro', $id_libro);
    $statement->bindParam(':id_autor', $id_autor);
    $statement->execute();
    header('location:index.php');
}
public function insert_prov($empresa,$perjuridica,$rubro,$responsable,$contacto){
    $statement= $this->db->prepare('INSERT INTO proveedor (empresa,perjuridica,rubro,responsable,contacto)VALUES(:empresa,:perjuridica,:rubro,:responsable,:contacto)');
$statement->bindParam(':empresa', $empresa);
$statement->bindParam(':perjuridica', $perjuridica);
$statement->bindParam(':rubro', $rubro);
$statement->bindParam(':responsable', $responsable);
$statement->bindParam(':contacto', $contacto);
$statement->execute();
header('location:proveedor.php');
}
public function mostar_prov(){
        $sql3='SELECT * FROM proveedor';
    $statement= $this->db->query($sql3);
    while($fila3=$statement->fetch(PDO::FETCH_ASSOC)){
        $this->regprov[]=$fila3;
    }
    return $this->regprov;
}
public function delete_prov($id_proveedor){
    $id_prov=$_GET['id_proveedor'];
    $statement= $this->db->prepare('DELETE FROM proveedor WHERE id_proveedor=:id_proveedor');
    $statement->bindParam(':id_proveedor', $id_proveedor);
    $statement->execute();
    header('location:updateprov.php');
}
public function get_prov(){
    $id_proveedor=$_GET['id_proveedor'];
    $statement= $this->db->prepare('SELECT * FROM proveedor WHERE id_proveedor=:id');
    $statement->bindParam(':id', $id_proveedor);
    $statement->execute();
    $valor2=$statement->fetch();
    return $valor2;
    
}
public function update_prov($empresa,$perjuridica,$rubro,$responsable,$contacto,$id_proveedor){
    $statement= $this->db->prepare('UPDATE proveedor SET empresa=:empresa,perjuridica=:perjuridica,rubro=:rubro,responsable=:responsable,contacto=:contacto WHERE id_proveedor=:id_proveedor');
    $statement->bindParam(':empresa', $empresa);
    $statement->bindParam(':perjuridica', $perjuridica);
    $statement->bindParam(':rubro', $rubro);
    $statement->bindParam(':responsable', $responsable);
    $statement->bindParam(':contacto', $contacto);
    $statement->bindParam(':id_proveedor', $id_proveedor);
    $statement->execute();
    header('location:inventario.php');
    
}
    
}

?>