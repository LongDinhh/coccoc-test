<?php

namespace Tests;

trait CreatesApplication
{
    public function createApplication()
    {
        require __DIR__.'/../bootstrap/app.php';
    }
}
