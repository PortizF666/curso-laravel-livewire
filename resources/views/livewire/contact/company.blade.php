<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-jet-label>{{ __('name') }}</x-jet-label>
        <x-jet-input-error for="name" />
        <x-jet-input type="text" wire:model="name" />
        
        <x-jet-label>{{ __('identification') }}</x-jet-label>
        <x-jet-input-error for="identification" />
        <x-jet-input type="text" wire:model="identification" />
        
        <x-jet-label>{{ __('email') }}</x-jet-label>
        <x-jet-input-error for="email" />
        <x-jet-input type="text" wire:model="email" />

        <x-jet-label>{{ __('extra') }}</x-jet-label>
        <x-jet-input-error for="extra" />
        <textarea wire:model="extra"></textarea>

        <x-jet-label>{{ __('choices') }}</x-jet-label>
        <x-jet-input-error for="choices" />

        <select class="block w-full" wire:model="choices">
            <option value="adverb">adverb</option>
            <option value="post">post</option>
            <option value="course">course</option>
            <option value="movie">movie</option>
        </select>
        <div class="flex mt-5 gap-3">
            <x-jet-button wire:click="$emit('stepEvent', 1)">Atrás</x-jet-button>
            <x-jet-button type="submit">Enviar</x-jet-button>
        </div>
    </form>
</div>