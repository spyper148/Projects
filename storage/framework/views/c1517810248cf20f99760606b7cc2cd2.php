<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/comments.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/houses.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Забронировать
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php ($summ=0); ?>
    <section class="comments">
        <div class="comments-block">
            <h1 class="h font-green bold">Бронирование</h1>
            <div class="comments-body">
                <form class="form-booking" method="post" action="<?php echo e(route('booking.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <div class="house-position">
                            <div class="house-desc">
                                <input type="text" hidden name="house_id" value="<?php echo e($house->id); ?>">
                                <img src="<?php echo e(asset('storage/'.$house->images[0]->img)); ?>" class="form-house-img">

                                <h3 class="h3 font-gray light"><?php echo e($house->name); ?></h3>
                            </div>

                            <input type="number" name="size" placeholder="Кол. человек" min="<?php echo e($house->min_size); ?>" max="<?php echo e($house->max_size); ?>">

                        </div>


                    <h3 class="h3 font-green font-uppercace bold">Дополнительные услуги</h3>
                    <div class="services-group">
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="service-position">
                            <img alt="Услуга" class="form-service-img" src="<?php echo e(asset('storage/'.$service->img)); ?>">
                            <p style="text-align: center" class="p font-gray light"><?php echo e($service->name); ?></p>
                            <input name="count<?php echo e($service->id); ?>" value="0" type="number" min="0" placeholder="Кол-во">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="date-group">
                        <div class="mb-3">
                            <label for="dateStart" class="p font-gray light">Дата заезда</label>
                            <input class="form-control" type="date" name="date_start" placeholder="Дата заезда" id="dateStart">
                        </div>
                        <div class="mb-3">
                            <label for="dateEnd" class="p font-gray light">Дата выезда</label>
                            <input class="form-control" type="date" name="date_end" placeholder="Даты выезда" id="dateEnd">
                        </div>

                    </div>
                    </div>

                    <button type="submit" class="button modal-btn font-uppercace">Забронировать</button>
                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/booking.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/booking.blade.php ENDPATH**/ ?>