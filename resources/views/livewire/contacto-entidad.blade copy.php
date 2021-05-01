<div class="p-1 mx-2">

    <h1 class="text-2xl font-semibold text-gray-900">Contactos</h1>

    <div class="py-1 space-y-4">
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
            </div>
            <x-button.primary href="#" class="py-0 my-0"><x-icon.plus/> Nueva</x-button.primary>
        </div>
        {{-- tabla contactos --}}
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.head class="pl-5">{{ __('Entidad') }}</x-table.head>
                    <x-table.head class="pl-5">{{ __('Nif') }} </x-table.head>
                    <x-table.head class="pl-5">{{ __('Tfno') }}</x-table.head>
                    <x-table.head class="pl-5">{{ __('Email Gral') }}</x-table.head>
                    <x-table.head class="pl-5">{{ __('Departamento') }}</x-table.head>
                    <x-table.head class="pl-5">{{ __('Obs.Contacto') }}</x-table.head>
                    <x-table.head class="pl-5">{{ __('Obs.Gral') }}</x-table.head>
                    <x-table.head colspan="2"/>
                </x-slot>
                <x-slot name="body">
                    @forelse ($contactos as $contacto)
                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell>
                                <input type="text" value="{{ $contacto->entidad }}" class="text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $contacto->nif }}" class="text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $contacto->tfno }}" class="text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $contacto->emailgral }}" class="text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell class="bg-gray-100">
                                <input type="text" value="{{ $contacto->comentarios }}" class="text-sm font-thin text-gray-500 truncate bg-gray-100 border-0 rounded-md"/>
                            </x-table.cell>
                            <x-table.cell class="bg-gray-100">
                                <input type="text" value="{{ $contacto->departamento }}" class="text-sm font-thin text-gray-500 truncate bg-gray-100 border-0 rounded-md"/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $contacto->observaciones }}" class="text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="10">
                                <div class="flex items-center justify-center">
                                    <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                                    <span class="py-5 text-xl font-medium text-gray-500">
                                        No se han encontrado contactos...
                                    </span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
            <div>
                {{ $contactos->links() }}
            </div>
        </div>
    </div>
</div>
