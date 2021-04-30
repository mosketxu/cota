<x-app-layout>
    <div class="m-3">
        @livewire('pu',['entidad'=>$entidad],key($entidad->id))
    </div>
</x-app-layout>
