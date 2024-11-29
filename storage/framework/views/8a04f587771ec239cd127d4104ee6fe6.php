<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/houses.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Домики
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="modal modal-xl fade" id="booking" tabindex="-1" aria-labelledby="booking" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="h2 font-green bold" style="width: 100%;">Бронирование</h2>
                    <form class="form-booking">
                        <div class="input-group">
                            <div class="house-position">
                                <div class="house-desc">
                                    <img src="image/house.svg" class="form-house-img">
                                    <h3 class="h3 font-gray light">Красный домик</h3>
                                </div>

                                <input type="text" placeholder="Кол. человек">
                            </div>
                            <div class="house-position" style="justify-content: center" data-bs-toggle="collapse" data-bs-target="#multiCollapse" aria-expanded="false" aria-controls="multiCollapse">
                                <svg width="25" height="26" viewBox="0 0 25 26" fill="none">
                                    <path d="M11.6709 24.1396V1.00008" stroke="#6B9F52" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M23.9531 12.5693L1.00055 12.6594" stroke="#6B9F52" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class="row" style="width: 50%" >
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapse">
                                        <div class="card card-body house-position">
                                            <div class="col" >
                                                <div class="house-position house-choice mb-3" id="house1">
                                                    <div class="house-desc">
                                                        <img src="image/house.svg" class="form-house-img">
                                                        <h3 class="h3 font-gray light">Красный домик</h3>
                                                    </div>
                                                </div>
                                                <div class="house-position house-choice mb-3" id="house2">
                                                    <div class="house-desc">
                                                        <img src="image/house.svg" class="form-house-img">
                                                        <h3 class="h3 font-gray light">Красный домик</h3>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h3 font-green font-uppercace bold">Дополнительные услуги</h3>
                        <div class="services-group">
                            <div class="service-position">
                                <img alt="Услуга" class="form-service-img" src="image/service_2.svg">
                                <p style="text-align: center" class="p font-gray light">Прокат лыж</p>
                                <input type="text" placeholder="Кол-во">
                            </div>
                            <div class="service-position" data-bs-toggle="collapse" data-bs-target="#multiCollapse2" aria-expanded="false" aria-controls="multiCollapse2">
                                <svg width="25" height="26" viewBox="0 0 25 26" fill="none">
                                    <path d="M11.6709 24.1396V1.00008" stroke="#6B9F52" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M23.9531 12.5693L1.00055 12.6594" stroke="#6B9F52" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="row" style="width: 25%" >
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapse2">
                                    <div class="card card-body house-position">
                                        <div class="col" >
                                            <div class="service-position service-choice mb-3" id="service1">
                                                <img alt="Услуга" class="form-service-img" src="image/service_2.svg">
                                                <p style="text-align: center" class="p font-gray light">Прокат лыж</p>
                                            </div>
                                            <div class="service-position service-choice mb-3" id="service2">
                                                <img alt="Услуга" class="form-service-img" src="image/service_2.svg">
                                                <p style="text-align: center" class="p font-gray light">Прокат плюшек</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="date-group">
                            <div class="mb-3">
                                <label for="dateStart" class="p font-gray light">Дата заезда</label>
                                <input class="form-control" type="date" placeholder="Дата заезда" id="dateStart">
                            </div>
                            <div class="mb-3">
                                <label for="dateEnd" class="p font-gray light">Дата выезда</label>
                                <input class="form-control" type="date" placeholder="Даты выезда" id="dateEnd">
                            </div>

                        </div>
                        <div class="mb-2">
                            <h3 class="h3 font-green bold font-uppercace">Сумма:</h3>
                            <h3 class="h3 font-green light font-uppercace">5467 ₽</h3>
                        </div>


                        <button type="submit" class="button modal-btn font-uppercace">Забронировать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="houses">
        <div class="houses-block">
            <h1 class="h font-green bold">Домики</h1>
            <div class="houses-body">
                <button class="slide-button" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <img class="arrow-prev" src="image/icons/arrow_prev.svg">
                </button>

                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item active">
                                <div class="house-card">
                                    <div class="house-card-column">
                                        <div class="house-card-row">
                                            <?php $__currentLoopData = $house->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img class="house-card-main-img" id="1" alt="Красный домик" src="<?php echo e(asset('storage/'.$images->img)); ?>">
                                                <?php break; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="house-card-row">
                                            <?php $__currentLoopData = $house->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($index<1): ?>
                                                    <?php continue; ?>
                                                <?php endif; ?>
                                            <img class="house-card-img" src="<?php echo e(asset('storage/'.$images->img)); ?>">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="house-card-second-column">
                                        <div class="house-card-mini-column">
                                            <h2 class="h2 bold font-black"><?php echo e($house->name); ?></h2>
                                            <p class="p font-green bold font-uppercace"><?php echo e($house->price_weekdays_day); ?>-<?php echo e($house->price_weekend_night); ?> ₽/чел</p>
                                        </div>
                                        <div class="house-card-mini-column">
                                            <p class="p font-gray bold">Описание</p>
                                            <div data-mdb-input-init class="form-outline w-100">
                                                <textarea style="resize: none" class="form-control p font-gray light"  rows="8"><?php echo e($house->description); ?>

                                                Стоимость на выходные и праздники (Пт, сб, вс):
                                                    <?php echo e($house->price_weekend_day); ?>руб/чел. на дневное пребывание.
                                                    <?php echo e($house->price_weekend_night); ?>руб/чел. на сутки.
                                                    Стоимость на будни (пн, вт, ср, чт):
                                                <?php echo e($house->price_weekdays_day); ?>руб/чел. на дневное пребывание.
                                                <?php echo e($house->price_weekdays_night); ?>руб/чел. на сутки.
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="house-card-mini-column">
                                            <p class="p font-gray light">Вместительность домика: <?php echo e($house->min_size); ?> -
                                                <?php echo e($house->max_size); ?> человек</p>
                                        </div>
                                        <div class="house-card-mini-column">
                                            <button class="button house-btn bold font-gray" onclick="window.location.href = '<?php echo e(route('booking.create',$house)); ?>'">Забронировать</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($index<1): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                    <div class="carousel-item">
                        <div class="house-card">
                            <div class="house-card-column">
                                <div class="house-card-row">
                                    <?php $__currentLoopData = $house->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img class="house-card-main-img" id="1" alt="Красный домик" src="<?php echo e(asset('storage/'.$images->img)); ?>">
                                        <?php break; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="house-card-row">
                                    <?php $__currentLoopData = $house->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number => $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($number <1 ): ?>
                                            <?php continue; ?>
                                        <?php endif; ?>
                                    <img class="house-card-img" src="<?php echo e(asset('storage/'.$images->img)); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="house-card-second-column">
                                <div class="house-card-mini-column">
                                    <h2 class="h2 bold font-black"><?php echo e($house->name); ?></h2>
                                    <p class="p font-green bold font-uppercace"><?php echo e($house->price_weekdays_day); ?>-<?php echo e($house->price_weekend_night); ?> ₽/чел</p>
                                </div>
                                <div class="house-card-mini-column">
                                    <p class="p font-gray bold">Описание</p>
                                    <div data-mdb-input-init class="form-outline w-100">
                                         <textarea style="resize: none" class="form-control p font-gray light"  rows="8"><?php echo e($house->description); ?>

                                                Стоимость на выходные и праздники (Пт, сб, вс):
                                                    <?php echo e($house->price_weekend_day); ?>руб/чел. на дневное пребывание.
                                                    <?php echo e($house->price_weekend_night); ?>руб/чел. на сутки.
                                                    Стоимость на будни (пн, вт, ср, чт):
                                                <?php echo e($house->price_weekdays_day); ?>руб/чел. на дневное пребывание.
                                                <?php echo e($house->price_weekdays_night); ?>руб/чел. на сутки.
                                                </textarea>
                                    </div>
                                </div>
                                <div class="house-card-mini-column">
                                    <p class="p font-gray light">Вместительность домика: <?php echo e($house->min_size); ?> -
                                        <?php echo e($house->max_size); ?> человек</p>
                                </div>
                                <div class="house-card-mini-column">
                                    <button class="button house-btn bold font-gray" onclick="window.location.href = '<?php echo e(route('booking.create',$house)); ?>'">Забронировать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                </div>
                <button class="slide-button" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <img class="arrow-next" src="image/icons/arrow_prev.svg">
                </button>
                </div>

                    </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/houses.js')); ?>"
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/houses.blade.php ENDPATH**/ ?>