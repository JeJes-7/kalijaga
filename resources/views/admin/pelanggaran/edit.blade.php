<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit Data Pelanggaran
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Perbarui data pelanggaran untuk <span class="font-medium">{{ $pelanggaran->santri->user->name }}</span>.
        </p>
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <form action="{{ route('admin.pelanggaran.update', $pelanggaran) }}" method="POST">
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
                                    <option value="{{ $santri->id }}" {{ old('santri_id', $pelanggaran->santri_id) == $santri->id ? 'selected' : '' }}>
                                        {{ $santri->user->name }} (Kamar: {{ $santri->kamar }})
                                    </option>
                                @endforeach
                            </select>
                            @error('santri_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_pelanggaran" class="block text-sm font-medium text-gray-700">Tanggal Pelanggaran</label>
                            <input type="date" name="tanggal_pelanggaran" id="tanggal_pelanggaran" value="{{ old('tanggal_pelanggaran', $pelanggaran->tanggal_pelanggaran) }}" required
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('tanggal_pelanggaran')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="pelanggaran" class="block text-sm font-medium text-gray-700">Nama Pelanggaran</label>
                            <input type="text" name="pelanggaran" id="pelanggaran" value="{{ old('pelanggaran', $pelanggaran->pelanggaran) }}" required
                                   placeholder="Contoh: Pasal 1 atau Terlambat Balik Pondok"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('pelanggaran')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="bidang" class="block text-sm font-medium text-gray-700">Bidang</label>
                            <input type="text" name="bidang" id="bidang" value="{{ old('bidang', $pelanggaran->bidang) }}" required
                                   placeholder="Contoh: Keamanan, Pendidikan, Kebersihan"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('bidang')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tingkat" class="block text-sm font-medium text-gray-700">Tingkat</label>
                            <select name="tingkat" id="tingkat" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Ringan" {{ old('tingkat', $pelanggaran->tingkat) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                                <option value="Sedang" {{ old('tingkat', $pelanggaran->tingkat) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="Berat" {{ old('tingkat', $pelanggaran->tingkat) == 'Berat' ? 'selected' : '' }}>Berat</option>
                            </select>
                            @error('tingkat')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Menunggu" {{ old('status', $pelanggaran->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</button>
                                <option value="Selesai" {{ old('status', $pelanggaran->status) == 'Selesai' ? 'selected' : '' }}>Selesai</button>
                            </select>
                            @error('status')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 rounded-b-lg flex justify-end gap-3">
                    <a href="{{ route('admin.pelanggaran.index') }}"
                       class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Update Pelanggaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>