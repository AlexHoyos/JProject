<?php

class Mensaje extends AModel {

    protected static function getTablename(): string
    {
        return "mensajes";
    }

    public static function getNewMsgCount():int{

        $newMsg = Self::get(Self::class, "*", "WHERE atendido = 'n'", "", "LIMIT 99");

        return count($newMsg);

    }

    public static function createMessage($nombre, $email, $telefono, $mensaje):bool{
        return Self::create(Self::class, ['nombre', 'correo', 'telefono', 'mensaje'],["'{$nombre}'", "'{$email}'", "'{$telefono}'", "'{$mensaje}'"]);
    }

}