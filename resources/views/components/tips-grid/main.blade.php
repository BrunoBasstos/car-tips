<div class="p-6 border-t border-gray-200 dark:border-gray-700 w-full">
    <div class="sm:px-6 w-full">
        <x-tips-grid.title :title="$title"/>

        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <x-tips-grid.filter/>

            <x-tips-grid.table/>
        </div>
    </div>
</div>
