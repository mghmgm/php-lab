<?php

namespace src\Controllers;
use src\View\View;
use src\Models\Articles\Article;
use src\Models\Users\User; 

class ArticleController{
    public $view;
    public $db;

    public function __construct(){
        $this->view = new View('../templates/');
    }

    public function index(){
        $articles=Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles'=>$articles]);
    }

    public function show(int $id){
        $article = Article::getById($id);

        $reflector = new \ReflectionObject($article);
        $properties = $reflector->getProperties();
        $propertiesNames = [];
        foreach ($properties as $property) {
            $propertiesNames[] = $property->getName();
        }

        if ($article == []){
            $this->view->renderHtml('errors/404.php',[],404);
            return;
        };

        $this->view->renderHtml('articles/show.php', ['article'=>$article]);
    }
}