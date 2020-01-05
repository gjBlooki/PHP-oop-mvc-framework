<?php include __DIR__ . '/../header.php';?>
    <tr>
        <td>
            Привет, <?= $name ?>!!!
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