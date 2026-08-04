<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaris Panel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F5EEE6]">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="w-64 h-screen bg-[#4E342E] text-white fixed shadow-2xl">

        <div class="p-6 text-2xl font-bold border-b border-[#F5EEE6]">
            NOTARIS PANEL
        </div>

        <nav class="mt-6">

            <a href="{{ route('notaris.dashboard') }}"
               class="block px-6 py-3 hover:bg-[#A77F60]">
                Dashboard
            </a>

            <a href="{{ route('notaris.pengajuan') }}"
               class="block px-6 py-3 hover:bg-[#A77F60]">
                Pengajuan
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

        @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif
        @yield('content')

    </main>

</div>

</body>
</html>
