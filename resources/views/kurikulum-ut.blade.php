<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurikulum Baru UT - SALUT Kota Bandung</title>
    <meta name="description" content="Informasi lengkap kurikulum baru Universitas Terbuka, sistem kesetaraan mata kuliah, dasar hukum, dan skema Tugas Akhir Program (TAPS).">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .accordion-content { transition: max-height 0.3s cubic-bezier(0, 1, 0, 1); }
        .accordion-content.open { max-height: 1000px; transition: max-height 0.5s ease-in-out; }
    </style>
</head>
<body class="bg-slate-50 antialiased">

<x-navbar />

<!-- ===== PAGE HERO ===== -->
<section class="bg-gradient-to-br from-slate-900 to-blue-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle,_#fff_1px,_transparent_1px)] [background-size:24px_24px]"></div>
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <span class="inline-block bg-blue-700/40 border border-blue-500/30 text-blue-200 text-xs font-bold px-4 py-2 rounded-full mb-4 uppercase tracking-widest">Sistem Akademik Baru</span>
        <h1 class="font-outfit text-4xl md:text-5xl font-extrabold mb-4">Struktur Kurikulum Baru UT</h1>
        <p class="text-blue-200/80 text-lg max-w-2xl mx-auto leading-relaxed">Perubahan kurikulum Universitas Terbuka bertujuan meningkatkan efisiensi belajar, relevansi profesi, dan memfasilitasi program Kampus Merdeka secara fleksibel.</p>
    </div>
</section>

