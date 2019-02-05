<?php 
require_once 'includes/redireccion.php';
require_once 'includes/header.php'; 
require_once 'includes/sidebar.php';
?>

<div id="principal">
    <h1>Crear entrada</h1>

    <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y compartir el contenido.</p>
    <br/>
    <form action="guardar-entrada.php" method="POST">
        <label for="titulo">Títiulo</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" cols="75" rows="10"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php 
                $categorias = obtenerCategorias($conn);
                if(!empty($categorias)): 
                    while($categoria = mysqli_fetch_assoc($categorias)): ?>
                        <option value="<?=$categoria['id_categoria']?>"><?=$categoria['nombre_categoria']?></option>
            <?php  
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'categoria') : ''; ?>

        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?> 
</div> <!--#principal-->

<?php require_once 'includes/footer.php'; ?>