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

    public static function getNewMessages():array {
        return Self::get(Self::class, "*", "WHERE atendido = 'n'", "", "", PDO::FETCH_OBJ);
    }

    public static function getMessageById($id):object|null {
        $mensajes =  Self::get(Self::class, "*", "WHERE id = ".intval($id), "", "LIMIT 1", PDO::FETCH_OBJ);
        if(count($mensajes) >= 1)
            return $mensajes[0];
        return null;
    }

    public static function createMessage($nombre, $email, $telefono, $mensaje):bool{
        return Self::create(Self::class, ['nombre', 'correo', 'telefono', 'mensaje'],["'{$nombre}'", "'{$email}'", "'{$telefono}'", "'{$mensaje}'"]);
    }

}