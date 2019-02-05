<?php 
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
    <h1><?=$entrada['titulo']; ?></h1>
    <a href="categoria.php?id=<?=$entrada['categoria_id'];?>">
        <h2><?=$entrada['nombre_categoria']; ?></h2>
    </a>
    <br/>
    <h4><?=$entrada['fecha_entrada']; ?> | <?=$entrada['usuario'];?> </h4>

    <p>
        <?=$entrada['descripcion']; ?>
    </p>

    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id_usuario'] == $entrada['usuario_id']): ?>
        <br/>
        <a href="editar-entrada.php?id=<?=$entrada['id_entrada']; ?>" class="boton boton-verde">Editar Entrada</a>
        <a href="borrar-entrada.php?id=<?=$entrada['id_entrada']; ?>" class="boton boton-rojo">Eliminar Entrada</a>

    <?php endif; ?>

</div> <!--#principal-->
<?php require_once 'includes/footer.php'; ?>