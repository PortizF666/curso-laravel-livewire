@slot('header')
    {{__('CRUD Categorias')}}
@endslot
<x-card>

    <x-jet-action-message on="deleted">
        <div class="box-action-message">
            {{ __('Categoria eliminada exitosamente') }}
        </div>
    </x-jet-action-message>

    @slot('title')
        Listado
    @endslot

 <a class="btn-secondary" href="{{ route('d-category-create') }}" class="mr-2">CREAR</a>
    <table class="table w-full border">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                <th class="p-2">Titulo</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr  class="border-b">
                    <td class="p-2">{{$c->title}}</td>
                    <td  class="p-2">
                        <x-jet-nav-link href="{{ route('d-category-edit', $c) }}" class="mr-2">Editar</x-jet-nav-link>
                        <x-jet-danger-button wire:click='selectedCategoryToDelete({{ $c }})'>
                            Eliminar
                        </x-jet-danger-button >
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}

    <!-- Delete Category Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingDeleteCategory">
            <x-slot name="title">
                {{ __('Borrar categoria') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Estas seguro de borrar la categorias?') }}

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingDeleteCategory')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="delete({{ $c }})" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
</x-card>
