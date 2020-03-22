<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\View\View;
use MyProject\Services\UsersAuthService;
use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\Forbidden;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Comments\Comment;


class ArticlesController extends AbstractController
{

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);
        $author = $article->getAuthor()->getRole();

        $editing = '';

        $showComments = false;

        if ($this->user !== null && $this->user->isAdmin()){
            $editing = '<a href="/articles/'.$article->getId().'/edit">Редактирование</a>';
        }
        
        if ($this->user !== null) {
            $comments = Comment::findValueInColumn('article_id', $articleId, 10);

            $showComments = true;
        }


        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml(
            'articles/view.php', 
            ['article' => $article,
            'user' => $this->user,
            'editing' => $editing,
            'showComments' => $showComments,
            'comments' => $comments
        ]);
    }
    //Создание статьи
    public function add(): void
    {

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($this->user->getRole() !== 'admin') {
            throw new Forbidden();
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
        return;

    }

    //Удаление статьи
    public function delete(int $articleId): void
    {
        $article = Article::getById($articleId);
        if ($article !== null) {
            $article->delete();
        } else {
            echo 'Запрашиваемая статья не существует';
        }

        if ($this->user->getRole() === 'admin') {
            header('Location: /admin/articles');
        }

    }
    //Редактирование статьи
    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($this->user->getRole() !== 'admin') {
            throw new Forbidden();
        }

        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', [
                    'error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', [
            'article' => $article
        ]);
    }

}