<?php
    include 'db.php'; // Incluimos db.php aquí para manejar la lógica de la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Practica 1 TEST</h1>
    <div class="container">
        <h1>Estado de Conexión</h1>
        <div class="status"><?php echo $connection_status; ?></div>
        <?php if ($insert_status) { echo "<div class='status'>$insert_status</div>"; } ?>

        <h2>Agregar Producto</h2>
        <form method="POST" action="" class="product-form">
            <div class="form-group">
                <input type="text" name="product_name" placeholder="Nombre del producto" required>
            </div>
            <div class="form-group">
                <input type="number" name="product_quantity" placeholder="Cantidad" required>
            </div>
            <button type="submit">Agregar</button>
        </form>

        <h2>Lista de Productos</h2>
        <div class="product-list">
            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr><th>Nombre del producto</th><th>Cantidad</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["product_quantity"]) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No hay productos en la base de datos.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>