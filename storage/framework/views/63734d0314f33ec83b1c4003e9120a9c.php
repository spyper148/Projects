<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/comments.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Оставить отзыв
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="comments">
        <div class="comments-block">
            <h1 class="h font-green bold">Оставить отзыв</h1>
            <div class="comments-body">
                    <form class="form-comment" action="<?php echo e(route('comments.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="text" class="form-label p font-gray light">Описание</label>
                            <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label p font-gray light">Вставить фотографии</label>
                            <input class="form-control" id="image" name="image[]" type="file" multiple>
                        </div>
                        <div class="mb-3">
                            <button class="button comment-btn font-uppercace" type="submit">Отправить</button>
                        </div>
                    </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/houses.js')); ?>"
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/comment.blade.php ENDPATH**/ ?>