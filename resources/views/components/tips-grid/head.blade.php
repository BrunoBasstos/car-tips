<div class="sm:flex items-center justify-between">
    <x-tips-grid.filters/>

    <div class="flex space-x-2">
        <x-tips-grid.sortby />
        @auth
            <a href="{{route('tips.create')}}"
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Nova Dica</p>
            </a>
        @endauth
    </div>
</div>

