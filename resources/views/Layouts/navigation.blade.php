<nav x-data="{ open: false, openUser: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <i class="fas fa-balance-scale text-2xl text-blue-600 mr-2"></i>
                    <span class="font-bold text-xl text-gray-800">Notaris dan PPAT Muhammad Baiquni Haqqi</span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex md:ms-10 space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="{{ route('layanan') }}" class="text-gray-700 hover:text-blue-600">Layanan</a>
                    <a href="{{ route('profile') }}" class="text-gray-700 hover:text-blue-600">Profil</a>
                    <a href="{{ route('kontak') }}" class="text-gray-700 hover:text-blue-600">Kontak</a>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="flex items-center space-x-4">

                @auth
                <!-- USER DROPDOWN -->
                <div class="relative">
                    <button @click="openUser = !openUser"
                        class="flex items-center text-sm text-gray-700 font-medium">
                        {{ auth()->user()->name }}

                        @if(auth()->user()->role === 'admin')
                            <span class="ml-2 bg-red-500 text-white px-2 py-1 text-xs rounded">ADMIN</span>
                        @endif

                        <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="openUser" @click.away="openUser = false"
                        class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">

                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin') }}"
                           class="block px-4 py-2 hover:bg-gray-100">
                            Dashboard Admin
                        </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

                @else
                <!-- LOGIN REGISTER (FIXED) -->
                <div class="flex space-x-3">
                    <a href="{{ route('login') }}"
                       class="bg-[#6B3F2A] hover:bg-[#5A3322] text-white px-5 py-2 rounded-xl">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                        Daftar
                    </a>
                </div>
                @endauth

                <!-- Mobile Button -->
                <div class="md:hidden">
                    <button @click="open = !open">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" class="md:hidden bg-white border-t">

        <a href="{{ route('home') }}" class="block px-4 py-2">Home</a>
        <a href="{{ route('layanan') }}" class="block px-4 py-2">Layanan</a>
        <a href="{{ route('profile') }}" class="block px-4 py-2">Profil</a>
        <a href="{{ route('kontak') }}" class="block px-4 py-2">Kontak</a>

        @auth
            <div class="border-t mt-2">
                <div class="px-4 py-2 text-sm">
                    {{ auth()->user()->name }}
                </div>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin') }}" class="block px-4 py-2 text-blue-600">
                        Admin Dashboard
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-2 text-red-600">
                        Logout
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}" class="block px-4 py-2 text-blue-600">Login</a>
            <a href="{{ route('register') }}" class="block px-4 py-2">Daftar</a>
        @endauth
    </div>
</nav>
