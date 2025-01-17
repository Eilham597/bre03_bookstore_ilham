<?php
class AuthorManager {
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    // Récupérer tous les auteurs
    public function getAllAuthors(): array {
        $query = "SELECT * FROM authors";
        $stmt = $this->connection->query($query);
        
        $authors = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $authors[] = new Author(
                $row['id'], 
                $row['first_name'], 
                $row['last_name'], 
                $row['biography']
            );
        }
        return $authors;
    }

    // Récupérer un auteur par son ID
    public function getAuthorById(int $id): ?Author {
        $query = "SELECT * FROM authors WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Author(
                $row['id'], 
                $row['first_name'], 
                $row['last_name'], 
                $row['biography']
            );
        }
        return null;
    }

    // Récupérer les livres d'un auteur
    public function getBooksByAuthor(int $authorId): array {
        $query = "SELECT * FROM books WHERE author = :authorId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['authorId' => $authorId]);
        
        $books = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book(
                $row['id'], 
                $row['title'], 
                $row['excerpt'], 
                $row['author'], 
                $row['price']
            );
        }
        return $books;
    }

    // Méthode pour afficher avec var_dump
    public function display(): void {
        var_dump($this);
    }
}