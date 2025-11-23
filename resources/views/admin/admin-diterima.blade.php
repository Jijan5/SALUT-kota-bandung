<x-admin-layout>
    <x-slot name="title">
        Data Siswa Diterima
    </x-slot>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                    class="fixed top-0 right-0 mt-4 mr-4 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50">
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
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal
                                Diterima</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
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
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $pendaftar->updated_at->format('d F Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Diterima
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada data siswa yang diterima.</td>
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
    </div>
</x-admin-layout>