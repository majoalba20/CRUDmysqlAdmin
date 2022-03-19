<?php

require 'config/config.php';

$db = new Database();
$correcto = false;

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $sentencia = $db->mysql->prepare("UPDATE productos SET nombre=?, precio=? where id = ?;");
    $resultado = $sentencia->execute([$nombre,$precio,$id]);

    if($resultado){
        $correcto = true;
    }

}else{

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
//echo $nombre, $precio;

$sql = 'INSERT INTO productos(nombre, precio) VALUES(:nombre, :precio)';
$respuesta = $db->mysql->prepare($sql);

$respuesta->execute([
    ':nombre' => $nombre,
    ':precio' => $precio,
]);

if($respuesta){
    $correcto = true;
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>GUARDAR</title>
</head>
<body class="py-3"> 
    <main class="container">
        <div class="row">
            <div class="col">
                <?php if($correcto){ ?>
                    <h3>Registro guardado</h3>
                    <?php } else {?>
                    <h3>Error al guardar</h3>
                    <?php  } ?>
                    <a class="btn btn-secondary" href="index.php" >Atrás</a>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>