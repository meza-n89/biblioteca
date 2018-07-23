<?php
require 'metodos.php';
$obj=new vista_libreria();
$array= $obj->mostrar_registro();
$arrayau=$obj->mostrar_autor();
?>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Google Nexus Website Menu</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
                <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
			<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
							
								<li>
                                                                    <a class="gn-icon gn-icon-download" href="registrolib.php">registro de libros</a>
									<ul class="gn-submenu">
                                                                            <li><a class="gn-icon gn-icon-illustrator" href="registroau.php">registro de autor</a></li>
                                                                            <li><a class="gn-icon gn-icon-photoshop" href="inventario.php">registro de inventario</a></li>
                                                                            <li><a class="gn-icon gn-icon-photoshop" href="proveedor.php">registro de proveedor</a></li>
									</ul>
								</li>
                                                                <li><a class="gn-icon gn-icon-cog" href="updatelib.php">modificar/borrar libro</a></li>
                                                                
								
								<li>
                                                                    <a class="gn-icon gn-icon-archive" href="updateprov.php">modificar/borrar proveedor</a>
									<ul class="gn-submenu">
                                                                            <li><a class="gn-icon gn-icon-article" href="updateau.php">Modificar/borar autor</a></li>
										<li><a class="gn-icon gn-icon-pictures">Images</a></li>
										<li><a class="gn-icon gn-icon-videos">Videos</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				
				
				<li><a class="" href=""><span></span></a></li>
			</ul>
			<header>
<h1>Modificar registro de libro<span></span></h1>	
</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
       <?php if($_GET):?>
            <form method="get">
                <?php $valor= $obj->obtener_libro(); ?>
                <input type="text" readonly required name="idxx" value="<?php echo $valor['id_libro'] ?>">
                <input type="text" name="isbnxx" placeholder="isbn" value="<?php echo $valor['isbn'] ?>">
                <input type="text" name="tituloxx" placeholder="titulo" value="<?php echo $valor['titulo'] ?>">
                <input type="date" name="fechaxx" placeholder="fecha" value="<?php echo $valor['fecha'] ?>">
                <input type="text" name="tomoxx" placeholder="tomo" value="<?php echo $valor['tomo'] ?>">
                <input type="text" name="edicionxx" placeholder="edicion" value="<?php echo $valor['edicion'] ?>">
                <input type="text" name="paginasxx" placeholder="paginas"value= "<?php echo $valor['paginas'] ?>">
                <input type="text" name="editorialxx" placeholder="editorial" value="<?php echo $valor['editorial'] ?>">
            <select name="generoxx">
                <option value="Policial">Policial</option> 
                 <option value="Policial">Policial</option>  
                  <option value="Policial">Policial</option>
                   <option value="Policial">Policial</option> 
                    <option value="Policial">Policial</option>
                     <option value="Policial">Policial</option>  
            </select>
            
            <select name="id_autorxx">
                <?php foreach ($arrayau as $value):?>
                <option value="<?php echo $value ['id_autor'] ?>"><?php echo $value ['nombre'] ?></option>
                <?php endforeach;?>
            </select>
            
            <input type="submit" value="enviar">
        </form>
        
        <?php endif; ?>
              <?php 
        if(isset($_GET['tituloxx'])){
            $isbn=$_GET['isbnxx'];
            $titulo=$_GET['tituloxx'];
            $fecha=$_GET['fechaxx'];
            $tomo=$_GET['tomoxx'];
            $edicion=$_GET['edicionxx'];
            $paginas=$_GET['paginasxx'];
            $editorial=$_GET['editorialxx'];
            $genero=$_GET['generoxx'];
            $id_libro=$_GET['idxx'];
            $obj->update_libro($isbn, $titulo, $fecha, $tomo, $edicion, $paginas, $editorial, $genero, $id_libro);
        }
        ?>
         <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>TITULO</th>
                    <th>FECHA</th>
                    <th>TOMO</th>
                    <th>EDICION</th>
                    <th>GENETO</th>
                    <th>PAGINAS</th>
                    <th>EDITORIAL</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $value): ?>
                <tr>
                    <td><?php echo $value['id_libro']; ?></td>
                    <td><?php echo $value['isbn'] ?></td>
                    <td><?php echo $value['titulo'] ?></td>
                    <td><?php echo $value['fecha'] ?></td>
                    <td><?php echo $value['tomo'] ?></td>
                    <td><?php echo $value['edicion'] ?></td>
                    <td><?php echo $value['genero'] ?></td>
                    <td><?php echo $value['paginas'] ?></td>
                    <td><?php echo $value['editorial'] ?></td>
                    <td><a href="<?php echo "updatelib.php?id_libro=".$value['id_libro']; ?>">modificar</a></td>
                    <td><a href="<?php echo "eliminar.php?id_libro=".$value['id_libro']; ?>">eliminar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
	</body>
            
</html>