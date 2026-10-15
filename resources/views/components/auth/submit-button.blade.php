<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex w-full items-center justify-center gap-2 rounded-md bg-[#c69214] px-5 py-3.5 text-sm font-semibold text-[#261900] shadow-[0_8px_24px_rgba(198,146,20,0.16)] transition hover:bg-[#f7bd43] focus:outline-none focus:ring-2 focus:ring-[#f7bd43] focus:ring-offset-2 focus:ring-offset-[#19120d]']) }}
>
    {{ $slot }}
</button>