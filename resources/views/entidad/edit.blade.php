<x-app-layout>
    <div class="m-3">
        @livewire('ent',['entidad'=>$entidad],key($entidad->id))
    </div>
</x-app-layout>
