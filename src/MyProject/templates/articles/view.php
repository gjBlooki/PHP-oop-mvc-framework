<?php include __DIR__ . '/../header.php'; ?>
    <tr>
        <td>
            <div id="author"><?= 'Автор ' . $article->getAuthor()->getNickname(); ?></div>
            <h1><?= $article->getName();?></h1>
            <p><?= $article->getText();?></p>
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