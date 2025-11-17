<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Administrasi
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Kelola pembayaran dan pengeluaran pesantren
        </p>
    </x-slot>

    <div class="space-y-6">

        <div class="flex justify-between items-center">
            <div class="w-1/3">
                <label for="search" class="sr-only">Cari</label>
                <input type="text" name="search" id="search" placeholder="Cari Santri atau ID Transaksi..."
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <a href="{{ route('admin.transaksi.create') }}" 
               class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Transaksi
            </a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            
            @if (session('success'))
                <div class="p-4 bg-green-50 border-b border-green-200 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Santri</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Transaksi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($transaksis as $transaksi)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $transaksi->santri->user->name }}</div>
                                    <div class="text-xs text-gray-500">Kamar: {{ $transaksi->santri->kamar }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-700">{{ $transaksi->id_transaksi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $transaksi->jenis }}</td>
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
                                    <div class="flex items-center justify-end gap-4">
                                        <a href="{{ route('admin.transaksi.edit', $transaksi) }}" class="text-blue-500 hover:text-blue-700" title="Edit">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        
                                        <form action="{{ route('admin.transaksi.destroy', $transaksi) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" title="Delete">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12.578 0c-.27.009-.538.025-.804.048L3 5.79m10.278 0L9.09 3.546A1.875 1.875 0 0 0 7.381 2.5H5.118a1.875 1.875 0 0 0-1.709 1.046L2.17 4.872m12.578 0-1.503-1.348A1.875 1.875 0 0 0 11.478 2.5H9.522a1.875 1.875 0 0 0-1.306 1.023L6.75 4.872m10.5 0-1.29-1.151A1.875 1.875 0 0 0 14.93 2.5H6.07a1.875 1.875 0 0 0-1.32.518L3.45 4.872" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada data transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($transaksis->hasPages())
                <div class="p-6 border-t border-gray-200">
                    {{ $transaksis->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>