<!-- ===== MAIN CONTENT ===== -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Core Info Accordion -->
        <div class="lg:col-span-2 space-y-6">
            <h2 class="font-outfit text-2xl font-bold text-slate-800 mb-2">Penjelasan Kebijakan Kurikulum Baru</h2>
            
            <!-- Accordion Item 1 -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm">
                <button class="accordion-toggle w-full flex items-center justify-between text-left focus:outline-none" data-target="acc-1">
                    <span class="font-outfit font-bold text-slate-800 text-lg">Mengapa Kurikulum Baru Diterapkan?</span>
                    <span class="acc-icon text-blue-600 font-bold transition-transform duration-300">▼</span>
                </button>
                <div id="acc-1" class="accordion-content overflow-hidden max-h-0">
                    <div class="pt-4 text-slate-600 text-sm leading-relaxed space-y-3 border-t border-slate-50 mt-4">
                        <p>Perubahan Kurikulum di Universitas Terbuka (UT) didasari oleh beberapa faktor perkembangan eksternal dan kebutuhan adaptasi akademik:</p>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><strong>Perkembangan Teknologi:</strong> Menyesuaikan proses transfer ilmu dengan infrastruktur digital modern.</li>
                            <li><strong>Dinamika Masyarakat:</strong> Merespon kebutuhan kompetensi industri yang dinamis dan berorientasi pada solusi praktis.</li>
                            <li><strong>Perkembangan Ilmu Pengetahuan:</strong> Pemutakhiran materi ajar agar senantiasa relevan dengan literatur ilmiah teraktual.</li>
                            <li><strong>Tantangan Global:</strong> Mempersiapkan profil lulusan dengan keahlian berstandar internasional yang kompetitif.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 2 -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm">
                <button class="accordion-toggle w-full flex items-center justify-between text-left focus:outline-none" data-target="acc-2">
                    <span class="font-outfit font-bold text-slate-800 text-lg">Dasar Hukum Kurikulum Baru</span>
                    <span class="acc-icon text-blue-600 font-bold transition-transform duration-300">▼</span>
                </button>
                <div id="acc-2" class="accordion-content overflow-hidden max-h-0">
                    <div class="pt-4 text-slate-600 text-sm leading-relaxed space-y-3 border-t border-slate-50 mt-4">
                        <p>Penyusunan dan implementasi kurikulum baru mengacu pada regulasi dan asosiasi penjaminan mutu pendidikan resmi:</p>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><strong>Permendikbudristek No. 53/2023:</strong> Tentang Sistem Penjaminan Mutu Pendidikan Tinggi (SPM Dikti).</li>
                            <li><strong>KKNI Perpres No. 8/2012:</strong> Kerangka Kualifikasi Nasional Indonesia sebagai standar penyusunan capaian pembelajaran lulusan.</li>
                            <li><strong>Asosiasi Profesi:</strong> Kolaborasi dengan berbagai asosiasi program studi sejenis di Indonesia.</li>
                            <li><strong>Standar Internasional Open University:</strong> Terakreditasi dan diakui oleh AAOU (Asian Association of Open Universities) serta ICDE (International Council for Open and Distance Education).</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 3 -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm">
                <button class="accordion-toggle w-full flex items-center justify-between text-left focus:outline-none" data-target="acc-3">
                    <span class="font-outfit font-bold text-slate-800 text-lg">Kesetaraan & Dampak Mahasiswa Ongoing</span>
                    <span class="acc-icon text-blue-600 font-bold transition-transform duration-300">▼</span>
                </button>
                <div id="acc-3" class="accordion-content overflow-hidden max-h-0">
                    <div class="pt-4 text-slate-600 text-sm leading-relaxed space-y-3 border-t border-slate-50 mt-4">
                        <p>Untuk mahasiswa aktif (ongoing), perubahan kurikulum didesain agar tidak merugikan masa studi:</p>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><strong>Kesetaraan Mata Kuliah:</strong> Mata kuliah yang telah ditempuh dan dinyatakan lulus pada kurikulum lama namun ditiadakan di kurikulum baru, akan otomatis disetarakan ke mata kuliah pengganti yang relevan.</li>
                            <li><strong>Pertimbangan Akademik:</strong> Penyesuaian dilakukan secara sistematis tanpa mengurangi akumulasi SKS yang telah diperoleh sebelumnya.</li>
                            <li><strong>Mata Kuliah Pengganti Paket:</strong> Apabila terdapat perpindahan paket semester, mahasiswa akan diberikan alternatif MK pengganti yang setara bobot SKS-nya.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Interactive Tables Tab Section -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm mt-8">
                <h3 class="font-outfit font-bold text-slate-800 text-xl mb-4">Informasi Perubahan Teknis</h3>
                
                <div class="flex border-b border-slate-100 mb-6">
                    <button class="tab-btn pb-3 text-sm font-semibold border-b-2 border-blue-700 text-blue-700 mr-6 focus:outline-none" data-tab="tab-kode">Perubahan Kode MK</button>
                    <button class="tab-btn pb-3 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-slate-800 focus:outline-none" data-tab="tab-taps">Skema Baru TAPS</button>
                </div>

                <!-- Tab: Perubahan Kode MK -->
                <div id="tab-kode" class="tab-panel space-y-4">
                    <p class="text-xs text-slate-500">Berikut adalah contoh penyesuaian kode mata kuliah dari Kurikulum Lama (Kurla) ke Kurikulum Baru (Kurba) pada fakultas Sains & Teknologi:</p>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-100 text-slate-600 font-semibold">
                                    <th class="py-3 px-4">Program Studi</th>
                                    <th class="py-3 px-4">Perubahan Skema Kode</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Agribisnis</td>
                                    <td class="py-3.5 px-4 text-blue-600">LUHTxxxx ➔ STAGxxxx</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Biologi</td>
                                    <td class="py-3.5 px-4 text-blue-600">BIOLxxxx ➔ STBIxxxx</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Sistem Informasi</td>
                                    <td class="py-3.5 px-4 text-blue-600">MSIMxxxx ➔ STSIxxxx</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Statistika</td>
                                    <td class="py-3.5 px-4 text-blue-600">SATSxxxx ➔ STIKxxxx</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Teknologi Pangan</td>
                                    <td class="py-3.5 px-4 text-blue-600">PANGxxxx ➔ STTPxxxx</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Sains Data</td>
                                    <td class="py-3.5 px-4 text-blue-600">Kode Baru: STDAxxxx</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Skema Baru TAPS -->
                <div id="tab-taps" class="tab-panel hidden space-y-4">
                    <p class="text-xs text-slate-500">Skema Tugas Akhir Program Sarjana (TAPS) kini menawarkan pilihan pengerjaan yang lebih variatif demi mendukung keahlian praktis mahasiswa:</p>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-100 text-slate-600 font-semibold">
                                    <th class="py-3 px-4">Program Studi</th>
                                    <th class="py-3 px-4">Pilihan Metode Tugas Akhir</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Ekonomi Pembangunan</td>
                                    <td class="py-3.5 px-4">Ujian Komprehensif Tertulis (UKT), Artikel Ilmiah, atau Proyek</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Pariwisata</td>
                                    <td class="py-3.5 px-4">Proyek Lapangan atau Skripsi Penelitian</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium">Akuntansi Sektor Publik</td>
                                    <td class="py-3.5 px-4">Artikel Ilmiah atau Proyek Terapan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-slate-400 italic">Catatan: Mahasiswa dapat berdiskusi dengan koordinator SALUT Kota Bandung untuk menentukan metode TAPS yang paling sesuai dengan profil pekerjaan/kesibukan masing-masing.</p>
                </div>
            </div>
        </div>

        <!-- Right Column: Layanan Paket Kuliah -->
        <div class="space-y-6">
            <div class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white rounded-2xl p-6 shadow-md">
                <h3 class="font-outfit font-bold text-lg mb-4">Sistem Paket vs Non-Paket</h3>
                
                <div class="space-y-4">
                    <div class="border-b border-white/10 pb-4">
                        <span class="inline-block bg-blue-700 text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider mb-2">SIPAS (Sistem Paket)</span>
                        <p class="text-xs text-blue-200/90 leading-relaxed">Paket mata kuliah terstruktur setiap semester. Memudahkan registrasi otomatis dan perencanaan kelulusan tepat waktu (4 tahun).</p>
                    </div>
                    <div>
                        <span class="inline-block bg-amber-600 text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider mb-2">Non-SIPAS</span>
                        <p class="text-xs text-amber-200/90 leading-relaxed">Mahasiswa bebas memilih jumlah dan jenis mata kuliah yang ingin diambil setiap semester sesuai kemampuan finansial dan waktu (maksimal 24 SKS).</p>
                    </div>
                </div>
            </div>

            <!-- Contact Box Info -->
            <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm">
                <h4 class="font-outfit font-bold text-slate-800 text-base mb-2">Butuh Bantuan Konsultasi?</h4>
                <p class="text-xs text-slate-500 leading-relaxed mb-4">Staf akademik di SALUT Kota Bandung siap membantu Anda melakukan penyesuaian kode mata kuliah atau pendaftaran mahasiswa baru.</p>
                <a href="https://hallo-ut.ut.ac.id/" target="_blank" class="block text-center text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 rounded-xl transition">Hubungi Helpdesk UT</a>
            </div>
        </div>
    </div>
