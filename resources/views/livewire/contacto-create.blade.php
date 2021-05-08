<div class="flex-col space-y-4 text-gray-500">
    <x-jet-validation-errors/>
    <div class="px-2 mx-2 my-1 rounded-md bg-blue-50">
        <h3 class="font-semibold ">Selecciona contactos pulsa <a href="##">AQUÍ</a> aqui para crear uno nuevo.</h3>
        <x-jet-input  wire:model.defer="entidad.id" type="hidden"/>
        <hr>
    </div>
    <form wire:submit.prevent="savecontacto">
        <div class="flex flex-col mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
            <div class="w-full form-item">
                <x-jet-label for="contacto" >{{ __('Contactos') }}</x-jet-label>
                <x-select wire:model.defer="contacto"  selectname="contacto" class="w-full">
                    <option value="">-- Elige un contacto --</option>
                    @foreach ($contactos as $contacto)
                    <option value="{{ $contacto->id }}">{{ $contacto->entidad }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="w-full form-item">
                <x-jet-label for="departamento">{{ __('Departamento') }}</x-jet-label>
                <x-jet-input  wire:model.defer="departamento" type="text" id="departamento" class="w-full" :value="old('departamento') "/>
                <x-jet-input-error for="departamento" class="mt-2" />
            </div>
            <div class="w-full form-item">
                <x-jet-label for="comentarios">{{ __('Comentario') }}</x-jet-label>
                <x-jet-input  wire:model.defer="comentario" type="text" id="comentarios"  class="w-full" :value="old('comentarios')" />
                <x-jet-input-error for="comentarios" class="mt-2" />
            </div>
            <div class="w-full form-item">
                <x-jet-button class="mt-5 bg-blue-600">
                    {{ __('Añadir contacto') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>
