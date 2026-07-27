<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaris dan PPAT Muhammad Baiquni Haqqi</title>

    @vite('resources/css/app.css')

    <script defer src="https://unpkg.com/alpinejs"></script>

    <style>

        [x-cloak] {
            display: none !important;
        }

        /* ANIMASI SCROLL */

        .reveal{

            opacity: 0;
            transform: translateY(80px);

            transition: all 1s ease;

        }

        .reveal.active{

            opacity: 1;
            transform: translateY(0);

        }

    </style>
</head>

<body class="bg-[#F8F5F2] text-[#2B2B2B]">

    {{-- NAVBAR --}}
    @include('components.navbar')

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- SCRIPT NAVBAR + SCROLL ANIMATION --}}
    <script>

        // NAVBAR HILANG SAAT SCROLL

        let lastScroll = 0;

        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {

            const currentScroll = window.pageYOffset;

            if(currentScroll > lastScroll){

                navbar.style.transform = 'translateY(-100%)';

            } else {

                navbar.style.transform = 'translateY(0)';

            }

            lastScroll = currentScroll;

        });

        // ANIMASI MUNCUL

        function reveal(){

            const reveals = document.querySelectorAll('.reveal');

            reveals.forEach((item) => {

                const windowHeight = window.innerHeight;

                const revealTop = item.getBoundingClientRect().top;

                if(revealTop < windowHeight - 100){

                    item.classList.add('active');

                }

            });

        }

        window.addEventListener('scroll', reveal);

        reveal();

    </script>

</body>
{{-- FLOATING WHATSAPP --}}
<a href="https://wa.me/6285766844203?text=Halo%20saya%20ingin%20konsultasi"
   target="_blank"
   class="fixed bottom-6 right-6 z-50
          bg-green-500 hover:bg-green-600
          w-16 h-16 rounded-full
          flex items-center justify-center
          shadow-2xl transition duration-300
          hover:scale-110">

    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
         class="w-9 h-9">

</a>
</html>
