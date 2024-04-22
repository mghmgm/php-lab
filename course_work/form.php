<form action="" method="POST" class="hastag-form">
    <label>Введите название хештега
        <input type="text" class="hastag-form__inpt" name="name" placeholder="#">
    </label>
    <button class="hastag-form__btn">Создать</button>
</form>


<?php

if (isset($_POST['name'])) {
    if (!empty($_POST['name'])) {
        $sql = "INSERT INTO `hashtag` (`name`) VALUES ('".htmlspecialchars($_POST['name'])."')";
        mysqli_query($connect, $sql);
    }
};

?>
