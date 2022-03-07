@props([
    'textStyle' => 'text-gray-700 ',
    'data' => null
])

<tr tabindex="0" class="focus:outline-none h-12 border border-gray-100 rounded">
    <td class="overflow-clip sm:overflow-visible">
        <div class="flex items-center px-5">
            <p class="text-base font-medium leading-none mr-2 {{$textStyle}}">
                {{Str::substrReplace($data->content, '...', 75)}}
            </p>
        </div>
    </td>
    <td class="overflow-clip sm:overflow-visible">
        <div class="flex items-center px-5">
            <p class="text-base font-medium leading-none mr-2 {{$textStyle}}">
                <small class="rounded-full justify-center bg-{{$data->vehicle->type->css_color}} pl-2 pr-1 pb-1 m-1">
                    {{$data->vehicle->vehicleArray['type']}}
                </small>

                <em>
                    {{$data->vehicle->vehicleArray['make']}}
                    {{$data->vehicle->vehicleArray['model']}}
                    {{$data->vehicle->vehicleArray['trim']}}
                </em>
            </p>
        </div>
    </td>
    <td class="pl-24 hidden lg:table-cell">
        <div class="flex items-center">
            @if($data->tag)
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg2.svg" alt="tag">
                <p class="text-sm leading-none ml-2  {{$textStyle}}">
                    {{$data->tag?->name}}
                </p>
            @endif
        </div>
    </td>
    <td class="pl-5 hidden md:table-cell">
        <div class="flex items-center">
            <p class="text-sm leading-none {{$textStyle}}">
                {{$data->user->name}}
            </p>
        </div>
        <div class="flex items-end text-2xs">
             em {{$data->created_at->format('d/m/Y H:i:s')}}
        </div>
    </td>
    <td class="w-2">
{{--        <button data-tooltip-target="tooltip-div"--}}
{{--                data-modal-toggle="tipModal-{{$data->id}}"--}}
{{--                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">--}}
{{--            <x-icons.eye class="fill-current w-6 h-6"/>--}}
{{--        </button>--}}

        @auth
            <a href="{{route('tips.show', $data->id)}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2 mt-4 sm:mt-0 inline-flex items-start justify-start px-1 py-1 "
            >
                <x-icons.eye class="fill-current w-6 h-6"/>
            </a>
        @endauth

        <div id="tooltip-div"
             role="tooltip"
             class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
            Visualizar dica
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </td>
    <x-tips-grid.modal
        wire:key="tip-{{$data->id}}"
        id="tipModal-{{$data->id}}"
        username="{{$data->user->name}}"
        datacriacao="{{$data->created_at->format('d/m/Y')}}"
        conteudo="{{$data->content}}"
    />
</tr>
