<?php $__env->startSection('content'); ?>
<div class="container mt-2">

    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <form action="<?php echo e(url('groups/'.$group->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="name" class="control-label">Группа</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($group->name); ?>">
                        </div>

                        <div class="form-group mb-0">
                            <div class="w-100">
                                <a href="<?php echo e(url('groups')); ?>" class="btn btn-light">Назад</a>
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>