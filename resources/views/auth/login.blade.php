@extends('layouts.guest')

@section('content')

<div class="min-h-screen grid grid-cols-2">

    {{-- LEFT --}}
    <div class="relative">

        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2070"
             class="w-full h-screen object-cover">

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="absolute inset-0 flex flex-col
                    justify-center px-20 text-white">

            <h1 class="text-6xl font-bold leading-tight mb-8">

                Notaris & PPAT
                Muhammad Baiquni Haqqi

            </h1>

            <p class="text-xl text-gray-200 leading-9">

                Solusi profesional untuk pengurusan
                pertanahan, hibah, warisan,
                dan akta jual beli.

            </p>

        </div>

    </div>


    {{-- RIGHT --}}
    <div class="bg-[#F8F5F2]
                flex items-center justify-center px-16">

        <div class="w-full max-w-lg">

            <div class="bg-white/80 backdrop-blur-lg
                        shadow-2xl rounded-3xl p-10 border border-white">

                <div class="text-center mb-10">

                    <h2 class="text-5xl font-bold text-[#6B3F2A] mb-4">

                        Login

                    </h2>

                    <p class="text-gray-500">

                        Masuk ke akun Anda

                    </p>

                </div>

                <form method="POST"
                      action="{{ route('login') }}"
                      class="space-y-6">

                    @csrf

                    {{-- EMAIL --}}
                    <div>

                        <label class="block mb-2 font-semibold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               required
                               class="w-full border border-[#E5D3C1]
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
                               class="w-full border border-[#E5D3C1]
                                      rounded-2xl p-4
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-[#A77F60]">

                    </div>

                    {{-- REMEMBER --}}
                    <div class="flex items-center justify-between">

                        <label class="flex items-center gap-2">

                            <input type="checkbox"
                                   name="remember">

                            <span class="text-gray-600">
                                Remember me
                            </span>

                        </label>

                    </div>

                    {{-- BUTTON --}}
                    <button class="w-full bg-[#6B3F2A]
                                   hover:bg-[#8A5A44]
                                   text-white py-4 rounded-2xl
                                   font-bold text-lg
                                   transition duration-300
                                   shadow-lg">

                        Login

                    </button>

                </form>

                {{-- REGISTER --}}
                <p class="text-center text-gray-500 mt-8">

                    Belum punya akun?

                    <a href="{{ route('register') }}"
                       class="text-[#6B3F2A] font-bold">

                        Daftar

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>

@endsection
