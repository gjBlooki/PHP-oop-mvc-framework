<?php include __DIR__ . '/../header.php'; ?>
    <tr><td>
    	<h1>Создание новой статьи</h1>
	    <?php if(!empty($error)): ?>
	        <div class="error"><?= $error ?></div>
	    <?php endif; ?>
	    <form action="/articles/add" method="post">
	        <label for="name">Название статьи</label><br>
	        <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
	        <br>
	        <label for="text">Текст статьи</label><br>
	        <textarea name="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
	        <br>
	        <input type="submit" value="Создать">
	    </form>
	</td></tr>
<?php include __DIR__ . '/../footer.php'; ?>