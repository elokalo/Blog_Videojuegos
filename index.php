<?php 
require_once 'includes/header.php';
require_once 'includes/sidebar.php'; 
?>

<div id="principal">
    <h1>Ultimas entradas</h1>
    <?php $entradas = obtenerEntradas($conn, true); 
    if(!empty($entradas)):
        while($entrada = mysqli_fetch_assoc($entradas)): ?>
            <article class="entrada">

                <a href="entrada.php?id=<?=$entrada['id_entrada'];?>"><h2><?=$entrada['titulo']; ?></h2></a>
                <span class="categoria-fecha"><?=$entrada['nombre_categoria'].' | '.$entrada['fecha_entrada']; ?></span>
                <p>
                    <?=substr($entrada['descripcion'], 0, 200)?><a href="entrada.php?id=<?=$entrada['id_entrada'];?>"><span id="leer-mas"> ...Leer más</span></a>
                </p>

            </article>
    <?php endwhile;
    endif; ?>
    <div id="ver-todas">
        <a href="entradas.php">Ver todas las entradas</a>
    </div>
</div> <!--#principal-->

<?php require_once 'includes/footer.php'; ?>