@extends('layouts.app')

@section('title', 'Editar perfil | Hyrule Café')

@section('content')
    <main class="min-h-screen bg-[#19120d] px-4 py-6 sm:px-8 sm:py-10">
        <div class="mx-auto max-w-5xl">
            <header class="mb-8 flex items-center justify-between border-b border-[#4f4535] pb-5">
                <a href="{{ url('/') }}" class="flex items-center gap-3" aria-label="Hyrule Café, inicio">
                    <span class="grid size-10 place-items-center rounded-md border border-[#c69214]/50 bg-[#261e18] font-display text-xl text-[#f7bd43]" aria-hidden="true">H</span>
                    <span>
                        <span class="block font-display text-lg font-semibold leading-tight text-[#efe0d6]">Hyrule Café</span>
                        <span class="mt-1 block text-[9px] font-semibold uppercase tracking-[0.2em] text-[#9c8f7b]">Perfil de aventurero</span>
                    </span>
                </a>
                <span class="rounded-full border border-[#1f5037] bg-[#1f5037]/40 px-3 py-1.5 text-xs font-medium text-[#9fd2b2]">Cuenta activa</span>
            </header>

            <nav aria-label="Ruta de navegación" class="mb-4 text-xs text-[#9c8f7b]">
                <a href="{{ url('/') }}" class="transition hover:text-[#efe0d6]">Panel</a>
                <span class="mx-2 text-[#6b5b42]" aria-hidden="true">/</span>
                <span class="text-[#d3c5af]">Editar perfil</span>
            </nav>

            <section aria-labelledby="profile-heading">
                <div class="mb-6">
                    <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#f7bd43]">Tu identidad en Hyrule</p>
                    <h1 id="profile-heading" class="font-display text-4xl font-semibold leading-tight text-[#efe0d6]">Editar perfil</h1>
                    <p class="mt-2 text-sm text-[#b7a997]">Mantén actualizados los datos de tu cuenta de aventurero.</p>
                </div>

                @if (session('status') === 'profile-updated')
                    <div class="mb-5 rounded-md border border-[#1f5037] bg-[#1f5037]/30 px-4 py-3 text-sm text-[#9fd2b2]" role="status">
                        Tu perfil se actualizó correctamente.
                    </div>
                @endif

                <div class="grid gap-5 lg:grid-cols-[minmax(0,1fr)_280px]">
                    <div class="overflow-hidden rounded-lg border border-[#4f4535] bg-[#221a14] shadow-[0_16px_50px_rgba(0,0,0,0.18)]">
                        <div class="flex items-center gap-4 border-b border-[#4f4535] bg-[#261e18] px-5 py-5 sm:px-7">
                            <span class="grid size-14 shrink-0 place-items-center rounded-full border border-[#c69214]/50 bg-[#c69214]/15 font-display text-2xl font-semibold text-[#f7bd43]" aria-hidden="true">{{ str($user->name)->substr(0, 1)->upper() }}</span>
                            <div class="min-w-0">
                                <h2 class="truncate font-display text-xl font-semibold text-[#efe0d6]">{{ $user->name }}</h2>
                                <p class="mt-1 truncate text-sm text-[#9c8f7b]">{{ $user->email }}</p>
                            </div>
                        </div>

                        <form action="{{ route('profile.update') }}" method="POST" class="space-y-5 px-5 py-6 sm:px-7">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <h3 class="text-sm font-semibold text-[#efe0d6]">Datos del aventurero</h3>
                                <p class="mt-1 text-xs leading-5 text-[#9c8f7b]">Esta información aparece en tu cuenta del café.</p>
                            </div>

                            <x-auth.text-input
                                name="name"
                                label="Nombre de aventurero"
                                autocomplete="name"
                                :value="old('name', $user->name)"
                                required
                            />

                            <x-auth.text-input
                                name="email"
                                label="Correo electrónico"
                                type="email"
                                autocomplete="email"
                                :value="old('email', $user->email)"
                                required
                            />

                            <x-auth.text-input
                                name="current_password"
                                label="Contraseña actual (para cambiarla)"
                                type="password"
                                autocomplete="current-password"
                            />

                            <x-auth.text-input
                                name="password"
                                label="Nueva contraseña (opcional)"
                                type="password"
                                autocomplete="new-password"
                                placeholder="Déjala vacía para conservarla"
                            />

                            <x-auth.text-input
                                name="password_confirmation"
                                label="Confirma la nueva contraseña"
                                type="password"
                                autocomplete="new-password"
                                placeholder="Repite la nueva contraseña"
                            />

                            <div class="flex flex-col-reverse gap-3 border-t border-[#4f4535] pt-5 sm:flex-row sm:items-center sm:justify-between">
                                <a href="{{ route('profile.edit') }}" class="inline-flex min-h-11 items-center justify-center rounded-md border border-[#6b5b42] px-4 text-sm font-medium text-[#d3c5af] transition hover:border-[#9c8f7b] hover:text-[#efe0d6]">Cancelar</a>
                                <x-auth.submit-button class="sm:w-auto">
                                    Guardar cambios <span aria-hidden="true">→</span>
                                </x-auth.submit-button>
                            </div>
                        </form>
                    </div>

                    <aside class="space-y-4">
                        <section class="rounded-lg border border-[#4f4535] bg-[#221a14] p-5" aria-labelledby="account-details-heading">
                            <h2 id="account-details-heading" class="text-sm font-semibold text-[#efe0d6]">Detalles de cuenta</h2>
                            <dl class="mt-4 space-y-4">
                                <div class="flex items-center justify-between gap-3">
                                    <dt class="text-xs text-[#9c8f7b]">Correo</dt>
                                    <dd class="text-xs font-medium {{ $user->email_verified_at ? 'text-[#9fd2b2]' : 'text-[#f7bd43]' }}">
                                        {{ $user->email_verified_at ? 'Verificado' : 'Pendiente' }}
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt class="text-xs text-[#9c8f7b]">Aventurero desde</dt>
                                    <dd class="text-xs font-medium text-[#d3c5af]">{{ optional($user->created_at)->format('d M Y') ?? '—' }}</dd>
                                </div>
                            </dl>
                        </section>

                        <section class="rounded-lg border border-[#1f5037] bg-[#1f5037]/20 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.12em] text-[#9fd2b2]">Consejo del café</p>
                            <p class="mt-2 text-sm leading-6 text-[#b7a997]">Si cambias tu correo, su estado aparecerá como pendiente hasta que la nueva dirección se verifique.</p>
                        </section>
                    </aside>
                </div>
            </section>
        </div>
    </main>
@endsection