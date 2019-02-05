<?php 
require_once 'includes/redireccion.php';
require_once 'includes/header.php'; 
require_once 'includes/sidebar.php';
?>

<div id="principal">
    <h1>Crear categoría</h1>

    <p>Añade nuevas categorías al blog para que los usuarios puedan usarlas al crear sus entradas.</p>
    <br/>
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre de la categoría</label>
        <input type="text" name="nombre" id="">
        <?php echo isset($_SESSION['error_categoria']) ? mostrarErrores($_SESSION['error_categoria'], 'nombre') : ''; ?>
        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?> 
</div> <!--#principal-->


<?php require_once 'includes/footer.php'; ?>