<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
Главная
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="head">
        <header class="header-head">
            <div class="header-content">
                <img class="logo-size" alt="Крупская Турбаза в Хакасии" src="<?php echo e(asset('image/Logo_name_white.svg')); ?>">
                <a class="light font-white header-text">+7 (909) 502 90 00</a>
                <a class="light font-white header-text">ПОСЕЛОК, ИМ. КРУПСКОЙ, УЛ. ВОКЗАЛЬНАЯ, Д. 1</a>
                <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <a class="light font-white menu-text">МЕНЮ</a>
                    <img  src="<?php echo e(asset('image/icons/menu_white.svg')); ?>" alt="Иконка меню">
                </div>
            </div>
        </header>


        <div class="head-block">
            <div class="head-body">
                <img src="<?php echo e(asset('/image/Logo_white.svg')); ?>" alt="Логотип" id="head-img">
                <div class="button_block">
                    <button class="button button-header  font-uppercace" onclick="window.location.href = '<?php echo e(route('houses')); ?>'">Забронировать домик</button>
                    <p class="light font-white">Бронируй свободные домики прямо сейчас!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="about-body">
            <p class="bold font-gray text">База эконом-класса, идеально подойдет для школьных групп, студенческих компаний,
                дружеского семейного отдыха компаниями на дневное пребывание и с ночевкой.
                База "КРУПСКАЯ" расположена на станции Крупская, в жилом поселке, на окраине соснового бора, в 100 метрах от станции. </p>
            <img id="about-image" alt="О базе " src="<?php echo e(asset('image/about_img.svg')); ?>">

        </div>

    </section>


    <section class="info">
        <div class="info-head">
            <h1 class="h font-green">Что тебя ждет?</h1>
        </div>
        <div class="info-body">
            <div class="info-block start">
                <div class="info-block-body">
                    <img src="<?php echo e(asset('image/info_1.svg')); ?>" class="info-img">
                    <p class="text font-uppercace font-green bold">Вкусная еда</p>
                </div>


            </div>
            <div class="info-block center">
                <div class="info-circle"></div>
            </div>
            <div class="info-block end">
                <div class="info-block-body">
                    <img src="<?php echo e(asset('image/info_2.svg')); ?>" class="info-img">
                    <p class="text font-uppercace font-green bold">Активный отдых</p>
                </div>
            </div>
            <div class="info-block center">
                <div class="info-circle"></div>
            </div>
            <div class="info-block start">
                <div class="info-block-body">
                    <img src="<?php echo e(asset('image/Info_3.svg')); ?>" class="info-img">
                    <p class="text font-uppercace font-green bold">Красивая природа</p>
                </div>
            </div>
        </div>
    </section>
    <section class="houses">
        <div class="houses-block">
            <h1 class="h bold font-green">Домики</h1>
            <div class="houses-items">
                <div class="houses-main">
                    <img alt="Домик" class="house-img" id="house1" src="<?php echo e(asset('image/house.svg')); ?>">
                    <img alt="Домик" class="house-img" id="house2" src="<?php echo e(asset('image/house_2.jpg')); ?>" style="display: none">
                    <button class="button house-btn" onclick="window.location.href = '<?php echo e(route('houses')); ?>'">Список домиков</button>
                </div>
                <div class="houses-secondary">
                    <div class="house-item" id="house-btn1">
                        <h3 class="h3 bold font-gray">Красный домик</h3>
                        <p class="p font-gray light">Домик вместительностью 8-16 человек</p>
                        <div class="item-size">
                            <p class="p font-gray light">✔ Дневное пребывание</p>
                            <p class="p font-gray light">✔ На ночь</p>
                        </div>
                        <h3 class="h3 bold font-gray"> 500 - 1200₽/чел</h3>
                    </div>

                    <div class="house-item" id="house-btn2">
                        <h3 class="h3 bold font-gray">Желтый домик</h3>
                        <p class="p font-gray light">Домик вместительностью 10-18 человек</p>
                        <div class="item-size">
                            <p class="p font-gray light">✔ Дневное пребывание</p>
                        </div>
                        <h3 class="h3 bold font-gray"> 300 - 400₽/чел</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="services-head">
            <h1 class="h font-green">Услуги</h1>
        </div>
        <div class="services-body">
            <div class="services-block end">
                <div class="services-block-body">
                    <img src="<?php echo e(asset('image/service_2.svg')); ?>" class="services-img">
                    <p class="text font-uppercace font-green bold">Прокат лыж</p>
                    <p class="p light font-green">350₽/день</p>
                </div>


            </div>
            <div class="services-block center">
                <div class="services-circle"></div>
            </div>
            <div class="services-block start">
                <div class="services-block-body">
                    <img src="<?php echo e(asset('image/service_1.svg')); ?>" class="services-img">
                    <p class="text font-uppercace font-green bold">Прокат плюшек</p>
                    <p class="p light font-green">300₽/день</p>
                </div>
            </div>
            <div class="services-block center">
                <div class="services-circle"></div>
            </div>
            <div class="services-block end">
                <div class="services-block-body">
                    <img src="<?php echo e(asset('image/service_3.jpg')); ?>" class="services-img">
                    <p class="text font-uppercace font-green bold">Поход выходного дня</p>
                    <p class="p light font-green">350₽/чел.</p>
                </div>
            </div>
        </div>
        <button class="button service-btn bold font-gray" onclick="window.location.href = '<?php echo e(route('services')); ?>'">Подробнее</button>
    </section>
    <section class="map">
        <div class="map-block">
            <div class="map-body">
                <div class="map-text">
                    <h1 class="h font-white bold font-uppercace">Где мы находимся?</h1>
                    <p class="p light font-white">База расположена на станции Крупская, в жилом поселке, на окраине сосновогобора, в 100 метрах от станции. </p>
                </div>

                <div class="map-button-block">
                    <button class="button button-header font-uppercace" style="width: 90%" onclick="window.location.href = '<?php echo e(route('contacts')); ?>'">Подробнее</button>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/index.blade.php ENDPATH**/ ?>