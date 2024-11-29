<?php $__env->startSection('content'); ?>

    <div class="container-sm" style="width: 80%">
        <h1>Изменить размещение</h1>
        <form action="<?php echo e(route('services.update',$service)); ?>" method="post" enctype="multipart/form-data" style="padding-top: 20px">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div class="mb-3" style="width: 30%" >
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo e($service->name); ?>">
            </div>
            <div class="mb-3" style="width: 30%" >
                <label for="price" class="form-label">Цена</label>
                <input type="text" name="price" class="form-control" id="price" value="<?php echo e($service->price); ?>">
            </div>
            <div class="mb-3" style="width: 30%">
                <label for="image" class="form-label">Изображения</label>
                <input class="form-control" type="file" id="image" name="image" >
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-lg" >Изменить</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/services/edit.blade.php ENDPATH**/ ?>