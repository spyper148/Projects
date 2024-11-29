<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Профиль
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="profile">
        <div class="profile-block">
            <h1 class="h font-green bold">Личный кабинет</h1>
            <div class="profile-body">
                <div class="profile-main-column">
                    <div class="info">
                        <div class="circle">
                            <?php if(!$user->avatar): ?>
                                <img class="profile-img" src="">
                            <?php else: ?>
                                <img class="profile-img" src="<?php echo e(asset($user->avatar)); ?>">
                            <?php endif; ?>

                        </div>
                        <div class="text">
                            <h2 class="h2 font-black bold"><?php echo e($user->surname); ?> <?php echo e($user->name); ?></h2>
                            <p class="p font-gray light"><?php echo e($user->tel); ?></p>
                            <p class="p font-gray light"><?php echo e($user->email); ?></p>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="button profile-btn">Редактировать данные</button>
                        <input type="button" onclick="window.location.href = '<?php echo e(route('logout')); ?>'" class="button profile-btn" value="Выйти">
                    </div>
                </div>
                <div class="profile-column">
                    <h2 class="h2 font-green bold">История бронирования</h2>
                    <div class="profile-area">
                        <div class="profile-item">
                            <h3 class="h3 bold font-gray">Красный домик</h3>
                            <p class="p font-gray light">Дата заезда:20.09.2004</p>
                            <p class="p font-gray light">Дата выезда:20.09.2004</p>
                        </div>
                        <div class="profile-item">
                            <h3 class="h3 bold font-gray">Красный домик</h3>
                            <p class="p font-gray light">Дата заезда:20.09.2004</p>
                            <p class="p font-gray light">Дата выезда:20.09.2004</p>
                        </div>
                        <div class="profile-item">
                            <h3 class="h3 bold font-gray">Красный домик</h3>
                            <p class="p font-gray light">Дата заезда:20.09.2004</p>
                            <p class="p font-gray light">Дата выезда:20.09.2004</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/profile.blade.php ENDPATH**/ ?>