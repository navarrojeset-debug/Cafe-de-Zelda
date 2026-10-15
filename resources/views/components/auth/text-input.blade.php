@props([
    'name',
    'label',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => null,
    'required' => false,
    'value' => null,
])

<div class="space-y-2">
    <label for="{{ $name }}" class="block text-xs font-semibold uppercase tracking-[0.12em] text-[#d3c5af]">
        {{ $label }}
    </label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        @if ($type !== 'password') value="{{ $value }}" @endif
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if ($required) required @endif
        placeholder="{{ $placeholder }}"
        @class([
            'w-full rounded-md border bg-[#130d08]/75 px-4 py-3 text-sm text-[#efe0d6] outline-none transition placeholder:text-[#8f8171] focus:border-[#f7bd43] focus:ring-2 focus:ring-[#f7bd43]/20',
            'border-[#4f4535]' => !$errors->has($name),
            'border-[#ffb4ab]' => $errors->has($name),
        ])
    >
    @error($name)
        <p class="text-sm text-[#ffb4ab]" role="alert">{{ $message }}</p>
    @enderror
</div>