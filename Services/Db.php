<?php

namespace Services;

class Db{
    private $pdo;

    public function __construct(){
        $dbOptions = require('settings.php');
        $this->pdo = new \PDO(
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['database'],
            $dbOptions['username'],
            $dbOptions['password']
        );
    }

    public function query(string $sql, $params=[], string $className = 'StdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if ($result === false){
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}