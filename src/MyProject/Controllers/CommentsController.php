<?php

namespace MyProject\Controllers;

use MyProject\Models\Comments\Comment;
use MyProject\Models\Articles\Article;
use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentsException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Users\User;

class CommentsController extends AbstractController
{

	public function view(int $articleId, int $commentId)
	{
		$article = Article::getById($articleId);
		$comment = Comment::getById($commentId);
		$allowEditing = false;

		if ($article === null || $comment === null) {
			throw new NotFoundException();
		}

		if ( ($this->user->isAdmin() || $this->user->getId() == $comment->getAuthorId()) ) {
			$allowEditing = true;
		} 

		$this->view->renderHtml('comments/index.php', ['article' => $article, 'comment' => $comment, 'allowEditing' => $allowEditing]);

	}

	//Добавление комментария
	public function add($articleId)
	{
		if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
        	try {
        		$comment = Comment::createFromArray($_POST, $this->user, $articleId);
        	} catch (InvalidArgumentsException $e) {
                $this->view->renderHtml('articles/' . $articleId, ['error' => $e->getMessage()]);
                return;
        	}

        	header("Location:/articles/$articleId#" . $comment->getId());
        }
		
	}
	//Редактирование комментария
	public function edit(int $articleId, int $commentId)
	{
		$comment = Comment::getById($commentId);
		$article = Article::getById($articleId);

		if ($comment === null || $article === null) {
			throw new NotFoundException();
		}

		if(!empty($_POST)) {
			try {
        		$comment->updateFromArray($_POST);
        	} catch (InvalidArgumentsException $e) {
        		$error = $e->getMessage();
        		$this->view->renderHtml('comments/edit.php', ['article' => $article, 'comment' => $comment, 'error' => $error]);
        		return;
        	}
		}
		$successMessage = 'Комментарий успешно обновлен.';
		$this->view->renderHtml('comments/edit.php', ['article' => $article, 'comment' => $comment, 'successMessage' => $successMessage]);
	}
	//Удаление комментария
	public function delete(int $articleId, int $commentId)
	{
		$comment = Comment::getById($commentId);
        if ($comment !== null) {
            $comment->delete();
        } else {
            echo 'Комментария не существует.';
        }

        header("Location:/articles/$articleId");
	}
}