<?php include __DIR__ . '/../header.php'; ?>
    <tr>
        <td>
            <?php if(!empty($error)):?>
                <div class="error"><?=$error;?></div>
            <?php endif; ?>
            <h1>Содержимое комментария к статье <a href="/articles/<?=$article->getId(); ?>"><?= $article->getName(); ?></a></h1>
            <p>
                <?=$comment->getContent(); ?>
            </p>
            <?php if($allowEditing): ?>
                <a href="<?= '/articles/' .$article->getId(). '/comment-' .$comment->getId(). '-edit'; ?>">Редактировать</a>
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


