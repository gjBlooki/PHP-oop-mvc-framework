<?php 

namespace MyProject\Models\Articles;

use MyProject\Models\Users\User;
use MyProject\Models\Comments\Comment;
use MyProject\Services\Db;
use MyProject\Models\ActiveRecordEntity;

class Article extends ActiveRecordEntity
{

    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;
    
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function setCreatedAt(string $date): void
    {
        $this->createdAt = $date;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    //Создать статью
    public static function createFromArray(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }

    //Обновить статью
    public function updateFromArray(array $fields): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }

    //Метод для вывода сокращенных статей
    public function findAllCutArticles(): array
    {
        $db = Db::getInstance();

        $articles = $db->query('SELECT * FROM `' . self::getTableName() . '`;', [], self::class);

        if (empty($articles))
            return $articles;

        foreach($articles as $article)
        {
            if (strlen($article->text) < 55)
                continue;

            $article->text = trim(substr($article->text, 0, 55)) . '...';
        }

        return $articles;
    }

    //Удаление статьи и её комментариев
    public function delete(): void
    {
        $sql = 'DELETE `' . self::getTableName() . '`,`'. Comment::getTableName() . '`
        FROM `' . self::getTableName() . '`,`'. Comment::getTableName() . '`
        WHERE '.self::getTableName().'.id='.Comment::getTableName() . '.article_id
        AND '.self::getTableName().'.id = :id;';

        $params = [':id' => $this->id];

        $db = Db::getInstance();
        $db->query($sql, $params);
        $this->id = null;
    }

}