<?php 

namespace MyProject\Models;
use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getById($id): ?self
    {
        $db = new Db();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id = :id;', 
            [':id' => $id],
            static::class);
        return $entities ? $entities[0] : null;    
    }
    //Магический метод, в $name принимается свойство-имя поля таблицы, 
    //которое не указано в классе, $value - содержимое поля
    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    public static function findAll(): array
    {
        $db = new Db();
        //static:: обращается к тому классу, в котором он был вызван 
        //(полезно при наследовании от другого класса, в котором метод был объявлен. 
        //Сущность паттерна Active Record)
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    abstract protected static function getTableName(): string;
}