<?php include __DIR__ . '/../header.php';?>
    <tr>

        <?php if(!empty($articles)): ?>

        <td colspan="2">
            <?php foreach($articles as $article): ?>
            <h2><a href="/articles/<?=$article->getId();?>"><?= $article->getName(); ?></a></h2>
            <p><?= $article->getText(); ?></p>
            <?= '<a href="/articles/' . $article->getId() . '/edit">Редактировать</a>'?>
            <?= '<a href="/articles/' . $article->getId() . '/delete">Удалить</a>' ?>
            <hr>
            <?php endforeach; ?>
        </td>

        <?php else: ?>

            <td colspan="2">Статьи не созданы. <a href="/articles/add">Создать новую статью</a>.</td>

        <?php endif; ?>
    </tr>
<?php include __DIR__ . '/../footer.php';?>