<?php include __DIR__ . '/../header.php';?>
    <tr>
        <td>
            <?php foreach($articles as $article): ?>
            <h2><a href="/articles/<?=$article->getId();?>"><?= $article->getName(); ?></a></h2>
            <p><?= $article->getText(); ?></p>
            <hr>
            <?php endforeach; ?>
        </td>

        <td width="300px" class="sidebar">
            <div class="sidebarHeader">Меню</div>
            <ul>
                <li><a href="/">Главная страница</a></li>
                <li><a href="/about-me">Обо мне</a></li>
            </ul>
        </td>
    </tr>
<?php include __DIR__ . '/../footer.php';?>