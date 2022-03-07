<?php

namespace App\Http\Livewire\Tips;

use App\Models\Tip;
use Livewire\Component;

class Show extends Component
{

    public Tip $tip;

    public function render()
    {
        return view('livewire.tips.modal', [
            'tip' => $this->tip
        ]);
    }
}
