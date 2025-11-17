<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit Transaksi
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Perbarui data transaksi untuk <span class="font-medium">{{ $transaksi->santri->user->name }}</span>.
        </p>
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <form action="{{ route('admin.transaksi.update', $transaksi) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="p-6 space-y-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="santri_id" class="block text-sm font-medium text-gray-700">Pilih Santri</label>
                            <select name="santri_id" id="santri_id" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Pilih Santri --</option>
                                @foreach ($santris as $santri)
                                    <option value="{{ $santri->id }}" {{ old('santri_id', $transaksi->santri_id) == $santri->id ? 'selected' : '' }}>
                                        {{ $santri->user->name }} (Kamar: {{ $santri->kamar }})
                                    </option>
                                @endforeach
                            </select>
                            @error('santri_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Transaksi</label>
                            <input type="text" name="jenis" id="jenis" value="{{ old('jenis', $transaksi->jenis) }}" required
                                   placeholder="Contoh: SPP Bulan Ini, Kitab, dll."
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('jenis')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah (Rp)</label>
                            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $transaksi->jumlah) }}" required
                                   placeholder="Contoh: 500000 (tanpa titik atau koma)"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('jumlah')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Lunas" {{ old('status', $transaksi->status) == 'Lunas' ? 'selected' : '' }}>Lunas</p>
                                <option value="Tertunggak" {{ old('status', $transaksi->status) == 'Tertunggak' ? 'selected' : '' }}>Tertunggak</p>
                            </select>
                            @error('status')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 rounded-b-lg flex justify-end gap-3">
                    <a href="{{ route('admin.transaksi.index') }}"
                       class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Update Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>