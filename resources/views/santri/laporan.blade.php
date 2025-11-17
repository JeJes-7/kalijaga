<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Laporan
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Laporan Keterangan Tuntas pesantren
        </p>
    </x-slot>

    <div class="space-y-6">

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Laporan Keterangan Tuntas</h3>
                <p class="text-sm text-gray-500 mt-1">Unduh laporan dan rekapitulasi status kelulusan santri.</p>
            </div>

            <div class="p-6 flex justify-between items-center">
                <p class="text-sm text-gray-700">File akan di-generate berdasarkan data terbaru.</p>
                
                <a href="#" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Unduh Laporan
                </a>
            </div>
        </div>

    </div>
</x-app-layout>