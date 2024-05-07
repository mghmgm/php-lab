<?php

namespace src\Controllers;
use src\View\View;
use Services\Db;
use src\Models\Articles\Article;
use src\Models\Users\User; 

class ArticleController{
    public $view;
    public $db;

    public function __construct(){
        $this->view = new View('../templates/');
        $this->db = new Db;
    }

    public function index(){
        $sql = 'SELECT * FROM `articles`';
        $articles = $this->db->query($sql, [], Article::class);
        $this->view->renderHtml('articles/index.php', ['articles'=>$articles]);
    }

    public function show(int $id){
        $sql = 'SELECT * FROM `articles` WHERE `id`='.$id;
        $article = $this->db->query($sql, [], Article::class);
        

        $sql = 'SELECT * FROM `users` WHERE `id`='.$id;

        $authorId = $article[0]->getAuthorId();
        $sql = 'SELECT `nickname` FROM `users` WHERE `id` ='.$authorId;
        $author = $this->db->query($sql, [], User::class);

        if ($article == []){
            $this->view->renderHtml('errors/404.php',[],404);
            return;
        };

        $this->view->renderHtml('articles/show.php', ['article'=>$article[0],'author'=>$author[0]]);
    }
}