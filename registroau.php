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
		<title>Libreria</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
                <link rel="stylesheet" href="style.css">
		<link rel="shortcut icon" href="../favicon.ico">
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
				
				
                                <li><a class="" href="index.php"><span>home</span></a></li>
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
                <?php if(!$_GET): ?>
                <form method="get">
            
               <input type="text" name="autor" placeholder="autor">
               <input type="text" name="nacionalidad" placeholder="nacionalidad">
            <input type="date" name="dob" placeholder="fecha de nacimiento">
            
            <button type="submit">enviar</button>
        </form>
        <?php endif; ?>
                <?php
        
        if(isset($_GET['nacionalidad'])){
            $autor=$_GET['autor'];
            $nacionalidad=$_GET['nacionalidad'];
            $dob=$_GET['dob'];
            $obj->insertar_autor($autor, $nacionalidad, $dob);
            
        }
    ?>
           <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>NOMBRE</th>
                    <th>NACIONALIDAD</th>
                    <th>DOB</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php                        foreach ($arrayau as $value): ?>
                <tr>
                    <td><?php echo $value['id_autor'];?></td>
                    <td><?php echo $value['nombre'] ?></td>
                    <td><?php echo $value['nacionalidad']?></td>
                    <td><?php echo $value ['dob'] ?></td>
                    
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
	</body>
            
</html>