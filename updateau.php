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
									<a class="gn-icon gn-icon-download">registro de libros</a>
									<ul class="gn-submenu">
                                                                            <li><a class="gn-icon gn-icon-illustrator" href="registroau.php">registro de autor</a></li>
										<li><a class="gn-icon gn-icon-photoshop">registro de inventario</a></li>
									</ul>
								</li>
								<li><a class="gn-icon gn-icon-cog">modificar/borrar libro</a></li>
								
								<li>
									<a class="gn-icon gn-icon-archive">modificar/borrar proveedor</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article">Articles</a></li>
										<li><a class="gn-icon gn-icon-pictures">Images</a></li>
										<li><a class="gn-icon gn-icon-videos">Videos</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				
				<li><a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/HeaderEffects/"><span>Previous Demo</span></a></li>
				<li><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=16030"><span>Back to the Codrops Article</span></a></li>
			</ul>
			<header>
<h1>Registro de autores<span></span></h1>	
</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
                <?php  if($_GET):?>
        <form method="get">
            <?php $valor= $obj->obtener_autor() ?>
            <input type="text" name="idx" readonly value="<?php echo $valor['id_autor']; ?>">
            <input type="text" name="autorx" value="<?php echo $valor['nombre'] ?>">
            <input type="text" name="nacionalidadx" value="<?php echo $valor['nacionalidad']?>" >
            <input type="text" name="dobx" value="<?php echo $valor['dob']; ?>">
            <input type="submit" value="enviar">
        </form>
       
        <?php endif; ?>
         <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>NOMBRE</th>
                    <th>NACIONALIDAD</th>
                    <th>DOB</th>
                    <th>eliminar</th>
                    <th>modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php                        foreach ($arrayau as $value): ?>
                <tr>
                    <td><?php echo $value['id_autor'];?></td>
                    <td><?php echo $value['nombre'] ?></td>
                    <td><?php echo $value['nacionalidad']?></td>
                    <td><?php echo $value ['dob'] ?></td>
                    <td><a href="<?php echo "eliminar.php?id=".$value['id_autor']; ?>">eliminar</a></td>
                    <td><a href="<?php echo "updateau.php?id=".$value['id_autor']; ?>">modificar</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
          <?php  if(isset($_GET['nacionalidadx'])){
            $autor=$_GET['autorx'];
            $nacionalidad=$_GET['nacionalidadx'];
            $dob=$_GET['dobx'];
            $id=$_GET['idx'];
            $obj->update_autor($autor, $nacionalidad, $dob, $id);
        }
        
        ?>
	</body>
            
</html>