<?php

namespace MyProject\Controllers;

use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersActivationService;
use MyProject\View\View;
use MyProject\Exceptions\InvalidArgumentsException;
use MyProject\Services\UsersAuthService;

use MyProject\Controllers\AbstractController;

class UsersController extends AbstractController
{
	//Регистрация
	public function signUp()
	{
		if(!empty($_POST)) {
			try{
				User::signUp($_POST);
			} catch(InvalidArgumentsException $e) {
				$this->view->renderHtml('user/registration.php', ['error'=>$e->getMessage()]);
				return;
			}
			//Успешная регистрация
			if ($user instanceof User) {
				$code = UserActivationService::createActivationCode($user);

				MailSendingService::send($user, 'Активация', 'userActivation.php',[
					'userId' => $user->getId(),
					'code' => $code
				]);
        	}

    	    $this->view->renderHtml('user/signUpSuccessful.php');
        	return;
		}

		$this->view->renderHtml('user/registration.php');
	}
	//Авторизация
	public function login()
	{

		if (!empty($_POST)) {
			try {
				$user = User::login($_POST);
				UsersAuthService::createToken($user);
				header('Location: /');
				exit();
			} catch (InvalidArgumentsException $e) {
				$this->view->renderHtml('user/login.php', ['error' => $e->getMessage()]);
				return;
			}
		}

		$this->view->renderHtml('user/login.php');
	}
	//Выход из аккаунта
	public function logout()
	{
		setcookie('token', null, time() - 3600, '/', '', false, true);
		header('Location: /');
	}
}