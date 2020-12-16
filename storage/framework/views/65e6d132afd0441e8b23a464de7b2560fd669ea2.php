<?php $__env->startSection('content'); ?>
<div class="container mt-2">

    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <form action="<?php echo e(url('task/'.$task->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="name" class="control-label">Задача</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($task->name); ?>">
                        </div>

                        <div class="form-group">
                            <label for="status" class="control-label">Статус задачи</label>
                            <select class="form-control custom-select" name="status" id="status">
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status->id); ?>"
                                <?php if($status->id == $task->status['id']): ?> selected='select'
                                <?php endif; ?> >
                                <?php echo e($status->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group mb-0">
                            <div class="w-100">
                                <a href="<?php echo e(url('/')); ?>" class="btn btn-light">Назад</a>
                                <button type="submit" class="btn btn-success">Сохранить задачу</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <span class="float-left">Группы исполнителей</span>
                    <span class="float-right">
                        <button class="btn btn-sm btn-dark" data-toogle="modal" data-target="#addModal">Добавить</button>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($group->name); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>