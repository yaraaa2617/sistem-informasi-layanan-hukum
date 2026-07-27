<nav id="navbar"
     class="fixed top-0 w-full z-50
            backdrop-blur-md bg-black/20
            transition-all duration-500">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            {{-- LOGO --}}
            <div class="flex items-center space-x-2">
                <span class="text-3xl">⚖️</span>
                <span class="font-bold text-xl text-[#A77F60]">Notaris dan PPAT Muhammad Baiquni Haqqi</span>
            </div>

            {{-- MENU --}}
            <div class="flex items-center space-x-8 text-white font-medium">
                <a href="{{ route('home') }}" class="hover:text-[#A77F60]">Home</a>
                <a href="{{ route('layanan') }}" class="hover:text-[#A77F60]">Layanan</a>
                <a href="{{ route('profile') }}" class="hover:text-[#A77F60]">Profil</a>
                <a href="{{ route('kontak') }}" class="hover:text-[#A77F60]">Kontak</a>
            </div>

            {{-- AUTH --}}
            <div class="flex items-center space-x-4">

                @auth
                    <span class="text-gray-700">
                        {{ auth()->user()->name }}
                    </span>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Admin
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-500 hover:underline">
                            Logout
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}"
                       class="bg-[#6B3F2A] hover:bg-[#5A3322] text-white px-4 py-2 rounded-xl">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-[#6B3F2A] hover:bg-[#5A3322] text-white px-4 py-2 rounded-xl">
                        Daftar
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>
