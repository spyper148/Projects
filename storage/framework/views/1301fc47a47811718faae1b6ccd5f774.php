<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/contacts.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Контакты
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="contacts">
        <div class="contacts-block">
            <h1 class="h font-green bold">Контакты</h1>
            <div class="contacts-body">
                <div class="map">
                    <iframe src="https://yandex.ru/map-widget/v1/?ll=91.961259%2C53.692641&mode=whatshere&source=serp_navig&whatshere%5Bpoint%5D=91.960497%2C53.693203&whatshere%5Bzoom%5D=17&z=17.1" width="100%" height="100%" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
                <div class="info">
                    <h2 class="h2 font-green bold">Где мы находимся?</h2>
                    <p class="p font-gray light">База "Крупская" расположена на станции Крупская, в жилом поселке, на окраине соснового бора, в 100 метрах от станции. </p>
                    <svg width="100%" height="2" viewBox="0 0 418 2" fill="none">
                        <path d="M0 1H417.185" stroke="#868686"/>
                    </svg>
                    <div class="tel">
                        <h3 class="h3 font-green bold">Телефон</h3>
                        <p class="p font-gray center light tel">+7 (909) 502 90 00</p>
                    </div>
                    <a href="https://vk.com/turbazakrupskaya "><img class="links" alt="Вконтакте"  src="<?php echo e(asset('image/icons/vk_logo.svg')); ?>"></a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/contacts.blade.php ENDPATH**/ ?>