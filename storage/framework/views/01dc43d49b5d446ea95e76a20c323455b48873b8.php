<?php $__env->startSection('content'); ?>
<div class="container mt-2">

    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <form action="<?php echo e(url('/groups')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="name" class="control-label">Группа</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group mb-0">
                            <div class="w-100">
                                <button type="submit" class="btn btn-primary">Добавить группу</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-header">Группы</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(url('groups/'.$group->id)); ?>">
                                    <?php echo e($group->name); ?>

                                </a>
                            </td>
                            <td>
                                <form id="groupform-<?php echo e($group->id); ?>" action="<?php echo e(url('groups/'.$group->id)); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="button" onclick="clickDelButton(event, 'groupform-<?php echo e($group->id); ?>')" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <?php echo e($groups->links('vendor.pagination.bootstrap-4')); ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>