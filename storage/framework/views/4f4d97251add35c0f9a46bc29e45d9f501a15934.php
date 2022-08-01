<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    
                    <i class="fas fa-angellist"></i>
                </div>
                <div>Permission</div>
            </div>
            <div class="page-title-actions">
                <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-create')): ?>
                <a href="<?php echo e(route('app.permissions.create')); ?>" class="btn-shadow mr-3 btn btn-primary" name="button">
                    <i class="fas fa-plus-circle"></i>&nbsp;Create Permission
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Module</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center text-muted"><?php echo e($loop->index+1); ?></td>
                        <td class="text-center"><?php echo e($item->name); ?></td>
                        <td class="text-center">

                            <span class="badge badge-info"><?php echo e($item->module->name); ?></span>
                        </td>
                        <td class="text-center"><?php echo e($item->created_at->diffForHumans()); ?></td>
                        <td class="text-center">
                            <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-update')): ?>
                            <a href="<?php echo e(route('app.permissions.edit', $item->id)); ?>" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a>
                            <?php endif; ?>

                            <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-delete')): ?>
                            <button onclick="deleteData(<?php echo e($item->id); ?>)" type="button" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></button>
                            <form id="delete-<?php echo e($item->id); ?>" method="POST"
                                  action="<?php echo e(route('app.permissions.destroy', $item->id)); ?>" style="display:none;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\QuickAdmin\resources\views/backend/permissions/index.blade.php ENDPATH**/ ?>