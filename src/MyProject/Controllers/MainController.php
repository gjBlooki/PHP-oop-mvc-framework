<?php
namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;


class MainController
{
    private $view;

    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
        $this->db = new Db();
    }

    public function main()
    {
        //ORM технология
        //Active Records паттерн
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);

    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
    }

    public function bye(string $name)
    {
        echo 'Пока ' . $name;
    }

}