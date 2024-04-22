<?php

namespace Controllers;
use View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../templates');
    }

    public function main()
    {
        $articles = [
            ['title' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['title' => 'Статья 2', 'text' => 'Текст статьи 2'],
        ];

        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name]);
    }

    public function sayBye(string $name)
    {
        $this->view->renderHtml('main/bye.php', ['name' => $name]);
    }

}