<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $title = 'Dicas de Veículos';
        $tips = Tip::all();

        return view('dashboard', compact('tips', 'title'));
    }
}
