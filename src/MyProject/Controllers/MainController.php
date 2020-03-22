<?php
namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;
use MyProject\Services\UsersAuthService;
use MyProject\Controllers\AbstractController;

class MainController extends AbstractController
{
    //Главная
    public function main()
    {
        $articles = Article::findAllCutArticles();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'user' => UsersAuthService::getUserByToken()
            ]);
    }
    
    public function about()
    {
    	$this->view->renderHtml('main/about.php');
    }

}