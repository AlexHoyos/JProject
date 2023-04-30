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

    public static function getPinturasDispo(): array {

        return Self::_fetch("SELECT * FROM pinturas WHERE id NOT IN (SELECT id_pintura FROM ventas WHERE estado != 'cancelado')");
    }

    public static function isPinturaDisponible($id): bool {

        if(Self::getPinturaById($id) != null){

            return Venta::isDisponibleAVenta($id);

        } else {
            return false;
        }

    }

    public static function getAll(): array {
        return Self::get(Self::class, "*", "", "ORDER BY id DESC", "", PDO::FETCH_OBJ);
    }

}