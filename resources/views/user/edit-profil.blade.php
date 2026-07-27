@extends('layouts.user')

@section('content')

<a href="{{ url()->previous() }}"
   class="inline-flex items-center justify-center w-7 h-7 mb-3 bg-[#6B3F2A] text-white rounded-full text-sm hover:bg-[#4E342E]">
    ←
</a>

<h1 class="text-4xl font-bold mb-8">
    Edit Profil
</h1>

<div class="bg-white rounded-3xl shadow
            border border-[#E5D3C1]
            p-10 max-w-4xl mx-auto">

    <form method="POST"
          action="{{ route('profile.update') }}"
          enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        {{-- FOTO --}}
        <div class="flex justify-center mb-10">

            <div class="text-center">

                @if(auth()->user()->photo)

                    <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                         class="w-32 h-32 rounded-full
                                object-cover mx-auto mb-4">

                @else

                    <div class="w-32 h-32 rounded-full
                                bg-[#6B3F2A] text-white
                                flex items-center justify-center
                                text-5xl font-bold mx-auto mb-4">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                @endif

                <input type="file"
                       name="photo"
                       class="mt-3">

            </div>

        </div>

        <div class="grid grid-cols-2 gap-6 mb-8">

            {{-- NAMA --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="name"
                       value="{{ auth()->user()->name }}"
                       class="w-full border border-[#E5D3C1]
                              rounded-2xl p-4">

            </div>

            {{-- EMAIL --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ auth()->user()->email }}"
                       class="w-full border border-[#E5D3C1]
                              rounded-2xl p-4">

            </div>

            {{-- TELEPON --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Nomor Telepon
                </label>

                <input type="text"
                       name="telepon"
                       value="{{ auth()->user()->telepon }}"
                       class="w-full border border-[#E5D3C1]
                              rounded-2xl p-4">

            </div>

            {{-- ALAMAT --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Alamat
                </label>

                <input type="text"
                       name="alamat"
                       value="{{ auth()->user()->alamat }}"
                       class="w-full border border-[#E5D3C1]
                              rounded-2xl p-4">

            </div>

        </div>

        {{-- PASSWORD --}}
        <div class="grid grid-cols-2 gap-6 mb-10">

            <div>

                <label class="block mb-2 font-semibold">
                    Password Baru
                </label>

                <input type="password"
                       name="password"
                       class="w-full border border-[#E5D3C1]
                              rounded-2xl p-4">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Konfirmasi Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       class="w-full border border-[#E5D3C1]
                              rounded-2xl p-4">

            </div>

        </div>

        <button class="bg-[#6B3F2A]
                       hover:bg-[#8A5A44]
                       text-white px-8 py-4
                       rounded-2xl font-bold">

            Simpan Perubahan

        </button>

    </form>

</div>

@endsection
