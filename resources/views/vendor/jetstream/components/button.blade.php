<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block']) }}>
    {{ $slot }}
</button>
