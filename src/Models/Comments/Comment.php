<?php

namespace src\Models\Comments;
use src\Models\Users\User;
use src\Models\Articles\Article;
use src\Models\ActiveRecordEntity;

    class Comment extends ActiveRecordEntity {
        protected $authorId;
        protected $articleId;
        protected $text;
        protected $createdAt;

        public function getText() {
            return $this->text;
        }
        public function getAuthorId() {
            return User::getById($this->authorId);
        }
        public function getArticleId() {
            return Article::getById($this->articleId);
        }

        public function setAuthorId(int $authorId){
            $this->authorId = $authorId;
        }
        public function setArticleId(int $articleId){
            $this->articleId = $articleId;
        }
        public function setText(string $text){
            $this->text = $text;
        }
        
        protected static function getTableName(): string {
            return 'comments';
        }
    }