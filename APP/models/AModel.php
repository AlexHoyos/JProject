<?php

abstract class AModel {

    protected static $connection;

    abstract protected static function getTablename():string;

    public static function SetConnection(PDO $conn):void {
        Self::$connection = $conn;
    }

    public static function get($class = Self::class, $attr = "*", $conditions = "", $orderBy = "", $limit = "", $pdoMode = PDO::FETCH_ASSOC):array{

        try {

            $stmt = Self::$connection->prepare("SELECT {$attr} FROM ".$class::getTablename()." "
                . "{$conditions} {$orderBy} {$limit}");
            $stmt->execute();
            
            $rows = $stmt->fetchAll($pdoMode);
            return $rows;

        } catch(PDOException $e){
            return [];
        }

    }

    public static function create($class = Self::class, array $attr, array $values):bool{
        try {

            $attr = implode(",", $attr);
            $values = implode(",", $values);
            $stmt = Self::$connection->prepare("INSERT INTO ".$class::getTablename()." ({$attr}) VALUES ({$values})");
            $stmt->execute();

            return true;

        } catch(PDOException $e){
            return false;
        }
    }

    public static function delete($class = Self::class, string $attrCondition = "id", string|int $value):bool{

        try {

            if(is_string($value))
                $value = "'{$value}'";

            $stmt = Self::$connection->prepare("DELETE FROM ".$class::getTablename()." WHERE {$attrCondition} = {$value}");
            $stmt->execute();

            return true;

        } catch(PDOException $e){
            return false;
        }

    }

    public static function update($class = Self::class, array $attr, string $attrCondition = "id", string|int $value):bool{

            $changesStr = "";
            foreach($attr as $attrName => $attrValue){
                if(is_string($attrValue))
                    $attrValue = "'{$attrValue}'";
                $changesStr .= "{$attrName}={$attrValue}, ";
            }

            $changesStr = rtrim($changesStr, ", ");

            try {

                if(is_string($value))
                    $value = "'{$value}'";
                $stmt = Self::$connection->prepare("UPDATE ".$class::getTablename()." SET {$changesStr} WHERE {$attrCondition} = {$value}");
                $stmt->execute();
                return true;

            } catch(PDOException $e){
                return false;
            }

    }

}