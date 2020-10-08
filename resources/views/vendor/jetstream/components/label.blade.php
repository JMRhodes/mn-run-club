@props(['value'])

<label {{ $attributes->merge(['class' => 'block uppercase text-xs font-bold mb-1']) }}>
    {{ $value ?? $slot }}
</label>
