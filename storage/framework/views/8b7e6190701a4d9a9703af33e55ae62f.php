<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Отзывы</h1>
        <section class="block-position">
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <h5 class="card-header"><<?php echo e($comment->created_at); ?>></h5>
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col" style="max-width: 25%; padding-top: 20px; padding-bottom: 20px">

                                <?php if(!$comment->user->avatar): ?>
                                    <img class="profile-img">
                                <?php else: ?>
                                    <img class="profile-img" src="<?php echo e(asset($comment->user->avatar)); ?>">
                                <?php endif; ?>
                                <h5  class="card-title"><?php echo e($comment->user->name); ?> <?php echo e($comment->user->surname); ?></h5>
                            </div>
                            <div class="col">
                                <p class="card-text"><?php echo e($comment->text); ?></p>
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="col" style="max-width: 25%">

                            </div>
                            <div class="col" >
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($image->comment_id == $comment->id): ?>
                                        <img style="width: 10%; height: 10%"  src="<?php echo e(asset('storage/'.$image->img)); ?>">
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <form action="<?php echo e(route('comments.destroy',$comment)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn btn-danger">Удалить</button>
                        </form>

                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/comments/index.blade.php ENDPATH**/ ?>