</main>

<!-- ===== CTA ===== -->
<section class="py-16 bg-gradient-to-r from-blue-800 to-indigo-900 text-white">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="font-outfit text-3xl font-extrabold mb-3">Siap Bergabung dengan Universitas Terbuka?</h2>
        <p class="text-blue-200 mb-7 text-base">Daftarkan diri Anda hari ini melalui sistem pendaftaran online SALUT Kota Bandung yang praktis.</p>
        <a href="/pendaftaran" class="inline-flex items-center space-x-2 bg-white text-blue-900 font-extrabold px-8 py-4 rounded-2xl hover:bg-blue-50 transition shadow-xl text-base">
            <span>Mulai Pendaftaran Online</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>
</section>

<x-footer />

<script>
    // Accordion Logic
    document.querySelectorAll('.accordion-toggle').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const content = document.getElementById(targetId);
            const icon = this.querySelector('.acc-icon');
            
            if (content.classList.contains('open')) {
                content.classList.remove('open');
                content.style.maxHeight = '0px';
                icon.style.transform = 'rotate(0deg)';
            } else {
                // Close others
                document.querySelectorAll('.accordion-content').forEach(c => {
                    c.classList.remove('open');
                    c.style.maxHeight = '0px';
                });
                document.querySelectorAll('.acc-icon').forEach(i => {
                    i.style.transform = 'rotate(0deg)';
                });
                
                content.classList.add('open');
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });

    // Tab Logic
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.dataset.tab;
            
            // Set active button style
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('border-blue-700', 'text-blue-700');
                b.classList.add('border-transparent', 'text-slate-500');
            });
            this.classList.add('border-blue-700', 'text-blue-700');
            this.classList.remove('border-transparent', 'text-slate-500');
            
            // Toggle Tab Panel
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.add('hidden');
            });
            document.getElementById(targetTab).classList.remove('hidden');
        });
    });

    // Boot first accordion
    setTimeout(() => {
        const firstBtn = document.querySelector('.accordion-toggle');
        if (firstBtn) firstBtn.click();
    }, 100);
</script>
</body>
</html>
