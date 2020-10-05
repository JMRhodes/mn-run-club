<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full border-b-4 border-orange-500 text-white bg-orange-400 p-2 rounded-lg font-bold hover:bg-orange-500 hover:border-orange-600 active:border-orange-500 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
