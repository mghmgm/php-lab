<?php

namespace src\Models\Articles;
use src\Models\Users\User;
use src\Models\ActiveRecordEntity;

    class Article extends ActiveRecordEntity {
        protected $name;
        protected $text;
        protected $authorId;
        protected $createdAt;
        
        public function getName(){
            return $this->name;
        }
        public function getText(){
            return $this->text;
        }
        public function getAuthorId()
        {
            return User::getById($this->authorId);
        }

        public function setName(string $name){
            $this->name = $name;
        }
        public function setText(string $text){
            $this->text = $text;
        }
        public function setAuthorId(int $authorId){
            $this->authorId = $authorId;
        }

        protected static function getTableName(): string
        {
            return 'articles';
        }
    }