<?php 
require 'metodos.php';
$obj= new vista_libreria();
$arraylib= $obj->mostrar_registro();
$arrayinvent=$obj->mostrar_inventario();
$arrayproveedor=$obj->mostar_prov();
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
<h1>Registro de Proveedores<span></span></h1>	
</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
                <?php if(!$_GET):?>
        <form method="get">
            <input type="text" name="empresa" placeholder="Empresa">
            <select name="perjuridica">
                <option value="natural">NATURAL</option>
                <option value="juridica">JURIDICA</option>
            </select>
            <input type="text" name="rubro" placeholder="rubro">
            <input type="text" name="responsable" placeholder="responsable">
            <input type="tel" name="contacto" placeholder="contacto">
            <input type="submit" value="Enviar">
        </form>
        <?php endif; ?>
                
                <?php 
                    if(isset($_GET['empresa'])){
            $empresa=$_GET['empresa'];
            $perjuridica=$_GET['perjuridica'];
            $rubro=$_GET['rubro'];
            $responsable=$_GET['responsable'];
            $contacto=$_GET['contacto'];
            $obj->insert_prov($empresa, $perjuridica, $rubro, $responsable, $contacto);
        } 
   
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>EMPRESA</th>
                    <th>PERSONA JURIDICA</th>
                    <th>RUBRO</th>
                    <th>RESPONSABLE</th>
                    <th>CONTACTO</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arrayproveedor as $value3): ?>
                
                <tr>
                    <td><?php echo $value3['empresa'];?></td>
                    <td><?php echo $value3['perjuridica'];?></td>
                    <td><?php echo $value3['rubro'];?></td>
                    <td><?php echo $value3['responsable'];?></td>
                    <td><?php echo $value3['contacto'];?></td>
                    
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        </body>
            
</html>

