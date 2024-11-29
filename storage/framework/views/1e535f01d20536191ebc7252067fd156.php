<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/services.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Услуги
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="services">
        <div class="services-block">
            <h1 class="h font-green bold">Услуги</h1>
            <div class="services-body">
                <div class="row wrap service-cards">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="service-card">
                            <img class="service-img" src="<?php echo e(asset('storage/'.$service->img)); ?>" alt="Прокат лыж" >
                            <div class="desc-column">
                                <h2 class="h2 font-black bold"><?php echo e($service->name); ?></h2>
                                <h3 class="h3 font-green bold"><?php echo e($service->price); ?></h3>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/services.blade.php ENDPATH**/ ?>