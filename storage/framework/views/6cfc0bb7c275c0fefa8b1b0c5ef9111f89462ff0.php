<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cloud icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Backups</div>
            </div>
            <div class="page-title-actions">
                <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'backup-delete')): ?>
                <button type="button" onclick="event.preventDefault(); document.getElementById('cleanBackup').submit();"
                        class="btn-shadow mr-3 btn btn-warning" name="button">
                    <i class="fas fa-trash"></i>&nbsp;Clean old Backup
                </button>
                <form id="cleanBackup" action="<?php echo e(route('app.backups.clean')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                </form>
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'backup-create')): ?>
                <button type="button"
                        onclick="event.preventDefault(); document.getElementById('createBackup').submit();"
                        class="btn-shadow mr-3 btn btn-primary" name="button">
                    <i class="fas fa-plus-circle"></i>&nbsp;Create Backup
                </button>
                <form id="createBackup" action="<?php echo e(route('app.backups.store')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
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
                    <th class="text-center">File Name</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $backups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$backup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center text-muted"><?php echo e($loop->index+1); ?></td>
                        <td class="text-center"><code><?php echo e($backup['file_name']); ?></code></td>
                        <td class="text-center"><?php echo e($backup['file_size']); ?></td>

                        <td class="text-center"><?php echo e($backup['created_at']); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('app.backups.download', $backup['file_name'])); ?>"
                               class="btn btn-primary"><i class="fas fa-download"></i><span>Download</span></a>

                            <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'backup-delete')): ?>
                            <button onclick="deleteData(<?php echo e($key); ?>)" type="button" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></button>
                            <form id="delete-<?php echo e($key); ?>" method="POST"
                                  action="<?php echo e(route('app.backups.destroy', $backup['file_name'])); ?>"
                                  style="display:none;">
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

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/php/QuickAdmin/resources/views/backend/backups/index.blade.php ENDPATH**/ ?>