<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/comments.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/houses.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Оплата
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php ($summ=0); ?>
    <section class="comments">
        <div class="comments-block">
            <h1 class="h font-green bold">Детали заказа</h1>
            <p class="p font-black light">Фамилия Имя: <?php echo e($order->user->surname); ?> <?php echo e($order->user->name); ?></p>
            <p class="p font-black light">Номер телефона: <?php echo e($order->user->tel); ?></p>
            <p class="p font-black light">Email: <?php echo e($order->user->email); ?></p>
            <p class="h3 font-black light">Состав брони:</p>
            <hr class="hr-line">
            <?php $__currentLoopData = $order->houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="h3 font-black light"><?php echo e($house->name); ?></p>
            <p class="p font-black light">Количетсво человек: <?php echo e($house->pivot->count); ?></p>
                <hr class="hr-line">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $order->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="h3 font-black light"><?php echo e($service->name); ?></p>
                <p class="p font-black light">Количество: <?php echo e($service->pivot->count); ?></p>
                <hr class="hr-line">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <h2 class="h2 font-green bold">Сумма: <?php echo e($order->price); ?>Р</h2>
            <div class="comments-body">
                <form method="post" action="<?php echo e(route('payment.create')); ?>">
                    <?php echo csrf_field(); ?>
                    <input hidden name="amount" type="number" value="<?php echo e($order->price); ?>">
                    <input hidden name="order_id" type="text" value="<?php echo e($order->id); ?>">
                    <button class="button house-btn">Оплатить</button>
                </form>

                <form action="<?php echo e(route('booking.destroy',$order)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <button type="submit" class="button house-btn">Отмена</button>
                </form>

            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/booking.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/message.blade.php ENDPATH**/ ?>