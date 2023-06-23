<?php

namespace Source;

class Renderer
{
    // Promotion des attributs du constructeur
    public function __construct(private string $viewPath, private ?array $params)
    {
    }

    public function view(): string
    {
        // Demarrer le systeme de buffering (mise en tampon)
        // Quand le require de la vue sera faite (on recupere les variables (dans ce cas, ce n'est pas fait))
        ob_start();

        // CRE UNE NOUVELLE VARIABLE QUI CONTIENDRA NOS DONNEES
        extract($this->params);

        require BASE_VIEW_PATH . $this->viewPath . '.php';

        return ob_get_clean();
    }

    public static function make(string $viewPath, ?array $params): static
    {
        return new static($viewPath, $params);
    }

    public function __toString()
    {
        return $this->view();
    }
}
