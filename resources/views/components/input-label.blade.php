@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-m text-[--secondary] mb-[5px]']) }}>
    {{ $value ?? $slot }}
</label>
