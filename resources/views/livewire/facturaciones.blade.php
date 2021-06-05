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
        <div class="flex-col space-y-2">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="text-sm leading-4 tracking-wider text-gray-500 bg-blue-50 ">
                    <tr class="">
                        <th class="py-3 text-center ">#</th>
                        <th class="w-24 text-center">{{ __('Factura') }}</th>
                        <th class="w-24 text-center">{{ __('F.Factura') }}</th>
                        <th class="w-24 text-center">{{ __('F.Vto') }}</th>
                        <th class="pl-4 text-left">{{ __('Entidad') }}</th>
                        <th class="pl-4 text-left">{{ __('Pago') }} </th>
                        <th class="pl-4 text-left">{{ __('Email') }}</th>
                        <th class="w-24 pl-4 text-left">{{ __('Ref.Cli') }}</th>
                        <th class="w-24 pr-4 text-right">{{ __('Base (€)') }}</th>
                        <th class="w-24 pr-4 text-right">{{ __('Iva (€)') }}</th>
                        <th class="w-24 pr-4 text-right">{{ __('Total (€)') }}</th>
                        <th class="text-center">{{ __('Enviar') }}</th>
                        <th class="text-center">{{ __('Enviada') }}</th>
                        <th class="text-center">{{ __('Facturado') }}</th>
                        <th class="text-center">{{ __('Pagada') }}</th>
                        <th class="text-center">{{ __('Contab.') }}</th>
                        <th class="text-center">{{ __('Facturable') }}</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody class="text-xs bg-white divide-y divide-gray-200">
                    @forelse ($facturaciones as $facturacion)
                        <tr wire:loading.class.delay="opacity-50">
                            <td class="text-right">
                                <a href="#" wire:click="edit" class="text-xs text-gray-200 transition duration-150 ease-in-out hover:outline-none hover:text-gray-800 hover:underline">
                                    {{ $facturacion->id }}
                                </a>
                            </td>
                            <td class="text-right">
                                @if($facturacion->numfactura)
                                    <input type="text" value="{{ $facturacion->serie }}/{{ $facturacion->numfactura }}" class="w-full text-xs font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                @endif
                            </td>
                            <td>
                                <input type="text" value="{{ $facturacion->fechafactura }}" class="w-full text-xs font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                            </td>
                            <td>
                                <input type="text" value="{{ $facturacion->fechavencimiento }}" class="w-full text-xs font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
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
                                <span class="pr-4 text-xs text-blue-500">{{ number_format(round($facturacion->facturadetalles->sum('totaliva'),2),2)}}</span>
                            </td>
                            <td class="text-right">
                                <span class="pr-4 text-xs text-blue-500">{{ number_format(round($facturacion->facturadetalles->sum('total'),2),2) }}</span>
                            </td>
                            <td class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->enviar_est[0] }}-100 text-green-800">
                                    {{ $facturacion->enviar_est[1] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->enviada_est[0] }}-100 text-green-800">
                                    {{ $facturacion->enviada_est[1] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->facturado[0] }}-100 text-green-800">
                                    {{ $facturacion->facturado[1] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->pagada_est[0] }}-100 text-green-800">
                                    {{ $facturacion->pagada_est[1] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->contabilizada[0] }}-100 text-green-800">
                                    {{ $facturacion->contabilizada[1] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs leading-4 bg-{{ $facturacion->facturable_est[0] }}-100 text-green-800">
                                    {{ $facturacion->facturable_est[1] }}
                                </span>
                            </td>
                            <td class="">
                                <div class="flex items-center justify-center">
                                    <x-icon.edit-a href="{{ route('facturacion.edit',$facturacion) }}" title="Edit"/>
                                    @if($facturacion->numfactura)
                                        <x-icon.pdf-a href="{{route('factura.pdf',$facturacion) }}" title="PDF" disabled/>
                                    @else
                                        <x-icon.pdf-b title="PDF" disabled/>
                                    @endif
                                    &nbsp;&nbsp;&nbsp;
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
                                        No se han encontrado facturas...
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="font-bold divide-y divide-gray-200">
                    <tr>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td class="pt-2 text-sm text-right text-gray-600">Total:</td>
                        <td class="w-24 pt-2 pr-4 text-sm text-right text-gray-600">{{ number_format(round($totales->totalbase,2),2) }}</td>
                        <td class="w-24 pt-2 pr-4 text-sm text-right text-gray-600">{{ number_format(round($totales->totaliva,2),2) }}</td>
                        <td class="w-24 pt-2 pr-4 text-sm text-right text-gray-600">{{ number_format(round($totales->totales,2),2) }}</td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td colspan="2"></td>
                    </tr>

                </tfoot>
            </table>
            <div>
                {{ $facturaciones->links() }}
            </div>
        </div>
    </div>

</div>
