<?php

namespace App\Controllers;

class PagesController
{
    public function home(): void
    {
        echo phpinfo();
    }
}