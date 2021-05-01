<x-app-layout>
    <div class="m-3">
        @livewire('contacto-entidad',['entidad'=>$entidad],key($entidad->id))
    </div>
</x-app-layout>
