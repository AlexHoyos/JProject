<?php

class Admin extends AModel {

    protected static function getTablename(): string
    {
        return "admins";
    }

    public static function userExists($user):array|null {
        $checkUser = Self::get(Self::class, "*", "WHERE usuario = '{$user}'");
        
        if(isset($checkUser[0])){
            return $checkUser[0];
        } else {
            return null;
        }
    }

    public static function getById($id):object|null{
        $id = intval($id);
        $checkUser = Self::get(Self::class, "*", "WHERE id = {$id}", "", "", PDO::FETCH_OBJ);
        
        if(isset($checkUser[0])){
            return $checkUser[0];
        } else {
            return null;
        }
    }

    public static function login($username, $password):bool {

        $user = Self::userExists($username, $password);
        if($user != null)
            return password_verify($password, $user["password"]);
        

        return false;
    }



}