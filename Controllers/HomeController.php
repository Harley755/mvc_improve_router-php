<?php

namespace Controllers;

use Models\User;
use Source\Renderer;

class HomeController
{
    public function index(): Renderer
    {
        $userModel = new User();
        $statement = $userModel->getPDO()->query('SELECT * FROM users');

        foreach ($statement as $key => $user) {
            var_dump($user);
            echo '<br/>';
        }
        return Renderer::make('home/index');
    }
}
