<?php

namespace App\Http\Livewire\Tips;

use App\Models\Tip;
use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Show extends Component
{
    use AuthorizesRequests;

    public ?Tip $tip = null;
    public string $title = 'Exibindo dica';

    protected $rules = [
        'typeFilter'  => ['required', 'exists:types,id'],
        'makeFilter'  => ['required', 'exists:makes,id'],
        'modelFilter' => ['required', 'exists:models,id'],
        'trimFilter'  => ['nullable', 'exists:trims,id'],
        'tagFilter'   => ['nullable', 'exists:tags,id'],
        'content'     => ['required', 'string']
    ];

    public function render()
    {
        return view('livewire.tips.show', [
            'tip' => $this->tip
        ]);
    }

    public function delete()
    {
        $this->authorize('delete', $this->tip);

        $this->tip->delete();

        $this->redirect(route('tips.index'));
    }
}
