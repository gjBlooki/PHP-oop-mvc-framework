<?php 

namespace MyProject\Services;

class Db
{
    private $pdo;

    public function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php');

        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }


    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
    
        if (false === $result) {
            return null;
        }
        //ORM технология, "\pdo::fetch_class, $className" 
        //в функции fetchAll позволяет создавать объект 
        //указанного класса и заполнять его значениями из бд
        //для каждой таблицы свой класс
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

}