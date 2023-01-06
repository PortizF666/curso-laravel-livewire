<div>
    <form wire:submit.prevent="submit">
        <label for=""/>Titulo</label>

            @error('title')
                {{ $message }}
            @enderror

        <input type="text" wire:model="title"/>

        <label for=""/>Texto</label>

            @error('text')
                {{ $message }}
            @enderror

        <input type="text" wire:model="text"/>

        <button type="submit">Enviar</button>
    </form>
</div>
