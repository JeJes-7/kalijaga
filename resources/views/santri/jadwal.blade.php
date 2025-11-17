<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Jadwal Pesantren
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Jadwal pelajaran dan pengaturan waktu
        </p>
    </x-slot>

    <div class="space-y-6">

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Jadwal Ngaos</h3>
                <p class="text-sm text-gray-500 mt-1">Jadwal pengajian kitab ba'da sholat</p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hari</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kitab</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ustadz/Ustadzah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ba'da (Waktu)</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($jadwals as $jadwal)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $jadwal->kitab }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $jadwal->ustadz }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $jadwal->waktu }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-500 hover:text-blue-700 text-sm" disabled>Detail</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada data jadwal ngaos tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>