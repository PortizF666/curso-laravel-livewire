<div>

    <x-jet-action-message on="created">
        {{ __('Categoria creada exitosamente') }}
    </x-jet-action-message>

    <x-jet-action-message on="updated">
        {{ __('Categoria actualizada exitosamente') }}
    </x-jet-action-message>

    <form wire:submit.prevent="submit">
        <x-jet-label for="">Titulo</x-jet-label>
        <x-jet-input-error for="title"/>
        <x-jet-input type="text" wire:model="title"/>

        <x-jet-label for="">Texto</x-jet-label>
        <x-jet-input-error for="message"/>
        <x-jet-input type="text" wire:model="text"/>

        <x-jet-label for="">Imagen</x-jet-label>
        <x-jet-input-error for="text"/>
        <x-jet-input type="file" wire:model="image"/>

        @if($category && $category->image)
            <img class="w-40 mt-2" src="{{ $category->getImageUrl() }}" />
        @endif

        <x-jet-button type="submit">Enviar</x-jet-button>
    </form>
</div>
