<div class="">
    @livewire('menu',['entidad'=>$ent],key($ent->id))

    <div class="p-1 mx-2">

        <h1 class="text-2xl font-semibold text-gray-900">Contactos de {{ $ent->entidad }} <span class="text-lg text-gray-500 "> ({{ $ent->nif }})</span></h1>

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
                {{-- <x-button.primary href="#" class="py-0 my-0"><x-icon.plus/> Nueva</x-button.primary> --}}
            </div>
            {{-- tabla contactos --}}
            <div class="flex-col space-y-4">
                <x-table>
                    <x-slot name="head">
                        <x-table.head class="pl-2">{{ __('Entidad') }}</x-table.head>
                        <x-table.head class="pl-2">{{ __('Nif') }} </x-table.head>
                        <x-table.head class="pl-2">{{ __('Tfno') }}</x-table.head>
                        <x-table.head class="pl-2">{{ __('Email Gral') }}</x-table.head>
                        <x-table.head class="pl-2">{{ __('Departamento') }}</x-table.head>
                        <x-table.head class="pl-2">{{ __('Obs.Contacto') }}</x-table.head>
                        <x-table.head colspan="2"/>
                    </x-slot>
                    <x-slot name="body">
                        @forelse ($contactos as $index=>$contacto)
                            <x-table.row wire:loading.class.delay="opacity-50">
                                <x-table.cell class="w-2/12">
                                    <input type="text" value="{{ $contacto['entidad'] }}" class="w-full text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </x-table.cell>
                                <x-table.cell class="w-1/12">
                                    <input type="text" value="{{ $contacto['nif'] }}" class="w-full text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </x-table.cell>
                                <x-table.cell  class="w-1/12">
                                    <input type="text" value="{{ $contacto['tfno'] }}" class="w-full text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </x-table.cell>
                                <x-table.cell class="w-2/12">
                                    <input type="text" value="{{ $contacto['emailgral'] }}" class="w-full text-sm font-thin text-gray-500 truncate border-0 rounded-md"  readonly/>
                                </x-table.cell>
                                <x-table.cell class="w-2/12">
                                    @if ($editedContactoIndex === $index || $editedContactoField === $index . '.departamento')
                                        <input type="text"
                                            @click.away="$wire.editedContactoField === '{{ $index }}.departamento' ? $wire.saveContacto({{ $index }}) : null"
                                            wire:model.defer="contactos.{{ $index }}.departamento"
                                            class="text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full focus:outline-none focus:border-blue-400 {{ $errors->has('contactos.' . $index . '.departamento') ? 'border-red-500' : 'border-gray-400' }}"
                                        />
                                        @if ($errors->has('contactos.' . $index . '.departamento'))
                                            <div class="text-red-500">{{ $errors->first('contactos.' . $index . '.departamento') }}</div>
                                        @endif
                                    @else
                                        <div class="cursor-pointer" wire:click="editContactoField({{ $index }}, 'departamento')">
                                            {{ $contacto['departamento'] }}
                                        </div>
                                    @endif
                                </x-table.cell>

                                <x-table.cell class="w-3/12">
                                    @if ($editedContactoIndex === $index || $editedContactoField === $index . '.comentarios')
                                        <input type="text"
                                            @click.away="$wire.editedContactoField === '{{ $index }}.comentarios' ? $wire.saveContacto({{ $index }}) : null"
                                            wire:model.defer="contactos.{{ $index }}.comentarios"
                                            class="text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full focus:outline-none focus:border-blue-400 {{ $errors->has('contactos.' . $index . '.comentarios') ? 'border-red-500' : 'border-gray-400' }}"
                                        />
                                        @if ($errors->has('contactos.' . $index . '.comentarios'))
                                            <div class="text-red-500">{{ $errors->first('contactos.' . $index . '.comentarios') }}</div>
                                        @endif
                                    @else
                                        <div class="cursor-pointer" wire:click="editContactoField({{ $index }}, 'comentarios')">
                                            {{ $contacto['comentarios'] }}
                                        </div>
                                    @endif
                                </x-table.cell>
                                <x-table.cell class="w-1/12 pr-2 text-right">
                                    @if($editedContactoIndex === $index || (isset($editedContactoField) && (int)(explode('.',$editedContactoField)[0])===$index))
                                        <x-icon.save-a wire:click.prevent="saveContacto({{$index}})" title="Actualizar contacto"/>
                                    @else
                                        <x-icon.edit-a wire:click.prevent="editContacto({{$index}})" title="editar contacto"/>
                                    @endif
                                    <x-icon.delete-a wire:click.prevent="delete({{ $contacto['id'] }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1"  title="Eliminar contacto"/>
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
            </div>
        </div>

        @livewire('contacto-create',['entidad'=>$ent],key($ent->id))

        <div class="flex mt-2 ml-2 space-x-4">
            <div class="space-x-3">
                <x-jet-secondary-button  onclick="location.href = '{{route('entidades')}}'">{{ __('Volver') }}</x-jet-secondary-button>
            </div>
        </div>

    </div>
</div>
