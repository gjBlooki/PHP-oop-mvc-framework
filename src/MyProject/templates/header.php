<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            <a href="/">Мой блог</a>
        </td>
    </tr>
    <tr>
        <?php if (isset($user) && $user->getRole() == 'admin'):?>
        <td>
            <a href="/admin/view">Административная панель</a>
        </td>
        <?php endif;?>
    	<td colspan="2" style="text-align: right">
    		<?= !empty($user) ? 'Привет ' . $user->getNickname() . ' | <a href="/user/logout">Выйти</a>': '<a href="/user/login">Войти</a> | <a href="/user/register">Зарегистрироваться</a>';?>
    	</td>
    </tr>