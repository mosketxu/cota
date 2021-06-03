<div class="flex-col space-y-2">
    <div class="bg-green-100 rounded-md">
        <h3 class="ml-2 font-semibold ">Nuevo detalle</h3>
    </div>

    <table table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <x-table.headgreen class="w-20 pl-2">{{ __('Orden') }}</x-table.headgreen>
                <x-table.headgreen class="w-1/12 pl-2">{{ __('Tipo') }} </x-table.headgreen>
                <x-table.headgreen class="w-3/12 pl-2">{{ __('Concepto') }}</x-table.headgreen>
                <x-table.headgreen class="w-20 pr-2 text-right">{{ __('Uds.') }}</x-table.headgreen>
                <x-table.headgreen class="pr-10 text-right w-28">{{ __('Importe') }}</x-table.headgreen>
                <x-table.headgreen class="w-16 pl-10 text-left">{{ __('% IVA') }}</x-table.headgreen>
                <x-table.headgreen class="pr-10 text-right w-28">{{ __('Base (€)') }}</x-table.headgreen>
                <x-table.headgreen class="pr-10 text-right w-28">{{ __('IVA (€)') }}</x-table.headgreen>
                <x-table.headgreen class="pr-10 text-right w-28">{{ __('Total (€)') }}</x-table.headgreen>
                <x-table.headgreen class="pl-2 text-left w-28">{{ __('Subcta') }}</x-table.headgreen>
                <x-table.headgreen class="pr-2 text-left w-28">{{ __('Pagado Por') }}</x-table.headgreen>
                <x-table.headgreen colspan="2" class="w-1/12"/>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form wire:submit.prevent="save">
                    <td>
                        <x-jet-input  wire:model="detalle.orden" type="text" id="orden" class="w-full" :value="old('orden') "/>
                        <x-jet-input-error for="detalle.orden" class="mt-2" />
                    </td>

                    <td>
                        <x-select wire:model="detalle.tipo"  selectname="tipo" class="w-full">
                            <option value="0">-- Tipo facturación--</option>
                            @foreach (App\Models\FacturacionDetalle::TIPOS as $value=>$label)
                            <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach>
                        </x-select>
                        <x-jet-input-error for="detalle.tipo" class="mt-2" />
                    </td>

                    <td>
                        <x-jet-input  wire:model="detalle.concepto" type="text" id="concepto" class="w-full" :value="old('concepto') "/>
                        <x-jet-input-error for="detalle.concepto" class="mt-2" />
                    </td>

                    <td>
                        <x-jet-input  wire:model="detalle.unidades" type="number" id="unidades" class="w-full text-right" :value="old('unidades') "/>
                        <x-jet-input-error for="detalle.unidades" class="mt-2" />
                    </td>

                    <td>
                        <x-jet-input  wire:model="detalle.coste" type="number" step="any" id="coste" class="w-full text-right" :value="old('coste') "/>
                        <x-jet-input-error for="detalle.coste" class="mt-2" />
                    </td>

                    <td>
                        <x-select wire:model="detalle.iva"  selectname="iva" class="w-full text-right">
                            <option value="0">0%</option>
                            <option value="0.04">4%</option>
                            <option value="0.10">10%</option>
                            <option value="0.21">21%</option>
                        </x-select>
                        <x-jet-input-error for="detalle.iva" class="mt-2" />
                    </td>

                    <x-table.cell>
                        <div class="flex-1 py-1 pr-10 text-sm font-bold text-right text-gray-900 rounded-lg bg-gray-50">
                            @if(is_numeric($detalle->unidades) && is_numeric($detalle->coste))
                                {{ number_format(round($detalle->unidades*$detalle->coste, 2),2) }}
                            @endif
                        </div>
                    </x-table.cell>

                    <x-table.cell>
                        <div class="flex-1 py-1 pr-10 text-sm font-bold text-right text-gray-900 bg-gray-100 rounded-lg">
                            @if(is_numeric($detalle->iva) && is_numeric($detalle->unidades) && is_numeric($detalle->coste))
                                {{ number_format(round($detalle->iva*$detalle->unidades*$detalle->coste, 2),2) }}
                            @endif
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="flex-1 py-1 pr-10 text-sm font-bold text-right text-gray-900 bg-gray-200 rounded-lg">
                            @if(is_numeric($detalle->iva) && is_numeric($detalle->unidades) && is_numeric($detalle->coste))
                                {{ number_format(round((1+$detalle->iva)*$detalle->unidades*$detalle->coste, 2),2) }}
                            @endif
                        </div>
                    </x-table.cell>


                    <td>
                        <x-select wire:model="detalle.subcuenta"  selectname="subcuenta" class="w-full">
                            <option value="0">ND</option>
                            <option value="705000">705000</option>
                            <option value="759000">759000</option>
                        </x-select>
                        <x-jet-input-error for="detalle.subcuenta" class="mt-2" />
                    </td>

                    <td>
                        <x-select wire:model="detalle.pagadopor"  selectname="pagadopor" class="w-full">
                            <option value="0">NP</option>
                            <option value="0">Marta</option>
                            <option value="1">Susana</option>
                        </x-select>
                        <x-jet-input-error for="detalle.pagadopor" class="mt-2" />
                    </td>

                    <td>
                        <x-jet-button class="w-full text-center bg-blue-600">
                            {{ __('Añadir detalle') }}
                        </x-jet-button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
</div>

