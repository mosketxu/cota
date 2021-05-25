<div>
    {{-- @include('entidad.menu') --}}

    <div class="px-2 mx-2">
        {{-- @if($contactoId)
            <h1 class="py-0 my-0 text-2xl font-semibold text-gray-900" >Nueva Entidad para contacto {{ $contacto->entidad }}</h1>
            <input type="hidden" wire:model="contactoId"/>
        @else --}}
            <h1 class="py-0 my-0 text-2xl font-semibold text-gray-900">Nueva Factura</h1>
        {{-- @endif --}}
    </div>

    @if (session()->has('message'))
        <div id="alert" class="relative px-6 py-2 mb-2 text-white bg-green-200 border-green-500 rounded border-1">
            <span class="inline-block mx-8 align-middle">
                {{ session('message') }}
            </span>
            <button class="absolute top-0 right-0 mt-2 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
                <span>×</span>
            </button>
        </div>
    @endif

    <x-jet-validation-errors/>

    <div class="flex-col space-y-4 text-gray-500">
        <form wire:submit.prevent="save" >
            <div class="flex py-2 mx-2 ">
                <div class="flex-initial w-8/12 pb-2 mx-2 bg-white rounded-lg shadow-md">
                    <div class="px-2 mx-2 my-1 rounded-md bg-blue-50">
                        <h3 class="font-semibold ">Datos Factura</h3>
                        <x-jet-input  wire:model.defer="factura.id" type="hidden"  id="id" name="id" :value="old('id')"/>
                    </div>
                    <div class="flex flex-col mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-1">
                        <div class="form-item">
                            <x-jet-label for="entidad_id">{{ __('Entidad') }}</x-jet-label>
                            <x-select wire:model.defer="factura.entidad_id" selectname="entidad_id" class="w-full">
                                <option value="">-- choose --</option>
                                @foreach ($entidades as $entidad)
                                    <option value="{{ $entidad->id }}">{{ $entidad->entidad }}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="form-item">
                            <x-jet-label for="numfactura">{{ __('Factura') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.numfactura" type="text"  id="numfactura" name="numfactura" :value="old('numfactura') " readonly class="w-full bg-gray-100"/>
                            <x-jet-input-error for="numfactura" class="mt-2" />
                        </div>
                        <div class="form-item">
                            <x-jet-label for="fechafactura">{{ __('F.Factura') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.fechafactura" type="date"  id="fechafactura" name="fechafactura" :value="old('fechafactura') "  class="w-full"/>
                            <x-jet-input-error for="fechafactura" class="mt-2" />
                        </div>
                        <div class="form-item">
                            <x-jet-label for="fechavencimiento">{{ __('F.Vto.') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.fechavencimiento" type="date"  id="fechavencimiento" name="fechavencimiento" :value="old('fechavencimiento') "  class="w-full"/>
                            <x-jet-input-error for="fechavencimiento" class="mt-2" />
                        </div>

                        <div class="form-item">
                            <x-jet-label for="metodopago_id">{{ __('M.Pago') }}</x-jet-label>
                            <x-select wire:model.defer="factura.metodopago_id" selectname="metodopago_id" class="w-full">
                                <option value="">-- choose --</option>
                                @foreach ($pagos as $pago)
                                    <option value="{{ $pago->id }}">{{ $pago->metodopagocorto }}</option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>
                    <div class="flex flex-col mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-1">
                        <div class="w-3/6 form-item">
                            <x-jet-label for="mail">{{ __('Mail') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.mail" type="text"  id="mail" name="mail" :value="old('mail') " class="w-full"/>
                            <x-jet-input-error for="mail" class="mt-2" />
                        </div>
                        <div class="w-1/6 form-item">
                            <x-jet-label for="refcliente">{{ __('Ref.Cliente') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.refcliente" type="text"  id="refcliente" name="refcliente" :value="old('refcliente') "  class="w-full"/>
                            <x-jet-input-error for="refcliente" class="mt-2" />
                        </div>
                        <div class="w-2/6 form-item">
                            <x-jet-label for="observaciones">{{ __('Observaciones') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.observaciones" type="text"  id="observaciones" name="observaciones" :value="old('observaciones') " class="w-full"/>
                            <x-jet-input-error for="observaciones" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="flex-initial w-4/12 pb-2 mx-2 bg-white rounded-lg shadow-md">
                    <div class="px-2 mx-2 my-1 rounded-md bg-blue-50">
                        <h3 class="font-semibold ">Datos Control</h3>
                    </div>
                    <div class="flex flex-col mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-1">
                        <div class="w-full form-item">
                            <x-jet-label for="enviar">{{ __('Enviar') }}</x-jet-label>
                            <input type="checkbox" wire:model.defer="factura.enviar" checked class="mx-auto"/>
                        </div>
                        <div class="w-full form-item">
                            <x-jet-label for="enviada">{{ __('Enviada') }}</x-jet-label>
                            <input type="checkbox" wire:model.defer="factura.enviada" checked class="mx-auto"/>
                        </div>
                        <div class="w-full form-item">
                            <x-jet-label for="pagada">{{ __('Pagada') }}</x-jet-label>
                            <input type="checkbox" wire:model.defer="factura.pagada" checked class="mx-auto"/>
                        </div>
                        <div class="w-full form-item">
                            <x-jet-label for="facturada">{{ __('Facturada') }}</x-jet-label>
                            <input type="checkbox" wire:model.defer="factura.facturada" checked class="mx-auto"/>
                        </div>
                        <div class="w-full form-item">
                            <x-jet-label for="contabilizada">{{ __('Contabilizada') }}</x-jet-label>
                            <input type="checkbox" {{ $factura->contabilizada[1]=="No" ? '' : 'checked' }} class="mx-auto"/>
                        </div>
                        <div class="w-full form-item">
                            <x-jet-label for="facturable">{{ __('Facturable') }}</x-jet-label>
                            <input type="checkbox" wire:model.defer="factura.facturable" checked class="mx-auto"/>
                        </div>
                    </div>
                    <div class="flex flex-col mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-1">
                        <div class="w-1/6 form-item">
                            <x-jet-label for="asiento">{{ __('Asiento') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.asiento" type="number"  id="asiento" name="asiento" :value="old('asiento') " class="w-full"/>
                            <x-jet-input-error for="asiento" class="mt-2" />
                        </div>
                        <div class="w-5/6 form-item">
                            <x-jet-label for="Notas">{{ __('Notas') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="factura.notas" type="text"  id="notas" name="notas" :value="old('notas') " class="w-full"/>
                            <x-jet-input-error for="notas" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex mt-0 ml-4 space-x-4">
                <div class="space-x-3">
                    <x-jet-button class="bg-blue-600">
                        {{ __('Guardar') }}
                    </x-jet-button>
                    <span
                        x-data="{ open: false }"
                        x-init="
                            @this.on('notify-saved', () => {
                                if (open === false) setTimeout(() => { open = false }, 2500);
                                open = true;
                            })
                        "
                    x-show.transition.out.duration.1000ms="open"
                    style="display: none;"
                    class="p-2 m-2 text-gray-500 rounded-lg bg-green-50"
                    >Saved!</span>
                    <x-jet-secondary-button  onclick="location.href = '{{route('facturacion.index')}}'">{{ __('Volver') }}</x-jet-secondary-button>
                </div>
            </div>
        </form>
    </div>

    <hr class="my-2">

    @livewire('detalle-factura',['facturacion'=>$factura],key($factura->id))

</div>

