@extends('layouts.app')

@section('title', 'Aventureros | Hyrule Café')

@section('content')
    <main class="min-h-screen bg-[#19120d] px-4 py-6 sm:px-8 sm:py-10">
        <div class="mx-auto max-w-6xl">
            <header class="mb-8 flex items-center justify-between border-b border-[#4f4535] pb-5">
                <a href="{{ url('/') }}" class="flex items-center gap-3" aria-label="Hyrule Café, inicio">
                    <span class="grid size-10 place-items-center rounded-md border border-[#c69214]/50 bg-[#261e18] font-display text-xl text-[#f7bd43]" aria-hidden="true">H</span>
                    <span>
                        <span class="block font-display text-lg font-semibold leading-tight text-[#efe0d6]">Hyrule Café</span>
                        <span class="mt-1 block text-[9px] font-semibold uppercase tracking-[0.2em] text-[#9c8f7b]">Administración</span>
                    </span>
                </a>
                <span class="rounded-full border border-[#1f5037] bg-[#1f5037]/40 px-3 py-1.5 text-xs font-medium text-[#9fd2b2]">Panel de clientes</span>
            </header>

            <nav aria-label="Ruta de navegación" class="mb-4 text-xs text-[#9c8f7b]">
                <a href="{{ url('/') }}" class="transition hover:text-[#efe0d6]">Panel</a>
                <span class="mx-2 text-[#6b5b42]" aria-hidden="true">/</span>
                <span class="text-[#d3c5af]">Aventureros</span>
            </nav>

            <section aria-labelledby="users-heading">
                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#f7bd43]">Comunidad de Hyrule</p>
                        <h1 id="users-heading" class="font-display text-4xl font-semibold leading-tight text-[#efe0d6]">Aventureros</h1>
                        <p class="mt-2 text-sm text-[#b7a997]">Consulta las cuentas registradas en el café.</p>
                    </div>
                    <div class="flex items-center gap-3 rounded-md border border-[#4f4535] bg-[#221a14] px-4 py-3">
                        <span class="grid size-9 place-items-center rounded-full bg-[#c69214]/15 text-sm font-semibold text-[#f7bd43]" aria-hidden="true">{{ $users->count() }}</span>
                        <span>
                            <span class="block text-sm font-medium text-[#efe0d6]">{{ $users->count() }} {{ $users->count() === 1 ? 'aventurero' : 'aventureros' }}</span>
                            <span class="block text-xs text-[#9c8f7b]">en el registro</span>
                        </span>
                    </div>
                </div>

                <div class="overflow-hidden rounded-lg border border-[#4f4535] bg-[#221a14] shadow-[0_16px_50px_rgba(0,0,0,0.18)]">
                    <div class="flex items-center justify-between border-b border-[#4f4535] px-4 py-4 sm:px-6">
                        <div>
                            <h2 class="text-sm font-semibold text-[#efe0d6]">Directorio de aventureros</h2>
                            <p class="mt-1 text-xs text-[#9c8f7b]">Nombre, correo y estado de la cuenta</p>
                        </div>
                        <span class="hidden items-center gap-2 text-xs text-[#9fd2b2] sm:inline-flex">
                            <span class="size-1.5 rounded-full bg-[#56dacc]"></span>
                            Registro activo
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[540px] text-left">
                            <caption class="sr-only">Usuarios registrados en Hyrule Café</caption>
                            <thead class="bg-[#261e18] text-[10px] font-semibold uppercase tracking-[0.14em] text-[#9c8f7b]">
                                <tr>
                                    <th scope="col" class="px-4 py-3 sm:px-6">Aventurero</th>
                                    <th scope="col" class="hidden px-4 py-3 sm:table-cell">Fecha de registro</th>
                                    <th scope="col" class="px-4 py-3 sm:px-6">Verificación</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#4f4535]/70">
                                @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="3" class="px-6 py-14 text-center">
                                            <p class="font-display text-xl text-[#efe0d6]">Aún no hay aventureros</p>
                                            <p class="mt-2 text-sm text-[#9c8f7b]">Las nuevas cuentas aparecerán aquí.</p>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($users as $user)
                                        <tr class="transition-colors hover:bg-[#261e18]/80">
                                            <td class="px-4 py-4 sm:px-6">
                                                <div class="flex min-w-0 items-center gap-3">
                                                    <span class="grid size-10 shrink-0 place-items-center rounded-full border border-[#9fd2b2]/20 bg-[#1f5037]/35 font-display text-lg font-semibold text-[#9fd2b2]" aria-hidden="true">{{ str($user->name)->substr(0, 1)->upper() }}</span>
                                                    <span class="min-w-0">
                                                        <span class="block truncate text-sm font-medium text-[#efe0d6]">{{ $user->name }}</span>
                                                        <span class="mt-1 block truncate text-xs text-[#9c8f7b]">{{ $user->email }}</span>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="hidden px-4 py-4 text-sm text-[#b7a997] sm:table-cell">
                                                {{ optional($user->created_at)->format('d M Y') ?? '—' }}
                                            </td>
                                            <td class="px-4 py-4 sm:px-6">
                                                @if ($user->email_verified_at)
                                                    <span class="inline-flex items-center gap-2 rounded-full border border-[#1f5037] bg-[#1f5037]/30 px-2.5 py-1 text-xs font-medium text-[#9fd2b2]">
                                                        <span class="size-1.5 rounded-full bg-[#56dacc]"></span>
                                                        Verificado
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-2 rounded-full border border-[#6b5b42] bg-[#312822] px-2.5 py-1 text-xs font-medium text-[#d3c5af]">
                                                        <span class="size-1.5 rounded-full bg-[#f7bd43]"></span>
                                                        Pendiente
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <footer class="border-t border-[#4f4535] px-4 py-3 text-xs text-[#9c8f7b] sm:px-6">
                        {{ $users->count() }} {{ $users->count() === 1 ? 'registro' : 'registros' }}
                    </footer>
                </div>
            </section>
        </div>
    </main>
@endsection