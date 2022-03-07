<?php

namespace App\Http\Livewire\Tips;

use App\Http\Livewire\LoadCombos;
use App\Models\Tip;
use App\Models\Vehicle;
use Livewire\Component;

class Update extends Component
{
    use LoadCombos;

    public string $tela = 'update';
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
        $this->typeFilter = $this->tip->vehicle->type_id;
        $this->makeFilter = $this->tip->vehicle->model->make_id;
        $this->modelFilter = $this->tip->vehicle->model_id;
        $this->trimFilter = $this->tip->vehicle->trim_id ?? '';
        $this->tagFilter = $this->tip->tag_id ?? '';
        $this->content = $this->tip->content;
        $this->loadCombos();
    }

    public function render()
    {
        return view('livewire.tips.update', [
            'title' => $this->title,
            'tip'   => $this->tip,
        ]);
    }

    public function save()
    {
        if ($this->validate()) {
            $vehicle = Vehicle::firstOrCreate(
                [
                    'type_id'  => $this->typeFilter,
                    'model_id' => $this->modelFilter,
                    'trim_id'  => $this->trimFilter ?: null
                ]
            );

            $this->tip->fill([
                'content'    => $this->content,
                'tag_id'     => $this->tagFilter?->id ?? null,
                'vehicle_id' => $vehicle->id
            ])->save();

            $this->redirect(route('tips.index'));
        }
    }
}
