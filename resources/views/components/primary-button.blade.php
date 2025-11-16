<button {{ $attributes->merge(['type' => 'submit', 'class' => ' px-4 py-3 bg-[--primary] border border-transparent rounded-md font-bold text-center text-m text-[--fourth]  hover:bg-[--body] hover:text-[--secondary] focus:bg-[--body] active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
