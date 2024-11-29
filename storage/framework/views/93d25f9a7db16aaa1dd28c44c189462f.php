<?php $__env->startSection('content'); ?>
    <h1>Услуги</h1>
    <a class="btn btn-primary" href="<?php echo e(route('services.create')); ?>">Добавить</a>
    <section class="block-position">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="position-column" style="border: 1px solid black; margin-top: 10px; padding: 10px; width: fit-content">
                                <img src="<?php echo e(asset('storage/'.$service->img)); ?>">
                            <h3><?php echo e($service->name); ?></h3>
                            <p><?php echo e($service->price); ?></p>
                            <div>
                                <a href="<?php echo e(route('services.edit',$service)); ?>" class="btn btn-primary">Изменить</a>
                                <form action="<?php echo e(route('services.destroy', $service)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button style="width: 100px" class="btn btn-primary">Удалить</button>
                                </form>
                            </div>
                    </div>












                <div class="position-columns">

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/services/index.blade.php ENDPATH**/ ?>