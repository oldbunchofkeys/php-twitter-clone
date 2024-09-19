<?php
// connect to the database and execute a query
require_once('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


class Database {
    public $connection;

    public function __construct($config, $username = null, $password = null) {
        $username = $_ENV['USERNAME'];
        $password = $_ENV['PASSWORD'];

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }
    public function query($query, $params = []) {

        $statement = $this->connection->prepare($query);

        //this is where we can bind the parameters for the sql query
        //in index.php

        $statement->execute($params);

        return $statement;
    }
}