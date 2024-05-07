<?php
    return [
        '/(^$)/' =>[\src\Controllers\MainController::class, 'main'],
        '/hello\/([a-z]+)/' => [\src\Controllers\MainController::class,'sayHello'],
        '/articles/' => [\src\Controllers\ArticleController::class,'index'],
        '/article\/(\d+)/' => [\src\Controllers\ArticleController::class,'show']
    ];