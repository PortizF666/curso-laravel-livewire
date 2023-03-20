@slot('header')
    {{__('CRUD Post')}}
@endslot
<div class="container">
    
    <x-jet-action-message on="created">
        <div class="box-action-message">
            {{ __('Post creado exitosamente') }}
        </div>
    </x-jet-action-message>

    <x-jet-action-message on="updated">
        {{ __('Post actualizado exitosamente') }}
    </x-jet-action-message>

    <x-jet-form-section submit="submit">

        @slot('title')
            {{__('Posted')}}
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
                <x-jet-label for="">Fecha</x-jet-label>
                <x-jet-input-error for="date"/>
                <x-jet-input type="date" wire:model="date"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Contenido</x-jet-label>
                <x-jet-input-error for="text"/>
                <textarea class="block w-full" wire:model="text"></textarea>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Descripcion</x-jet-label>
                <x-jet-input-error for="description"/>
                <textarea class="block w-full" wire:model="description"></textarea>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Posted</x-jet-label>
                <x-jet-input-error for="description"/>
                <select class="block w-full" wire:model="posted">
                    <option value="not">No</option>
                    <option value="yes">Si</option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Tipo</x-jet-label>
                <x-jet-input-error for="type"/>
                <select class="block w-full" wire:model="type">
                    <option value="adverb">adverb</option>
                    <option value="post">post</option>
                    <option value="course">course</option>
                    <option value="movie">movie</option>

                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Categorías</x-jet-label>
                <x-jet-input-error for="category_id"/>
                <select class="block w-full" wire:model="category_id">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Imagen</x-jet-label>
                <x-jet-input-error for="text"/>
                <x-jet-input type="file" wire:model="image"/>
            
                @if($post && $post->image)
                    <img class="w-40 mt-2" src="{{ $post->getImageUrl() }}" />
                @endif
            </div>
        @endslot

        @slot('actions')
            <x-jet-button type="submit">Guardar</x-jet-button>
        @endslot
    </x-jet-form-section>
</div>
