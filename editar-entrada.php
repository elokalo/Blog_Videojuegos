<?php 
require_once 'includes/redireccion.php';
require_once 'includes/header.php'; 
require_once 'includes/sidebar.php';

if(isset($_GET)){
    $id = (int)$_GET['id'];
}
$entrada = obtenerEntrada($conn, $id);

if(!isset($entrada['id_entrada'])){
    header('Location: index.php');
}
?>

<div id="principal">
    <h1>Editar Entrada <?=$entrada['titulo']; ?></h1>
    <p>Edita la entrada de <?=$entrada['titulo']; ?></p>
    <br/>
    <form action="guardar-entrada.php?editar=<?=$entrada['id_entrada']; ?>" method="POST">
        <label for="titulo">Títiulo</label>
        <input type="text" name="titulo" value="<?=$entrada['titulo']; ?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" cols="75" rows="10"><?=$entrada['descripcion']; ?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php 
                $categorias = obtenerCategorias($conn);
                if(!empty($categorias)): 
                    while($categoria = mysqli_fetch_assoc($categorias)): ?>
                        <option value="<?=$categoria['id_categoria']?>" <?=$categoria['id_categoria'] == $entrada['categoria_id'] ? 'selected="selected"' : '' ?>><?=$categoria['nombre_categoria']?></option>
            <?php  
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'categoria') : ''; ?>

        <input type="submit" value="Actualizar">
    </form>
    <?php borrarErrores(); ?>

</div> <!--#principal-->

<?php require_once 'includes/footer.php'; ?>