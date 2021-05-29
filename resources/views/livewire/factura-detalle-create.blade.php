<tr>
    <x-jet-validation-errors/>
    <form wire:submit.prevent="save">
        <td>
            <x-jet-label for="orden">{{ __('Orden') }}</x-jet-label>
            <x-jet-input  wire:model.defer="detalle.orden" type="text" id="orden" class="w-full" :value="old('orden') "/>
            <x-jet-input-error for="orden" class="mt-2" />
        </td>

        <td>
            <x-jet-label for="tipo" >{{ __('Tipo') }}</x-jet-label>
            <x-select wire:model.defer="detalle.tipo"  selectname="tipo" class="w-full">
                <option value="0">-- Tipo facturación--</option>
                @foreach (App\Models\FacturacionDetalle::TIPOS as $value=>$label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach>
            </x-select>
        </td>

        <td>
            <x-jet-label for="concepto">{{ __('Concepto') }}</x-jet-label>
            <x-jet-input  wire:model.defer="detalle.concepto" type="text" id="concepto" class="w-full" :value="old('concepto') "/>
            <x-jet-input-error for="concepto" class="mt-2" />
        </td>

        <td>
            <x-jet-label for="unidades">{{ __('Uds.') }}</x-jet-label>
            <x-jet-input  wire:model.defer="detalle.unidades" type="number" id="unidades" class="w-full" :value="old('unidades') "/>
            <x-jet-input-error for="unidades" class="mt-2" />
        </td>

        <td>
            <x-jet-label for="coste">{{ __('Importe(€)') }}</x-jet-label>
            <x-jet-input  wire:model.defer="detalle.coste" type="number" step="any" id="coste" class="w-full" :value="old('coste') "/>
            <x-jet-input-error for="coste" class="mt-2" />
        </td>

        <td>
            <x-jet-label for="iva" >{{ __('% Iva') }}</x-jet-label>
            <x-select wire:model.defer="detalle.iva"  selectname="iva" class="w-full">
                <option value="0">0%</option>
                <option value="0.04">4%</option>
                <option value="0.10">10%</option>
                <option value="0.21">21%</option>
            </x-select>
        </td>

        <td>
            <x-jet-label for="subcuenta" >{{ __('subcuenta') }}</x-jet-label>
            <x-select wire:model.defer="detalle.subcuenta"  selectname="subcuenta" class="w-full">
                <option value="0">ND</option>
                <option value="705000">705000</option>
                <option value="759000">759000</option>
            </x-select>
        </td>

        <td>
            <x-jet-label for="pagadopor" >{{ __('pagadopor') }}</x-jet-label>
            <x-select wire:model.defer="detalle.pagadopor"  selectname="pagadopor" class="w-full">
                <option value="0">NP</option>
                <option value="0">Marta</option>
                <option value="1">Susana</option>
            </x-select>
        </td>

        <td>
            <x-jet-button class="mt-5 bg-blue-600">
                {{ __('Añadir detalle') }}
            </x-jet-button>
        </td>
    </form>
</tr>
