@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'font-medium form-input px-4 text-xl w-full rounded border-2 border-blue-900']) !!}>
