<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Administrasi
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Riwayat pembayaran dan status keuangan
        </p>
    </x-slot>

    <div class="space-y-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Status SPP</h3>
                <p class="text-3xl font-bold mt-2 {{ $statusAdministrasi == 'Lunas' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $statusAdministrasi }}
                </p>
                <p class="text-xs text-gray-400 mt-1">Bulan ini</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Total Pembayaran</h3>
                <p class="text-3xl font-bold text-gray-900 mt-2">
                    Rp {{ number_format($totalPembayaranLunas, 0, ',', '.') }}
                </p>
                <p class="text-xs text-gray-400 mt-1">Sepanjang Masa</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Tunggakan</h3>
                <p class="text-3xl font-bold mt-2 {{ $totalTunggakan > 0 ? 'text-red-600' : 'text-gray-900' }}">
                    Rp {{ number_format($totalTunggakan, 0, ',', '.') }}
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    {{ $totalTunggakan > 0 ? 'Ada tunggakan yang perlu diselesaikan' : 'Tidak Ada Tunggakan' }}
                </p>
            </div>

        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Riwayat Pembayaran</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Transaksi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Pembayaran</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($riwayatPembayaran as $transaksi)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-700">{{ $transaksi->id_transaksi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $transaksi->jenis }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ \Carbon\Carbon::parse($transaksi->created_at)->isoFormat('D MMM YYYY') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($transaksi->status == 'Lunas')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Lunas
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Tertunggak
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-500 hover:text-blue-700 text-sm" disabled>Detail</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada riwayat pembayaran tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>