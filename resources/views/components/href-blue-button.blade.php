<a {{ $attributes->merge(['href' => $href]) }}>
    <button {{ $attributes->merge(['type' => 'button']) }} class="inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
        {{ $slot }}
    </button>
</a>
