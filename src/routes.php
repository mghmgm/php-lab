<?php
    return [
        '/(^$)/' =>[\src\Controllers\MainController::class, 'main'],
        '/hello\/([a-z]+)/' => [\src\Controllers\MainController::class,'sayHello'],
        '/articles/' => [\src\Controllers\ArticleController::class,'index'],
        '/article\/(\d+)/' => [\src\Controllers\ArticleController::class,'show'],
        '/article\/(\d+)\/edit/' => [\src\Controllers\ArticleController::class,'edit'],
        '/article\/(\d+)\/update/' => [\src\Controllers\ArticleController::class,'update'],
        '/article\/(\d+)\/delete/' => [\src\Controllers\ArticleController::class,'delete'],
    ];