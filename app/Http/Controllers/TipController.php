<?php

namespace App\Http\Controllers;

use App\Models\Tip;

class TipController extends Controller
{

    public function index()
    {
        return view('tips.index');
    }

    public function create()
    {
        $this->authorize('create', Tip::class);
        return view('tips.create');
    }

    public function show(Tip $tip)
    {
        return view('tips.show', ['tip' => $tip]);
    }

    public function edit(Tip $tip)
    {
        return view('tips.update', compact('tip'));
    }

    public function destroy(Tip $tip)
    {
        $tip->delete();

        return redirect()
            ->route('tips.index')
            ->with(['message' => 'Dica excluída com sucesso!']);
    }
}
