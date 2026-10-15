@extends('layouts.app')

@section('title', 'Iniciar sesión | Hyrule Café')

@section('content')
    <main class="relative isolate flex min-h-screen items-center justify-center overflow-hidden bg-[#19120d] px-4 py-8 sm:px-6">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_18%_12%,rgba(198,146,20,0.13),transparent_42%),radial-gradient(ellipse_at_90%_85%,rgba(31,80,55,0.16),transparent_38%)]"></div>

        <section class="w-full max-w-md animate-[fade-in-up_700ms_ease-out_both]">
            <a href="{{ route('home') }}" class="mb-6 inline-flex items-center gap-2 text-xs font-medium text-[#b7a997] transition hover:text-[#f7bd43]">
                <span aria-hidden="true">←</span> Volver al café
            </a>

            <header class="mb-6 flex items-center justify-between border-b border-[#4f4535] pb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Hyrule Café, inicio">
                    <span class="grid size-10 place-items-center rounded-md border border-[#c69214]/50 bg-[#261e18] font-display text-xl text-[#f7bd43]" aria-hidden="true">H</span>
                    <span>
                        <span class="block font-display text-lg font-semibold leading-tight text-[#efe0d6]">Hyrule Café</span>
                        <span class="mt-1 block text-[9px] font-semibold uppercase tracking-[0.2em] text-[#9c8f7b]">Café & elixires</span>
                    </span>
                </a>
                <span class="rounded-full border border-[#1f5037] bg-[#1f5037]/40 px-3 py-1.5 text-[10px] font-semibold text-[#9fd2b2]">ID seguro</span>
            </header>

            <div class="rounded-lg border border-[#4f4535] bg-[#19120d]/95 p-6 shadow-[0_24px_80px_rgba(0,0,0,0.42)] sm:p-8">
                <div class="mb-7 text-center">
                    <span class="mx-auto mb-4 grid size-14 place-items-center rounded-full border border-[#c69214]/50 bg-[#c69214]/10 font-display text-2xl text-[#f7bd43] shadow-[0_0_28px_rgba(198,146,20,0.14)]" aria-hidden="true">◇</span>
                    <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#f7bd43]">Piedra Sheikah ID</p>
                    <h1 class="font-display text-4xl font-semibold leading-tight text-[#efe0d6]">Acceso a la Piedra Sheikah</h1>
                    <p class="mt-2 text-sm leading-6 text-[#b7a997]">Autentica tu presencia para recuperar tus posiciones ancestrales y el balance de rupias.</p>
                </div>

                <div class="mb-6 flex rounded-md border border-[#4f4535] bg-[#130d08] p-1" aria-label="Método de acceso">
                    <span class="flex-1 rounded border border-[#c69214]/50 bg-[#312822] px-3 py-2.5 text-center text-xs font-semibold text-[#f7bd43]">Credenciales rúnicas</span>
                    <span class="flex-1 px-3 py-2.5 text-center text-xs font-medium text-[#8f8171]">Sensor Sheikah</span>
                </div>

                @error('login')
                    <p class="mb-4 rounded-md border border-[#93000a]/70 bg-[#93000a]/20 px-3 py-2 text-sm text-[#ffb4ab]" role="alert">{{ $message }}</p>
                @enderror

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <x-auth.text-input
                        name="email"
                        label="Correo arcano / ID de aventurero"
                        type="email"
                        placeholder="link@hyrule.org"
                        autocomplete="username"
                        :value="old('email')"
                        required
                    />

                    <x-auth.text-input
                        name="password"
                        label="Llave rúnica secreta"
                        type="password"
                        placeholder="Introduce tu contraseña"
                        autocomplete="current-password"
                        required
                    />

                    <label class="flex items-center gap-3 rounded-md border border-[#4f4535] bg-[#221a14] px-3 py-3 text-sm text-[#b7a997]">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="size-4 shrink-0 rounded border-[#6b5b42] bg-[#130d08] accent-[#c69214] focus:ring-[#f7bd43]"
                        >
                        <span>Vincular a este artefacto</span>
                        <span class="ml-auto text-[10px] text-[#8f8171]">Recordarme</span>
                    </label>

                    <x-auth.submit-button>
                        <span aria-hidden="true">◇</span> Sincronizar y entrar a Hyrule Café
                    </x-auth.submit-button>
                </form>

                <div class="my-6 flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-[#8f8171]">
                    <span class="h-px flex-1 bg-[#4f4535]"></span>
                    o bien
                    <span class="h-px flex-1 bg-[#4f4535]"></span>
                </div>

                <p class="text-center text-sm text-[#b7a997]">
                    ¿Aún no tienes una cuenta?
                    <a href="{{ route('register') }}" class="font-semibold text-[#f7bd43] underline decoration-[#f7bd43]/40 underline-offset-4 hover:decoration-[#f7bd43]">Forjar nuevo registro</a>
                </p>
            </div>

            <p class="mt-5 text-center text-xs text-[#8f8171]">Tu viaje y tus datos permanecen protegidos.</p>
        </section>
    </main>
@endsection