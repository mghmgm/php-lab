<?php

namespace src\Models;
use Services\Db;

abstract class ActiveRecordEntity {
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public static function getById(int $id) :?self
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id;
        $entyties = $db->query($sql, [], static::class);
        return $entyties ? $entyties[0] : null;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function findAll(): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'`';  
        return $db->query($sql, [], static::class);
    }

    abstract protected static function getTableName(): string;

}