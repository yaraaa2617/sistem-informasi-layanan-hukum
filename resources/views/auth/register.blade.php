@extends('layouts.guest')

@section('content')

<div class="min-h-screen grid grid-cols-2">

    {{-- LEFT --}}
    <div class="relative">

        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=2070"
             class="w-full h-screen object-cover">

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="absolute inset-0 flex flex-col
                    justify-center px-20 text-white">

            <h1 class="text-6xl font-bold leading-tight mb-8">

                Bergabung
                Bersama Kami

            </h1>

            <p class="text-xl text-gray-200 leading-9">

                Daftarkan akun untuk mulai
                mengajukan layanan pertanahan
                secara online dan mudah.

            </p>

        </div>

    </div>

    {{-- RIGHT --}}
    <div class="bg-[#F8F5F2]
                flex items-center justify-center px-16">

        <div class="w-full max-w-lg">

            <div class="bg-white/80 backdrop-blur-lg
                        shadow-2xl rounded-3xl
                        p-10 border border-white">

                <div class="text-center mb-10">

                    <h2 class="text-5xl font-bold
                               text-[#6B3F2A] mb-4">

                        Register

                    </h2>

                    <p class="text-gray-500">

                        Buat akun baru

                    </p>

                </div>

                <form method="POST"
                      action="{{ route('register') }}"
                      class="space-y-6">

                    @csrf

                    {{-- NAME --}}
                    <div>

                        <label class="block mb-2 font-semibold">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               required
                               class="w-full border
                                      border-[#E5D3C1]
                                      rounded-2xl p-4
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-[#A77F60]">

                    </div>

                    {{-- EMAIL --}}
                    <div>

                        <label class="block mb-2 font-semibold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               required
                               class="w-full border
                                      border-[#E5D3C1]
                                      rounded-2xl p-4
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-[#A77F60]">

                    </div>

                    {{-- PASSWORD --}}
                    <div>

                        <label class="block mb-2 font-semibold">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               required
                               class="w-full border
                                      border-[#E5D3C1]
                                      rounded-2xl p-4
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-[#A77F60]">

                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div>

                        <label class="block mb-2 font-semibold">
                            Konfirmasi Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               required
                               class="w-full border
                                      border-[#E5D3C1]
                                      rounded-2xl p-4
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-[#A77F60]">

                    </div>

                    {{-- BUTTON --}}
                    <button class="w-full bg-[#6B3F2A]
                                   hover:bg-[#8A5A44]
                                   text-white py-4
                                   rounded-2xl font-bold
                                   text-lg transition
                                   duration-300 shadow-lg">

                        Daftar

                    </button>

                </form>

                {{-- LOGIN --}}
                <p class="text-center text-gray-500 mt-8">

                    Sudah punya akun?

                    <a href="{{ route('login') }}"
                       class="text-[#6B3F2A] font-bold">

                        Login

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>

@endsection
