<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Tambah Jadwal Baru
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Isi formulir di bawah untuk menambah jadwal ngaos baru.
        </p>
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                            <input type="text" name="hari" id="hari" value="{{ old('hari') }}" required
                                   placeholder="Contoh: Senin"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('hari')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="kitab" class="block text-sm font-medium text-gray-700">Kitab</label>
                            <input type="text" name="kitab" id="kitab" value="{{ old('kitab') }}" required
                                   placeholder="Contoh: Bulughul Marom"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('kitab')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ustadz" class="block text-sm font-medium text-gray-700">Ustadz/Ustadzah</label>
                            <input type="text" name="ustadz" id="ustadz" value="{{ old('ustadz') }}" required
                                   placeholder="Contoh: Ustadz Muhammad Zain"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('ustadz')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu (Ba'da)</label>
                            <input type="text" name="waktu" id="waktu" value="{{ old('waktu') }}" required
                                   placeholder="Contoh: Isya', Subuh, Maghrib"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('waktu')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 rounded-b-lg flex justify-end gap-3">
                    <a href="{{ route('admin.jadwal.index') }}"
                       class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>