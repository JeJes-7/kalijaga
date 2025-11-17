<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Profil Saya
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Informasi personal dan data diri
        </p>
    </x-slot>

    <div class="space-y-6">
        
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Data Personal</h3>
                <p class="text-sm text-gray-500 mt-1">Informasi pribadi santri</p>
            </div>

            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                    <dd class="text-sm text-gray-900">{{ Auth::user()->name }}</dd>
                </div>
                
                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                    <dd class="text-sm text-gray-900">{{ Auth::user()->santri->no_telpon ?? '-' }}</dd>
                </div>

                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="text-sm text-gray-900">{{ Auth::user()->email }}</dd>
                </div>
                
                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Tanggal Masuk</dt>
                    <dd class="text-sm text-gray-900">{{ \Carbon\Carbon::parse(Auth::user()->santri->tanggal_masuk)->isoFormat('D MMMM YYYY') }}</dd>
                </div>

                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Kamar</dt>
                    <dd class="text-sm text-gray-900">{{ Auth::user()->santri->kamar }}</dd>
                </div>

                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ Auth::user()->santri->status }}
                        </span>
                    </dd>
                </div>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white border border-gray-200 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>
        
        <div class="p-4 sm:p-8 bg-white border border-gray-200 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>