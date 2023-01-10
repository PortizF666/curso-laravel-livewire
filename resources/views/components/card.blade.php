<div {{$attributes->merge(['class' => 'flex flex-col sm:justify-center items-center bg-gray-100'])}}>
    <div class="w-full sm:max-w-4xl mt-6  bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div>
        <h2 class="text-4xl text-center my-3"> {{ $title }} </h2>
        </div>
        
        <div class="px-6 py-4">
            {{ $slot }}
        </div>
    </div>
</div>
