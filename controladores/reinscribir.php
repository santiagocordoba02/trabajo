<?php
// Paso 1: importar la libreria
require "../Confi/conex.php";

// Paso 2: Verificar si se han enviado todos los datos esperados
if(isset($_POST["nombre"], $_POST["documento"], $_POST["celular"], $_POST["tipo_sangre"], $_POST["sexo"])) {

    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $celular = $_POST["celular"];
    $tipo_sangre = $_POST["tipo_sangre"];
    $sexo = $_POST["sexo"];
    
    $fecha_sys = date('Y-m-d H:i:s');
    
    // Paso 3: armar el SQL en una variable, asegurando que los valores estén correctamente escapados y rodeados de comillas si son de tipo string
    $sql_insertar =UPDATE inscriciones SET fecha_Sys='$fecha_sys',nombre='$nombre',documento= '$documento',celular='$celular',tipo_sangre='$tipo_sangre',sexo='$sexo';
    // Paso 4: enviar a la BD
    try {
        $stmt = $dbh->prepare($sql_insertar);
        $stmt->execute();
        echo "Información actualizada correctamente";
    } catch(PDOException $e) {
        echo "Error al actualizar la información: " . $e->getMessage();
    }
} else {
    echo "Error: No se han recibido todos los datos esperados.";
}
?>

