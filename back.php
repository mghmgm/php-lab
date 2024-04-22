<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
            display: flex;
        }
        main {
            margin: 50px;
        }
        h1 {
            margin-left: 170px;
        }
    </style>
</head>
<body>
    <header> 
        <img src="logo.jpg" width='220px' height='60px' alt="">
        <h1>Домашняя работа: Feedback form</h1>
    </header>
    <main>
        <?php 
            $headers = get_headers('http://127.0.0.1/php-курс/lab-3/index.html');
            foreach ($headers as $element){
                echo $element . "<br>";
            }
        ?>
        <a href="index.html">Переход на 1 страницу</a>
    </main>
    <footer>
        <ul>
            <li>footer item</li>
            <li>footer item</li>
            <li>footer item</li>
        </ul>
    </footer>
</body>
</html>