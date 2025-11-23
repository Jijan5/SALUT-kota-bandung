<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Admin Salut' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform transition-transform duration-300 ease-in-out z-30"
            :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">
            <div class="p-4 text-lg font-bold flex items-center justify-between">
                <span>Admin Dashboard</span>
            </div>
            <div class="p-4">
                <img src="{{ asset('images/salut-kota-bandung.jpg') }}" alt="Logo" class="w-full">
            </div>
            <nav class="flex-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.index') }}" class="block px-4 py-2 hover:bg-gray-700">Pendaftar Baru</a>
                <a href="{{ route('admin.diterima') }}" class="block px-4 py-2 hover:bg-gray-700">Siswa Diterima</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out"
            :class="sidebarOpen ? 'ml-64' : 'ml-0'">
            <header class="bg-white shadow p-4 flex items-center">
                <button @click.stop="sidebarOpen = !sidebarOpen" class="text-gray-800 p-2 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold ml-4">{{ $title ?? 'Dashboard' }}</h1>
                <div class="ml-auto">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type-="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Logout</button>
                    </form>
                </div>
            </header>
            <main class="flex-1 overflow-x-auto overflow-y-auto bg-blue-900">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>