<?php

class Persoon
{
    // Properties
    private string $naam;
    private int $leeftijd;
    protected string $geslacht;
    public bool $isStudent = false;
    public float $gemiddeldCijfer = 0.0;

    // Constructor
    public function __construct(string $naam, int $leeftijd, string $geslacht)
    {
        $this->naam = $naam;
        $this->leeftijd = $leeftijd;
        $this->geslacht = $geslacht;
    }

    // Naam
    public function setNaam(string $naam): void
    {
        $this->naam = $naam;
    }

    public function getNaam(): string
    {
        return $this->naam;
    }

    // Leeftijd
    public function setLeeftijd(int $leeftijd): void
    {
        $this->leeftijd = $leeftijd;
    }

    public function getLeeftijd(): int
    {
        return $this->leeftijd;
    }

    // Geslacht
    public function setGeslacht(string $geslacht): void
    {
        $this->geslacht = $geslacht;
    }

    public function getGeslacht(): string
    {
        return $this->geslacht;
    }

    // isStudent
    public function setIsStudent(bool $waarde): void
    {
        $this->isStudent = $waarde;
    }

    public function getIsStudent(): bool
    {
        return $this->isStudent;
    }

    // Gemiddeld Cijfer
    public function setGemiddeldCijfer(float $cijfer): void
    {
        $this->gemiddeldCijfer = $cijfer;
    }

    public function getGemiddeldCijfer(): float
    {
        return $this->gemiddeldCijfer;
    }
}

class User extends Persoon
{
    // Properties
    private string $email;
    private string $wachtwoord;
    private string $rol;

    // Constructor
    public function __construct(string $naam, int $leeftijd, string $geslacht, string $email, string $wachtwoord, string $rol)
    {
        parent::__construct($naam, $leeftijd, $geslacht);
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->rol = $rol;
    }

    // Email
    public function setMail(string $email): void
    {
        $this->email = $email;
    }

    public function getMail(): string
    {
        return $this->email;
    }

    // Wachtwoord (voor demonstratie)
    public function setWachtwoord(string $wachtwoord): void
    {
        $this->wachtwoord = $wachtwoord;
    }

    public function getWachtwoord(): string
    {
        return $this->wachtwoord;
    }

    // Rol
    public function setRol(string $rol): void
    {
        $this->rol = $rol;
    }

    public function getRol(): string
    {
        return $this->rol;
    }
}

// Aanmaken van een `User` object
$user = new User("Jan", 25, "M", "jan@example.com", "password123", "Admin");

echo "Naam: " . $user->getNaam() . "<br>" . PHP_EOL;
echo "Leeftijd: " . $user->getLeeftijd() . "<br>" . PHP_EOL;
echo "Geslacht: " . $user->getGeslacht() . "<br>" . PHP_EOL;
echo "E-mail: " . $user->getMail() . "<br>" . PHP_EOL;
echo "Rol: " . $user->getRol() . "<br>" . PHP_EOL;
?>