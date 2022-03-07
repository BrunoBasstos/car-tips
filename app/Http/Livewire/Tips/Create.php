<?php

namespace App\Http\Livewire\Tips;

use App\Http\Livewire\LoadCombos;
use App\Models\Tip;
use App\Models\Vehicle;
use Livewire\Component;

class Create extends Component
{
    use LoadCombos;

    public string $tela = 'create';
    public string $title = 'Cadastrar nova dica';

    public ?Tip $tip = null;

    public $content;

    protected $rules = [
        'typeFilter'  => ['required', 'exists:types,id'],
        'makeFilter'  => ['required', 'exists:makes,id'],
        'modelFilter' => ['required', 'exists:models,id'],
        'trimFilter'  => ['nullable', 'exists:trims,id'],
        'tagFilter'   => ['nullable', 'exists:tags,id'],
        'content'     => ['required', 'string']
    ];

    public function mount()
    {
        $this->loadCombos();
    }

    public function render()
    {
        return view('livewire.tips.create', [
            'title' => $this->title,
            'tip'   => $this->tip
        ]);
    }

    public function save()
    {
        if ($valid = $this->validate()) {
            $vehicle = Vehicle::firstOrCreate(
                [
                    'type_id'  => $this->typeFilter,
                    'model_id' => $this->modelFilter,
                    'trim_id'  => $this->trimFilter ?: null
                ]
            );

            Tip::create([
                'content' => $this->content,
                'user_id' => auth()->user()->id,
                'tag_id'  => $this->tagFilter?->id ?? null,
                'vehicle_id' => $vehicle->id
            ]);

            $this->redirect(route('tips.index'));
        }
    }
}
