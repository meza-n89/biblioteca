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
		<link rel="shortcut icon" href="../favicon.ico">
                <link rel="stylesheet" href="style.css">
                <link rel="stylesheet" href="stylepop.css">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
                <link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html" />
                <script src="popup.js"></script>
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
<h1>Registro de Libros<span></span></h1>	
</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
           <?php if(!$_GET): ?>
        <form method="get">
            <input type="text" name="isbn" placeholder="isbn">
            <input type="text" name="titulo" placeholder="titulo">
            <input type="date" name="fecha" placeholder="fecha">
            <input type="text" name="tomo" placeholder="tomo">
            <input type="text" name="edicion" placeholder="edicion">
            <input type="text" name="paginas" placeholder="paginas">
            <input type="text" name="editorial" placeholder="editorial">
            <select name="genero">
                <option value="Policial">Policial</option> 
                 <option value="Policial">Policial</option>  
                  <option value="Policial">Policial</option>
                   <option value="Policial">Policial</option> 
                    <option value="Policial">Policial</option>
                     <option value="Policial">Policial</option>  
            </select>
            <br>
            <select name="id_autor">
                <?php foreach ($arrayau as $value):?>
                <option value="<?php echo $value ['id_autor'] ?>"><?php echo $value ['nombre'] ?></option>
                <?php endforeach;?>
            </select>
            <div class="btn-sign">
                <a  href="#login-box" class="login-window">Nuevo autor</a>
        	</div>
            <br>
            <button type="submit">enviar</button>
            
        </form>
                <?php endif; ?>
                
                <div id="login-box" class="login-popup">
        <a href="#" class="close">X</a>
        
               <form method="get">
            
               <input type="text" name="autor" placeholder="autor">
               <input type="text" name="nacionalidad" placeholder="nacionalidad">
            <input type="date" name="dob" placeholder="fecha de nacimiento">
            
            <button type="submit">enviar</button>
        </form>
                      <?php
        
        if(isset($_GET['nacionalidad'])){
            $autor=$_GET['autor'];
            $nacionalidad=$_GET['nacionalidad'];
            $dob=$_GET['dob'];
            $obj->insertar_autorpop($autor, $nacionalidad, $dob);
            
        }
    ?>
              
 
        </div>
        
                        <?php
        if(isset($_GET['titulo'])){
            
            $isbn=$_GET['isbn'];
            $titulo=$_GET['titulo'];
            $fecha=$_GET['fecha'];
            $tomo=$_GET['tomo'];
            $edicion=$_GET['edicion'];
            $paginas=$_GET['paginas'];
            $editorial=$_GET['editorial'];
            $genero=$_GET['genero'];
            $id_libro=$_GET['id_libro'];
            
            $obj->insertar_registro($isbn, $titulo, $fecha, $tomo, $edicion, $paginas, $editorial, $genero);
            
        }
 
    ?>
                <table border="1">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>TITULO</th>
                    <th>FECHA</th>
                    <th>TOMO</th>
                    <th>EDICION</th>
                    <th>GENETO</th>
                    <th>PAGINAS</th>
                    <th>EDITORIAL</th>
                    <th>MODIFICAR</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $value): ?>
                <tr>
                    <td><?php echo $value['isbn'] ?></td>
                    <td><?php echo $value['titulo'] ?></td>
                    <td><?php echo $value['fecha'] ?></td>
                    <td><?php echo $value['tomo'] ?></td>
                    <td><?php echo $value['edicion'] ?></td>
                    <td><?php echo $value['genero'] ?></td>
                    <td><?php echo $value['paginas'] ?></td>
                    <td><?php echo $value['editorial'] ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
	</body>
            
</html>
