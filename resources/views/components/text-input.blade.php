@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535]']) }}>
