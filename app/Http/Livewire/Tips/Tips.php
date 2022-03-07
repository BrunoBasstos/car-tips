<?php

namespace App\Http\Livewire\Tips;

use App\Http\Livewire\LoadCombos;
use App\Models\Make;
use App\Models\Model;
use App\Models\Tip;
use App\Models\Trim;
use App\Models\Type;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

class Tips extends Component
{
    use WithPagination;
    use LoadCombos;

    public string $tela = 'list';
    public string $title = 'Dicas de veículos';
    public string $sort = 'desc';

    public ?Tip $tip = null;

    public function mount()
    {
        $this->loadCombos();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.tips.list', [
            'title'  => $this->title,
            'types'  => $this->types,
            'makes'  => $this->makes,
            'models' => $this->models,
            'trims'  => $this->trims,
            'tips'   => Tip::query()
                ->when($this->sort != '',
                    fn($query) => $query->orderBy('created_at', $this->sort))
                ->when($this->tagFilter != '',
                    fn($q) => $q->where(fn($q) => $q->whereTagId($this->tagFilter)))
                ->when($this->typeFilter != '',
                    fn($query) => $query->whereHas('vehicle.type', fn($q) => $q->whereId($this->typeFilter)))
                ->when($this->makeFilter != '',
                    fn($query) => $query->whereHas('vehicle.model.make', fn($q) => $q->whereId($this->makeFilter)))
                ->when($this->modelFilter != '',
                    fn($query) => $query->whereHas('vehicle.model', fn($q) => $q->whereId($this->modelFilter)))
                ->when($this->trimFilter != '',
                    fn($query) => $query->whereHas('vehicle.trim', fn($q) => $q->whereId($this->trimFilter)))
                ->paginate(10)
        ]);
    }

    public function setTip($tip_id)
    {
        $this->redirect(route('tips.show', $tip_id));
    }

}
