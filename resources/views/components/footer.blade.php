<!-- ===== FOOTER ===== -->
<footer class="bg-slate-900 text-slate-400 py-14 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-10">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ asset('images/icon-web.png') }}" alt="Logo" class="h-10 opacity-80">
                    <span class="font-outfit font-extrabold text-white text-lg">SALUT KOTA BANDUNG</span>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Sentra Layanan Universitas Terbuka (SALUT) Kota Bandung, melayani administrasi dan pendaftaran mahasiswa UT wilayah Bandung.</p>
            </div>
            <div>
                <h4 class="font-outfit font-bold text-white text-sm uppercase tracking-wider mb-4">Navigasi</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="/program-studi" class="hover:text-white transition">Program Studi</a></li>
                    <li><a href="/kurikulum-ut" class="hover:text-white transition">Kurikulum UT</a></li>
                    <li><a href="/pendaftaran" class="hover:text-white transition text-blue-400 font-semibold">Daftar Mahasiswa</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-outfit font-bold text-white text-sm uppercase tracking-wider mb-4">Hubungi Kami</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Jl. Pungkur No. 151, Bandung Kota, 40251<br><br>WhatsApp: +62 819-3133-7070<br>Email: salutbandung.info@gmail.com</p>
            </div>
        </div>
        <div class="border-t border-slate-800 pt-6 text-center text-xs text-slate-600">
            &copy; 2026 SALUT Kota Bandung &middot; Universitas Terbuka. Hak cipta dilindungi.
        </div>
    </div>
</footer>

<!-- ===== FLOATING WHATSAPP BUTTON ===== -->
<a href="https://wa.me/6281931337070" target="_blank" rel="noopener noreferrer" 
   class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full shadow-2xl transition duration-300 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-emerald-300 group">
    <!-- Pulse animation ring -->
    <span class="absolute inset-0 rounded-full bg-emerald-500/35 animate-ping opacity-75"></span>
    <!-- Tooltip -->
    <span class="absolute right-16 bg-slate-900 text-white text-xs font-semibold px-3 py-1.5 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300 whitespace-nowrap shadow-md pointer-events-none">
        Hubungi Kami via WhatsApp
    </span>
    <!-- WhatsApp Icon SVG -->
    <svg class="w-7 h-7 relative z-10" fill="currentColor" viewBox="0 0 24 24">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.734-1.456L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.625 1.45 5.409 0 9.809-4.394 9.813-9.793.002-2.618-1.017-5.08-2.871-6.938C16.36 2.016 13.884 1 12.007 1 6.602 1 2.203 5.391 2.199 10.792c-.001 1.564.417 3.09 1.21 4.453l-.944 3.446 3.535-.927zM17.422 14.3c-.295-.149-1.75-.863-2.021-.962-.27-.099-.468-.149-.665.149-.197.297-.764.962-.937 1.16-.172.198-.344.223-.64.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.15-.173.197-.297.296-.495.099-.198.05-.371-.025-.521-.075-.148-.665-1.606-.912-2.2-.24-.578-.485-.5-.665-.51l-.568-.009c-.197 0-.518.074-.789.371-.271.297-1.035 1.014-1.035 2.473 0 1.459 1.06 2.868 1.208 3.066.149.198 2.086 3.186 5.055 4.47.706.305 1.257.488 1.687.625.71.226 1.356.194 1.867.118.57-.085 1.75-.715 1.996-1.405.247-.69.247-1.282.172-1.405-.074-.124-.271-.198-.567-.347z"/>
    </svg>
</a>
