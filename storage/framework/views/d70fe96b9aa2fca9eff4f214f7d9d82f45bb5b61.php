<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-check icon-gradient bg-mean-fruit"></i>
                </div>
                <div><?php echo e(isset($role) ? 'Edit' : 'Create'); ?> Role</div>
            </div>
            <div class="page-title-actions">
                <a href="<?php echo e(route('app.roles.index')); ?>" class="btn-shadow mr-3 btn btn-warning" name="button">
                    <i class="fas fa-arrow-left"></i>&nbsp;Back to list
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <form action="<?php echo e(isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store')); ?>"
                      method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($role)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title">Manage Roles</h5>
                        <div class="form-group">
                            <label for="name">Name(English)</label>
                            <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="name" value="<?php echo e($role->name ?? old('name')); ?>" required autocomplete="name"
                                   autofocus>

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                        </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="name_bn">Name(Bangla)</label>
                            <input id="name_bn" type="text" class="form-control <?php $__errorArgs = ['name_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="name_bn" value="<?php echo e($role->name_bn ?? old('name_bn')); ?>" required
                                   autocomplete="name_bn" autofocus>

                            <?php $__errorArgs = ['name_bn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                        </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="text-center">
                            <strong>Manage Permission For Role</strong>
                            <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="p-2">
                        <span class="text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                        </span>
                            </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select-all">
                                <label class="custom-control-label" for="select-all">Select All</label>
                            </div>
                        </div>
                        <?php $__empty_1 = true; $__currentLoopData = $modules->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$chunks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="form-row">
                                <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <h5>Module: <?php echo e($module->name); ?></h5>
                                        <?php $__currentLoopData = $module->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="mb-3 ml-4">
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="permission-<?php echo e($permission->id); ?>" name="permissions[]"
                                                           value="<?php echo e($permission->id); ?>" <?php if(isset($role)): ?>
                                                        <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignedPermission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($permission->id == $assignedPermission->id ? 'checked' : ''); ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>>
                                                    <label for="permission-<?php echo e($permission->id); ?>"
                                                           class="custom-control-label"><?php echo e($permission->name); ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="row">
                                <div class="col text-center">
                                    <strong>No Module Found</strong>
                                </div>
                            </div>
                        <?php endif; ?>

                        <button type="submit" class="btn btn-primary">
                            <?php if(isset($role)): ?>
                                <i class="fas fa-arrow-circle-up"></i>&nbsp;Update
                        </button>
                        <?php else: ?>
                            <i class="fas fa-plus-circle"></i>&nbsp;Create</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

    <script>
        $('#select-all').click(function (event) {
            if (this.checked) {
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }

        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\QuickAdmin\resources\views/backend/roles/form.blade.php ENDPATH**/ ?>