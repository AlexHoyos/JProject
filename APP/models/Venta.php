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

    public static function getAllPendVentas(){
        return Self::get(Self::class, "*", "WHERE estado = 'pendiente'", "ORDER BY id DESC", "", PDO::FETCH_OBJ);
    }
    
    public static function getVentaById($id):object|null{
        $id = intval($id);
        $ventas = Self::get(Self::class, "*", "WHERE id = {$id}", "", "", PDO::FETCH_OBJ);
        if(count($ventas) >= 1)
            return $ventas[0];
        return null;
    }

    public static function confirmarPagoVenta($id):bool {
        $venta = Self::getVentaById($id);
        if($venta != null){
            if($venta->estado == "pendiente")
                return Self::update(Self::class, ["pagado" => "s"], "id", $venta->id);
        }

        return false;
    }

    public static function getVentaByEnvioId($envio_id){
        $envio_id = intval($envio_id);
        $ventas = Self::get(Self::class, "*", "WHERE id_envio = {$envio_id}", "", "", PDO::FETCH_OBJ);
        if(count($ventas) >= 1)
            return $ventas[0];
        return null;
    }

    public static function isDisponibleAVenta($pintura_id):bool{
        $ventas = AModel::get(Self::class, "*", "WHERE id_pintura = {$pintura_id} AND estado != 'cancelado'");
        return (count($ventas) == 0);
    }

    public static function getIngresosBrutosTotal($tiempo = "all"):float {
        if($tiempo == "dia"){
            $ingreso = AModel::_fetch("SELECT SUM(precio_venta) as INGRESO_BRUTO FROM ventas WHERE estado = 'completado' AND created_at = '". date("Y-m-d") ."'", PDO::FETCH_OBJ);
        } else if($tiempo == "mes"){
            $ingreso = AModel::_fetch("SELECT SUM(precio_venta) as INGRESO_BRUTO FROM ventas WHERE estado = 'completado' AND MONTH(created_at) = MONTH('". date("Y-m-d") ."')", PDO::FETCH_OBJ);
        } else if($tiempo = "anio"){
            $ingreso = AModel::_fetch("SELECT SUM(precio_venta) as INGRESO_BRUTO FROM ventas WHERE estado = 'completado' AND YEAR(created_at) = YEAR('". date("Y-m-d") ."')", PDO::FETCH_OBJ);
        } else {
            $ingreso = AModel::_fetch("SELECT SUM(precio_venta) as INGRESO_BRUTO FROM ventas WHERE estado = 'completado'", PDO::FETCH_OBJ);
        }
        
        return floatval($ingreso[0]->INGRESO_BRUTO);
    }

}