<?php

namespace App\Http\Livewire;

use App\Models\Make;
use App\Models\Model;
use App\Models\Tag;
use App\Models\Trim;
use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

trait LoadCombos
{

    public string $typeFilter = '';
    public string $makeFilter = '';
    public string $modelFilter = '';
    public string $trimFilter = '';
    public string $tagFilter = '';
    public ?Collection $types = null;
    public ?Collection $makes = null;
    public ?Collection $models = null;
    public ?Collection $trims = null;
    public ?Collection $tags = null;

    public function updated()
    {
        $this->loadCombos();
    }

    public function loadCombos()
    {
        $this->types = Type::active()
            ->when($this->tela == 'list', fn($q) => $q->where(fn($q) => $q->whereHas('vehicles.tips')))
            ->when($this->tagFilter != '',
                fn($q) => $q->where(fn($q) => $q->whereHas('vehicles.tips', fn($q) => $q->whereTagId($this->tagFilter))))
            ->when($this->makeFilter != '',
                fn($query) => $query->whereHas('vehicles.model.make', fn($q) => $q->whereId($this->makeFilter)))
            ->when($this->modelFilter != '',
                fn($query) => $query->whereHas('vehicles.model', fn($q) => $q->whereId($this->modelFilter)))
            ->orderBy('name')
            ->get()
        ;

//        dd($this->types->toSql());

        $this->makes = $this->tela == 'list' || $this->typeFilter != ""
            ? Make::active()
                ->when($this->tela == 'list', fn($q) => $q->where(fn($q) => $q->whereHas('models.vehicles.tips')))
                ->when($this->tagFilter != '',
                    fn($q) => $q->where(fn($q) => $q->whereHas('models.vehicles.tips', fn($q) => $q->whereTagId($this->tagFilter))))
                ->when($this->typeFilter != '',
                    fn($query) => $query->whereHas('models.vehicles.type', fn($q) => $q->whereId($this->typeFilter)))
                ->when($this->modelFilter != '',
                    fn($query) => $query->whereHas('models.vehicles.model', fn($q) => $q->whereId($this->modelFilter)))
                ->orderBy('name')
                ->get()
            : null;

        $this->models = $this->tela == 'list' || $this->makeFilter != ""
            ? Model::active()
                ->when($this->tela == 'list', fn($q) => $q->where(fn($q) => $q->whereHas('vehicles.tips')))
                ->when($this->tagFilter != '',
                    fn($q) => $q->where(fn($q) => $q->whereHas('vehicles.tips', fn($q) => $q->whereTagId($this->tagFilter))))
                ->when($this->typeFilter != '',
                    fn($query) => $query->whereHas('vehicles.type', fn($q) => $q->whereId($this->typeFilter)))
                ->when($this->makeFilter != '',
                    fn($query) => $query->whereHas('make', fn($q) => $q->whereId($this->makeFilter)))
                ->orderBy('name')
                ->get()
            : null;

        $this->trims = $this->tela == 'list' || $this->modelFilter != ""
            ? Trim::active()
                ->when($this->tela == 'list', fn($q) => $q->where(fn($q) => $q->whereHas('vehicles.tips')))
                ->when($this->tagFilter != '',
                    fn($q) => $q->where(fn($q) => $q->whereHas('vehicles.tips', fn($q) => $q->whereTagId($this->tagFilter))))
                ->orderBy('name')
                ->get()
            : null;

        $this->tags = Tag::active()->get();
    }

    public function resetCombos()
    {
        $this->typeFilter = '';
        $this->makeFilter = '';
        $this->modelFilter = '';
        $this->trimFilter = '';
        $this->tagFilter = '';
        $this->loadCombos();
    }
}

