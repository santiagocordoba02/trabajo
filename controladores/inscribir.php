<?php
// Paso 1: importar la libreria
require "../Confi/conex.php";

// Paso 2: Verificar si se han enviado todos los datos esperados
if(isset($_POST["nombre"], $_POST["documento"], $_POST["celular"], $_POST["tipo_sangre"], $_POST["sexo"])) {
    // Almacenar las variables
    
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $celular = $_POST["celular"];
    $tipo_sangre = $_POST["tipo_sangre"];
    $sexo = $_POST["sexo"];
    
    $fecha_sys = date('Y-m-d H:i:s');
    
    // Paso 3: armar el SQL en una variable, asegurando que los valores estén correctamente escapados y rodeados de comillas si son de tipo string
    $sql_insertar = "INSERT INTO inscriciones(fecha_Sys, nombre, documento, celular, tipo_sangre, sexo)
                    VALUES ( '$nombre', '$documento', '$celular', '$tipo_sangre', '$sexo','$fecha_sys')";
    
    // Paso 4: enviar a la BD
    if($dbh->query($sql_insertar)) {
        echo "Información registrada correctamente";
    } else {
        echo "Error al registrar la información: " . $dbh->errorInfo()[2]; 
    }
} else {
    echo "Error: No se han recibido todos los datos esperados.";
}
?>