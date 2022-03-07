<div class="flex items-center">
    <select wire:model="sort"
            aria-label="select"
            class="form-select appearance-none w-full rounded-md border border-gray-300 shadow-sm
                pl-4 pr-8 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50
                focus:outline-none focus:ring-0 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
        <option class="text-indigo-800" value="">Ordenar...</option>
        <option class="text-indigo-800" value="desc">Recentes</option>
        <option class="text-indigo-800" value="asc">Antigas</option>
    </select>
</div>
