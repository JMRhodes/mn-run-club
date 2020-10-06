<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
    <div class="flex justify-center mb-6 mt-8 sm:mt-16">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md bg-white shadow-md overflow-hidden rounded-lg">
        <div class="flex text-lg font-bold justify-start mb-6 px-6 sm:px-8 py-4 border-b border-gray-200">
            {{ $title }}
        </div>

        <div class="px-6 sm:px-8 pt-4 pb-12">
            {{ $slot }}
        </div>
    </div>
</div>
