<?php

namespace src\Controllers;
use src\View\View;
use src\Models\Articles\Article;
use src\Models\Users\User; 
use src\Models\Comments\Comment; 

class ArticleController{
    public $view;
    public $db;

    public function __construct(){
        $this->view = new View('../templates/');
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles'=>$articles]);
    }

    public function show(int $id){
        $article = Article::getById($id);
        $comments = Comment::findAllByFk('article_id', $id);

        if ($article == []){
            $this->view->renderHtml('errors/404.php',[],404);
            return;
        };
        $this->view->renderHtml('articles/show.php', ['article'=>$article, 'comments'=>$comments]);
    }

    public function create(){
        $this->view->renderHtml('articles/create.php');
    }

    public function edit(int $id){
        $article = Article::getById($id);
        $this->view->renderHtml('articles/update.php', ['article'=>$article]);
    }

    public function store(){
        $article = new Article;
        
        $article->setName($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();

        $articleId = $article->getId();

        header('Location:/php-курс/www/articles');
        
    }

    public function update(int $id){
        $article = Article::getById($id);
        $article->setName($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location:/php-курс/www/article/'.$article->getId());
    }

    public function delete(int $id){
        $article = Article::getById($id);
        $article->delete();
        header('Location:/php-курс/www/articles');
    }

    public function storeComment(){
        $comment = new Comment;
        
        $comment->setAuthorId($_POST['authorId']);
        $comment->setArticleId($_POST['articleId']);
        $comment->setText($_POST['text']);
        $comment->save();
        
        $articleId = $_POST['articleId'];
        $commentId = $comment->getId();
    
        header('Location:/php-курс/www/article/'.$articleId.'#comment'.$commentId);
        exit();
    }

    public function editComment(int $id){
        $comment = Comment::getById($id);
        $this->view->renderHtml('comments/update.php', ['comment'=>$comment]);
    }

    public function updateComment(int $id){
        $comment = Comment::getById($id);
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['authorId']);
        $comment->save();

        $articleId = $comment->getAuthorId()->getId();

        header('Location:/php-курс/www/article/'.$articleId);
    }
}