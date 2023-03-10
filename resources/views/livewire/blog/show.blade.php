<div>
    <x-card>
        <img src="{{ $post->getImageUrl()}}" alt="" class="w-full rounded-lg my-3">
        <h1 class="text-center text-5xl mb-3">{{ $post->title}}</h1>
        <p class="my-4 mr-2">
            <span class="text-sm text-gray-500 italic font-bold uppercase tracking-widest">{{ $post->date->format('d-m-Y')}}</span>
            <span class="ml-4 rounded-md bg-purple-500 py-1 px-2 text-white">{{ $post->category->title}}</span>
        </p>
        <div>{!! $post->text !!}</div>
        <hr class="my-8" />
    @livewire('contact.general', ['subject' => "#$post->id -"])
    </x-card>
</div>
