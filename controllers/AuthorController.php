<?php
require_once 'managers/AuthorManager.php';
require_once 'models/Author.php';
require_once 'models/Book.php';

class AuthorController
{
    private AuthorManager $manager;

    public function __construct(AuthorManager $manager)
    {
        $this->manager = $manager;
    }

    public function listAuthors(): void
    {
        $authors = $this->manager->getAllAuthors();
        require 'views/index.php';
    }

    public function listBooksByAuthor(int $authorId): void
    {
        $books = $this->manager->getBooksByAuthor($authorId);
        require 'views/author.php';
    }
}
