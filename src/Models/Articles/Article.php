<?php

namespace src\Models\Articles;
use src\Models\Users\User;

    class Article{
        private $id;
        private $name;
        private $text;
        private $authorId;
        private $createdAt;

        public function __set($name, $value){
            $property = $this->underscoreToCamelcase($name);
            $this->$property = $value;
        }

        private function underscoreToCamelcase($name){
            return lcfirst(str_replace('_', '', ucwords($name, '_')));
        }
        // public function __construct(){}
        public function getId(){
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getText(){
            return $this->text;
        }
        public function getAuthorId()
        {
            return $this->authorId;
        }
    }