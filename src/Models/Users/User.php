<?php

namespace src\Models\Users;

    class User{
        private $nickname;

        public function __set($name, $value){
            $property = $this->underscoreToCamelcase($name);
            $this->$property = $value;
        }

        private function underscoreToCamelcase($name){
            return lcfirst(str_replace('_', '', ucwords($name, '_')));
        }

        public function getNickname(){
            return $this->nickname;
        }
    }