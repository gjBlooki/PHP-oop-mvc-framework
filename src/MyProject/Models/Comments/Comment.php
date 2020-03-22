<?php

namespace MyProject\Models\Comments;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
use MyProject\Exceptions\InvalidArgumentsException;
use MyProject\Models\Users\User;

class Comment extends ActiveRecordEntity
{

	protected $content;
	protected $articleId;
	protected $authorId;

	public function setContent($text): void
	{
		$this->content = $text;
	}

	public function setArticleId($articleId): void
	{
		$this->articleId = $articleId;
	}

	public function setAuthor($authorId): void
	{
		$this->authorId = $authorId;
	}

	public function getContent(): string
	{
		return $this->content;
	}

	public function getArticleId(): int
	{
		return $this->articleId;
	}

	public function getAuthorId()
	{
		return $this->authorId;
	}

	public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

	protected static function getTableName(): string
	{
		return 'comments';
	}

	public static function createFromArray(array $fields, User $author, int $articleId): Comment
	{

		if(empty($fields['comment'])) {
			throw new InvalidArgumentsException('Не передано содержимое комментария.');
		}

		$comment = new Comment();

		$comment->setContent($fields['comment']);
		$comment->setAuthor($author->getId());
		$comment->setArticleId($articleId);

		$comment->save();

		return $comment;
	}

	public function updateFromArray(array $fields): Comment
    {

        if (empty($fields['commentContent'])) {
            throw new InvalidArgumentsException('Комментарий не может быть пустым');
        }

        if ($fields['commentContent'] === $this->getContent()) {
        	throw new InvalidArgumentsException('Содержимое осталось прежним');
        }
        $this->setContent($fields['commentContent']);

        $this->save();

        return $this;
    }

}