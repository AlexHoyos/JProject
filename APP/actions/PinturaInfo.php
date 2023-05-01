<?php
include '../main.php';

$info = [];
header('Content-Type: application/json; charset=utf-8');

if(isset($_GET["id"])){

    $id = intval($_GET["id"]);
    $pintura = Pintura::getPinturaById($id);
    if($pintura != null){
        $info["pintura"] = (array) $pintura;
        $info["status"] = "success";
        $info["msg"] = "Pintura recuperada con exito";
    } else {
        $info["status"] = "error";
        $info["msg"] = "No se encontro la pintura";
    }

} else {
    $info["status"] = "error";
    $info["msg"] = "No se proporcionaron todos los parametros";
}

echo json_encode($info);
