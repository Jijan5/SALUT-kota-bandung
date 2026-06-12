<!-- ===== NAVBAR ===== -->
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white/95 border-b border-slate-100 shadow-sm transition-all duration-300 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ asset('images/icon-web.png') }}" alt="Logo UT" class="h-12 w-auto">
                <div>
                    <span class="block font-outfit font-extrabold text-blue-900 text-lg leading-tight tracking-tight">SALUT MITRA PRIANGAN KOTA BANDUNG</span>
                    <span class="block text-xs text-slate-400 font-medium tracking-wider uppercase">Sentra Layanan Universitas Terbuka</span>
                </div>
            </a>
            <nav class="hidden md:flex items-center space-x-8">
                <a href="/" class="{{ request()->is('/') ? 'text-blue-700 font-bold border-b-2 border-blue-700 pb-0.5' : 'text-slate-600 hover:text-blue-700 font-semibold' }} text-sm transition">Beranda</a>
                <a href="/program-studi" class="{{ request()->is('program-studi') ? 'text-blue-700 font-bold border-b-2 border-blue-700 pb-0.5' : 'text-slate-600 hover:text-blue-700 font-semibold' }} text-sm transition">Program Studi</a>
                <a href="/kurikulum-ut" class="{{ request()->is('kurikulum-ut') ? 'text-blue-700 font-bold border-b-2 border-blue-700 pb-0.5' : 'text-slate-600 hover:text-blue-700 font-semibold' }} text-sm transition">Kurikulum UT</a>
                
                <!-- TOMBOL NAVBAR - ARAH KE user.dashboard -->
                @auth
                    <a href="{{ route('user.dashboard') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition shadow-md shadow-blue-500/20">Dashboard Saya</a>
                @else
                    <a href="{{ route('user.login') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition shadow-md shadow-blue-500/20">Daftar Sekarang</a>
                @endauth
            </nav>
            <button id="mobile-btn" class="md:hidden p-2 text-slate-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
    
    <!-- MOBILE MENU - ARAH KE user.dashboard -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-100 px-4 pt-2 pb-4 space-y-1 shadow-sm">
        <a href="/" class="block px-3 py-2 rounded-lg {{ request()->is('/') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50 font-medium' }} text-sm">Beranda</a>
        <a href="/program-studi" class="block px-3 py-2 rounded-lg {{ request()->is('program-studi') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50 font-medium' }} text-sm">Program Studi</a>
        <a href="/kurikulum-ut" class="block px-3 py-2 rounded-lg {{ request()->is('kurikulum-ut') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50 font-medium' }} text-sm">Kurikulum UT</a>
        
        @auth
            <a href="{{ route('user.dashboard') }}" class="block px-3 py-2 rounded-lg bg-blue-700 text-white font-bold text-sm text-center mt-2">Dashboard Saya</a>
        @else
            <a href="{{ route('user.login') }}" class="block px-3 py-2 rounded-lg bg-blue-700 text-white font-bold text-sm text-center mt-2">Daftar Sekarang</a>
        @endauth
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileBtn = document.getElementById('mobile-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>