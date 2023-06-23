<?php

namespace Controllers;

use Models\User;
use Source\Renderer;

class HomeController
{
    public function index(): Renderer
    {
        $userModel = new User();
        $users = $userModel->all();

        var_dump($users);

        return Renderer::make('home/index');
    }
}
