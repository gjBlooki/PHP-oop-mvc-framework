<?php if (!empty($comments)):?>
    <h2>Комментарии</h2>
    <?php foreach($comments as $comment):?>
        <hr>
        <p>
        	<?=$comment->getAuthor()->getNickname();?>
        </p>

        <?php if( ($comment->getAuthor()->getId() === $user->getId()) 
                        || $user->isAdmin()):?>
                <p>
                	<a href="<?= $_SERVER['REQUEST_URI'] . '/comment-' . $comment->getId() . '-edit'?>">Редактировать</a> <a href="<?= $_SERVER['REQUEST_URI'] . '/comment-' . $comment->getId() . '-delete'?>">Удалить</a>
            	</p>
        <?php endif; ?>

        <div id="<?= $comment->getId(); ?>" class="commentAuthor"><?= $comment->getContent(); ?></div><a name="<?= $comment->getId(); ?>"></a>
    <?php endforeach; ?>
<?php endif;?>