<?php

namespace App\Http\Controllers;

use App\Models\Tip;

class HomeController extends Controller
{
    public function __invoke()
    {
        $title = 'Dicas de Veículos';
        $tips = Tip::all();

        return view('home', compact('tips', 'title'));
    }
}
