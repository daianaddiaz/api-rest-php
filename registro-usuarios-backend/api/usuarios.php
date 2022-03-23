<?php
header("Content-Type: application/json");
include_once("../clases/class-usuarios.php");
    switch($_SERVER["REQUEST_METHOD"]){
    case 'POST': //guardar
        $_POST = json_decode(file_get_contents('php://input'),true);
        $usuario = new Usuario($_POST['nombre'],$_POST['apellido'],$_POST['fechaNacimiento'],$_POST['pais']);
        $usuario->guardarUsuario();
        $resultado["mensaje"] = "Guardar usuario. información:". json_encode($_POST);
        echo json_encode($resultado);
    break;
    case 'GET':
       if (isset($_GET['id'])){
        Usuario::obtenerUsuario($_GET['id']);
    }else{
        Usuario::obtenerUsuarios();
    }
    break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'),true);
        $usuario = new Usuario ($_PUT['nombre'],$_PUT['apellido'],$_PUT['fechaNacimiento'],$_PUT['pais']);
        $usuario -> actualizarUsuario($_GET['id']);
        $resultado["mensaje"] = "Actualizar un usuario con el id: ". ($_GET['id']) . ", Información a actualizar: ". (json_encode($_PUT));
        echo json_encode($resultado);
    break;
    case 'DELETE':
        Usuario :: eliminarUsuario($_GET['id']);
        $resultado["mensaje"] =  "Eliminar un Usuario con el id: ".$_GET['id'];
        echo json_encode($resultado);
    break;
}

//Recibir peticiones Usuario

//Crear

//Obtener un usuario
//Obtener todos los usuarios
//Actualizar un usuario
//Eliminar un usuario
?>