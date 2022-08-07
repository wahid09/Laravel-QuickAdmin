<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-check icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Logs</div>
            </div>

            <div class="page-title-actions">





            </div>

        </div>
    </div>


    <div class="main-card mb-3 card">

        <div class="card-body">
            <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">URL</th>
                    <th class="text-center">Methods</th>
                    <th class="text-center">IP</th>
                    <th class="text-center">User</th>
                    <th class="text-center">User Agent</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center text-muted"><?php echo e($loop->index+1); ?></td>
                        <td class="text-center"><?php echo e($item->subject); ?></td>
                        <td class="text-center">

                            <span class="badge badge-info"><?php echo e($item->url); ?></span>
                        </td>
                        <td class="text-center"><?php echo e($item->method); ?></td>
                        <td class="text-center"><?php echo e($item->ip); ?></td>
                        <td class="text-center"><?php echo e($item->user_id); ?></td>
                        <td class="text-center"><?php echo e($item->agent); ?></td>

                        <td class="text-center">
                            <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'log-delete')): ?>
                            <button onclick="deleteData(<?php echo e($item->id); ?>)" type="button" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></button>
                            <form id="delete-<?php echo e($item->id); ?>" method="POST"
                                  action="<?php echo e(route('app.log_delete', $item->id)); ?>" style="display:none;">
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

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\QuickAdmin\resources\views/backend/logs/index.blade.php ENDPATH**/ ?>