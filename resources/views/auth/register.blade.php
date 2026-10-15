@extends('layouts.app')

@section('title', 'Crear cuenta | Hyrule Café')

@section('content')
    <main
        class="relative isolate flex min-h-screen items-center justify-center overflow-hidden bg-[#19120d] px-4 py-10 sm:px-6"
        style="background-image: linear-gradient(180deg, rgba(19, 13, 8, 0.62), #19120d 68%), url('{{ asset('images/hyrule-cafe-night.jpg') }}'); background-position: center top; background-size: cover;"
    >
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,rgba(198,146,20,0.13),transparent_55%)]"></div>

        <section class="w-full max-w-md animate-[fade-in-up_700ms_ease-out_both]">
            <a href="{{ url('/') }}" class="mb-8 flex flex-col items-center text-center" aria-label="Hyrule Café, inicio">
                <span class="mb-3 grid size-14 place-items-center rounded-full border border-[#c69214]/60 bg-[#19120d]/80 font-display text-3xl text-[#f7bd43] shadow-[0_0_32px_rgba(198,146,20,0.16)]" aria-hidden="true">✦</span>
                <span class="font-display text-2xl font-semibold text-[#efe0d6]">Hyrule Café</span>
                <span class="mt-1 text-[10px] font-semibold uppercase tracking-[0.24em] text-[#9c8f7b]">Café & elixires</span>
            </a>

            <div class="rounded-lg border border-[#4f4535] bg-[#19120d]/95 p-6 shadow-[0_24px_80px_rgba(0,0,0,0.4)] sm:p-8">
                <div class="mb-7 text-center">
                    <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#f7bd43]">Tu próxima aventura empieza aquí</p>
                    <h1 class="font-display text-4xl font-semibold leading-tight text-[#efe0d6]">Crea tu cuenta</h1>
                    <p class="mt-2 text-sm leading-6 text-[#b7a997]">Únete a la comunidad de aventureros de Hyrule.</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-5">
                    @csrf

                    <x-auth.text-input
                        name="name"
                        label="Nombre de aventurero"
                        placeholder="Cómo te llamamos"
                        autocomplete="name"
                        :value="old('name')"
                        required
                    />

                    <x-auth.text-input
                        name="email"
                        label="Correo electrónico"
                        type="email"
                        placeholder="link@hyrule.com"
                        autocomplete="email"
                        :value="old('email')"
                        required
                    />

                    <x-auth.text-input
                        name="password"
                        label="Contraseña"
                        type="password"
                        placeholder="Al menos 8 caracteres"
                        autocomplete="new-password"
                        required
                    />

                    <x-auth.text-input
                        name="password_confirmation"
                        label="Confirma tu contraseña"
                        type="password"
                        placeholder="Escríbela de nuevo"
                        autocomplete="new-password"
                        required
                    />

                    <label class="flex items-start gap-3 pt-1 text-sm leading-5 text-[#b7a997]">
                        <input
                            type="checkbox"
                            name="terms"
                            value="1"
                            required
                            class="mt-0.5 size-4 shrink-0 rounded border-[#6b5b42] bg-[#130d08] accent-[#c69214] focus:ring-[#f7bd43]"
                        >
                        <span>Acepto los términos de la aventura y la política de privacidad.</span>
                    </label>
                    @error('terms')
                        <p class="-mt-3 text-sm text-[#ffb4ab]" role="alert">{{ $message }}</p>
                    @enderror

                    <x-auth.submit-button>
                        Crear cuenta <span aria-hidden="true">→</span>
                    </x-auth.submit-button>
                </form>

                <p class="mt-6 text-center text-sm text-[#b7a997]">
                    ¿Ya tienes una cuenta?
                    <a href="{{ url('/login') }}" class="font-semibold text-[#f7bd43] underline decoration-[#f7bd43]/40 underline-offset-4 hover:decoration-[#f7bd43]">Inicia sesión</a>
                </p>
            </div>

            <p class="mt-6 text-center text-xs tracking-wide text-[#8f8171]">Un buen café también es parte de la aventura.</p>
        </section>
    </main>
@endsection