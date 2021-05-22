<x-app-layout>
    <div class="py-2 mx-auto max-w-screen">
        @livewire('ent',['contacto'=>$contacto],key($contacto->id))
    </div>
</x-app-layout>
