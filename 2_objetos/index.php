<?php
//index.php
$nroEjercicio = 2;
include "../header.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-
awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
.wrapper{
width: 600px;
margin: 0 auto;
}
table tr td:last-child{
width: 120px;
}
</style>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="mt-5 mb-3 clearfix">
<h2 class="pull-left">Listado de Empleados</h2>
<a href="create.php" class="btn btn-success pull-right"><i class="fa fa-
plus"></i> Agregar Nuevo</a>
</div>
<?php
// Incluir archivo de configuración
require_once "config.php";
// Intentar la ejecución de la consulta de selección
$sql = "SELECT * FROM employees";
if($result = $mysqli->query($sql)){
if($result->num_rows > 0){
echo '<table class="table table-bordered table-striped">';
echo "<thead>";
echo "<tr>";
echo "<th>Nro</th>";
echo "<th>Nombres</th>";
echo "<th>Correo Electronico</th>";
echo "<th>Salario</th>";
echo "<th>Acciones</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while($row = $result->fetch_array()){
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['salary'] . "</td>";
echo "<td>";
echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" 
title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" 
title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
echo '<a href="delete.php?id='. $row['id'] .'" 
title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
echo "</td>";
echo "</tr>";
}
echo "</tbody>"; 
echo "</table>";
// Conjunto de resultados
$result->free();
} else{
echo '<div class="alert alert-danger"><em>No se encontraron 
registros.</em></div>';
}
} else{
echo "¡Ups! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
}
// Cerrando la Conexión
$mysqli->close();
?>
</div>
</div>
</div>
</div>
</body>
</html>
