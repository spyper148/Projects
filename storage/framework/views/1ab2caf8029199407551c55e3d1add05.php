 <?php $__env->startSection('content'); ?>
     <div class="container">
         <h1>Домики</h1>
         <a class="btn btn-primary" href="<?php echo e(route('houses.create')); ?>">Добавить</a>
         <section class="block-position">
             <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="position">
                     <div class="position-columns">
                         <div class="position-column">
                             <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($image->house_id == $house->id): ?>
                                     <img src="<?php echo e(asset('storage/'.$image->img)); ?>">
                                     <?php break; ?>;
                                 <?php endif; ?>

                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                     </div>
                     <div class="position-columns">
                         <div class="position-column">
                             <h3><?php echo e($house->name); ?></h3>
                             <p><?php echo e($house->description); ?></p>

                         </div>
                         <div class="position-column">
                             <article>
                                 <h5>Вместимость</h5>
                                 <p>Мин:<?php echo e($house->min_size); ?> чел</p>
                                 <p>Макс:<?php echo e($house->max_size); ?> чел</p>
                             </article>
                         </div>
                         <div class="position-column">
                             <article>
                                 <h5>Дневное пребывание</h5>
                                 <p>Будни:<?php echo e($house->price_weekdays_day); ?>₽</p>
                                 <p>Выходные:<?php echo e($house->price_weekdays_night); ?>₽</p>
                             </article>
                             <article>
                                 <h5>На ночь</h5>
                                 <p>Будни:<?php echo e($house->price_weekend_day); ?>₽</p>
                                 <p>Выходные:<?php echo e($house->price_weekend_night); ?>₽</p>
                             </article>
                         </div>
                     </div>

                     <div class="position-columns">
                         <div class="position-column">
                             <a href="<?php echo e(route('houses.edit',$house)); ?>" style="width: 100px" class="btn btn-primary">Изменить</a>
                             <a href="<?php echo e(route('houseImage.edit',$house)); ?>" style="width: 100px" class="btn btn-primary">Изменить изображения</a>
                             <form action="<?php echo e(route('houses.destroy', $house)); ?>" method="post">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('delete'); ?>
                                 <button style="width: 100px" class="btn btn-primary">Удалить</button>
                             </form>
                         </div>
                     </div>
                 </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </section>
     </div>



 <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/houses/index.blade.php ENDPATH**/ ?>