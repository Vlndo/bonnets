<?php

class Contact
{

    protected string $sujet = '';
    protected string $mail = '';
    protected string $message = '';
    protected array $errors = [];

    public function __construct(array $postData)
    {
        if (isset($postData["sujet"])) {
            $this->setSujet(trim($postData['sujet']));
        }
        if (isset($postData["mail"])) {
            $this->setMail(trim($postData['mail']));
        }
        if (isset($postData["message"])) {
            $this->setMessage(trim($postData['message']));
        }
    }

    public function getSujet(): string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        if (empty($sujet)) {
            $this->errors[] = "Veuillez remplir le champ 'sujet'.";
        } elseif (strlen($sujet) <= 10) {
            $this->errors[] = "Veuillez entrer un sujet plus long (10 caractères minimum).";
        }

        return $this;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        if (empty($mail)) {
            $this->errors[] = "Entrez un email.";
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Entrez un email valide.";
        }

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        if (empty($message)) {
            $this->errors[] = "Veuillez remplir le champ 'message'.";
        } elseif (strlen($message) <= 100) {
            $this->errors[] = "Veuillez entrer un message plus long (100 caractères minimum).";
        }

        return $this;
    }

    public function isSubmitted(): bool
    {
        if (
            !empty($this->getMessage())
            || !empty($this->getSujet())
            || !empty($this->getMail())
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function isValid(): bool
    {
        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }
}