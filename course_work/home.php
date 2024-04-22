<ul class="hashtags">
    <?php 
        $sql = 'SELECT * FROM `hashtag`';
        $res = mysqli_query($connect, $sql);
    ?>

    <?php while($row = mysqli_fetch_assoc($res)):?>
    <?php 
            $queryParams = $_GET;
            $queryParams['hash_id'] = $row['id'];
            unset($queryParams['user_id']);
            $url = strtok($_SERVER['REQUEST_URI'], '?') . '?' . http_build_query($queryParams);
    ?>
    <li>
        <?php if (isset($_GET['p']) && $_GET['p'] == 'home' && isset($_GET['hash_id']) && ($_GET['hash_id'] == $row['id'])): ?>
            <a class="hash__link hash__link--active" href="<?= $url; ?>"><?=$row['name'];?></a>
        <?php else: ?>
            <a class="hash__link" href="<?= $url; ?>"><?=$row['name'];?></a> 
        <?php endif; ?>
    </li>
    <?php endwhile;?>
</ul>

<div class="chats">

    <ul class="chats__users">
        <?php 
            $sql = 'SELECT * FROM `user`';
            $res = mysqli_query($connect, $sql);
        ?>

        <?php while($row = mysqli_fetch_assoc($res)):?>
        <?php 
            $queryParams = $_GET;
            $queryParams['user_id'] = $row['id'];
            unset($queryParams['hash_id']);
            $url = strtok($_SERVER['REQUEST_URI'], '?') . '?' . http_build_query($queryParams);
        ?>
        <li>
            <?php if (isset($_GET['p']) && $_GET['p'] == 'home' && isset($_GET['user_id']) && ($_GET['user_id'] == $row['id'])): ?>
                <a class="chats__link chats__link--active" href="<?= $url; ?>"><?=$row['name'];?></a>
            <?php else: ?>
                <a class="chats__link" href="<?= $url; ?>"><?=$row['name'];?></a> 
            <?php endif; ?>
        </li>
        <?php endwhile;?>
    </ul>

    <ul class="chats__messages">
        <?php 
            $sql = 'SELECT * FROM `user`';
            $res = mysqli_query($connect, $sql);
          
            $users = [];    
            while ($user = mysqli_fetch_assoc($res)) {
                $users[] = $user;
            };
        ?>

        <?php 
            $sql = 'SELECT * FROM `hashtag`';
            $res = mysqli_query($connect, $sql);

            $hashs = [];    
            while ($hashs = mysqli_fetch_assoc($res)) {
                $hashs[] = $hashs;
            };
        ?>

        <?php 
        if(isset($_GET['user_id'])) {
            $userId = $_GET['user_id'];
            $sql = "SELECT * FROM `sms` WHERE `user_id` = $userId";
            $res = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_assoc($res)): ?>
                    <li class="chats__item">
                        <?php foreach ($users as $user): ?>
                            <?php if ($user['id'] == $row['user_id']): ?>
                                <p class="chats__username"><?= $user['name']; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?> 
                    <p><?= $row['data']; ?></p>
                    </li>
            <?php endwhile;}
        ?>
            
        <?php 
            if(isset($_GET['hash_id'])) {
            $hashId = $_GET['hash_id'];
            $sql = "SELECT * FROM `sms` WHERE `hash_id` = $hashId";
            $res = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_assoc($res)): ?>
                    <li class="chats__item">
                        <?php foreach ($users as $user): ?>
                            <?php if ($user['id'] == $row['user_id']): ?>
                                <p class="chats__username"><?= $user['name']; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?> 
                    <p><?= $row['data']; ?></p>
                    </li>
            <?php endwhile;}
        ?>
    </ul>
</div>
