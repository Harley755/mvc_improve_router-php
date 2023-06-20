<?php

namespace Source;

class Renderer
{
    // Promotion des attributs du constructeur
    public function __construct(private string $viewPath)
    {
    }

    public function view()
    {
        // Demarrer le systeme de buffering (mise en tampon)
        // Quand le require de la vue sera faite (on recupere les variables (dans ce cas, ce n'est pas fait))
        ob_start();

        require BASE_VIEW_PATH . $this->viewPath . '.php';

        return ob_get_clean();
    }

    public static function make(string $viewPath): static
    {
        return new static($viewPath);
    }

    public function __toString()
    {
        return $this->view();
    }
}
