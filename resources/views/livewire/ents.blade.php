<div class="p-2 mx-2">

    <h1 class="text-2xl font-semibold text-gray-900">Entidades</h1>

    <div class="py-4 space-y-4">
        @if (session()->has('message'))
            <div id="alert" class="relative px-6 py-2 mb-2 text-white bg-red-200 border-red-500 rounded border-1">
                <span class="inline-block mx-8 align-middle">
                    {{ session('message') }}
                </span>
                <button class="absolute top-0 right-0 mt-2 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
                    <span>×</span>
                </button>
            </div>
        @endif

        <div class="flex justify-between">
            <div class="flex w-2/4 space-x-2">
                <input type="text" wire:model="search" class="py-1 border border-blue-100 rounded-lg" placeholder="Búsqueda..." autofocus/>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Clientes</label>
                    <select wire:model="filtrocliente" class="py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                        <option value="">Todos</option>
                    </select>
                </div>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Activos</label>
                    <select wire:model="filtroactivo" class="py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                        <option value="">Todos</option>
                    </select>
                </div>
            </div>
            <x-button.primary href="#" class="py-0 my-0"><x-icon.plus/> Nueva</x-button.primary>
            {{-- <x-button.primary href="{{ route('entidad.create') }}" class="py-0 my-0"><x-icon.plus/> Nueva</x-button.primary> --}}
        </div>
        {{-- tabla entidades --}}
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    {{-- <x-table.heading class="p-0 m-0 text-right w-min">{{ __('#') }}</x-table.heading> --}}
                    <x-table.heading class="text-center">{{ __('Fav') }} </x-table.heading>
                    <x-table.heading class="w-6/12 pl-4 text-left">{{ __('Entidad') }}</x-table.heading>
                    <x-table.heading class="w-4/12 pl-4 text-left">{{ __('Nif') }} </x-table.heading>
                    <x-table.heading class="pl-4 text-center">{{ __('Cliente') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-center">{{ __('Tipo') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-center">{{ __('Impuestos') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-center">{{ __('Fact.') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-center">{{ __('Estado') }}</x-table.heading>
                    <x-table.heading colspan="2"/>
                </x-slot>
                <x-slot name="body">
                    @forelse ($entidades as $entidad)
                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell class="text-right">
                                <a href="#" wire:click="edit" class="text-xs text-gray-700 transition duration-150 ease-in-out focus:outline-none focus:text-gray-800 focus:underline">
                                    <span class="text-xs text-gray-200">{{ $entidad->id }}</span><span class="text-lg text-{{ $entidad->fav_color[0] }}-400"> &#{{ $entidad->fav_color[1] }};</span>
                                </a>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $entidad->entidad }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $entidad->nif }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                @if($entidad->cliente=="1")
                                    <span class="px-2.5 py-0.5 font-bold text-green-400">&#10003;</span>
                                @endif
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="text-sm text-gray-500 ">{{$entidad->entidadtipo->entidadtipo ?? '-'}}</span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="text-sm text-gray-500 ">{{$entidad->cicloimpuesto->cicloimpuesto ?? '-'}}</span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="text-sm text-gray-500 ">{{$entidad->ciclofacturacion->ciclo ?? '-'}}</span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $entidad->status_color[0] }}-100 text-green-800">
                                    {{ $entidad->status_color[1] }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="px-4">
                                <div class="flex items-center justify-center space-x-3">
                                    {{-- <x-icon.key href="{{ route('entidad.pus',$entidad) }}" class="text-yellow-500"/> --}}
                                    <x-icon.key href="#" class="text-yellow-500"/>
                                    <x-icon.edit-a href="{{ route('entidad.edit',$entidad) }}"/>
                                    {{-- <x-icon.edit-a href="#"/> --}}
                                    <x-icon.delete-a wire:click.prevent="delete({{ $entidad->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1"/>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="10">
                                <div class="flex items-center justify-center">
                                    <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                                    <span class="py-5 text-xl font-medium text-gray-500">
                                        No se han encontrado entidades...
                                    </span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
            <div>
                {{ $entidades->links() }}
            </div>
        </div>

    </div>




</div>

