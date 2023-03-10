<div>
    <x-card>
        <div class="grid grid-cols-2">
            <x-jet-input type="text" class="w-full mb-2" wire:model="search" placeholder="Buscar ...">Posted</x-jet-input>
            <div class="grid grid-cols-2 gap-2 ">
                <x-jet-input type="date" class="w-full" wire:model="from"></x-jet-input>
                <x-jet-input type="date" class="w-full" wire:model="to"></x-jet-input>
            </div>
        </div>
        <div class="flex gap-2 mb-2">
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
        </x-card>
    
        <div class="flex flex-col items-center mt-5">
            <div class="w-full sm:max-w-4xl">
                @foreach ($post as $p)
                    <h4 class="text-center text-4xl mb-3">{{ $p->title}}</h4>
                    <p class="text-center text-sm text-gray-500 italic font-bold uppercase tracking-widest">{{ $p->date->format('d-m-Y')}}</p>
                    <img src="{{ $p->getImageUrl()}}" alt="" class="w-full rounded-lg my-3">
                    <p class="mx-4">{{ $p->description}}</p>
                    <div class="flex flex-col items-center mt-7">
                        <a href="{{route('web-show', $p->slug)}}" class="btn-primary">Leer mas</a>
                    </div>
                    <hr class="my-24" />
                @endforeach
            </div>
        </div>
        
    
    {{$post->links() }}
</div>
