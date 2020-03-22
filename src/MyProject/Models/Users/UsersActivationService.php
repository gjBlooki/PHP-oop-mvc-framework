<?php
namespace MyProject\Models\Users;

use MyProject\Services\Db;

class UsersAcivationService
{
	private const TABLE_NAME = 'users_activation_codes';

	public function createActivationCode(User $user):string
	{
		$db = Db::getInstance();

		$code = bin2hex(random_bytes(16));

		$db->query(
			'INSERT INTO ' . self::TABLE_NAME . '(user_id, code) 
			VALUES(:user_id, :code)', [':user_id' => $user->getId(), ':code' => $code]
		);

		return $code;
	}

	public function checkActivationCode(User $user, string $code):bool
	{
		$db = Db::getInstance();

		$result = $db->query('SELECT * FROM ' . self::TABLE_NAME . ' WHERE user_id = :userId AND code = :code',
		[':userId' => $user->getId(),
		':code' => $code] );

		return !empty($result);
	}
}