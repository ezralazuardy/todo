<?php

require_once __DIR__ . '/../vendor/SleekDB/Store.php';

use SleekDB\Store;

class Database
{
    private const DATABASE_DIRECTORY = __DIR__ . "/database";
    private static $instance;

    private function __construct()
    {
        // disable public constructor
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) self::$instance = new Database();
        return self::$instance;
    }

    public function getAll(string $key)
    {
        $data = new Store($key, Database::DATABASE_DIRECTORY);
        return $data->findAll();
    }

    public function add(string $key, $value)
    {
        $data = new Store($key, Database::DATABASE_DIRECTORY);
        $data->insert($value);
    }

    public function truncate(string $key)
    {
        $data = new Store($key, Database::DATABASE_DIRECTORY);
        $data->deleteStore($data);
    }
}
