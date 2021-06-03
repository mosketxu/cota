<div class="p-1 mx-2">

    <h1 class="text-2xl font-semibold text-gray-900">Facturaciones</h1>

    <div class="py-1 mx-4 space-y-4">
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

        {{-- filtros y boton --}}
        <div class="flex justify-between">
            <div class="flex w-3/4 space-x-2">
                <input type="text" wire:model="search" class="py-1 placeholder-gray-300 border border-blue-100 rounded-lg" placeholder="Búsqueda fecha/factura" autofocus/>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Año</label>
                    <input type="text" wire:model="filtroanyo" class="py-2 text-xs text-gray-600 placeholder-gray-300 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" placeholder="Año"/>
                </div>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Mes</label>
                    <input type="text" wire:model="filtromes" class="py-2 text-xs text-gray-600 placeholder-gray-300 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" placeholder="Mes (número)"/>
                </div>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Facturado</label>
                    <select wire:model="filtrofacturado" class="py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                        <option value="">Todos</option>
                    </select>
                </div>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Enviadas</label>
                    <select wire:model="filtroenviada" class="py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                        <option value="">Todos</option>
                    </select>
                </div>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Pagadas</label>
                    <select wire:model="filtropagada" class="py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                        <option value="">Todos</option>
                    </select>
                </div>
                <div class="px-1 text-xs">
                    <label class="px-1 text-gray-600">Facturable</label>
                    <select wire:model="filtrofacturable" class="py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                        <option value="">Todos</option>
                    </select>
                </div>
            </div>
            <x-button.button  onclick="location.href = '{{ route('facturacion.create') }}'" color="blue"><x-icon.plus/>{{ __('Nueva Factura') }}</x-button.button>

        </div>
        {{-- tabla facturaciones --}}
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading class="text-center">#</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Factura') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('F.Factura') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('F.Vto') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Entidad') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Base') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Iva') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Total') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Pago') }} </x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Email') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Ref.Cli') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Enviar') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Enviada') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Pagada') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Facturado') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Contabilizada') }}</x-table.heading>
                    <x-table.heading class="pl-4 text-left">{{ __('Facturable') }}</x-table.heading>
                    <x-table.heading colspan="2"/>
                </x-slot>
                <x-slot name="body">
                    @forelse ($facturaciones as $facturacion)
                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell class="text-right">
                                <a href="#" wire:click="edit" class="text-xs text-gray-700 transition duration-150 ease-in-out focus:outline-none focus:text-gray-800 focus:underline">
                                    <span class="text-xs text-gray-200">{{ $facturacion->id }}</span>
                                </a>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $facturacion->numfactura }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $facturacion->fechafactura }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $facturacion->fechavencimiento }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $facturacion->entidad }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell class="text-right">
                                {{ number_format($facturacion->facturadetalles->sum('base'),2)}}
                                {{-- // return number_format(round((1+$this->iva)$this->unidades*$this->coste,2),2); --}}
                            </x-table.cell>
                            <x-table.cell class="text-right">
                                {{ number_format($facturacion->facturadetalles->sum('totaliva'),2)}}
                            </x-table.cell>
                            <x-table.cell class="text-right">
                                {{ number_format($facturacion->facturadetalles->sum('total'),2) }}
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="text-sm text-gray-500 ">{{$facturacion->metodopago->metodopagocorto ?? '-'}}</span>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $facturacion->mail }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell>
                                <input type="text" value="{{ $facturacion->refcliente }}" class="w-full text-sm font-thin text-gray-500 capitalize truncate border-0 rounded-md"  readonly/>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->enviar_est[0] }}-100 text-green-800">
                                    {{ $facturacion->enviar_est[1] }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->enviada_est[0] }}-100 text-green-800">
                                    {{ $facturacion->enviada_est[1] }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->pagada_est[0] }}-100 text-green-800">
                                    {{ $facturacion->pagada_est[1] }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->facturado[0] }}-100 text-green-800">
                                    {{ $facturacion->facturado[1] }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->contabilizada[0] }}-100 text-green-800">
                                    {{ $facturacion->contabilizada[1] }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->facturable_est[0] }}-100 text-green-800">
                                    {{ $facturacion->facturable_est[1] }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="">
                                <div class="flex items-center justify-center">
                                    <x-icon.edit-a href="{{ route('facturacion.edit',$facturacion) }}"/>
                                    &nbsp;&nbsp;&nbsp;
                                    <x-icon.delete-a wire:click.prevent="delete({{ $facturacion->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1 "/>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="10">
                                <div class="flex items-center justify-center">
                                    <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                                    <span class="py-5 text-xl font-medium text-gray-500">
                                        No se han encontrado facturas...
                                    </span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
            <div>
                {{ $facturaciones->links() }}
            </div>
        </div>
    </div>

</div>
