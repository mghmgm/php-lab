<header class="nav__wrap">
    <nav class="nav">
        <ul class="nav__list">
            <?php if (isset($_GET['p']) && $_GET['p']=='home') echo '<li class="nav__item--active">';?>
                <a href="?p=home" class="nav__item">Чаты</a>
            </li>
            <?php if (isset($_GET['p']) && $_GET['p']=='form') echo '<li class="nav__item--active">';?>
                <a href="?p=form" class="nav__item">Создать хештег</a>
            </li>
        </ul>
    </nav>
</header>