<?php

namespace src\Models\Users;
use src\Models\ActiveRecordEntity;

    class User extends ActiveRecordEntity {
        protected $nickname;
        protected $email;
        protected $isConfirmed;
        protected $role;
        protected $passwordHash;
        protected $authToken;
        protected $createdAt;

        public function getNickname(){
            return $this->nickname;
        }

        protected static function getTableName(): string
        {
            return 'users';
        }
    }