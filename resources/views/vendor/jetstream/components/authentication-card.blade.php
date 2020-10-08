<div class="w-full max-w-sm mt-8 sm:mt-16 mx-auto flex flex-col justify-center items-center">
    <div class="w-full">
        {{ $logo }}
    </div>

    <div class="w-full">
        <div class="text-2xl font-bold uppercase mb-4">
            {{ $title }}
        </div>

        <div>
            {{ $slot }}
        </div>
    </div>
</div>
