<?php $__env->startSection('style'); ?>
    form {
    display:flex;
    flex-direction:column;
    justify-content:center;
    gap:10px;
    width:16rem;
    }

    .input-file {
    position: relative;
    display: inline-block;
    }
    .input-file span {
    position: relative;
    display: inline-block;
    cursor: pointer;
    outline: none;
    text-decoration: none;
    font-size: 1rem;
    vertical-align: middle;
    color: rgb(255 255 255);
    text-align: center;
    border-radius: 4px;
    background-color: #0d6efd;
    line-height: 22px;
    height: 40px;
    padding: 10px 20px;
    box-sizing: border-box;
    border: none;
    margin: 0;
    transition: background-color 0.2s;
    }
    .input-file input[type=file] {
    position: absolute;
    z-index: -1;
    opacity: 0;
    display: block;
    width: 0;
    height: 0;
    }

    /* Focus */
    .input-file input[type=file]:focus + span {
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }

    /* Hover/active */
    .input-file:hover span {
    background-color: #0b5ed7;
    }
    .input-file:active span {
    background-color: #0b5ed7;
    }

    /* Disabled */
    .input-file input[type=file]:disabled + span {
    background-color: #0d6efd;
    }

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container-sm" style="width: 80%">
        <h1>Изменить изображения</h1>
        <div class="container img-container">
            <div class="row align-items-start">
            <form action="<?php echo e(route('houseImage.store',$house)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('post'); ?>

                    <div class="col"><label class="input-file">
                            <input type="file" name="image">
                            <span>Выбрать изображение</span>
                        </label></div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
            </form>
            </div>
            <div style="display: flex; flex-direction: row">

                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col" style="display:flex;flex-direction: row;gap: 10px;margin-top: 10px;margin-bottom: 10px">
                        <div class="card" style="width: 18rem; align-items: center ">
                            <div class="card-body" style="display: flex; flex-direction: column; gap: 20px" >
                    <form action="<?php echo e(route('houseImage.update',[$image,$house])); ?>" method="post" enctype="multipart/form-data" style="padding-top: 10px">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                                <img src="<?php echo e(asset('storage/'.$image->img)); ?>" alt="">
                                <input name="picture" type="file"  class="btn btn-primary">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                                <form action="<?php echo e(route('houseImage.destroy',[$image,$house])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit" class="btn btn-primary">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="btn btn-primary" href="<?php echo e(route('houses.index')); ?>">Назад</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/houses/images/edit.blade.php ENDPATH**/ ?>