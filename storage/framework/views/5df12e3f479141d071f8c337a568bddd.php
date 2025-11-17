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
            Profil Saya
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Informasi personal dan data diri
        </p>
     <?php $__env->endSlot(); ?>

    <div class="space-y-6">
        
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Data Personal</h3>
                <p class="text-sm text-gray-500 mt-1">Informasi pribadi santri</p>
            </div>

            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                    <dd class="text-sm text-gray-900"><?php echo e(Auth::user()->name); ?></dd>
                </div>
                
                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                    <dd class="text-sm text-gray-900"><?php echo e(Auth::user()->santri->no_telpon ?? '-'); ?></dd>
                </div>

                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="text-sm text-gray-900"><?php echo e(Auth::user()->email); ?></dd>
                </div>
                
                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Tanggal Masuk</dt>
                    <dd class="text-sm text-gray-900"><?php echo e(\Carbon\Carbon::parse(Auth::user()->santri->tanggal_masuk)->isoFormat('D MMMM YYYY')); ?></dd>
                </div>

                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Kamar</dt>
                    <dd class="text-sm text-gray-900"><?php echo e(Auth::user()->santri->kamar); ?></dd>
                </div>

                <div class="grid grid-cols-2">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <?php echo e(Auth::user()->santri->status); ?>

                        </span>
                    </dd>
                </div>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white border border-gray-200 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
        
        <div class="p-4 sm:p-8 bg-white border border-gray-200 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <?php echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
<?php endif; ?><?php /**PATH C:\laragon\www\ponpes_kalijaga\resources\views/profile/edit.blade.php ENDPATH**/ ?>