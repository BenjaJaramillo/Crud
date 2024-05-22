<?php
include('cliente.class.php');
$app = new Cliente();
//include('header.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id_idioma = (isset($_GET['id_idioma'])) ? $_GET['id_idioma'] : null;
$datos = array();
$alerta= array();
switch ($action) {
    case 'delete':
        $fila = $app->Delete($id_idioma);
        if ($fila) {
            $alerta['tipo']="success";
            $alerta['mensaje']="Cliente eliminado correctamente";
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="No se pudo eliminar al cliente";
        }
        $datos = $app->getAll();
        //include('views/alert.php');
        include('cliente/index.php');
        break;
    case 'create':
        include('cliente/form.php');
        break;
    case 'save':
        $datos = $_POST;
        if ($app->Insert($datos)) {
            $alerta['tipo']="success";
            $alerta['mensaje']="El cliente se registro correctamente";
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="No se pudo registrar al cliente";
        }
        $datos = $app->getAll();
        //include('views/alert.php');
        include('cliente/index.php');
        break;
    case 'update':
        $datos = $app->getOne($id_idioma);
        if (isset($datos["id_idioma"])) {
            include('cliente/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="No existe el cliente especificado.";
            $datos = $app->getAll();
            //include('views/alert.php');
            include('cliente/index.php');
        }
        
        break;
    case 'change':
        $datos = $_POST;
        if ($app->Update($id_cliente,$datos)) {
            $alerta['tipo']="success";
            $alerta['mensaje']="El cliente se actualizó correctamente";
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="No se pudo actualizar al cliente";
        }
        $datos = $app->getAll();
        //include('views/alert.php');
        include('cliente/index.php');
        break;
    default:
        $datos = $app->getAll();
        include('cliente/index.php');
}
//include('footer.php');
