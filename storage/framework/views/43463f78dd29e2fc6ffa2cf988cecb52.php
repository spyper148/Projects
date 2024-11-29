<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="<?php echo e(asset('storage/css/admin.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        <?php echo $__env->yieldContent('style'); ?>
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column  align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="<?php echo e(route('index')); ?>" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="width: 100%; justify-content: center">
                    <img src="<?php echo e(asset('storage/img/KrupskayaLogo-Bold.svg')); ?>" style="height: 150px;width: 150px">
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">

                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Заказы</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('houses.index')); ?>" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Домики</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('services.index')); ?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Услуги</span></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('comments.index')); ?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Отзывы</span></a>
                    </li>
                </ul>
                <hr>

            </div>
        </div>
        <div class="col py-3">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
</body>

<?php /**PATH /var/www/html/resources/views/admin/main.blade.php ENDPATH**/ ?>