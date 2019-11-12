<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as GuestController;

abstract class Controller extends GuestController
{
    public function __construct()
    {
    }
}
