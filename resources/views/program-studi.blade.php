<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Studi - SALUT Kota Bandung</title>
    <meta name="description" content="Temukan 34+ program studi dari 4 fakultas Universitas Terbuka yang tersedia di SALUT Kota Bandung.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .card-hover { transition: all .3s cubic-bezier(.4,0,.2,1); }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,.1); }
        .prodi-card { transition: all .25s ease; }
        .prodi-card.hidden-card { display: none; }
        .search-highlight { background: linear-gradient(120deg,#dbeafe 0%,#bfdbfe 100%); border-radius:3px; padding:0 2px; }
        .filter-btn.active { background:#1d4ed8; color:#fff; border-color:#1d4ed8; }
    </style>
</head>
<body class="bg-slate-50 antialiased">

<x-navbar />

<!-- ===== PAGE HERO ===== -->
<section class="bg-gradient-to-br from-blue-950 to-indigo-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle,_#fff_1px,_transparent_1px)] [background-size:24px_24px]"></div>
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <span class="inline-block bg-blue-700/40 border border-blue-500/30 text-blue-200 text-xs font-bold px-4 py-2 rounded-full mb-4 uppercase tracking-widest">Katalog Lengkap</span>
        <h1 class="font-outfit text-4xl md:text-5xl font-extrabold mb-4">Program Studi Universitas Terbuka</h1>
        <p class="text-blue-200/80 text-lg max-w-2xl mx-auto leading-relaxed">Pilih dari 34+ program studi di 4 fakultas yang tersedia. Temukan jurusan yang paling sesuai dengan minat, karier, dan tujuan akademis Anda.</p>
    </div>
</section>

<!-- ===== MAIN CONTENT ===== -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 mb-8 sticky top-20 z-30">
        <div class="flex flex-col sm:flex-row gap-4 items-center">
            <!-- Search Input -->
            <div class="relative flex-1 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input
                    id="search-input"
                    type="text"
                    placeholder="Cari nama program studi... (contoh: Manajemen, Hukum, PGSD)"
                    class="w-full pl-12 pr-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
                <span id="search-count" class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-medium hidden"></span>
            </div>
            <!-- Clear button -->
            <button id="clear-search" class="hidden text-xs font-semibold text-slate-500 hover:text-blue-700 border border-slate-200 px-4 py-3.5 rounded-xl transition whitespace-nowrap">
                ✕ Hapus Filter
            </button>
        </div>

        <!-- Faculty Filter Tabs -->
        <div class="flex flex-wrap gap-2 mt-4">
            <button class="filter-btn active text-xs font-semibold px-4 py-2 rounded-xl border border-blue-200 bg-blue-700 text-white transition" data-faculty="all">Semua Fakultas</button>
            <button class="filter-btn text-xs font-semibold px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition" data-faculty="FHISIP">FHISIP</button>
            <button class="filter-btn text-xs font-semibold px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition" data-faculty="FEKON">FEKON</button>
            <button class="filter-btn text-xs font-semibold px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition" data-faculty="FKIP">FKIP</button>
            <button class="filter-btn text-xs font-semibold px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition" data-faculty="FST">FST</button>
        </div>
    </div>

    <!-- No Results -->
    <div id="no-results" class="hidden text-center py-20">
        <div class="text-6xl mb-4">🔍</div>
        <h3 class="font-outfit text-xl font-bold text-slate-600 mb-2">Program Studi Tidak Ditemukan</h3>
        <p class="text-slate-400 text-sm">Coba kata kunci lain atau pilih fakultas yang berbeda.</p>
    </div>

    @php
    $fakultas = [
        'FHISIP' => [
            'name' => 'Fakultas Hukum, Ilmu Sosial, dan Ilmu Politik',
            'color' => 'purple',
            'icon' => '⚖️',
            'programs' => [
                ['name' => 'Ilmu Hukum', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Ilmu Komunikasi', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Ilmu Pemerintahan', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Administrasi Negara', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Administrasi Bisnis', 'jenjang' => 'D3', 'sks' => 110],
                ['name' => 'Sosiologi', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Sastra Inggris', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Perpustakaan', 'jenjang' => 'D2', 'sks' => 80],
            ]
        ],
        'FEKON' => [
            'name' => 'Fakultas Ekonomi',
            'color' => 'blue',
            'icon' => '📈',
            'programs' => [
                ['name' => 'Manajemen', 'jenjang' => 'S1', 'sks' => 145],
                ['name' => 'Akuntansi', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Ekonomi Pembangunan', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Manajemen Pemasaran', 'jenjang' => 'D3', 'sks' => 110],
                ['name' => 'Akuntansi', 'jenjang' => 'D3', 'sks' => 110],
                ['name' => 'Perbankan dan Keuangan', 'jenjang' => 'D3', 'sks' => 110],
            ]
        ],
        'FKIP' => [
            'name' => 'Fakultas Keguruan dan Ilmu Pendidikan',
            'color' => 'emerald',
            'icon' => '📚',
            'programs' => [
                ['name' => 'Pendidikan Guru SD (PGSD)', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Guru PAUD', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Bahasa Indonesia', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Bahasa Inggris', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Matematika', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan IPA', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan IPS', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Pancasila & Kewarganegaraan', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Ekonomi', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Teknologi Pendidikan', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Biologi', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Fisika', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Kimia', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Pendidikan Agama Islam', 'jenjang' => 'S1', 'sks' => 144],
            ]
        ],
        'FST' => [
            'name' => 'Fakultas Sains dan Teknologi',
            'color' => 'amber',
            'icon' => '🔬',
            'programs' => [
                ['name' => 'Statistika', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Matematika', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Agribisnis', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Biologi', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Kimia', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Teknik Informatika', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Sistem Informasi', 'jenjang' => 'S1', 'sks' => 144],
                ['name' => 'Teknologi Pangan', 'jenjang' => 'S1', 'sks' => 144],
            ]
        ],
    ];
    $colorMap = [
        'purple' => ['bg'=>'bg-purple-100','text'=>'text-purple-700','badge'=>'bg-purple-50 text-purple-600','border'=>'border-purple-100'],
        'blue'   => ['bg'=>'bg-blue-100',  'text'=>'text-blue-700',  'badge'=>'bg-blue-50 text-blue-600',  'border'=>'border-blue-100'],
        'emerald'=> ['bg'=>'bg-emerald-100','text'=>'text-emerald-700','badge'=>'bg-emerald-50 text-emerald-600','border'=>'border-emerald-100'],
        'amber'  => ['bg'=>'bg-amber-100', 'text'=>'text-amber-700', 'badge'=>'bg-amber-50 text-amber-600', 'border'=>'border-amber-100'],
    ];
    @endphp

    @foreach($fakultas as $kode => $fak)
    @php $c = $colorMap[$fak['color']]; @endphp
    <div class="faculty-section mb-10" data-faculty="{{ $kode }}">
        <!-- Faculty Header -->
        <div class="flex items-center space-x-3 mb-5">
            <div class="w-12 h-12 {{ $c['bg'] }} rounded-2xl flex items-center justify-center text-2xl shadow-sm flex-shrink-0">{{ $fak['icon'] }}</div>
            <div>
                <span class="text-xs font-bold {{ $c['text'] }} uppercase tracking-widest">{{ $kode }}</span>
                <h2 class="font-outfit text-xl font-bold text-slate-800 leading-tight">{{ $fak['name'] }}</h2>
            </div>
            <span class="ml-auto text-xs font-semibold {{ $c['badge'] }} px-3 py-1 rounded-full faculty-count">{{ count($fak['programs']) }} Prodi</span>
        </div>

        <!-- Program Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 prodi-grid">
            @foreach($fak['programs'] as $prodi)
            <div class="prodi-card card-hover bg-white border {{ $c['border'] }} rounded-2xl p-5 cursor-pointer group"
                data-faculty="{{ $kode }}"
                data-name="{{ strtolower($prodi['name']) }}"
                data-jenjang="{{ $prodi['jenjang'] }}">
                <div class="flex items-start justify-between mb-3">
                    <span class="text-xs font-bold {{ $c['badge'] }} px-2.5 py-1 rounded-lg">{{ $prodi['jenjang'] }}</span>
                    <span class="text-xs text-slate-400 font-medium">{{ $prodi['sks'] }} SKS</span>
                </div>
                <h3 class="font-outfit font-bold text-slate-800 text-sm leading-snug mb-4 prodi-name group-hover:{{ $c['text'] }} transition">{{ $prodi['name'] }}</h3>
                <a href="/pendaftaran"
                    class="inline-flex items-center space-x-1 text-xs font-semibold {{ $c['text'] }} hover:underline">
                    <span>Daftar Sekarang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

</main>

<!-- ===== CTA ===== -->
<section class="py-16 bg-gradient-to-r from-blue-800 to-indigo-900 text-white">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="font-outfit text-3xl font-extrabold mb-3">Sudah Menemukan Program Studi Pilihan?</h2>
        <p class="text-blue-200 mb-7 text-base">Daftarkan diri Anda sekarang dan mulai perjalanan akademis bersama Universitas Terbuka.</p>
        <a href="/pendaftaran" class="inline-flex items-center space-x-2 bg-white text-blue-900 font-extrabold px-8 py-4 rounded-2xl hover:bg-blue-50 transition shadow-xl text-base">
            <span>Daftar Mahasiswa Baru</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>
</section>

<x-footer />

<script>

    const searchInput = document.getElementById('search-input');
    const clearBtn    = document.getElementById('clear-search');
    const countEl     = document.getElementById('search-count');
    const noResults   = document.getElementById('no-results');
    const filterBtns  = document.querySelectorAll('.filter-btn');

    let activeFilter = 'all';
    let searchQuery  = '';

    function applyFilters() {
        const query = searchQuery.toLowerCase().trim();
        let visibleTotal = 0;

        document.querySelectorAll('.prodi-card').forEach(card => {
            const name    = card.dataset.name;
            const faculty = card.dataset.faculty;

            const facultyMatch = activeFilter === 'all' || faculty === activeFilter;
            const nameMatch    = !query || name.includes(query);

            if (facultyMatch && nameMatch) {
                card.classList.remove('hidden-card');
                visibleTotal++;
                // Highlight matching text
                const nameEl = card.querySelector('.prodi-name');
                const original = nameEl.textContent;
                if (query) {
                    const regex = new RegExp(`(${query})`, 'gi');
                    nameEl.innerHTML = original.replace(regex, '<mark class="search-highlight">$1</mark>');
                } else {
                    nameEl.innerHTML = original;
                }
            } else {
                card.classList.add('hidden-card');
            }
        });

        // Show/hide faculty sections
        document.querySelectorAll('.faculty-section').forEach(section => {
            const fac     = section.dataset.faculty;
            const visible = section.querySelectorAll('.prodi-card:not(.hidden-card)').length;
            section.style.display = (activeFilter === 'all' || fac === activeFilter) && visible > 0 ? '' : 'none';
            const countBadge = section.querySelector('.faculty-count');
            if (countBadge) countBadge.textContent = visible + ' Prodi';
        });

        noResults.classList.toggle('hidden', visibleTotal > 0);

        // Update search counter
        if (query) {
            countEl.textContent = visibleTotal + ' ditemukan';
            countEl.classList.remove('hidden');
            clearBtn.classList.remove('hidden');
        } else {
            countEl.classList.add('hidden');
            clearBtn.classList.toggle('hidden', activeFilter === 'all');
        }
    }

    searchInput.addEventListener('input', function() {
        searchQuery = this.value;
        applyFilters();
    });

    clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        searchQuery = '';
        activeFilter = 'all';
        filterBtns.forEach(b => {
            b.classList.toggle('active', b.dataset.faculty === 'all');
            if (b.dataset.faculty === 'all') {
                b.classList.add('bg-blue-700','text-white','border-blue-200');
                b.classList.remove('text-slate-600','hover:bg-slate-50','border-slate-200');
            } else {
                b.classList.remove('bg-blue-700','text-white','border-blue-200');
                b.classList.add('text-slate-600','hover:bg-slate-50','border-slate-200');
            }
        });
        applyFilters();
    });

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            activeFilter = this.dataset.faculty;
            filterBtns.forEach(b => {
                const isActive = b === this;
                b.classList.toggle('active', isActive);
                if (isActive) {
                    b.classList.add('bg-blue-700','text-white','border-blue-200');
                    b.classList.remove('text-slate-600','border-slate-200');
                } else {
                    b.classList.remove('bg-blue-700','text-white','border-blue-200');
                    b.classList.add('text-slate-600','border-slate-200');
                }
            });
            if (activeFilter !== 'all') clearBtn.classList.remove('hidden');
            else if (!searchQuery) clearBtn.classList.add('hidden');
            applyFilters();
        });