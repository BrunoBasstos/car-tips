<div class="p-6 border-t border-gray-200 dark:border-gray-700 w-full">
    <div class="sm:px-6 w-full">
        <x-tips-grid.title :title="$title"/>

        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">

            <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                <div class="p-4 md:p-12 text-center lg:text-left">
                    <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{$tip->user->name}}</h1>
                    <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-gray-500 opacity-25"></div>
                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                             class="h-4 fill-current text-gray-700 pr-4" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{$tip->created_at->format('d/m/Y')}}
                    </p>

                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                        <small
                            class="rounded-full justify-center bg-{{$tip->vehicle->type->css_color}} pl-2 pr-1 pb-1 m-1">
                            {{$tip->vehicle->vehicleArray['type']}}
                        </small>

                        <em>
                            {{$tip->vehicle->vehicleArray['make']}}
                            {{$tip->vehicle->vehicleArray['model']}}
                            {{$tip->vehicle->vehicleArray['trim']}}
                        </em>
                    </p>


                    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                        @if($tip->tag)
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg2.svg" alt="tag">
                            {{$tip->tag->name}}
                        @endif
                    </p>

                    <p class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap text-left">
                        {{$tip->content}}
                    </p>
                </div>
                <div class="mx-auto xl:w-full ">
                    <div class="w-2/3 ml-8 py-4 sm:px-0 bg-white dark:bg-gray-800 flex justify-start">
                        @auth()
                            <a href="{{route('tips.index')}}"
                               role="button" aria-label="cancel form"
                               class="bg-gray-200 focus:outline-none transition duration-150 ease-in-out hover:bg-gray-300
                           dark:bg-gray-700 rounded text-indigo-600 dark:text-indigo-600 px-6 py-2 text-xs mr-4
                           focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                Voltar
                            </a>
                        @elseauth
                            <a href="/"
                               role="button" aria-label="cancel form"
                               class="bg-gray-200 focus:outline-none transition duration-150 ease-in-out hover:bg-gray-300
                           dark:bg-gray-700 rounded text-indigo-600 dark:text-indigo-600 px-6 py-2 text-xs mr-4
                           focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                Voltar
                            </a>
                        @endauth


                        @can('update', $tip)
                            <a href="{{route('tips.edit', $tip->id)}}"
                               role="button" aria-label="cancel form"
                               class="ml-3 bg-yellow-200 focus:outline-none transition duration-150 ease-in-out hover:bg-gray-300
                           dark:bg-gray-700 rounded text-indigo-600 dark:text-indigo-600 px-6 py-2 text-xs mr-4
                           focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                Editar
                            </a>
                        @endcan

                        @can('delete', $tip)
                            <button wire:click.prevent="delete"
                                    role="button" aria-label="Save form"
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-700 bg-red-700 focus:outline-none
                                transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-6 py-2 text-sm"
                            >Excluir
                            </button>
                        @endcan
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
