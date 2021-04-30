<x-app-layout>
    <div class="mx-3 mt-1">
        @livewire('ent',['entidad'=>$entidad],key($entidad->id))
    </div>
</x-app-layout>
