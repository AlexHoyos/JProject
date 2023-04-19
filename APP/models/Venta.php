<?php

class Venta extends AModel {

    protected static function getTablename(): string
    {
        return "ventas";
    }

    public static function createVenta($id_pintura, $nombre, $apellidos, $telefono, $correo, $precio_venta, $id_direccion):bool {
        return Self::create(Self::class, ['id_pintura', 'nombre', 'apellidos', 'telefono', 'correo', 'precio_venta', 'id_direccion'],
                                    [$id_pintura, "'{$nombre}'", "'{$apellidos}'", "'{$telefono}'", "'{$correo}'", $precio_venta, $id_direccion]);
    }

    public static function isDisponibleAVenta($pintura_id):bool{
        $ventas = AModel::get(Self::class, "*", "WHERE id_pintura = {$pintura_id} AND estado != 'cancelado'");
        return (count($ventas) == 0);
    }

}