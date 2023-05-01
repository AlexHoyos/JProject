<?php

class Envio extends AModel {

    protected static function getTablename(): string
    {
        return "envios";
    }

    public static function createEnvio($proveedor, $guia, $url_rastreo, $costo):int {
        $nuevoEnvio = AModel::create(Self::class, ['proveedor', 'guia', 'url_rastreo', 'costo'],
                                            ["'{$proveedor}'", "'{$guia}'", "'{$url_rastreo}'", floatval($costo)]);
        
        if($nuevoEnvio){

            $envios = AModel::get(Self::class, "*", "WHERE guia = '{$guia}'", "ORDER BY id DESC", "LIMIT 1", PDO::FETCH_OBJ);
            if(isset($envios[0])){
                return $envios[0]->id;
            }
        }

        return 0;
    }

    public static function getEnviosNoEntregados():array{
        $envios = AModel::_fetch("SELECT envios.id as id, proveedor, guia, url_rastreo, costo, envios.created_at, ventas.id as id_venta FROM envios, ventas WHERE ventas.id_envio = envios.id AND estado != 'completado';", PDO::FETCH_OBJ);
        return $envios;
    }

    public static function getEnvioById($id):object|null{
        $id = intval($id);
        $envios = Self::get(Self::class, "*", "WHERE id = {$id}", "", "", PDO::FETCH_OBJ);
        if(count($envios) >= 1)
            return $envios[0];
        return null;
    }

}