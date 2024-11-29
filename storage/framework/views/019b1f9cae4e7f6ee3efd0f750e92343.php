<?php $__env->startSection('title'); ?>
    Админ-панель
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Заказы</h1>
        <section class="block-position">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="position-order">

                    <div class="position-columns">
                        <div class="position-column">
                            <h3><?php echo e($order->user->surname); ?> <?php echo e($order->user->name); ?></h3>
                            <p>Номер телефона: <?php echo e($order->user->tel); ?></p>

                        </div>
                        <div class="position-column">
                            <article>
                                <h5>Дата заезда: <?php echo e($date = \Carbon\Carbon::make($order->date_start)->format('d.m.Y')); ?></h5>
                                <h5>Дата выезда: <?php echo e($date = \Carbon\Carbon::make($order->date_end)->format('d.m.Y')); ?></h5>
                            </article>
                        </div>
                        <div class="position-column">
                            <article>
                                <h5>Сумма: <?php echo e($order->price); ?>₽</h5>
                                <p></p>
                                <p></p>
                            </article>
                            <article>
                                <h5>Статус: <?php echo e($order->status); ?></h5>
                                <p></p>
                                <p></p>
                            </article>
                        </div>
                        <div class="position-column">
                            <form>
                                <button class="btn btn-success">Отказать</button>
                            </form>
                        </div>
                    </div>
                    <hr class="hr-line">
                    <?php $__currentLoopData = $order->houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="position-columns">
                        <div class="position-column">
                            <h5><?php echo e($house->name); ?></h5>
                        </div>
                        <div class="position-column">
                            <h5>Количество человек: <?php echo e($house->pivot->count); ?></h5>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr class="hr-line">
                    <div class="position-columns">
                        <?php $__currentLoopData = $order->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="position-column">
                            <h5><?php echo e($service->name); ?></h5>
                            <h5>Количество: <?php echo e($service->pivot->count); ?></h5>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/index.blade.php ENDPATH**/ ?>