<?php 
require_once 'includes/header.php'; 
require_once 'includes/sidebar.php';

if(!isset($_POST['busqueda'])){
    header('Location: index.php');
} else {
    $entradas = obtenerEntradas($conn, null, null, $_POST['busqueda']);
}

?>
<div id="principal">
    <h1>Entradas de <?=$_POST['busqueda']; ?></h1>
    <?php 
    if(!empty($entradas) && mysqli_num_rows($entradas)>=1):
        while($entrada = mysqli_fetch_assoc($entradas)): ?>
            <article class="entrada">
                
            <a href="entrada.php?id=<?=$entrada['id_entrada'];?>"><h2><?=$entrada['titulo']; ?></h2></a>
                    <span class="categoria-fecha"><?=$entrada['nombre_categoria'].' | '.$entrada['fecha_entrada']; ?></span>
                    <p>
                        <?=substr($entrada['descripcion'], 0, 200)?><a href="entrada.php?id=<?=$entrada['id_entrada'];?>"><span id="leer-mas"> ...Leer más</span></a>
                    </p>
                
            </article>
    <?php 
        endwhile;
    else: 
    ?>
    <br/>
    <div class="alerta alerta-error">No hay entradas en esta categoría</div>
    <?php endif; ?>

</div> <!--#principal-->

<?php require_once 'includes/footer.php'; ?>