<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-user icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Users</div>
            </div>
            <div class="page-title-actions">
                <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'user-create')): ?>
                <a href="<?php echo e(route('app.users.create')); ?>" class="btn-shadow mr-3 btn btn-primary" name="button">
                    <i class="fas fa-plus-circle"></i>&nbsp;Create User
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
                    <th>Name(English)</th>
                    <th class="text-center">Name(Bangle)</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center text-muted"><?php echo e($loop->index+1); ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <div class="widget-content-left">
                                            <img width="40" class="rounded-circle"
                                                 src="<?php if($item->image): ?><?php echo e(asset('storage/user/'. $item->image)); ?> <?php else: ?><?php echo e(config('app.placeholder').'160.png'); ?><?php endif; ?>">
                                        </div>
                                    </div>
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading"><?php echo e($item->name); ?></div>
                                        <div class="widget-subheading opacity-7">
                                            <?php if($item->role): ?>
                                                <span class="badge badge-info"><?php echo e($item->role->name); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">No Role Found</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?php echo e($item->name_bn); ?></td>
                        <td class="text-center">
                            <?php echo e($item->email); ?>

                        </td>
                        <td class="text-center">
                            <?php if($item->status == true): ?>
                                <span class="badge badge-info">Active</span>
                            <?php else: ?>
                                <span class="badge badge-warning">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center"><?php echo e($item->created_at->diffForHumans()); ?></td>
                        <td class="text-center">
                            <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'user-update')): ?>
                            <a href="<?php echo e(route('app.users.edit', $item->id)); ?>" class="btn btn-primary"><i
                                    class="fas fa-edit"></i></a>
                            <?php endif; ?>

                            <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'user-delete')): ?>
                            <button onclick="deleteData(<?php echo e($item->id); ?>)" type="button" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></button>
                            <form id="delete-<?php echo e($item->id); ?>" method="POST"
                                  action="<?php echo e(route('app.users.destroy', $item->id)); ?>" style="display:none;">
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

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/php/QuickAdmin/resources/views/backend/users/index.blade.php ENDPATH**/ ?>