<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/comments.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Отзывы
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="comments">
        <div class="comments-block">
            <h1 class="h font-green bold">Отзывы</h1>
            <button onclick="window.location.href = '<?php echo e(route('comments.create')); ?>'" class="button comment-btn font-uppercace" data-bs-toggle="modal" data-bs-target="#comment">Оставить отзыв</button>
            <div class="comments-body">
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="comment">
                        <div class="profile">
                            <div class="circle">
                                <?php if(!$comment->user->avatar): ?>
                                    <img class="profile-img" src="">
                                <?php else: ?>
                                    <img class="profile-img" src="<?php echo e(asset($comment->user->avatar)); ?>">
                                <?php endif; ?>
                            </div>
                            <h3 class="p font-black light"><?php echo e($comment->user->surname); ?> <?php echo e($comment->user->name); ?></h3>
                        </div>
                        <div class="comment-body">
                            <p class="p font-gray light"><?php echo e($comment->text); ?></p>
                            <div class="comment-images">
                                <!-- Image Zoom HTML -->
                                <?php $__currentLoopData = $comment->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img class="comment-image" id="myImg<?php echo e($image->id); ?>" src="<?php echo e(asset('storage/'.$image->img)); ?>" >
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <p class="p font-gray light"><?php echo e($comment->created_at->format('d.m.Y')); ?></p>
                        </div>



                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/header.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/comment.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/comments.blade.php ENDPATH**/ ?>