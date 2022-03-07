<div class="flex space-x-2 mb-4">
    <x-tips-grid.filter placeholder="Tipo..."
                        :options="$this->types"
                        :model="$this->typeFilter"
                        filter="typeFilter"
                        :class="$errors->has('typeFilter') ? 'border border-red-600' : 'border border-green-600'"
    />

    <x-tips-grid.filter placeholder="Marca..."
                        :options="$this->makes"
                        :model="$this->makeFilter"
                        filter="makeFilter"
                        :class="$errors->has('makeFilter') ? 'border border-red-600' : 'border border-green-600'"
    />

    <x-tips-grid.filter placeholder="Modelo..."
                        :options="$this->models"
                        :model="$this->modelFilter"
                        filter="modelFilter"
                        :class="$errors->has('modelFilter') ? 'border border-red-600' : 'border border-green-600'"
    />

    <x-tips-grid.filter placeholder="Versão..."
                        :options="$this->trims"
                        :model="$this->trimFilter"
                        filter="trimFilter"
                        :class="$errors->has('trimFilter') ? 'border border-red-600' : 'border border-green-600'"
    />

    <x-tips-grid.filter placeholder="Tags..."
                        :options="$this->tags"
                        :model="$this->tagFilter"
                        filter="tagFilter"
                        :class="$errors->has('tagFilter') ? 'border border-red-600' : 'border border-green-600'"
    />

    <button wire:click.prevent="resetCombos()"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded h-7 mt-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
        </svg>
    </button>
</div>
