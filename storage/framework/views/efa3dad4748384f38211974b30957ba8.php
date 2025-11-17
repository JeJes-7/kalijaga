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
            Dashboard Santri
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Selamat Datang, <?php echo e($santri->user->name); ?>

        </p>
     <?php $__env->endSlot(); ?>

    <div class="space-y-6">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-start">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Status Santri</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($santri->status); ?></p>
                    <p class="text-xs text-gray-400 mt-1">Status saat ini</p>
                </div>
                <span class="p-3 bg-blue-100 text-blue-600 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                </span>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-start">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Status Administrasi</h3>
                    <p class="text-3xl font-bold mt-2 <?php echo e($statusAdministrasi == 'Lunas' ? 'text-green-600' : 'text-red-600'); ?>">
                        <?php echo e($statusAdministrasi); ?>

                    </p>
                    <p class="text-xs text-gray-400 mt-1">Bulan ini</p>
                </div>
                <span class="p-3 bg-yellow-100 text-yellow-600 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h6m3-3.75H21.75m-3-3.75H21.75m-3 0h3.375c.621 0 1.125.504 1.125 1.125V18a1.125 1.125 0 0 1-1.125 1.125H14.25v-6.375Z" /></svg>
                </span>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-start">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Pelanggaran Bulan Ini</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($jumlahPelanggaranBulanIni); ?></p>
                    <p class="text-xs text-gray-400 mt-1">Kasus</p>
                </div>
                <span class="p-3 bg-red-100 text-red-600 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                </span>
            </div>

        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-lg font-semibold text-red-600">Pelanggaran Bulan ini</h3>
            <p class="text-sm text-gray-500 mt-1">Catatan yang perlu diperhatikan</p>
            
            <div class="mt-4 space-y-3">
                <?php $__empty_1 = true; $__currentLoopData = $pelanggaranBulanIni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div>
                            <p class="font-medium text-gray-900"><?php echo e($pelanggaran->pelanggaran); ?></p>
                            <p class="text-xs text-gray-500 mt-0.5"><?php echo e($pelanggaran->bidang); ?> • <?php echo e(\Carbon\Carbon::parse($pelanggaran->tanggal_pelanggaran)->isoFormat('D MMMM YYYY')); ?></p>
                        </div>
                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-red-100 text-red-700">
                            <?php echo e($pelanggaran->tingkat); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-4 text-center text-gray-500 bg-gray-50 rounded-lg">
                        Tidak ada pelanggaran tercatat bulan ini.
                    </div>
                <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\laragon\www\ponpes_kalijaga\resources\views/dashboard.blade.php ENDPATH**/ ?>