<?php
require "../connexion.php";

class Book {
    private int $id;
    private string $title;
    private string $excerpt;
    private int $authorId;
    private float $price;

    public function __construct(int $id, string $title, string $excerpt, int $authorId, float $price) {
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->authorId = $authorId;
        $this->price = $price;
    }

    // GETTERS
    public function getId(): int { 
        return $this->id; 
    }

    public function getTitle(): string { 
        return $this->title; 
    }

    public function getExcerpt(): string { 
        return $this->excerpt; 
    }

    public function getAuthorId(): int { 
        return $this->authorId; 
    }

    public function getPrice(): float { 
        return $this->price; 
    }

    // SETTERS
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function setExcerpt(string $excerpt): void {
        $this->excerpt = $excerpt;
    }

    public function setAuthorId(int $authorId): void {
        $this->authorId = $authorId;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    // Méthode pour afficher avec var_dump
    public function display(): void {
        var_dump($this);
    }
    
}

// affichage des livres = ok (Sabrina)
$query = $db->query("SELECT * FROM books");
$books = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($books as $book) {
    var_dump($book);
}