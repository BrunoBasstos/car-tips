<div class="flex items-center">
    <select wire:model="{{$filter}}"
            name="{{str_replace('Filter', '', $filter)}}_id"
            aria-label="select"
            {{$attributes->merge()}}
            class="form-select appearance-none w-full rounded-md border border-gray-300 shadow-sm
                pl-4 pr-8 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50
                focus:outline-none focus:ring-0 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
        <option class="text-indigo-800" value="">{{$placeholder}}</option>
        @if($options)
            @foreach($options as $option)
                <option class="text-indigo-800" value="{{$option->id}}">{{ucwords($option->name)}}</option>
            @endforeach
        @endif
    </select>
</div>
