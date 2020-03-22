<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Models\Comments\Comment;
use MyProject\Exceptions\Forbidden;
use MyProject\Exceptions\UnauthorizedException;
 
class AdminController extends AbstractController
{
	public function view()
	{

		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if ($this->user->getRole() !== 'admin') {
			throw new Forbidden();
		}

		$this->view->renderHTML('admin/view.php');
	}

	public function showArticles()
	{

		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if ($this->user->getRole() !== 'admin') {
			throw new Forbidden();
		}

		$articles = Article::findAllCutArticles();

		$this->view->renderHTML('admin/articles.php', ['articles' => $articles]);
	}

	public function showComments()
	{
		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if ($this->user->getRole() !== 'admin') {
			throw new Forbidden();
		}

		$comments = Comment::findAll();

		$this->view->renderHTML('admin/comments.php', ['comments' => $comments]);
	}
}