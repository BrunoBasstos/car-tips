<div class="p-6 border-t border-gray-200 dark:border-gray-700 w-full">
    <div class="sm:px-6 w-full">
        <x-tips-grid.title :title="$title"/>

        <div class="bg-white py-2 md:py-3 px-4 md:px-8 xl:px-10">
            <x-tips-grid.head/>

            <x-tips-grid.table :table-data="$tips"/>
        </div>

        <div class="flex flex-row mt-2">
            {{ $tips->links() }}
        </div>
    </div>
</div>
