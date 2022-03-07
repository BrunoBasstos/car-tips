<div class="mt-3 overflow-x-auto w-full">
    <table class="w-full">
        <tbody>
        @foreach($tableData as $data)
            <x-tips-grid.tr :data="$data" wire:key="{{'tr-'.$data->id}}" />

            <x-tips-grid.tr-spacer class="h-1" wire:key="{{'spacer-'.$data->id}}" />
        @endforeach
        </tbody>
    </table>

    <x-tips-grid.modal :tip="$this->tip"/>
</div>
