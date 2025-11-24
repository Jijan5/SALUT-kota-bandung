<x-admin-layout>
    <x-slot name="title">
        Data Siswa Diterima
    </x-slot>
    <div x-data="{ showConfirmModal: false, pendaftarToDeleteName: '', pendaftarToDeleteUrl: '' }" class="container mx-auto px-6 py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-cloak>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Data Siswa Diterima</h2>
                <form action="{{ route('admin.diterima') }}" method="GET" class="w-full max-w-md">
                    <input type="text" name="search"
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Cari nama atau email..." value="{{ request('search') }}">
                </form>
            </div>

            <!-- Data Table -->
            <div class="overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No. Hp</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jalur Program
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Lokasi Ujian Provinsi
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Lokasi Ujian Kab/Kota
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal
                                Diterima</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($datapendaftar as $index => $pendaftar)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $datapendaftar->firstItem() + $index }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->no_hp }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->jalur_program }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->lokasi_ujian_provinsi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->lokasi_ujian_kab_kota }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $pendaftar->updated_at->format('d F Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Diterima
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button
                                        @click.prevent="
                                        showConfirmModal = true;
                                        pendaftarToDeleteName = '{{ addslashes($pendaftar->nama) }}';
                                        pendaftarToDeleteUrl = '{{ route('admin.delete', $pendaftar->id) }}';
                                    "
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow">
                                        🗑️ Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">Tidak ada data siswa yang diterima.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $datapendaftar->appends(request()->only('search'))->links('pagination::tailwind') }}
            </div>
        </div>
        <!-- Confirmation Modal -->
        <div x-show="showConfirmModal" x-cloak
            class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center z-50"
            @keydown.escape.window="showConfirmModal = false">
            <div @click.away="showConfirmModal = false"
                class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md mx-auto">
                <h2 class="text-xl font-bold mb-4">Konfirmasi Hapus</h2>
                <p class="mb-6">Yakin ingin menghapus data <strong x-text="pendaftarToDeleteName"></strong>?</p>
                <div class="flex justify-end space-x-4">
                    <button @click="showConfirmModal = false"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none">Tidak</button>
                    <form :action="pendaftarToDeleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
