<?php include __DIR__ . '/../header.php'; ?>
    <tr>
        <td>
            <h1>Содержимое комментария к статье <a href="/articles/<?=$article->getId(). '#' . $comment->getId();?>"><?= $article->getName(); ?></a></h1>

            <?php if (!empty($error)): ?>
                <?= "<div class=\"error\">$error</div>"; ?>
            <?php elseif(!empty($successMessage)): ?>
                <?= "<div class=\"successMessage\">$successMessage</div>"; ?>
            <?php endif; ?>

            <form action="" method="post">
                <label><textarea name="commentContent" cols="55", rows="10"><?=$comment->getContent();?></textarea></label>
                <br>
                <input type="submit" name="submit">
            </form>
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
<?php include __DIR__ . '/../footer.php'; ?>


