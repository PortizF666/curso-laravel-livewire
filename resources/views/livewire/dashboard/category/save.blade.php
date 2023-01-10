@slot('header')
    {{__('CRUD Categorias')}}
@endslot
<div class="container">
    
    <x-jet-action-message on="created">
        <div class="box-action-message">
            {{ __('Categoria creada exitosamente') }}
        </div>
    </x-jet-action-message>

    <x-jet-action-message on="updated">
        {{ __('Categoria actualizada exitosamente') }}
    </x-jet-action-message>

    <x-jet-form-section submit="submit">

        @slot('title')
            {{__('Categories')}}
        @endslot

        @slot('description')
            {{__('Lorem')}}
        @endslot

        @slot('form')
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Titulo</x-jet-label>
                <x-jet-input-error for="title"/>
                <x-jet-input type="text" wire:model="title"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Texto</x-jet-label>
                <x-jet-input-error for="message"/>
                <x-jet-input type="text" class="block w-full" wire:model="text"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Imagen</x-jet-label>
                <x-jet-input-error for="text"/>
                <x-jet-input type="file" wire:model="image"/>
            
                @if($category && $category->image)
                    <img class="w-40 mt-2" src="{{ $category->getImageUrl() }}" />
                @endif
            </div>
        @endslot

        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-jet-form-section>
</div>
