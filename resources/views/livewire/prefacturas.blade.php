<div class="">
    @livewire('menu',['entidad'=>$entidad],key($entidad->id))

    <div class="p-1 mx-2">
        <h1 class="text-2xl font-semibold text-gray-900">Pre-Facturación {{ $entidad->id? 'de '. $entidad->entidad  :'' }} </h1>

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

            <x-jet-validation-errors></x-jet-validation-errors>

            {{-- filtros y boton --}}
            <div>
                <div class="flex justify-between space-x-1">
                    <div class="inline-flex space-x-2">
                    <div class="text-xs">
                        <label class="px-1 text-gray-600">&nbsp;</label>
                        <input type="text" wire:model="search" class="w-full py-2 text-xs text-gray-600 placeholder-gray-300 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" placeholder="Búsqueda Entidad/Factura" autofocus/>
                    </div>
                    <div class="text-xs">
                        <label class="px-1 text-gray-600">Año</label>
                        <input type="text" wire:model="filtroanyo" class="w-full py-2 text-xs text-gray-600 placeholder-gray-300 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" placeholder="Año"/>
                    </div>
                    <div class="text-xs">
                        <label class="px-1 text-gray-600">Mes</label>
                        <input type="text" wire:model="filtromes" class="w-full py-2 text-xs text-gray-600 placeholder-gray-300 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" placeholder="Mes (número)"/>
                    </div>
                    <div class="text-xs">
                        <label class="px-1 text-gray-600">Facturable</label>
                        <select wire:model="filtrofacturable" class="w-full py-2 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                            <option value="">Todos</option>
                        </select>
                    </div>
                    </div>
                    <div class="inline-flex space-x-2">
                    @if($filtrofacturable=='1')
                        <x-dropdown label="Bulk Actions">
                            <x-dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2">
                                <x-icon.download class="text-gray-400"></x-icon.download> <span>Export </span>
                            </x-dropdown.item>
                            <x-dropdown.item type="button" wire:click="deleteSelected" class="flex items-center space-x-2">
                                <x-icon.trash class="text-gray-400"></x-icon.trash> <span>Delete </span>
                            </x-dropdown.item>
                        </x-dropdown>
                        <div class="text-xs">
                            <label class="px-1 text-gray-600">&nbsp;</label>
                            <input type="button" wire:click="creafacturas()" class="w-full px-2 py-2 text-xs text-white bg-green-700 rounded-md shadow-sm hover:bg-green-500 " value="{{ __('Generar Facturas') }}"/>
                        </div>
                    @endif
                    <div class="text-xs">
                        <label class="px-1 text-gray-600">&nbsp;</label>
                        <input type="button" onclick="location.href = '{{ route('facturacion.create') }}'" class="w-full px-2 py-2 text-xs text-white bg-blue-700 rounded-md shadow-sm hover:bg-blue-500 " value="{{ __('Nueva Pre-Factura') }}"/>
                    </div>
                </div>
                </div>
            </div>
            {{-- tabla pre-facturas --}}
            @json($selected)

            <div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="text-xs leading-4 tracking-wider text-gray-500 bg-blue-50 ">
                        <tr class="">
                            <th class="w-5 py-3 pl-2 font-medium text-center"><x-input.checkbox/></th>
                            <th class="py-3 font-medium text-center ">#</th>
                            <th class="font-medium text-center w-28">{{ __('F.Factura') }}</th>
                            <th class="font-medium text-center w-28">{{ __('F.Vto') }}</th>
                            <th class="pl-4 font-medium text-left">{{ __('Entidad') }}</th>
                            <th class="pl-4 font-medium text-left">{{ __('Pago') }} </th>
                            <th class="pl-4 font-medium text-left">{{ __('Email') }}</th>
                            <th class="w-24 pl-4 font-medium text-left">{{ __('Ref.Cli') }}</th>
                            <th class="w-24 pr-4 font-medium text-right">{{ __('Base (€)') }}</th>
                            <th class="w-24 pr-4 font-medium text-right">{{ __('Exenta (€)') }}</th>
                            <th class="w-24 pr-4 font-medium text-right">{{ __('Iva (€)') }}</th>
                            <th class="w-24 pr-4 font-medium text-right">{{ __('Total (€)') }}</th>
                            <th class="" title="Enviar"><x-icon.arroba/></th>
                            <th class="" title="Facturable"><x-icon.euro/></th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody class="text-xs bg-white divide-y divide-gray-200">
                        @forelse ($facturaciones as $facturacion)
                            <tr wire:loading.class.delay="opacity-50" wire:key="fila-{{ $facturacion->id }}">
                                <td  class="w-5 py-3 pl-2 font-medium text-center">
                                    <x-input.checkbox wire:model="selected" value="{{ $facturacion->id }}"/>
                                </td>
                                <td class="text-right">
                                    <a href="#" wire:click="edit" class="text-xs text-gray-200 transition duration-150 ease-in-out hover:outline-none hover:text-gray-800 hover:underline">
                                        {{ $facturacion->id }}
                                    </a>
                                </td>
                                <td>
                                    <input type="text" value="{{ $facturacion->datefra }}" class="w-full text-xs font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </td>
                                <td>
                                    <input type="text" value="{{ $facturacion->datevto }}" class="w-full text-xs font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </td>
                                <td>
                                    <input type="text" value="{{ $facturacion->entidad }}" class="w-full text-xs font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </td>
                                <td class="text-center">
                                    <span class="text-sm text-gray-500 ">{{$facturacion->metodopago->metodopagocorto ?? '-'}}</span>
                                </td>
                                <td>
                                    <input type="text" value="{{ $facturacion->mail }}" class="w-full text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </td>
                                <td>
                                    <input type="text" value="{{ $facturacion->refcliente }}" class="w-full text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </td>
                                <td class="text-right">
                                    <span class="pr-4 text-xs text-blue-500">{{ number_format(round($facturacion->facturadetalles->sum('base'),2),2)}}</span>
                                </td>
                                <td class="text-right">
                                    <span class="pr-4 text-xs text-blue-500">{{ number_format(round($facturacion->facturadetalles->sum('exenta'),2),2)}}</span>
                                </td>
                                <td class="text-right">
                                    <span class="pr-4 text-xs text-blue-500">{{ number_format(round($facturacion->facturadetalles->sum('totaliva'),2),2)}}</span>
                                </td>
                                <td class="text-right">
                                    <span class="pr-4 text-xs text-blue-500">{{ number_format(round($facturacion->facturadetalles->sum('total'),2),2) }}</span>
                                </td>
                                <td class="text-left">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->enviar_est[0] }}-100 text-green-800">
                                        {{ $facturacion->enviar_est[1] }}
                                    </span>
                                </td>
                                <td class="text-left">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->facturable_est[0] }}-100 text-green-800">
                                        {{ $facturacion->facturable_est[1] }}
                                    </span>
                                </td>
                                <td class="">
                                    <div class="flex items-center justify-center">
                                        <x-icon.invoice-a href="{{ route('facturacion.edit',$facturacion) }}" title="Pre-Factura"/>
                                        <x-icon.delete-a wire:click.prevent="delete({{ $facturacion->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1 " title="Borrar"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">
                                    <div class="flex items-center justify-center">
                                        <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                                        <span class="py-5 text-xl font-medium text-gray-500">
                                            No se han encontrado pre facturas...
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $facturaciones->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
