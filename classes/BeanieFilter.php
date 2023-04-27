<?php
class BeanieFilter
{
    protected string $taille = '';
    protected string $matiere = '';
    protected float $prixMini = 0;
    protected float $prixMaxi = 0;
    protected array $bonnetFiltre = [];

    public function __construct(array $postData, $produits)
    {
        $this->bonnetFiltre = $produits;

        if (!empty($postData['prixMini'])) {
            $prixMini = $postData['prixMini'];
            $this->setPrixMini($prixMini);
        }

        if (!empty($postData['prixMaxi'])) {
            $this->setPrixMaxi($postData['prixMaxi']);
        }

        if (!empty($postData['taille'])) {
            $this->setTaille($postData['taille']);
        }

        if (!empty($postData['matiere'])) {
            $this->setMatiere($postData['matiere']);
        }

    }
    public function getTaille(): string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->bonnetFiltre = array_filter($this->bonnetFiltre, function (Beanie $bonnet) use ($taille) {
            return in_array($taille, $bonnet->getTailles());
        });
        $this->taille = $taille;
        return $this;
    }
    public function getMatiere(): string
    {
        return $this->matiere;
    }
    public function setMatiere(string $matiere): self
    {
        $this->bonnetFiltre = array_filter($this->bonnetFiltre, function (Beanie $bonnet) use ($matiere) {
            return in_array($matiere, $bonnet->getMatieres());
        });
        $this->matiere = $matiere;
        return $this;
    }
    public function getPrixMini(): float
    {
        return $this->prixMini;
    }
    public function setPrixMini(float $prixMini): self
    {
        $prixMini = floatval($prixMini);

        $this->bonnetFiltre = array_filter($this->bonnetFiltre, function (Beanie $bonnet) use ($prixMini) {
            return $bonnet->getPrix() >= $prixMini;
        });
        $this->prixMini = $prixMini;
        return $this;
    }
    public function getPrixMaxi(): float
    {
        return $this->prixMaxi;
    }
    public function setPrixMaxi(float $prixMaxi): self
    {
        $prixMaxi = floatval($prixMaxi);
        $this->bonnetFiltre = array_filter($this->bonnetFiltre, function (Beanie $bonnet) use ($prixMaxi) {
            return $bonnet->getPrix() <= $prixMaxi;
        });
        $this->prixMaxi = $prixMaxi;
        return $this;
    }

    public function getBonnetFiltre(): array
    {
        return $this->bonnetFiltre;
    }

    public function setBonnetFiltre(array $bonnetFiltre): self
    {
        $this->bonnetFiltre = $bonnetFiltre;
        return $this;
    }
}
?>