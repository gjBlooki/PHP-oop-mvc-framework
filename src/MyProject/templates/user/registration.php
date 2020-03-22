<?php include __DIR__ . '/../header.php'; ?>
    <tr>
        <td>
            <?php if(isset($error)):?>
            <p style="background:red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="#" method="POST">
                <label for="nickname">NickName</label>
                <input id="nickname" type="text" name="nickname" value="<?php echo $_POST['nickname']?>">
                <br>
                <label for="email">Email</label>
                <input id="email" type="text" name="email" value="<?php echo $_POST['email']?>">
                <br>
                <label for="password">Пароль</label>
                <input id="password" type="password" name="password">
                <br>
                <input type="submit" name="submit" value="Отправить">
            </form>
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