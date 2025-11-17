<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Selamat datang di sistem informasi akademik pondok pesantren
        </p>
    </x-slot>

    <div class="space-y-6">
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Total Santri Card -->
            <div class="bg-white border border-blue-100 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Total Santri</h3>
                <p class="text-3xl font-bold text-gray-900 mb-2">{{ $totalSantri }}</p>
                <p class="text-xs text-gray-400">Santri aktif</p>
            </div>

            <!-- Pembayaran Tertunggak Card -->
            <div class="bg-white border border-yellow-100 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-yellow-50 rounded-lg">
                        <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h6m3-3.75H21.75m-3-3.75H21.75m-3 0h3.375c.621 0 1.125.504 1.125 1.125V18a1.125 1.125 0 0 1-1.125 1.125H14.25v-6.375Z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Pembayaran Tertunggak</h3>
                <p class="text-3xl font-bold text-gray-900 mb-2">{{ $totalTunggakan }}</p>
                <p class="text-xs text-gray-400">Santri tertunggak</p>
            </div>

            <!-- Total Pelanggaran Card -->
            <div class="bg-white border border-red-100 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-red-50 rounded-lg">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Total Pelanggaran Bulan Ini</h3>
                <p class="text-3xl font-bold text-gray-900 mb-2">{{ $totalPelanggaran }}</p>
                <p class="text-xs text-gray-400">Kasus pelanggaran</p>
            </div>

            <!-- Total Pendapatan Card -->
            <div class="bg-white border border-green-100 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-green-50 rounded-lg">
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Total Pendapatan Bulan Ini</h3>
                <p class="text-3xl font-bold text-gray-900 mb-2">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                <p class="text-xs text-gray-400">Bulan ini</p>
            </div>

        </div>

        <!-- Activity Section -->
        <div class="bg-white border border-gray-200 rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
                <p class="text-sm text-gray-500 mt-1">Aktivitas sistem dalam 24 jam terakhir</p>
            </div>
            <div class="p-8">
                <p class="text-center text-gray-400">Belum ada aktivitas terbaru.</p>
            </div>
        </div>

    </div>
</x-app-layout>