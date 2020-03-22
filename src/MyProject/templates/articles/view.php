<?php include __DIR__ . '/../header.php'; ?>
    <tr>
        <td>
            <div><?= 'Автор ' . $article->getAuthor()->getNickname(); ?></div>
            <h1><?= $article->getName();?></h1>
            <p><?= $article->getText();?></p>
            <?php if(!empty($editing)): ?>
                <div><?=$editing?></div>
            <?php endif; ?>

            <?php if($showComments): ?>
                <?php include __DIR__ . '/../comments/view.php'; ?>
            <?php else: ?>
                <h2>Просматривать и оставлять комментарии могут только авторизованные пользователи.</h2>
            <?php endif; ?>    
        </td>
    
        <td width="300px" class="sidebar">
            <div class="sidebarHeader">Меню</div>
            <ul>
                <li><a href="/">Главная страница</a></li>
                <li><a href="/about-me">Обо мне</a></li>
            </ul>
        </td>
    </tr>
    <?php if($showComments): ?>
        <?php include __DIR__ . '/../comments/add.php';?>
    <?php endif;?>    
<?php include __DIR__ . '/../footer.php'; ?>


