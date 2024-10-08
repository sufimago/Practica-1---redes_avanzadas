<?php
session_start(); // Inicia la sesión
$is_pro_env = false;  // Puedes utilizar variables de entorno u otra lógica para esto

// Conectar con la base de datos según el entorno
if ($is_pro_env) {
    $servername = "mysql_db_pro";
    $username = "root";
    $password = "pro-pass";
    $dbname = "pro.db";
} else {
    $servername = "mysql_db_sta";
    $username = "root";
    $password = "sta-pass";
    $dbname = "sta.db";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar el contador de conexión
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1; // Inicializa el contador
} else {
    $_SESSION['contador']++; // Incrementa el contador
}

$connection_status = "Conectado la '{$_SESSION['contador']}' vez.";
$insert_status = "";

// Procesar inserción de nuevos productos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    
    // Comprobar si el producto ya existe
    $check_sql = "SELECT * FROM TEST WHERE product_name = '$product_name'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 0) {
        // Si no existe, insertamos
        $insert_sql = "INSERT INTO TEST (product_name, product_quantity) VALUES ('$product_name', '$product_quantity')";
        
        if ($conn->query($insert_sql) === TRUE) {
            $insert_status = "Nuevo producto agregado: $product_name.";
        } else {
            $insert_status = "Error al agregar producto: " . $conn->error;
        }
    }
}

// Consulta a la base de datos
$sql = "SELECT * FROM `TEST`";
$result = $conn->query($sql);

// Cerrar conexión
$conn->close();
echo "<script>
</script>";
?>