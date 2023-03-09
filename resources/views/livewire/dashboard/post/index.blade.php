@slot('header')
    {{__('CRUD POST')}}
@endslot
<x-card>

    <x-jet-action-message on="deleted">
        <div class="box-action-message">
            {{ __('Post eliminado exitosamente') }}
        </div>
    </x-jet-action-message>

    @slot('title')
        Listado
    @endslot

 <a class="btn-secondary mr-2" href="{{ route('d-post-create') }}">CREAR</a>
        <div class="grid grid-cols-2">
            <x-jet-input type="text" class="w-full mb-2" wire:model="search" placeholder="Buscar ...">Posted</x-jet-input>
            <div class="grid grid-cols-2 gap-2 ">
                <x-jet-input type="date" class="w-full" wire:model="from"></x-jet-input>
                <x-jet-input type="date" class="w-full" wire:model="to"></x-jet-input>
            </div>
        </div>
         <div class="flex gap-2 mb-2">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Posted</x-jet-label>
                <select class="block w-full" wire:model="posted">
                    <option value="not">No</option>
                    <option value="yes">Si</option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Tipo</x-jet-label>
                <select class="block w-full" wire:model="type">
                    <option value="adverb">adverb</option>
                    <option value="post">post</option>
                    <option value="course">course</option>
                    <option value="movie">movie</option>

                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Categorías</x-jet-label>
                <select class="block w-full" wire:model="category_id">
                    <option value=""></option>
                    @foreach ($categories as $categoria => $cate)
                        <option value="{{$categoria}}">{{$cate}}</option>
                    @endforeach
                </select>
            </div>
         </div>
            <table class="table w-full border">
                <thead class="text-left bg-gray-100">
                    <tr class="border-b">
                        <th class="p-2">Titulo</th>
                        <th class="p-2">Fecha</th>
                        <th class="p-2">Descripcion</th>
                        <th class="p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $p)
                        <tr  class="border-b">
                            <td class="p-2">{{str($p->title)->substr(0,15)}}</td>
                            <td class="p-2">{{$p->date}}</td>
                            <td class="p-2" style="word-wrap:break-word;"><textarea class="w-48">{{str($p->title)->substr(0,15)}}</textarea></td>
                            <td  class="p-2">
                                <x-jet-nav-link href="{{ route('d-post-edit', $p) }}" class="mr-2">Editar</x-jet-nav-link>
                                <x-jet-danger-button wire:click='selectedPostToDelete({{ $p ? $p : NULL  }})'>
                                    Eliminar
                                </x-jet-danger-button >
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $post->links() }}
        
            <!-- Delete Post Confirmation Modal -->
            @if($p)
                <x-jet-dialog-modal wire:model="confirmingDeletePost">
                    <x-slot name="title">
                        {{ __('Borrar post') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Estas seguro de borrar los posts?') }}

                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('confirmingDeletePost')" wire:loading.attr="disabled">
                            {{ __('Cancelar') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-3" wire:click="delete({{ $p }})" wire:loading.attr="disabled">
                            {{ __('Borrar') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>
            @endif
</x-card>
