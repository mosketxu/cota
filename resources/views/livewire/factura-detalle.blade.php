<div class="p-1 mx-2">

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
        <div class="rounded-md bg-blue-50">
            <h3 class="ml-2 font-semibold ">Detalle Factura</h3>
        </div>
        {{-- tabla detalles --}}
        <div class="flex-col space-y-4">
            <x-table2>
                <x-slot name="head">
                    <x-table.head class="w-20 pl-2">{{ __('Orden') }}</x-table.head>
                    <x-table.head class="w-1/12 pl-2">{{ __('Tipo') }} </x-table.head>
                    <x-table.head class="w-3/12 pl-2">{{ __('Concepto') }}</x-table.head>
                    <x-table.head class="w-20 pr-2 text-right">{{ __('Uds.') }}</x-table.head>
                    <x-table.head class="pr-10 text-right w-28">{{ __('Importe') }}</x-table.head>
                    <x-table.head class="w-16 pl-10 text-left">{{ __('% IVA') }}</x-table.head>
                    <x-table.head class="pr-10 text-right w-28">{{ __('IVA (€)') }}</x-table.head>
                    <x-table.head class="pr-10 text-right w-28">{{ __('Total (€)') }}</x-table.head>
                    <x-table.head class="pl-2 text-left w-28">{{ __('Subcta') }}</x-table.head>
                    <x-table.head class="pr-2 text-left w-28">{{ __('Pagado Por') }}</x-table.head>
                    <x-table.head colspan="2" class="w-1/12"/>
                </x-slot>
                <x-slot name="body">
                    @forelse ($detalles as $index=>$detalle)
                        <x-table.row wire:loading.class.delay="opacity-50">
                            {{-- orden --}}
                            <x-table.cell>
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.orden')
                                    <input type="number"
                                           @click.away="$wire.editedDetalleField === '{{ $index }}.orden' ? $wire.saveDetalle({{ $index }}) : null"
                                           wire:model.defer="detalles.{{ $index }}.orden"
                                           class="w-16 text-xs p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                                           {{ $errors->has('detalles.' . $index . '.orden') ? 'border-red-500' : 'border-blue-300' }}"/>
                                    @if ($errors->has('detalles.' . $index . '.orden'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.orden') }}</div>
                                    @endif
                                @else
                                    <div class="flex-1 p-2 text-xs text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'orden')">
                                        {{ $detalle['orden'] }}
                                    </div>
                                @endif
                            </x-table.cell>
                            {{-- tipo --}}
                            <x-table.cell>
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.tipo')
                                    <x-select @click.away="$wire.editedDetalleField === '{{ $index }}.tipo' ? $wire.saveDetalle({{ $index }}) : null"
                                        wire:model.defer="detalles.{{ $index }}.tipo"
                                        selectname="tipo"
                                        class="w-full text-xs
                                        {{ $errors->has('detalles.' . $index . '.iva') ? 'border-red-500' : 'border-blue-300' }}">
                                        <option value="">-- choose --</option>
                                        @foreach (App\Models\FacturacionDetalle::TIPOS as $value=>$label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach>
                                    </x-select>
                                    @if ($errors->has('detalles.' . $index . '.tipo'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.tipo') }}</div>
                                    @endif
                                @else
                                    <div class="flex-1 p-2 text-xs text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'tipo')">
                                        @if($detalle['tipo']=='0')
                                            Gral
                                        @elseif ($detalle['tipo']=='1')
                                            Suplido
                                        @else
                                            Otros
                                        @endif
                                    </div>
                                @endif
                            </x-table.cell>
                            {{-- concepto --}}
                            <x-table.cell class="">
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.concepto')
                                    <input type="text"
                                           @click.away="$wire.editedDetalleField === '{{ $index }}.concepto' ? $wire.saveDetalle({{ $index }}) : null"
                                           wire:model.defer="detalles.{{ $index }}.concepto"
                                           class="w-full text-xs p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                                           {{ $errors->has('detalles.' . $index . '.concepto') ? 'border-red-500' : 'border-blue-300' }}"/>
                                    @if ($errors->has('detalles.' . $index . '.concepto'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.concepto') }}</div>
                                    @endif
                                @else
                                <div class="flex-1 p-2 text-xs text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'concepto')">
                                    {{ $detalle['concepto'] }}
                                    </div>
                                @endif
                            </x-table.cell>
                            {{-- unidades --}}
                            <x-table.cell class="">
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.unidades')
                                    <input type="number"
                                           @click.away="$wire.editedDetalleField === '{{ $index }}.unidades' ? $wire.saveDetalle({{ $index }}) : null"
                                           wire:model.defer="detalles.{{ $index }}.unidades"
                                           class="w-full text-xs text-right p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                                           {{ $errors->has('detalles.' . $index . '.unidades') ? 'border-red-500' : 'border-blue-300' }}"/>
                                    @if ($errors->has('detalles.' . $index . '.unidades'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.unidades') }}</div>
                                    @endif
                                @else
                                <div class="flex-1 p-2 text-xs text-right text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'unidades')">
                                    {{ $detalle['unidades'] }}
                                    </div>
                                @endif
                            </x-table.cell>
                            {{-- coste --}}
                            <x-table.cell class="">
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.coste')
                                    <input type="number" step="2"
                                           @click.away="$wire.editedDetalleField === '{{ $index }}.coste' ? $wire.saveDetalle({{ $index }}) : null"
                                           wire:model.defer="detalles.{{ $index }}.coste"
                                           class="w-full text-xs text-right p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                                           {{ $errors->has('detalles.' . $index . '.coste') ? 'border-red-500' : 'border-blue-300' }}"/>
                                    @if ($errors->has('detalles.' . $index . '.coste'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.coste') }}</div>
                                    @endif
                                @else
                                    <div class="flex-1 p-2 pr-10 text-xs text-right text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'coste')">
                                        {{ $detalle['coste'] }}
                                    </div>
                                @endif
                            </x-table.cell>
                            {{-- %IVA --}}
                            <x-table.cell class="">
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.iva')
                                    <x-select @click.away="$wire.editedDetalleField === '{{ $index }}.iva' ? $wire.saveDetalle({{ $index }}) : null"
                                        selectname="iva"
                                        wire:model.defer="detalles.{{ $index }}.iva"
                                        class="w-full text-xs pl-10 text-left
                                        {{ $errors->has('detalles.' . $index . '.iva') ? 'border-red-500' : 'border-blue-300' }}">
                                        <option value="0">0%</option>
                                        <option value="0.04">4%</option>
                                        <option value="0.10">10%</option>
                                        <option value="0.21">21%</option>
                                    </x-select>
                                    @if ($errors->has('detalles.' . $index . '.iva'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.iva') }}</div>
                                    @endif
                                @else
                                <div class="flex-1 p-2 pl-10 text-xs text-left text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'iva')">
                                    {{ $detalle['iva'] * 100 }}%
                                </div>
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex-1 p-2 pr-10 text-xs font-bold text-right text-gray-900 cursor-">
                                    {{ number_format(round($detalle['iva']*$detalle['unidades']*$detalle['coste'], 2),2) }}
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex-1 p-2 pr-10 text-xs font-bold text-right text-gray-900 cursor-">
                                    {{ number_format(round((1+$detalle['iva'])*$detalle['unidades']*$detalle['coste'], 2),2) }}
                                </div>
                            </x-table.cell>

                            <x-table.cell class="">
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.subcuenta')
                                    <x-select @click.away="$wire.editedDetalleField === '{{ $index }}.subcuenta' ? $wire.saveDetalle({{ $index }}) : null"
                                        selectname="subcuenta"
                                        wire:model.defer="detalles.{{ $index }}.subcuenta"
                                        class="w-full text-xs text-left
                                        {{ $errors->has('detalles.' . $index . '.subcuenta') ? 'border-red-500' : 'border-blue-300' }}">
                                        <option value="">ND</option>
                                        <option value="705000">705000</option>
                                        <option value="759000">759000</option>
                                        {{-- 0;"NP";1;"Marta";2;"Susana" --}}
                                    </x-select>
                                    @if ($errors->has('detalles.' . $index . '.subcuenta'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.subcuenta') }}</div>
                                    @endif
                                @else
                                <div class="flex-1 p-2 text-xs text-left text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'subcuenta')">
                                    {{ $detalle['subcuenta'] }}
                                    </div>
                                @endif
                            </x-table.cell>

                            <x-table.cell class="">
                                @if ($editedDetalleIndex === $index || $editedDetalleField === $index . '.pagadopor')
                                <x-select @click.away="$wire.editedDetalleField === '{{ $index }}.pagadopor' ? $wire.saveDetalle({{ $index }}) : null"
                                    selectname="pagadopor"
                                    wire:model.defer="detalles.{{ $index }}.pagadopor"
                                    class="w-full text-xs text-left
                                    {{ $errors->has('detalles.' . $index . '.pagadopor') ? 'border-red-500' : 'border-blue-300' }}">
                                    <option value="0">NP</option>
                                    <option value="1">Marta</option>
                                    <option value="2">Susana</option>
                                </x-select>
                                    @if ($errors->has('detalles.' . $index . '.pagadopor'))
                                        <div class="text-red-500">{{ $errors->first('detalles.' . $index . '.pagadopor') }}</div>
                                    @endif
                                @else
                                    <div class="flex-1 p-2 text-xs text-left text-gray-600 cursor-pointer" wire:click="editDetalleField({{ $index }}, 'pagadopor')">
                                        @if($detalle['subcuenta']=='0')
                                            NP
                                        @elseif ($detalle['subcuenta']=='1')
                                            Marta
                                        @else
                                            Susana
                                        @endif
                                    </div>
                                @endif
                            </x-table.cell>

                            <x-table.cell class="pr-2 text-right ">
                                @if($editedDetalleIndex === $index || (isset($editedDetalleField) && (int)(explode('.',$editedDetalleField)[0])===$index))
                                    <x-icon.save-a wire:click.prevent="saveDetalle({{$index}})" title="Actualizar"/>
                                @else
                                    <x-icon.edit-a wire:click.prevent="editDetalle({{$index}})" title="Editar"/>
                                @endif
                                <x-icon.delete-a wire:click.prevent="delete({{ $detalle['id'] }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1"  title="Eliminar detalle"/>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="10">
                                <div class="flex items-center justify-center">
                                    <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                                    <span class="py-5 text-xl font-medium text-gray-500">
                                        No se han encontrado detalles...
                                    </span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
                <x-slot name="foot">
                    @livewire('factura-detalle-create',['facturacion'=>$factura],key($factura->id))
                </x-slot>
            </x-table2>
        </div>
    </div>
</div>
