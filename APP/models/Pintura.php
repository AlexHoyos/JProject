<?php

class Pintura extends AModel {

    protected static function getTablename(): string
    {
        return "pinturas";
    }

    public static function getPinturaById($id): object|null {

        $pinturas = AModel::get(Self::class, "*", "WHERE id = {$id}", "", "", PDO::FETCH_OBJ);
        if(isset($pinturas[0])){

            return $pinturas[0];

        } else {
            return null;
        }
    }

    public static function getPinturasDispo($search = "", $tipo_color = ""): array {

        return Self::_fetch("SELECT * FROM pinturas WHERE id NOT IN (SELECT id_pintura FROM ventas WHERE estado != 'cancelado') AND ( titulo LIKE '%{$search}%' OR descripcion LIKE '%{$search}%') AND tipo_color LIKE '%{$tipo_color}%' ORDER BY id DESC");
    }

    public static function getPinturasVendidas($search = ""):array {
        return Self::_fetch("SELECT * FROM pinturas WHERE id IN (SELECT id_pintura FROM ventas WHERE estado != 'cancelado') AND (titulo LIKE '%{$search}%' OR descripcion LIKE '%{$search}%') ORDER BY id DESC");
    }

    public static function isPinturaDisponible($id): bool {

        if(Self::getPinturaById($id) != null){

            return Venta::isDisponibleAVenta($id);

        } else {
            return false;
        }

    }

    public static function getAll($search = ""): array {
        return Self::get(Self::class, "*", "WHERE titulo LIKE '%{$search}%' OR descripcion LIKE '%{$search}%'", "ORDER BY id DESC", "", PDO::FETCH_OBJ);
    }

}