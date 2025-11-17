<x-app-layout>
    
    <!-- Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Laporan
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Laporan pemasukan dan pengeluaran
        </p>
    </x-slot>

    <div class="space-y-6">
        
        <!-- Kartu Pilihan Laporan -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Ringkasan Statistik Utama</h3>
                <p class="text-sm text-gray-500 mt-1">Gunakan data ini untuk membuat laporan bulanan.</p>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                 <!-- Stat Total Santri -->
                <div class="space-y-1">
                    <dt class="text-xs font-medium text-gray-500 uppercase">Santri Aktif</dt>
                    <dd class="text-3xl font-bold text-gray-900">{{ $totalSantriAktif }}</dd>
                </div>

                <!-- Stat Total Pemasukan -->
                <div class="space-y-1">
                    <dt class="text-xs font-medium text-gray-500 uppercase">Total Pemasukan (All Time)</dt>
                    <dd class="text-3xl font-bold text-green-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</dd>
                </div>
                
                <!-- Stat Pelanggaran Menunggu -->
                <div class="space-y-1">
                    <dt class="text-xs font-medium text-gray-500 uppercase">Pelanggaran Selesai</dt>
                    <dd class="text-3xl font-bold text-gray-900">{{ $totalPelanggaranSelesai }}</dd>
                </div>

                <!-- Stat Pelanggaran Menunggu -->
                <div class="space-y-1">
                    <dt class="text-xs font-medium text-gray-500 uppercase">Hukuman Menunggu</dt>
                    <dd class="text-3xl font-bold text-red-600">{{ $totalPelanggaranMenunggu }}</dd>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 space-y-4">
                <h3 class="text-lg font-semibold text-gray-900">Generate Laporan</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    
                    <!-- Laporan Keuangan -->
                    <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg space-y-2">
                        <p class="font-medium text-blue-800">Laporan Keuangan</p>
                        <p class="text-sm text-blue-700">Filter berdasarkan periode tanggal dan status (Lunas/Tertunggak).</p>
                        <button disabled class="mt-2 w-full inline-flex justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm opacity-50 cursor-not-allowed">
                            Generate PDF (Fitur Export)
                        </button>
                    </div>

                    <!-- Laporan Data Santri -->
                    <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg space-y-2">
                        <p class="font-medium text-blue-800">Laporan Data Santri</p>
                        <p class="text-sm text-blue-700">Export daftar santri (Aktif/Cuti) ke format Excel atau PDF.</p>
                        <button disabled class="mt-2 w-full inline-flex justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm opacity-50 cursor-not-allowed">
                            Generate PDF (Fitur Export)
                        </button>
                    </div>

                    <!-- Laporan Pelanggaran -->
                    <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg space-y-2">
                        <p class="font-medium text-blue-800">Laporan Pelanggaran</p>
                        <p class="text-sm text-blue-700">Filter berdasarkan tingkat (Berat/Ringan) dan bidang (Keamanan/Pendidikan).</p>
                        <button disabled class="mt-2 w-full inline-flex justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm opacity-50 cursor-not-allowed">
                            Generate PDF (Fitur Export)
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>