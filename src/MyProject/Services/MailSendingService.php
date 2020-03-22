<?php

namespace MyProject\Services;

use MyProject\Models\Users\User;

class MailSendingService
{

	public static function send (
		User $receiver,
		string $subject,
		string $templateName,
		array $templateVars = []
	): void {
		extract($templateVars);

		ob_start();
		require __DIR__ . '/../templates/mail/' . $templateName;
		$body = ob_get_contents();
		ob_end_clean();
		try {
			mail($receiver->getEmail(), $subject, $body, 'Content-type: text/html; charset=UTF-8');
		} catch (Exception $error) {
			echo $error->getMessage();
		}
		
	}

}