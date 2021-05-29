<div class="flex-col space-y-4 text-gray-500">
    <x-jet-validation-errors/>
    <div class="px-2 mx-2 my-1 rounded-md bg-blue-50">
        <h3 class="font-semibold ">Nuevo detalle</h3>
        <x-jet-input  wire:model.defer="facturacion.id" type="hidden"/>
    </div>

    <form wire:submit.prevent="save">
        <x-table.row wire:loading.class.delay="opacity-50">
            {{-- orden --}}
            <x-table.cell>
                <input type="number"
                    wire:model.defer="detalle.orden"
                    class="w-16 text-xs p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                    {{ $errors->has('detalle.orden') ? 'border-red-500' : 'border-blue-300' }}"/>
                @if ($errors->has('detalle.orden'))
                    <div class="text-red-500">{{ $errors->first('detalle.orden') }}</div>
                @endif
            </x-table.cell>
            {{-- tipo --}}
            <x-table.cell>
                <x-select wire:model.defer="detalle.tipo"
                    selectname="tipo"
                    class="w-full text-xs
                    {{ $errors->has('detalle.iva') ? 'border-red-500' : 'border-blue-300' }}">
                        <option value="">-- choose --</option>
                        @foreach (App\Models\FacturacionDetalle::TIPOS as $value=>$label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach>
                </x-select>
                @if ($errors->has('detalle.tipo'))
                    <div class="text-red-500">{{ $errors->first('detalle.tipo') }}</div>
                @endif
            </x-table.cell>
            {{-- concepto --}}
            <x-table.cell class="">
                <input type="text" wire:model.defer="detalle.concepto"
                    class="w-full text-xs p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                    {{ $errors->has('detalle.concepto') ? 'border-red-500' : 'border-blue-300' }}"/>
                    @if ($errors->has('detalle.concepto'))
                        <div class="text-red-500">{{ $errors->first('detalle.concepto') }}</div>
                    @endif
            </x-table.cell>
            {{-- unidades --}}
            <x-table.cell class="">
                <input type="number" wire:model.defer="detalle.unidades"
                    class="w-full text-xs text-right p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                    {{ $errors->has('detalle.unidades') ? 'border-red-500' : 'border-blue-300' }}"/>
                    @if ($errors->has('detalle.unidades'))
                        <div class="text-red-500">{{ $errors->first('detalle.unidades') }}</div>
                    @endif
            </x-table.cell>
            {{-- coste --}}
            <x-table.cell class="">
                <input type="number" step="2"wire:model.defer="detalle.coste"
                    class="w-full text-xs text-right p-2 border border-blue-300 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300
                    {{ $errors->has('detalle.coste') ? 'border-red-500' : 'border-blue-300' }}"/>
                    @if ($errors->has('detalle.coste'))
                        <div class="text-red-500">{{ $errors->first('detalle.coste') }}</div>
                    @endif
            </x-table.cell>
            {{-- %IVA --}}
            <x-table.cell class="">
                <x-select wire:model.defer="detalle.iva"
                    selectname="iva"
                    class="w-full text-xs pl-10 text-left
                    {{ $errors->has('detalle.iva') ? 'border-red-500' : 'border-blue-300' }}">
                    <option value="0">0%</option>
                    <option value="0.04">4%</option>
                    <option value="0.10">10%</option>
                    <option value="0.21">21%</option>
                </x-select>
                @if ($errors->has('detalle.iva'))
                    <div class="text-red-500">{{ $errors->first('detalle.iva') }}</div>
                @endif
            </x-table.cell>
            {{-- coste --}}
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
            {{-- subcuenta --}}
            <x-table.cell class="">
                <x-select wire:model.defer="detalle.subcuenta"
                    selectname="subcuenta"
                    class="w-full text-xs text-left
                        {{ $errors->has('detalle.subcuenta') ? 'border-red-500' : 'border-blue-300' }}">
                        <option value="">ND</option>
                        <option value="705000">705000</option>
                        <option value="759000">759000</option>
                    </x-select>
                    @if ($errors->has('detalle.subcuenta'))
                        <div class="text-red-500">{{ $errors->first('detalle.subcuenta') }}</div>
                    @endif
            </x-table.cell>
            {{-- pagadopor --}}
            <x-table.cell class="">
                <x-select wire:model.defer="detalle.pagadopor"
                    selectname="pagadopor"
                    class="w-full text-xs text-left
                    {{ $errors->has('detalle.pagadopor') ? 'border-red-500' : 'border-blue-300' }}">
                    <option value="0">NP</option>
                    <option value="1">Marta</option>
                    <option value="2">Susana</option>
                </x-select>
                    @if ($errors->has('detalle.pagadopor'))
                        <div class="text-red-500">{{ $errors->first('detalle.pagadopor') }}</div>
                    @endif
            </x-table.cell>

            <x-table.cell class="pr-2 text-right ">
                    <x-jet-button class="mt-5 bg-blue-600">
                        {{ __('Añadir detalle') }}
                    </x-jet-button>
            </x-table.cell>
        </x-table.row>
    </form>
</div>
