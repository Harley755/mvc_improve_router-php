<?php

namespace Source;

use Router\Router;

class App
{
    public function __construct(
        private Router $router,
        private string $requestUri
    ) {
    }
    public function run()
    {
        try {
            echo $this->router->resolve($this->requestUri);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}
