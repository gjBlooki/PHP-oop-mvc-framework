<?php 

namespace MyProject\Models\Articles;

use MyProject\Models\Users\User;
use MyProject\Models\ActiveRecordEntity;

class Article extends ActiveRecordEntity
{
    //protected свойства, чтобы к ним можно было достучаться из класса-родителя
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;
    
    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

}