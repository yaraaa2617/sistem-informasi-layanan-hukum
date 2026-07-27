<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5EEE6]">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="w-64 h-screen bg-[#4E342E] text-white fixed">

        <div class="p-6 text-2xl font-bold border-b border-[#F5EEE6]">
            CLIENT PANEL
        </div>

        <nav class="mt-6">

            <a href="{{ route('user.dashboard') }}" class="block px-6 py-3 hover:bg-[#A77F60]">
                Home
            </a>

            <a href="{{ route('user.profil') }}" class="block px-6 py-3 hover:bg-[#A77F60]">
                Profil
            </a>

            <a href="{{ route('user.layanan') }}" class="block px-6 py-3 hover:bg-[#A77F60]">
                Layanan
            </a>

            <a href="{{ route('user.pendaftaran') }}" class="block px-6 py-3 hover:bg-[#A77F60]">
                Pendaftaran
            </a>

            <a href="{{ route('user.histori') }}" class="block px-6 py-3 hover:bg-[#A77F60]">
                Histori
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full text-left px-6 py-3 hover:bg-[#A77F60]">
                    Logout
                </button>
            </form>

        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="ml-64 p-10 w-full">

        @yield('content')

    </main>

</div>

</body>
</html>
