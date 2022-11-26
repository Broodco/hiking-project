<?php

namespace App\Controllers;

use App\Core\Helpers\Helpers;

class PagesController
{
    public function home(): void
    {
        Helpers::redirect('hikes', 'GET');
    }
}