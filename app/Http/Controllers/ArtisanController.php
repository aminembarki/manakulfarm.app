<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Artisan;

class ArtisanController extends Controller
{
    public function migrate() {
        return Artisan::call('migrate', [
            '--force' => true,
        ]);
    }
}
