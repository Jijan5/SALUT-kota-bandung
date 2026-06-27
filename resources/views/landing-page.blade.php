<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALUT Kota Bandung - Sentra Layanan Universitas Terbuka</title>
    <meta name="description"
        content="SALUT Kota Bandung melayani pendaftaran, konsultasi, dan administrasi Universitas Terbuka di wilayah Kota Bandung. Daftar sekarang!">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .bg-grid {
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.07) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-10px)
            }
        }

        .float {
            animation: float 5s ease-in-out infinite;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .fade-up {
            animation: fadeUp 0.7s ease forwards;
        }

        .card-hover {
            transition: all .3s cubic-bezier(.4, 0, .2, 1);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, .1);
        }

        .nav-sticky {
            backdrop-filter: blur(14px);
        }
    </style>
</head>

<body class="bg-white text-slate-800 antialiased">

    <x-navbar />

    <!-- ===== HERO CAROUSEL ===== -->
    <section id="hero"
        class="relative min-h-[580px] sm:min-h-[640px] lg:h-screen lg:min-h-[720px] overflow-hidden pt-24 pb-16">

        <!-- ── Slide Backgrounds ── -->
        <div id="carousel-track" class="absolute inset-0">
            @php
                $slides = [
                    [
                        'img' => asset('images/carousel-1.png'),
                        'badge' => 'Penerimaan Mahasiswa Baru 2025/2026',
                        'heading' =>
                            'Wujudkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-indigo-200">Impian Akademik</span> Anda Bersama UT',
                        'sub' =>
                            'SALUT Kota Bandung hadir untuk membantu proses pendaftaran, konsultasi, dan administrasi Universitas Terbuka di wilayah Bandung dengan mudah, cepat, dan terpercaya.',
                    ],
                    [
                        'img' => asset('images/carousel-2.png'),
                        'badge' => 'Jalur RPL — Alih Kredit Pengalaman Kerja',
                        'heading' =>
                            'Sudah Bekerja? <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-orange-200">Konversi Ilmu Anda</span> Menjadi SKS',
                        'sub' =>
                            'Program Rekognisi Pembelajaran Lampau (RPL) memungkinkan Anda mendapat pengakuan SKS dari ijazah D1/D2/D3/S1 atau pengalaman kerja formal yang telah Anda miliki.',
                    ],
                    [
                        'img' => asset('images/carousel-3.png'),
                        'badge' => '34+ Program Studi · 4 Fakultas',
                        'heading' =>
                            'Kuliah <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-teal-200">Kapan Saja &amp; Di Mana Saja</span> Tanpa Batas',
                        'sub' =>
                            'Universitas Terbuka menerapkan sistem pembelajaran jarak jauh yang 100% fleksibel. Raih gelar sarjana tanpa harus meninggalkan pekerjaan atau keluarga Anda.',
                    ],
                ];
            @endphp

            @foreach ($slides as $i => $slide)
                <div class="carousel-slide absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                    data-index="{{ $i }}">
                    <!-- Background image -->
                    <img src="{{ $slide['img'] }}" alt="Slide {{ $i + 1 }}"
                        class="absolute inset-0 w-full h-full object-cover object-center">
                    <!-- Layered gradient overlay: bottom-heavy for text, subtle top vignette -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-900/60 to-slate-800/30">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/70 via-transparent to-transparent">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- ── Subtle dot-grid texture overlay ── -->
        <div class="absolute inset-0 bg-grid opacity-30 pointer-events-none"></div>

        <!-- ── Slide Content ── -->
        <div class="relative z-10 h-full flex flex-col justify-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pb-12 sm:pb-24">

                @foreach ($slides as $i => $slide)
                    <div class="carousel-content absolute inset-0 flex flex-col justify-start sm:justify-center pt-30 sm:pt-0 px-4 sm:px-10 lg:px-20 transition-all duration-700 ease-in-out {{ $i === 0 ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4 pointer-events-none' }}"
                        data-index="{{ $i }}">
                        <div class="max-w-3xl">
                            <!-- Badge -->
                            <span
                                class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-sm border border-white/20 text-blue-200 text-xs font-bold px-4 py-2 rounded-full mb-4 sm:mb-6 uppercase tracking-widest">
                                <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-pulse"></span>
                                <span>{{ $slide['badge'] }}</span>
                            </span>

                            <!-- Heading -->
                            <h1
                                class="font-outfit text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white leading-[1.15] mb-4 sm:mb-6 drop-shadow-lg">
                                {!! $slide['heading'] !!}
                            </h1>

                            <!-- Sub text -->
                            <p
                                class="text-slate-200/85 text-sm sm:text-base md:text-lg leading-relaxed mb-6 sm:mb-8 max-w-2xl">
                                {{ $slide['sub'] }}
                            </p>

                            <!-- CTA Buttons -->
                            <div class="flex flex-wrap gap-4">
                                @auth
                                    <a href="{{ route('pendaftaran') }}"
                                        class="inline-flex items-center space-x-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-5 py-3 sm:px-7 sm:py-4 rounded-2xl transition shadow-2xl shadow-blue-700/40 text-sm sm:text-base">
                                        <span>Lanjutkan Pendaftaran</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{ route('user.login') }}"
                                        class="inline-flex items-center space-x-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-5 py-3 sm:px-7 sm:py-4 rounded-2xl transition shadow-2xl shadow-blue-700/40 text-sm sm:text-base">
                                        <span>Daftar Sekarang</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                @endauth
                                <a href="/program-studi"
                                    class="inline-flex items-center space-x-2 bg-white/10 hover:bg-white/20 border border-white/25 backdrop-blur-sm text-white font-semibold px-5 py-3 sm:px-7 sm:py-4 rounded-2xl transition text-sm sm:text-base">
                                    <span>Program Studi</span>
                                </a>
                            </div>

                            <!-- Stats Row -->
                            <div
                                class="hidden md:flex flex-wrap gap-8 mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-white/10">
                                <div>
                                    <p class="font-outfit text-2xl sm:text-3xl font-black text-white">34+</p>
                                    <p class="text-blue-300/70 text-sm">Program Studi</p>
                                </div>
                                <div class="border-l border-white/10 pl-8">
                                    <p class="font-outfit text-2xl sm:text-3xl font-black text-white">4</p>
                                    <p class="text-blue-300/70 text-sm">Fakultas</p>
                                </div>
                                <div class="border-l border-white/10 pl-8">
                                    <p class="font-outfit text-2xl sm:text-3xl font-black text-white">100%</p>
                                    <p class="text-blue-300/70 text-sm">Fleksibel Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- ── Dot Indicators ── -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center space-x-3">
            @foreach ($slides as $i => $slide)
                <button
                    class="carousel-dot transition-all duration-300 rounded-full {{ $i === 0 ? 'w-8 h-2.5 bg-white' : 'w-2.5 h-2.5 bg-white/40 hover:bg-white/70' }}"
                    data-index="{{ $i }}" aria-label="Slide {{ $i + 1 }}">
                </button>
            @endforeach
        </div>

        <!-- ── Progress bar ── -->
        <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-white/10 z-20">
            <div id="hero-progress" class="h-full bg-blue-400/70 transition-none" style="width:0%"></div>
        </div>

        <!-- ── Status badge (top-right) ── -->
        <div
            class="hidden md:block absolute top-24 right-10 z-20 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl px-4 py-3 shadow-lg">
            <p class="text-xs text-white/60 font-medium">Status Pendaftaran</p>
            <p class="font-outfit font-extrabold text-emerald-400 text-sm flex items-center space-x-1.5 mt-0.5">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                <span>DIBUKA</span>
            </p>
        </div>

    </section>

    <script>
        (function() {
            const TOTAL = {{ count($slides) }};
            const AUTO_MS = 5000;
            let current = 0;
            let timer = null;
            let progress = 0;
            let pTimer = null;

            const bgSlides = document.querySelectorAll('.carousel-slide');
            const contents = document.querySelectorAll('.carousel-content');
            const dots = document.querySelectorAll('.carousel-dot');
            const progressBar = document.getElementById('hero-progress');

            function goTo(idx) {
                // Background
                bgSlides[current].classList.replace('opacity-100', 'opacity-0');
                // Content
                contents[current].classList.remove('opacity-100', 'translate-y-0');
                contents[current].classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                // Dot
                dots[current].className =
                    'carousel-dot transition-all duration-300 rounded-full w-2.5 h-2.5 bg-white/40 hover:bg-white/70';

                current = (idx + TOTAL) % TOTAL;

                bgSlides[current].classList.replace('opacity-0', 'opacity-100');
                contents[current].classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                contents[current].classList.add('opacity-100', 'translate-y-0');
                dots[current].className = 'carousel-dot transition-all duration-300 rounded-full w-8 h-2.5 bg-white';

                resetProgress();
            }

            function resetProgress() {
                progress = 0;
                progressBar.style.transition = 'none';
                progressBar.style.width = '0%';
                clearInterval(pTimer);
                setTimeout(() => {
                    progressBar.style.transition = `width ${AUTO_MS}ms linear`;
                    progressBar.style.width = '100%';
                }, 30);
            }

            function startAuto() {
                clearInterval(timer);
                timer = setInterval(() => goTo(current + 1), AUTO_MS);
            }

            // Dots
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    goTo(parseInt(dot.dataset.index));
                    startAuto();
                });
            });

            // Keyboard
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    goTo(current - 1);
                    startAuto();
                }
                if (e.key === 'ArrowRight') {
                    goTo(current + 1);
                    startAuto();
                }
            });

            // Touch swipe
            let touchStartX = 0;
            const hero = document.getElementById('hero');
            hero.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, {
                passive: true
            });
            hero.addEventListener('touchend', (e) => {
                const diff = touchStartX - e.changedTouches[0].clientX;
                if (Math.abs(diff) > 50) {
                    goTo(diff > 0 ? current + 1 : current - 1);
                    startAuto();
                }
            });

            // Boot
            resetProgress();
            startAuto();
        })();
    </script>

    <!-- ===== VIDEO PROMO UNIVERSITAS TERBUKA ===== -->
    <section class="py-16 bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="font-outfit text-3xl md:text-4xl font-extrabold text-slate-900">Mengenal <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Universitas
                        Terbuka</span></h2>
                <p class="text-slate-500 mt-3 max-w-2xl mx-auto text-sm">Tonton video berikut untuk memahami keunggulan
                    sistem belajar jarak jauh UT dan bagaimana SALUT Kota Bandung siap membantu Anda.</p>
            </div>

            <div class="relative group">
                <!-- Video Wrapper - Responsive 16:9 dengan border shadow elegan -->
                <div
                    class="relative w-full rounded-2xl overflow-hidden shadow-2xl bg-slate-900 aspect-video ring-1 ring-white/20">
                    <iframe class="absolute inset-0 w-full h-full"
                        src="https://www.youtube.com/embed/QkUPjVPt3sg?rel=0&modestbranding=1&controls=1&autoplay=0&color=white"
                        title="Video Profile Universitas Terbuka" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FEATURES ===== -->

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Mengapa SALUT Bandung?</span>
                <h2 class="font-outfit text-4xl font-extrabold text-slate-900 mt-2">Layanan Terbaik untuk Mahasiswa UT
                </h2>
                <p class="text-slate-500 mt-3 max-w-2xl mx-auto">Kami menyediakan layanan administrasi yang ramah,
                    profesional, dan terstruktur untuk mendukung perjalanan akademik Anda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $features = [
                        [
                            'icon' => '',
                            'title' => 'Pendaftaran Mudah',
                            'desc' =>
                                'Proses pendaftaran mahasiswa baru jalur RPL maupun Reguler dilayani secara langsung dan online dengan panduan lengkap dari tim kami.',
                            'color' => 'blue',
                        ],
                        [
                            'icon' => '',
                            'title' => 'Verifikasi Berkas',
                            'desc' =>
                                'Tim verifikator berpengalaman kami memastikan seluruh dokumen pendaftaran Anda lengkap, sah, dan sesuai persyaratan Universitas Terbuka.',
                            'color' => 'indigo',
                        ],
                        [
                            'icon' => '',
                            'title' => 'Kuliah Fleksibel',
                            'desc' =>
                                'Universitas Terbuka menerapkan sistem belajar jarak jauh yang fleksibel. Kuliah kapan saja dan di mana saja tanpa meninggalkan pekerjaan Anda.',
                            'color' => 'violet',
                        ],
                        [
                            'icon' => '',
                            'title' => 'Jalur RPL (Alih Kredit)',
                            'desc' =>
                                'Sudah punya pengalaman kerja atau gelar diploma? Manfaatkan jalur RPL untuk konversi pengalaman & ijazah Anda menjadi SKS di UT.',
                            'color' => 'amber',
                        ],
                        [
                            'icon' => '',
                            'title' => 'Bahan Ajar Lengkap',
                            'desc' =>
                                'Setiap mahasiswa mendapat modul cetak dan akses e-learning berkualitas tinggi yang disiapkan oleh para akademisi terbaik Indonesia.',
                            'color' => 'emerald',
                        ],
                        [
                            'icon' => '',
                            'title' => 'Pendampingan Penuh',
                            'desc' =>
                                'Dari pendaftaran hingga yudisium, tim SALUT Bandung siap mendampingi dan menjawab pertanyaan Anda di setiap tahap perjalanan studi.',
                            'color' => 'rose',
                        ],
                    ];
                @endphp
                @foreach ($features as $f)
                    <div class="card-hover bg-slate-50 border border-slate-100 rounded-2xl p-6">
                        <div class="text-4xl mb-4">{{ $f['icon'] }}</div>
                        <h3 class="font-outfit font-bold text-slate-800 text-lg mb-2">{{ $f['title'] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">{{ $f['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ===== TUITION FEES & PAYMENT CHANNELS ===== -->
    <section class="py-20 bg-white" id="biaya-pendidikan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Transparansi Biaya</span>
                <h2 class="font-outfit text-4xl font-extrabold text-slate-900 mt-2">Biaya Pendidikan & Pembayaran</h2>
                <p class="text-slate-500 mt-3 max-w-2xl mx-auto">Kami mengedepankan asas transparansi. Biaya kuliah di
                    Universitas Terbuka sangat terjangkau tanpa mengorbankan kualitas. Temukan rincian biaya sesuai
                    fakultas Anda beserta saluran pembayarannya di bawah ini.</p>
            </div>

            <!-- Main Tabs Container -->
            <div class="max-w-5xl mx-auto bg-slate-50 border border-slate-200 rounded-3xl overflow-hidden shadow-sm">

                <!-- Main Tab Nav -->
                <div class="flex overflow-x-auto no-scrollbar border-b border-slate-200 bg-white">
                    <button onclick="switchMainTab('biaya')" id="btn-tab-biaya"
                        class="flex-1 whitespace-nowrap px-6 py-4 text-center font-bold font-outfit text-blue-900 border-b-2 border-blue-950 bg-blue-50/50 transition duration-300">
                        Rincian Biaya Kuliah (SPP)
                    </button>
                    <button onclick="switchMainTab('pembayaran')" id="btn-tab-pembayaran"
                        class="flex-1 whitespace-nowrap px-6 py-4 text-center font-bold font-outfit text-slate-500 border-b-2 border-transparent hover:bg-slate-50 transition duration-300">
                        Saluran Pembayaran
                    </button>
                </div>

                <!-- Tab Content: Biaya Kuliah -->
                <div id="content-tab-biaya" class="p-6 md:p-10 transition-opacity duration-500">

                    <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
                        <h3 class="text-xl font-bold text-slate-800 font-outfit">Tarif Per Semester (Skema SIPAS
                            Non-TTM)</h3>
                        <div
                            class="bg-blue-50 text-blue-700 text-xs font-bold px-3 py-1.5 rounded-lg border border-blue-100 flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Berlaku TA 2025/2026
                        </div>
                    </div>

                    <!-- Sub Tab Nav (Fakultas) -->
                    <div class="flex overflow-x-auto space-x-2 mb-8 pb-2 no-scrollbar">
                        <button onclick="switchSubTab('feb')" id="btn-sub-feb"
                            class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-bold bg-blue-950 text-white shadow-md shadow-blue-900/30 transition">Ekonomi
                            (FEB)</button>
                        <button onclick="switchSubTab('fhisip')" id="btn-sub-fhisip"
                            class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-bold bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">Hukum
                            & Sosial (FHISIP)</button>
                        <button onclick="switchSubTab('fst')" id="btn-sub-fst"
                            class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-bold bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">Sains
                            & Teknologi (FST)</button>
                        <button onclick="switchSubTab('fkip')" id="btn-sub-fkip"
                            class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-bold bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">Keguruan
                            (FKIP)</button>
                        <button onclick="switchSubTab('diploma')" id="btn-sub-diploma"
                            class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-bold bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition">Diploma
                            (D3/D4)</button>
                    </div>

                    <!-- Sub Tab Contents -->
                    <!-- FEB -->
                    <div id="sub-feb" class="sub-tab-content animate-fade-in-up">
                        <div
                            class="overflow-x-auto bg-white border border-slate-200 rounded-xl shadow-sm no-scrollbar">
                            <table class="w-full text-left border-collapse min-w-max">
                                <thead>
                                    <tr class="bg-blue-50/50 text-blue-900 border-b border-slate-200 text-sm">
                                        <th class="p-4 font-bold">Program Studi</th>
                                        <th class="p-4 font-bold">SIPAS Non TTM</th>
                                        <th class="p-4 font-bold">SIPAS Semi</th>
                                        <th class="p-4 font-bold">SIPAS Penuh</th>
                                        <th class="p-4 font-bold">SIPAS Plus</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-slate-600 divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Manajemen</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Akuntansi</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Ekonomi Pembangunan</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Pariwisata</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.900.000</td>
                                        <td class="p-4">Rp 2.600.000</td>
                                        <td class="p-4">Rp 3.200.000</td>
                                        <td class="p-4">Rp 3.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Kewirausahaan</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 2.600.000</td>
                                        <td class="p-4">Rp 2.975.000</td>
                                        <td class="p-4">Rp 3.200.000</td>
                                        <td class="p-4">Rp 3.300.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- FHISIP -->
                    <div id="sub-fhisip" class="sub-tab-content hidden animate-fade-in-up">
                        <div
                            class="overflow-x-auto bg-white border border-slate-200 rounded-xl shadow-sm no-scrollbar">
                            <table class="w-full text-left border-collapse min-w-max">
                                <thead>
                                    <tr class="bg-blue-50/50 text-blue-900 border-b border-slate-200 text-sm">
                                        <th class="p-4 font-bold">Program Studi</th>
                                        <th class="p-4 font-bold">SIPAS Non TTM</th>
                                        <th class="p-4 font-bold">SIPAS Semi</th>
                                        <th class="p-4 font-bold">SIPAS Penuh</th>
                                        <th class="p-4 font-bold">SIPAS Plus</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-slate-600 divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Ilmu Hukum</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Ilmu Komunikasi</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Ilmu Administrasi (Negara/Bisnis)
                                        </td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Sastra Inggris / Sosiologi / Ilmu
                                            Pemerintahan</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Perpajakan</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.800.000</td>
                                        <td class="p-4">Rp 3.100.000</td>
                                        <td class="p-4">Rp 3.300.000</td>
                                        <td class="p-4">Rp 3.400.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- FST -->
                    <div id="sub-fst" class="sub-tab-content hidden animate-fade-in-up">
                        <div
                            class="overflow-x-auto bg-white border border-slate-200 rounded-xl shadow-sm no-scrollbar">
                            <table class="w-full text-left border-collapse min-w-max">
                                <thead>
                                    <tr class="bg-blue-50/50 text-blue-900 border-b border-slate-200 text-sm">
                                        <th class="p-4 font-bold">Program Studi</th>
                                        <th class="p-4 font-bold">SIPAS Non TTM</th>
                                        <th class="p-4 font-bold">SIPAS Semi</th>
                                        <th class="p-4 font-bold">SIPAS Penuh</th>
                                        <th class="p-4 font-bold">SIPAS Plus</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-slate-600 divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Sistem Informasi</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.800.000</td>
                                        <td class="p-4 text-center text-slate-400">-</td>
                                        <td class="p-4">Rp 3.000.000</td>
                                        <td class="p-4">Rp 3.200.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Sains Data</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.900.000</td>
                                        <td class="p-4 text-center text-slate-400">-</td>
                                        <td class="p-4">Rp 2.900.000</td>
                                        <td class="p-4">Rp 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Perencanaan Wilayah dan Kota</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.750.000</td>
                                        <td class="p-4 text-center text-slate-400">-</td>
                                        <td class="p-4">Rp 2.900.000</td>
                                        <td class="p-4">Rp 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Matematika / Statistika / Biologi /
                                            Agribisnis</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- FKIP -->
                    <div id="sub-fkip" class="sub-tab-content hidden animate-fade-in-up">
                        <div
                            class="overflow-x-auto bg-white border border-slate-200 rounded-xl shadow-sm no-scrollbar">
                            <table class="w-full text-left border-collapse min-w-max">
                                <thead>
                                    <tr class="bg-blue-50/50 text-blue-900 border-b border-slate-200 text-sm">
                                        <th class="p-4 font-bold">Program Studi</th>
                                        <th class="p-4 font-bold">SIPAS Non TTM</th>
                                        <th class="p-4 font-bold">SIPAS Semi</th>
                                        <th class="p-4 font-bold">SIPAS Penuh</th>
                                        <th class="p-4 font-bold">SIPAS Plus</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-slate-600 divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 PGSD (In-service)</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.600.000</td>
                                        <td class="p-4">Rp 1.700.000</td>
                                        <td class="p-4">Rp 2.600.000</td>
                                        <td class="p-4">Rp 2.700.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 PGSD (Pre-service)</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.900.000</td>
                                        <td class="p-4">Rp 2.000.000</td>
                                        <td class="p-4">Rp 2.900.000</td>
                                        <td class="p-4">Rp 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 PGPAUD (In-service)</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 2.000.000</td>
                                        <td class="p-4">Rp 2.500.000</td>
                                        <td class="p-4">Rp 2.800.000</td>
                                        <td class="p-4">Rp 2.900.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 PGPAUD (Pre-service)</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 2.400.000</td>
                                        <td class="p-4">Rp 2.900.000</td>
                                        <td class="p-4">Rp 3.100.000</td>
                                        <td class="p-4">Rp 3.200.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Pendidikan Agama Islam</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.500.000</td>
                                        <td class="p-4">Rp 2.800.000</td>
                                        <td class="p-4">Rp 2.900.000</td>
                                        <td class="p-4">Rp 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">S1 Pend. (B.Inggris, Mat, Biologi,
                                            dll)</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.300.000</td>
                                        <td class="p-4">Rp 1.750.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Diploma -->
                    <div id="sub-diploma" class="sub-tab-content hidden animate-fade-in-up">
                        <div
                            class="overflow-x-auto bg-white border border-slate-200 rounded-xl shadow-sm no-scrollbar">
                            <table class="w-full text-left border-collapse min-w-max">
                                <thead>
                                    <tr class="bg-blue-50/50 text-blue-900 border-b border-slate-200 text-sm">
                                        <th class="p-4 font-bold">Program Studi</th>
                                        <th class="p-4 font-bold">SIPAS Non TTM</th>
                                        <th class="p-4 font-bold">SIPAS Semi</th>
                                        <th class="p-4 font-bold">SIPAS Penuh</th>
                                        <th class="p-4 font-bold">SIPAS Plus</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-slate-600 divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">D-III Perpajakan</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.150.000</td>
                                        <td class="p-4">Rp 2.700.000</td>
                                        <td class="p-4">Rp 2.900.000</td>
                                        <td class="p-4">Rp 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-4 font-bold text-slate-800">D-IV Kearsipan</td>
                                        <td class="p-4 font-bold text-blue-700">Rp 1.150.000</td>
                                        <td class="p-4">Rp 1.600.000</td>
                                        <td class="p-4">Rp 2.200.000</td>
                                        <td class="p-4">Rp 2.400.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Disclaimer Info -->
                    <div
                        class="mt-8 bg-amber-50 border border-amber-200 rounded-xl p-4 flex items-start space-x-3 text-amber-800 text-sm">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p>
                            <strong>Catatan Penting:</strong> Biaya di atas merupakan Uang Kuliah Tunggal (SPP) per
                            semester. Belum termasuk Biaya Pendaftaran Mahasiswa Baru (mulai dari Rp 100.000) dan Jasa
                            Layanan Admisi SALUT Kota Bandung.
                        </p>
                    </div>
                </div>

                <!-- Tab Content: Saluran Pembayaran -->
                <div id="content-tab-pembayaran" class="p-6 md:p-10 hidden transition-opacity duration-500 bg-white">
                    <div class="text-center max-w-2xl mx-auto mb-10">
                        <h3 class="text-2xl font-bold text-slate-800 font-outfit mb-2">Tersedia Berbagai Metode
                            Pembayaran</h3>
                        <p class="text-slate-500 text-sm">Universitas Terbuka bekerjasama dengan banyak bank dan
                            institusi pembayaran terkemuka untuk memudahkan Anda melakukan pembayaran SPP secara
                            langsung maupun autodebet.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- Bank Transfer / VA -->
                        <div class="border border-slate-200 rounded-2xl p-6 bg-slate-50">
                            <div
                                class="w-12 h-12 bg-white rounded-xl shadow-sm border border-slate-100 flex items-center justify-center text-blue-600 mb-4">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-800 text-lg mb-2">Transfer Bank (VA)</h4>
                            <ul class="text-sm text-slate-600 space-y-2">
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Bank Mandiri (Livin,
                                    ATM, Teller)</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Bank BRI (BRImo,
                                    BRILink, ATM)</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Bank BNI (Mobile,
                                    Internet, Teller)</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Bank BTN & BSI
                                    (Syariah)</li>
                            </ul>
                        </div>

                        <!-- Retail / Minimarket -->
                        <div class="border border-slate-200 rounded-2xl p-6 bg-slate-50">
                            <div
                                class="w-12 h-12 bg-white rounded-xl shadow-sm border border-slate-100 flex items-center justify-center text-orange-500 mb-4">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-800 text-lg mb-2">Gerai Retail / Tunai</h4>
                            <ul class="text-sm text-slate-600 space-y-2">
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Indomaret (Kasir)</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Alfamart & Alfamidi
                                </li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Lawson & Dandan</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Kantor Pos Indonesia
                                    (PosPay)</li>
                            </ul>
                        </div>

                        <!-- Digital Payments -->
                        <div class="border border-slate-200 rounded-2xl p-6 bg-slate-50">
                            <div
                                class="w-12 h-12 bg-white rounded-xl shadow-sm border border-slate-100 flex items-center justify-center text-purple-600 mb-4">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-800 text-lg mb-2">QRIS & Dompet Digital</h4>
                            <ul class="text-sm text-slate-600 space-y-2">
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>QRIS via MyUT (Semua
                                    Bank/E-Wallet)</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>OVO & DANA</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Tokopedia & Shopee
                                    (E-commerce)</li>
                                <li class="flex items-center"><span
                                        class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>Kredivo (Cicilan)</li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SCRIPT FOR TUITION TABS -->
    <script>
        function switchMainTab(tab) {
            const btnBiaya = document.getElementById('btn-tab-biaya');
            const btnPembayaran = document.getElementById('btn-tab-pembayaran');
            const contentBiaya = document.getElementById('content-tab-biaya');
            const contentPembayaran = document.getElementById('content-tab-pembayaran');

            if (tab === 'biaya') {
                btnBiaya.className =
                    "flex-1 whitespace-nowrap px-6 py-4 text-center font-bold font-outfit text-blue-900 border-b-2 border-blue-950 bg-blue-50/50 transition duration-300";
                btnPembayaran.className =
                    "flex-1 whitespace-nowrap px-6 py-4 text-center font-bold font-outfit text-slate-500 border-b-2 border-transparent hover:bg-slate-50 transition duration-300";

                contentPembayaran.classList.add('hidden');
                contentBiaya.classList.remove('hidden');

                // Re-trigger animation
                contentBiaya.classList.remove('opacity-100');
                contentBiaya.classList.add('opacity-0');
                setTimeout(() => {
                    contentBiaya.classList.remove('opacity-0');
                    contentBiaya.classList.add('opacity-100');
                }, 50);
            } else {
                btnPembayaran.className =
                    "flex-1 whitespace-nowrap px-6 py-4 text-center font-bold font-outfit text-blue-900 border-b-2 border-blue-950 bg-blue-50/50 transition duration-300";
                btnBiaya.className =
                    "flex-1 whitespace-nowrap px-6 py-4 text-center font-bold font-outfit text-slate-500 border-b-2 border-transparent hover:bg-slate-50 transition duration-300";

                contentBiaya.classList.add('hidden');
                contentPembayaran.classList.remove('hidden');

                contentPembayaran.classList.remove('opacity-100');
                contentPembayaran.classList.add('opacity-0');
                setTimeout(() => {
                    contentPembayaran.classList.remove('opacity-0');
                    contentPembayaran.classList.add('opacity-100');
                }, 50);
            }
        }

        function switchSubTab(sub) {
            // Reset all sub buttons
            const subs = ['feb', 'fhisip', 'fst', 'fkip', 'diploma'];
            subs.forEach(s => {
                const btn = document.getElementById('btn-sub-' + s);
                const content = document.getElementById('sub-' + s);
                if (s === sub) {
                    btn.className =
                        "whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-bold bg-blue-950 text-white shadow-md shadow-blue-900/30 transition";
                    content.classList.remove('hidden');
                } else {
                    btn.className =
                        "whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-bold bg-white text-slate-600 border border-slate-200 hover:bg-slate-50 transition";
                    content.classList.add('hidden');
                }
            });
        }
    </script>

    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.4s ease-out forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <!-- ===== REGISTRATION PATHS ===== -->
    <section class="py-20 bg-slate-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Pilih Jalur Pendaftaran</span>
                <h2 class="font-outfit text-4xl font-extrabold text-slate-900 mt-2">Dua Jalur, Satu Tujuan</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-gradient-to-br from-blue-900 to-indigo-900 text-white rounded-3xl p-8 shadow-xl">
                    <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center text-3xl mb-6">
                    </div>
                    <h3 class="font-outfit text-2xl font-bold mb-3">Jalur Reguler (Non-RPL)</h3>
                    <p class="text-blue-200/80 text-sm leading-relaxed mb-6">Untuk lulusan SMA/SMK/MA/Paket C sederajat
                        yang ingin memulai kuliah dari semester 1 dengan biaya terjangkau.</p>
                    <ul class="space-y-2 text-sm text-blue-200 mb-8">
                        <li class="flex items-center space-x-2"><span class="text-emerald-400">✓</span><span>Biaya
                                pendaftaran mulai dari Rp 100.000</span></li>
                        <li class="flex items-center space-x-2"><span class="text-emerald-400">✓</span><span>Tidak
                                perlu pengalaman kerja</span></li>
                        <li class="flex items-center space-x-2"><span class="text-emerald-400">✓</span><span>34+
                                pilihan program studi</span></li>
                    </ul>
                    @auth
                        <a href="{{ route('pendaftaran') }}"
                            class="inline-flex items-center space-x-2 bg-white text-blue-900 font-bold px-6 py-3 rounded-xl hover:bg-blue-50 transition text-sm">
                            <span>Lanjutkan Pendaftaran Reguler</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('user.login') }}"
                            class="inline-flex items-center space-x-2 bg-white text-blue-900 font-bold px-6 py-3 rounded-xl hover:bg-blue-50 transition text-sm">
                            <span>Daftar Reguler</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    @endauth
                </div>

                <div class="bg-gradient-to-br from-amber-600 to-orange-700 text-white rounded-3xl p-8 shadow-xl">
                    <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center text-3xl mb-6">⭐
                    </div>
                    <h3 class="font-outfit text-2xl font-bold mb-3">Jalur RPL (Alih Kredit)</h3>
                    <p class="text-amber-100/80 text-sm leading-relaxed mb-6">Untuk lulusan D1/D2/D3/S1 atau yang
                        memiliki pengalaman kerja yang ingin dikonversi menjadi SKS perkuliahan.</p>
                    <ul class="space-y-2 text-sm text-amber-100 mb-8">
                        <li class="flex items-center space-x-2"><span class="text-emerald-300">✓</span><span>Biaya
                                pendaftaran mulai dari Rp. 400.000</span></li>
                        <li class="flex items-center space-x-2"><span class="text-emerald-300">✓</span><span>Lulus
                                lebih cepat dengan konversi SKS</span></li>
                        <li class="flex items-center space-x-2"><span class="text-emerald-300">✓</span><span>Cocok
                                untuk profesional aktif</span></li>
                    </ul>
                    @auth
                        <a href="{{ route('pendaftaran') }}"
                            class="inline-flex items-center space-x-2 bg-white text-amber-800 font-bold px-6 py-3 rounded-xl hover:bg-amber-50 transition text-sm">
                            <span>Lanjutkan Pendaftaran RPL</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('user.login') }}"
                            class="inline-flex items-center space-x-2 bg-white text-amber-800 font-bold px-6 py-3 rounded-xl hover:bg-amber-50 transition text-sm">
                            <span>Daftar RPL</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- ===== INFO GALLERY CAROUSEL SECTION ===== -->
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>

    <section class="relative py-12 md:py-20 bg-slate-900 overflow-hidden" id="info-gallery">
        <!-- Background Image (salut-1) -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/salut-1.png') }}" alt="Background Fasilitas"
                class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/80 to-slate-900/90"></div>
        </div>

        <div class="relative z-10 w-full">
            <div class="text-center mb-8 px-4 sm:px-6 lg:px-8">
                <span class="text-emerald-400 font-bold text-[10px] md:text-xs uppercase tracking-widest">Informasi
                    Penting & Fasilitas</span>
                <h2 class="font-outfit text-2xl md:text-3xl font-extrabold text-white mt-1 md:mt-2">Pusat Informasi
                    SALUT Bandung</h2>
                <p class="text-blue-200/80 mt-2 max-w-2xl mx-auto text-xs md:text-sm leading-relaxed">Geser, sentuh,
                    dan klik gambar di bawah ini untuk melihat detail informasi penting mengenai layanan dan pendaftaran
                    Universitas Terbuka.</p>
            </div>

            <!-- Marquee Wrapper -->
            <div class="relative w-full max-w-full overflow-hidden mt-6 md:mt-10">
                <!-- Fade Edges -->
                <div
                    class="absolute inset-y-0 left-0 w-12 md:w-32 bg-gradient-to-r from-slate-900 to-transparent z-20 pointer-events-none">
                </div>
                <div
                    class="absolute inset-y-0 right-0 w-12 md:w-32 bg-gradient-to-l from-slate-900 to-transparent z-20 pointer-events-none">
                </div>

                <!-- Scrolling Container (overflow-x-auto, no-scrollbar) -->
                <div id="marquee-wrapper"
                    class="flex overflow-x-auto no-scrollbar cursor-grab active:cursor-grabbing w-full pb-8 pt-4">
                    <!-- Inner Track containing multiple sets of images -->
                    <div id="marquee-track" class="flex gap-4 md:gap-8 px-4 md:px-8 w-max items-center">

                        <!-- SET 1 -->
                        @for ($i = 2; $i <= 8; $i++)
                            <div class="w-[200px] md:w-[260px] lg:w-[320px] flex-shrink-0"
                                onclick="openInfoModal('{{ asset('images/salut-' . $i . '.png') }}')">
                                <img src="{{ asset('images/salut-' . $i . '.png') }}"
                                    alt="Informasi SALUT {{ $i }}"
                                    class="w-full h-auto object-contain rounded-2xl drop-shadow-2xl hover:scale-105 transition-transform duration-300">
                            </div>
                        @endfor

                        <!-- SET 2 -->
                        @for ($i = 2; $i <= 8; $i++)
                            <div class="w-[200px] md:w-[260px] lg:w-[320px] flex-shrink-0"
                                onclick="openInfoModal('{{ asset('images/salut-' . $i . '.png') }}')">
                                <img src="{{ asset('images/salut-' . $i . '.png') }}"
                                    alt="Informasi SALUT {{ $i }}"
                                    class="w-full h-auto object-contain rounded-2xl drop-shadow-2xl hover:scale-105 transition-transform duration-300">
                            </div>
                        @endfor

                        <!-- SET 3 -->
                        @for ($i = 2; $i <= 8; $i++)
                            <div class="w-[200px] md:w-[260px] lg:w-[320px] flex-shrink-0"
                                onclick="openInfoModal('{{ asset('images/salut-' . $i . '.png') }}')">
                                <img src="{{ asset('images/salut-' . $i . '.png') }}"
                                    alt="Informasi SALUT {{ $i }}"
                                    class="w-full h-auto object-contain rounded-2xl drop-shadow-2xl hover:scale-105 transition-transform duration-300">
                            </div>
                        @endfor

                    </div>
                </div>

                <!-- Interaction Hint -->
                <div
                    class="absolute bottom-2 left-1/2 -translate-x-1/2 flex items-center space-x-1.5 text-white/50 text-[10px] md:text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span>Geser untuk menjelajah</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div id="image-modal"
        class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/95 backdrop-blur-md opacity-0 transition-opacity duration-300">
        <button onclick="closeInfoModal()"
            class="absolute top-4 right-4 md:top-8 md:right-8 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors z-[110] border border-white/10 shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="relative w-full h-full p-4 md:p-12 flex items-center justify-center">
            <img id="image-modal-content" src="" alt="Zoomed Info"
                class="max-w-full max-h-full object-contain rounded-xl shadow-2xl scale-95 transition-transform duration-300">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('marquee-wrapper');
            let isDown = false;
            let startX;
            let scrollLeft;
            let animationId;
            let speed = 1; // Kecepatan scroll perlahan

            // Auto-scroll logic
            function playMarquee() {
                if (isDown) return; // Berhenti scroll jika user sedang menggeser

                // Lebar 1 set penuh (karena kita punya 3 set)
                const setWidth = wrapper.scrollWidth / 3;

                // Loop mulus: jika melewati 1 set, kembalikan posisi ke awal secara instan
                if (wrapper.scrollLeft >= setWidth) {
                    wrapper.scrollLeft -= setWidth;
                } else {
                    wrapper.scrollLeft += speed;
                }
                animationId = requestAnimationFrame(playMarquee);
            }

            // Mouse dragging (PC)
            wrapper.addEventListener('mouseenter', () => {
                cancelAnimationFrame(animationId);
            });

            wrapper.addEventListener('mouseleave', () => {
                isDown = false;
                playMarquee();
            });

            wrapper.addEventListener('mousedown', (e) => {
                isDown = true;
                cancelAnimationFrame(animationId);
                startX = e.pageX - wrapper.offsetLeft;
                scrollLeft = wrapper.scrollLeft;
            });

            wrapper.addEventListener('mouseup', () => {
                isDown = false;
                playMarquee();
            });

            wrapper.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - wrapper.offsetLeft;
                const walk = (x - startX) * 1.5;
                wrapper.scrollLeft = scrollLeft - walk;
            });

            // Touch swiping (HP)
            wrapper.addEventListener('touchstart', () => {
                isDown = true;
                cancelAnimationFrame(animationId);
            }, {
                passive: true
            });

            wrapper.addEventListener('touchend', () => {
                isDown = false;
                playMarquee();
            });

            // Pastikan loop tidak putus jika user menggeser dengan cepat secara manual
            wrapper.addEventListener('scroll', () => {
                if (!isDown) return; // Hanya jalankan saat digeser manual
                const setWidth = wrapper.scrollWidth / 3;
                if (wrapper.scrollLeft >= setWidth * 2) {
                    wrapper.scrollLeft -= setWidth;
                } else if (wrapper.scrollLeft <= 0) {
                    wrapper.scrollLeft += setWidth;
                }
            });

            // Mulai animasi
            playMarquee();

            // Modal Logic
            const modal = document.getElementById('image-modal');
            const modalImg = document.getElementById('image-modal-content');

            window.openInfoModal = function(src) {
                modalImg.src = src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalImg.classList.remove('scale-95');
                }, 10);
                cancelAnimationFrame(animationId);
            };

            window.closeInfoModal = function() {
                modal.classList.add('opacity-0');
                modalImg.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    modalImg.src = '';
                }, 300);
                playMarquee();
            };

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeInfoModal();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeInfoModal();
                }
            });
        });
    </script>

    <!-- ===== CTA ===== -->
    <section class="py-20 bg-gradient-to-r from-blue-800 to-indigo-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-grid opacity-40"></div>
        <div class="max-w-3xl mx-auto px-4 text-center relative z-10">
            <h2 class="font-outfit text-4xl font-extrabold mb-4">Siap Mulai Perjalanan Akademik Anda?</h2>
            <p class="text-blue-200 mb-8 text-lg">Ratusan mahasiswa telah mempercayakan pendaftaran UT mereka kepada
                SALUT Kota Bandung. Giliran Anda!</p>
            @auth
                <a href="{{ route('pendaftaran') }}"
                    class="inline-flex items-center space-x-3 bg-white text-blue-900 font-extrabold px-8 py-4 rounded-2xl hover:bg-blue-50 transition shadow-xl text-base">
                    <span>Lanjutkan Pendaftaran</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            @else
                <a href="{{ route('user.login') }}"
                    class="inline-flex items-center space-x-3 bg-white text-blue-900 font-extrabold px-8 py-4 rounded-2xl hover:bg-blue-50 transition shadow-xl text-base">
                    <span>Mulai Pendaftaran Gratis</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            @endauth
        </div>
    </section>

    <!-- ===== MAP SECTION ===== -->
    <section class="py-16 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">

                <!-- Address details -->
                <div class="lg:col-span-1 space-y-6">
                    <div>
                        <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Kunjungi Kantor
                            Kami</span>
                        <h2 class="font-outfit text-3xl font-extrabold text-slate-900 mt-2">Lokasi SALUT Kota Bandung
                        </h2>
                        <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                            Kami siap melayani kebutuhan informasi, konsultasi, pendaftaran, dan administrasi
                            perkuliahan Universitas Terbuka Anda secara langsung.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-outfit font-bold text-slate-800 text-sm">Alamat Utama</h4>
                                <p class="text-slate-500 text-xs mt-1">Jl. Pungkur No. 151, Balonggede, Kec. Regol,
                                    Kota Bandung, Jawa Barat 40251</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-outfit font-bold text-slate-800 text-sm">Jam Operasional</h4>
                                <p class="text-slate-500 text-xs mt-1">Senin - Jumat: 08.00 - 16.00 WIB<br>Sabtu: 08.00
                                    - 12.00 WIB<br>Minggu / Hari Libur: Tutup</p>
                            </div>
                        </div>
                    </div>

                    <a href="https://maps.app.goo.gl/j9QiPgaxH9CkGnjDA" target="_blank"
                        class="inline-flex items-center space-x-2 bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold px-6 py-3.5 rounded-xl transition text-sm shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span>Petunjuk Arah (Google Maps)</span>
                    </a>
                </div>

                <!-- Map iframe -->
                <div class="lg:col-span-2">
                    <div
                        class="relative w-full h-[350px] rounded-3xl overflow-hidden shadow-lg border border-slate-100 bg-slate-50">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.771239108151!2d107.6074211!3d-6.9298516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6308cf2c423%3A0xc4eb7fb277d3320c!2sSALUT%20Mitra%20Priangan!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                            class="absolute inset-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <x-footer />
</body>

</html>
