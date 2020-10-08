<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full bg-primary rounded p-4 text-lg font-bold']) }}>
    {{ $slot }}
</button>
