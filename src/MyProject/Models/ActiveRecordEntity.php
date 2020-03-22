<?php 

namespace MyProject\Models;
use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getById($id): ?self
    {
        $db = Db::getInstance();
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
        $db = Db::getInstance();

        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('#(?<!^)[A-Z]#', '_$0', $source));
    }

    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            // var_dump($mappedProperties);
            $this->insert($mappedProperties);
        }
    }

    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index; // :param1
            $columns2params[] = $column . ' = ' . $param; //column1 = :param1
            $params2values[':param' . $index] = $value; // [:param1 => value1]
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }


    private function insert(array $mappedProperties): void
    {
        $filteredProperties = array_filter($mappedProperties);


        $columns = [];
        $paramsNames = [];
        $params2values = [];
        foreach ($filteredProperties as $columnName => $value) {
            $columns[] = '`' . $columnName. '`';
            $paramName = ':' . $columnName;
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $value;
        }

        $columnsViaSemicolon = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsNames);

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();

        $this->refresh();
    }

    private function refresh(): void
    {
        $objectFromDb = static::getById($this->id);

        $reflector = new \ReflectionObject($objectFromDb);
        $properties = $reflector->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $this->$propertyName = $property->getValue($objectFromDb);
        }
    }

    public function delete():void
    {
        $sql = 'DELETE FROM `' . static::getTableName() . '` WHERE id = :id;';
        $params = [':id' => $this->id];
        
        $db = Db::getInstance();
        $db->query($sql, $params);
        $this->id = null;

    }

    //Используем Reflection API, чтобы получить
    //все свойства наследника данного класса
    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }
        return $mappedProperties;
    }

    public static function findValueInColumn($column, $value, $limit = 1)
    {
        $db = Db::getInstance();

        $result = $db->query(
            'SELECT * FROM ' . static::getTableName() . 
            ' WHERE ' . $column . '= :value LIMIT ' . $limit . ';', 
            [':value' => $value],
            static::class
        );

        if($result === []) {
            return;
        }

        if($limit === 1){
            return $result[0];
        } else {
            return $result;
        }
        
    }

    abstract protected static function getTableName(): string;
}