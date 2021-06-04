<?php

require_once __DIR__ . '/../helper/Database.php';

class ToDoRepository
{
    private static $instance;
    private $database;
    private $todos;

    private function __construct()
    {
        $this->database = Database::getInstance();
        $this->todos = array();
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) self::$instance = new ToDoRepository();
        return self::$instance;
    }

    public function getAllToDos()
    {
        return $this->database->getAll('todo');
    }

    public function addToDo(string $todo)
    {
        $this->todos[] = $todo;
        $this->database->add('todo', $this->todos);
    }

    public function truncate()
    {
        $this->database->truncate('todo');
    }
}
