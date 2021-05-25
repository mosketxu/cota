<x-app-layout>
    <div class="mx-3 mt-1">
        @livewire('factura',['facturacion'=>$facturacion],key($facturacion->id))
    </div>
</x-app-layout>
