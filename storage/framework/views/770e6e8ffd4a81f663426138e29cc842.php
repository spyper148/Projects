<?php $__env->startSection('content'); ?>

    <div class="container-sm" style="width: 80%">
        <h1>Добавить услугу</h1>
        <form action="<?php echo e(route('services.store')); ?>" method="post" enctype="multipart/form-data" style="padding-top: 20px">
            <?php echo csrf_field(); ?>
            <div class="mb-3" style="width: 30%" >
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3" style="width: 30%" >
                <label for="price" class="form-label">Стоимость</label>
                <input type="text" name="price" class="form-control" id="price">
            </div>
            <div class="mb-3" style="width: 30%">
                <label for="image" class="form-label">Изображения</label>
                <input class="form-control" type="file" id="image" name="image" >
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-lg" >Добавить</button>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/services/create.blade.php ENDPATH**/ ?>