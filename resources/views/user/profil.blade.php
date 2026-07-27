@extends('layouts.user')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- HEADER PROFILE --}}
    <div class="bg-gradient-to-r from-[#6B3F2A] to-[#A77F60]
                rounded-3xl p-10 text-white shadow-lg mb-10">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-6">

                {{-- FOTO --}}
                <div>

                    @if(auth()->user()->photo)

                        <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                             class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">

                    @else

                        <div class="w-32 h-32 rounded-full
                                    bg-white/20 flex items-center
                                    justify-center text-5xl font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                    @endif

                </div>

                {{-- INFO --}}
                <div>

                    <h1 class="text-4xl font-bold mb-2">
                        {{ auth()->user()->name }}
                    </h1>

                    <p class="text-[#F5E6DA] text-lg">
                        {{ auth()->user()->email }}
                    </p>

                    <div class="flex gap-3 mt-4">

                        <span class="bg-white/20 px-4 py-2 rounded-full text-sm">
                            Klien
                        </span>

                        <span class="bg-white/20 px-4 py-2 rounded-full text-sm">
                            Member Aktif
                        </span>

                    </div>

                </div>

            </div>

            {{-- BUTTON --}}
            <div>

                <a href="{{ route('user.editprofil') }}"
                   class="bg-white text-[#6B3F2A]
                          px-6 py-3 rounded-2xl
                          font-bold shadow hover:scale-105 transition">

                    Edit Profil

                </a>

            </div>

        </div>

    </div>

    {{-- INFORMASI --}}
    <div class="grid grid-cols-3 gap-6 mb-10">

        {{-- TELEPON --}}
        <div class="bg-white rounded-3xl shadow p-6 border border-[#E5D3C1]">

            <div class="text-4xl mb-4">📞</div>

            <h2 class="text-gray-500 mb-2">
                Nomor Telepon
            </h2>

            <p class="text-xl font-bold text-[#6B3F2A]">

                {{ auth()->user()->telepon ?? '-' }}

            </p>

        </div>

        {{-- ALAMAT --}}
        <div class="bg-white rounded-3xl shadow p-6 border border-[#E5D3C1]">

            <div class="text-4xl mb-4">📍</div>

            <h2 class="text-gray-500 mb-2">
                Alamat
            </h2>

            <p class="text-xl font-bold text-[#6B3F2A]">

                {{ auth()->user()->alamat ?? '-' }}

            </p>

        </div>

        {{-- MEMBER --}}
        <div class="bg-white rounded-3xl shadow p-6 border border-[#E5D3C1]">

            <div class="text-4xl mb-4">📅</div>

            <h2 class="text-gray-500 mb-2">
                Bergabung Sejak
            </h2>

            <p class="text-xl font-bold text-[#6B3F2A]">

                {{ auth()->user()->created_at->format('d M Y') }}

            </p>

        </div>

    </div>

    {{-- AKTIVITAS --}}
    <div class="bg-white rounded-3xl shadow
                border border-[#E5D3C1] p-8">

        <h2 class="text-3xl font-bold mb-8">
            Aktivitas Akun
        </h2>

        <div class="space-y-5">

            <div class="flex items-center justify-between
                        border-b pb-4">

                <div>

                    <h3 class="font-bold text-lg">
                        Total Pengajuan
                    </h3>

                    <p class="text-gray-500">
                        Semua layanan yang pernah diajukan
                    </p>

                </div>

                <span class="text-3xl font-bold text-[#6B3F2A]">

                    {{ \App\Models\Pengajuan::where('user_id', auth()->id())->count() }}

                </span>

            </div>

            <div class="flex items-center justify-between
                        border-b pb-4">

                <div>

                    <h3 class="font-bold text-lg">
                        Pengajuan Diproses
                    </h3>

                    <p class="text-gray-500">
                        Pengajuan yang sedang diproses
                    </p>

                </div>

                <span class="text-3xl font-bold text-blue-600">

                    {{ \App\Models\Pengajuan::where('user_id', auth()->id())->where('status','diproses')->count() }}

                </span>

            </div>

            <div class="flex items-center justify-between">

                <div>

                    <h3 class="font-bold text-lg">
                        Pengajuan Selesai
                    </h3>

                    <p class="text-gray-500">
                        Pengajuan yang telah selesai
                    </p>

                </div>

                <span class="text-3xl font-bold text-green-600">

                    {{ \App\Models\Pengajuan::where('user_id', auth()->id())->where('status','selesai')->count() }}

                </span>

            </div>

        </div>

    </div>

</div>

@endsection
