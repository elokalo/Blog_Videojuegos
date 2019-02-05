<?php 

function mostrarErrores($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta-error alerta'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){
    $borrado = false;

    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['error_categoria'])){
        $_SESSION['error_categoria'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['error_login'])){
        $_SESSION['error_login'] = null;
        $borrado = true;
    }

    return $borrado;
}

function obtenerCategorias($conn){

    $sql = "SELECT * FROM categorias ORDER BY id_categoria ASC;";
    $categorias = mysqli_query($conn, $sql) or die(mysql_error());
    $result = array();

    if($categorias && mysqli_num_rows($categorias)>=1){
        $result = $categorias;
    }

    return $result;
}

function obtenerCategoria($conn, $id){

    $sql = "SELECT * FROM categorias WHERE id_categoria=$id;";
    $categoria = mysqli_query($conn, $sql) or die(mysql_error());
    $result = array();

    if($categoria && mysqli_num_rows($categoria)>=1){
        $result = mysqli_fetch_assoc($categoria);
    }

    return $result;
}

function obtenerEntradas($conn, $limit=null, $categoria=null, $busqueda=null){
    $sql = "SELECT e.*, c.nombre_categoria FROM entradas e ".
            "INNER JOIN categorias c ON e.categoria_id=c.id_categoria";

    if(!empty($categoria) && is_int($categoria)){
        $sql .= " WHERE e.categoria_id=$categoria";
    }

    if(!empty($busqueda)){
        $sql .= " WHERE e.titulo LIKE '%$busqueda%'";
    }

    $sql .= " ORDER BY e.id_entrada DESC";

    if($limit){
        //LIMITADOR DE ENTRADAS A 4
        $sql.= " LIMIT 4";
    }
    $entradas = mysqli_query($conn, $sql);
    $result = array();

    if($entradas && mysqli_num_rows($entradas)>=1){
        $result = $entradas;
    }

    return $entradas;
}

function obtenerEntrada($conn, $id){

    $sql = "SELECT e.*, c.nombre_categoria, CONCAT(u.nombre, ' ', u.apellidos) AS 'usuario' FROM entradas e".
            " INNER JOIN categorias c ON".
            " e.categoria_id = c.id_categoria".
            " INNER JOIN usuarios u ON".
            " e.usuario_id = u.id_usuario".
            " WHERE e.id_entrada=$id;";
            
    $entrada = mysqli_query($conn, $sql) or die(mysql_error());
    $result = array();

    if($entrada && mysqli_num_rows($entrada)>=1){
        $result = mysqli_fetch_assoc($entrada);
    }

    return $result;
}

?>