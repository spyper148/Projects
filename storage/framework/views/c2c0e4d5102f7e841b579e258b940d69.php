<?php $__env->startSection('content'); ?>

    <div class="container-sm" style="width: 80%">
        <h1>Добавить размещение</h1>
        <form action="<?php echo e(route('houses.store')); ?>" method="post" enctype="multipart/form-data" style="padding-top: 20px">
            <?php echo csrf_field(); ?>
            <div class="mb-3" style="width: 30%" >
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3" style="width: 65%">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <div class="row align-items-start" style="width: 25%">
                    <h4>Количесество мест</h4>
                    <div class="col">
                        <label for="min_size" class="form-label">Мин.</label>
                        <input name="min_size" type="text" class="form-control" id="min_size">
                    </div>
                    <div class="col">
                        <label for="max_size" class="form-label">Макс.</label>
                        <input name="max_size" type="text" class="form-control" id="max_size">
                    </div>

                </div>
            </div>
            <div class="mb-3">
                <div class="row align-items-start" style="width: 40%">
                    <h4>Цена в будни</h4>
                    <div class="col">
                        <label for="price_weekdays_day" class="form-label">Дневное пребывание</label>
                        <input name="price_weekdays_day" type="text" class="form-control" id="price_weekdays_day">
                    </div>
                    <div class="col">
                        <label for="price_weekdays_night" class="form-label">Ночь</label>
                        <input name="price_weekdays_night" type="text" class="form-control" id="price_weekdays_night">
                    </div>
               </div>
            </div>
            <div class="mb-3">
                <div class="row align-items-start" style="width: 40%">
                    <h4>Цена в выходные</h4>
                    <div class="col">
                        <label for="price_weekend_day" class="form-label">Дневное пребывание</label>
                        <input name="price_weekend_day" type="text" class="form-control" id="price_weekend_day">
                    </div>
                    <div class="col">
                        <label for="price_weekend_night" class="form-label">Ночь</label>
                        <input name="price_weekend_night" type="text" class="form-control" id="price_weekend_night">
                    </div>
                </div>
            </div>
            <div class="mb-3" style="width: 30%">
                <label for="image" class="form-label">Изображения</label>
                <input class="form-control" type="file" id="image" name="image[]" multiple>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-lg" >Добавить</button>
            </div>


        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/houses/create.blade.php ENDPATH**/ ?>