<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Administrasi
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Riwayat pembayaran dan status keuangan
        </p>
     <?php $__env->endSlot(); ?>

    <div class="space-y-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Status SPP</h3>
                <p class="text-3xl font-bold mt-2 <?php echo e($statusAdministrasi == 'Lunas' ? 'text-green-600' : 'text-red-600'); ?>">
                    <?php echo e($statusAdministrasi); ?>

                </p>
                <p class="text-xs text-gray-400 mt-1">Bulan ini</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Total Pembayaran</h3>
                <p class="text-3xl font-bold text-gray-900 mt-2">
                    Rp <?php echo e(number_format($totalPembayaranLunas, 0, ',', '.')); ?>

                </p>
                <p class="text-xs text-gray-400 mt-1">Sepanjang Masa</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-sm font-medium text-gray-500">Tunggakan</h3>
                <p class="text-3xl font-bold mt-2 <?php echo e($totalTunggakan > 0 ? 'text-red-600' : 'text-gray-900'); ?>">
                    Rp <?php echo e(number_format($totalTunggakan, 0, ',', '.')); ?>

                </p>
                <p class="text-xs text-gray-400 mt-1">
                    <?php echo e($totalTunggakan > 0 ? 'Ada tunggakan yang perlu diselesaikan' : 'Tidak Ada Tunggakan'); ?>

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
                        <?php $__empty_1 = true; $__currentLoopData = $riwayatPembayaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-700"><?php echo e($transaksi->id_transaksi); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo e($transaksi->jenis); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <?php echo e(\Carbon\Carbon::parse($transaksi->created_at)->isoFormat('D MMM YYYY')); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if($transaksi->status == 'Lunas'): ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Lunas
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Tertunggak
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp <?php echo e(number_format($transaksi->jumlah, 0, ',', '.')); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-500 hover:text-blue-700 text-sm" disabled>Detail</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada riwayat pembayaran tercatat.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\ponpes_kalijaga\resources\views/santri/administrasi.blade.php ENDPATH**/ ?>