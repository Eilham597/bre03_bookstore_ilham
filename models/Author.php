<?php
require_once '../connexion.php';

class Author
{
    private string $firstName;
    private string $lastName;
    private string $biography;

    public function __construct(int $id, string $firstName, string $lastName, string $biography)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->biography = $biography;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBiography(): string
    {
        return $this->biography;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }
}
