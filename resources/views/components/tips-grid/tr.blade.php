@props([
    'textStyle' => 'text-gray-700 ',
    'data' => null
])

<tr tabindex="0" class="focus:outline-none h-12 border border-gray-100 rounded">
    <td class="overflow-clip sm:overflow-visible">
        <div class="flex items-center px-5">
            <p class="text-base text-sm md:text-md font-normal leading-none mr-2 {{$textStyle}}">
                {{Str::substrReplace($data->content, '...', 75)}}
            </p>
        </div>
    </td>
    <td class="overflow-clip sm:overflow-visible">
        <div class="flex grid grid-cols-3 space-x-3 px-5">
            <div class="text-base text-sm md:text-md leading-none {{$textStyle}}">
                <small class="w-fit rounded-full justify-center bg-{{$data->vehicle->type->css_color}} px-2 pb-1 m-1">
                    {{$data->vehicle->vehicleArray['type']}}
                </small>
            </div>
            <div class="col-span-2 text-base text-sm md:text-md leading-none {{$textStyle}}">
                <em>
                    {{ucwords(mb_strtolower($data->vehicle->vehicleArray['make']))}}
                    {{ucwords(mb_strtolower($data->vehicle->vehicleArray['model']))}}
                    {{$data->vehicle->vehicleArray['trim']}}
                </em>
            </div>
        </div>
    </td>
    <td class="hidden lg:table-cell">
        <div class="flex grid grid-cols-3 space-x-1 justify-between">
            @if($data->tag)
                <div>
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg2.svg" alt="tag">
                </div>
                <div class="col-span-2 text-sm md:text-md  leading-none {{$textStyle}}">
                    {{$data->tag?->name}}
                </div>
            @endif
        </div>
    </td>
    <td class="flex pl-5 hidden md:table-cell">
        <div class="flex items-center">
            <p class="text-sm md:text-md leading-none {{$textStyle}}">
                {{$data->user->name}}
            </p>
        </div>
        <div class="flex items-end text-2xs">
            em {{$data->created_at->format('d/m/Y H:i:s')}}
        </div>
    </td>
    <td class="w-2">
        @auth()
            <a href="{{route('tips.show', $data->id)}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2 mt-4 sm:mt-0 inline-flex items-start justify-start px-1 py-1 "
            >
                <x-icons.eye class="fill-current w-6 h-6"/>
            </a>
        @elseauth
            <a href="{{route('tips.show.public', $data->id)}}"
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
