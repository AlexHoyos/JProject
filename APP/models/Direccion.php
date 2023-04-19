<?php

class Direccion extends AModel {

    protected static function getTablename(): string
    {
        return "direccions";
    }

    public static function createDireccion($calle, $num_int, $num_ext, $colonia, $municipio, $estado, $cp, $pais, $telefono):int {
        $nuevaDireccion = AModel::create(Self::class, ['calle', 'num_ext', 'num_int', 'colonia', 'municipio', 'estado', 'codigo_postal', 'pais', 'telefono'],
                                            ["'{$calle}'",$num_ext,"'{$num_int}'","'{$colonia}'","'{$municipio}'","'{$estado}'", intval($cp),"'{$pais}'","'{$telefono}'"]);
        
        if($nuevaDireccion){

            $direcciones = AModel::get(Self::class, "*", "WHERE telefono = '{$telefono}'", "ORDER BY id DESC", "LIMIT 1", PDO::FETCH_OBJ);
            if(isset($direcciones[0])){
                return $direcciones[0]->id;
            }
        }

        return 0;
    }

}