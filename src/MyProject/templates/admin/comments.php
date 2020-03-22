<?php include __DIR__ . '/../header.php';?>
    <tr>
        <td>
            <?php foreach($comments as $comment): ?>
                <h2><a href="/articles/<?=$comment->getId();?>"><?= 'Айди комментария ' . $comment->getId() ?></a></h2>
                <p><a href=" <?= '/articles/' . $comment->getArticleId(); ?>">Ссылка на статью</a></p>
                <p><?= $comment->getContent(); ?></p>
                <?= '<a href=/articles/' . $comment->getArticleId() . '/comment-' . $comment->getId() . '-delete>Удалить</a>' ?>
                <hr>
            <?php endforeach; ?>
        </td>
    </tr>
<?php include __DIR__ . '/../footer.php';?>