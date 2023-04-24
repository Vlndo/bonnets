<?php

class Beanie
{

    protected string $nom;
    protected float $prix;
    protected string $description;
    protected string $img;
    protected array $tailles = [];
    protected array $matieres = [];
    protected int $index;

    public const TAILLES = ['S', 'M', 'L', 'XL'];
    public const MATIERE = ['laine', 'soie', 'coton', 'cachemire'];


    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;
        return $this;
    }

    public function getTailles(): array
    {
        return $this->tailles;
    }

    public function setTailles(array $tailles): self
    {
        $this->tailles = $tailles;
        return $this;
    }

    public function getMatieres(): array
    {
        return $this->matieres;
    }

    public function setMatieres(array $matieres): self
    {
        $this->matieres = $matieres;
        return $this;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): self
    {
        $this->index = $index;
        return $this;
    }
}