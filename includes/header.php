<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Blog de Videojuegos</title>
        <link rel="stylesheet" href="./assets/css/main.css">
    </head>
    <body>
        <!--HEADER-->
        <header id="header">
            <div id="logo">
                <a href="index.php">
                    Blog de Videojuegos
                </a>
            </div> <!--#logo-->

            <!--MENU-->
            <nav id="menu">
                <ul>
                    <li> 
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php $categorias = obtenerCategorias($conn);
                    if(!empty($categorias)):
                        while($categoria=mysqli_fetch_assoc($categorias)): ?>
                        <li> 
                            <a href="categoria.php?id=<?=$categoria['id_categoria'] ?>"><?= $categoria['nombre_categoria']; ?></a>
                        </li>
                    <?php 
                        endwhile;
                    endif; 
                    ?>
                    <li> 
                        <a href="index.php">Sobre Mí</a>
                    </li>
                    <li> 
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header> 
        
    <div id="container">