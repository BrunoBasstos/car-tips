<div class="p-6 border-t border-gray-200 dark:border-gray-700 w-full">
    <div class="sm:px-6 w-full">
        <x-tips-grid.title :title="$title"/>

        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">

            <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                {{$this->tip?->content}}
                <form id="cadastro"
                      class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0"
{{--                      action="{{ route('tips.store') }}"--}}
{{--                      method="post"--}}
                >
                    @csrf

                    <x-tips-grid.filters :errors="$errors"/>

                    <div class="grid grid-cols-1 md:grid-cols-3 md:space-x-5 items-center">
                        <div class="flex flex-col mb-6 md:col-span-3">
                            <div class="flex flex-col mb-6">
                                <label for="content"
                                       class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Dica</label>
                                <textarea tabindex="0" type="text" id="content" name="content"
                                          required
                                          rows="6"
                                          wire:model.defer="content"
                                          class="w-full border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-indigo-700 placeholder-gray-500 text-gray-600 dark:text-gray-400
                                            @error('content') border border-red-600 @enderror "
                                          placeholder=""
                                ></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mx-auto xl:w-full mr-8">
                        <div
                            class="w-full py-4 sm:px-0 bg-white dark:bg-gray-800 flex justify-start">
                            <button role="button" aria-label="cancel form"
                                    class="bg-gray-200 focus:outline-none transition duration-150 ease-in-out hover:bg-gray-300 dark:bg-gray-700 rounded text-indigo-600 dark:text-indigo-600 px-6 py-2 text-xs mr-4 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                Cancelar
                            </button>
                            <button wire:click.prevent="save"
                                    role="button" aria-label="Save form"
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 focus:outline-none transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-2 text-sm"
                            >Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
