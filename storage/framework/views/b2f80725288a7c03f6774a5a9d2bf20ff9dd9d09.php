<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
     <div class="page-title-heading">
        <div class="page-title-icon">
        <i class="pe-7s-check icon-gradient bg-mean-fruit"></i>
        </div>
    <div><?php echo e(isset($module) ? 'Edit' : 'Create'); ?> Module</div>
     </div>
     <div class="page-title-actions">
        <a href="<?php echo e(route('app.modules.index')); ?>" class="btn-shadow mr-3 btn btn-warning" name="button">
         <i class="fas fa-arrow-left"></i>&nbsp;Back to list
        </a>
     </div>
    </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(isset($module) ? route('app.modules.update', $module->id) : route('app.modules.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if(isset($module)): ?>
                 <?php echo method_field('PUT'); ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">

                            <div class="card-body">
                                <h5 class="card-title">Manage Module</h5>

                                <div class="form-group">
                                    <label for="name">Name(English)</label>
                                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($module->name ?? old('name')); ?>" required autocomplete="name" autofocus>

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
unset($__errorArgs, $__bag); ?>" name="name_bn" value="<?php echo e($module->name_bn ?? old('name_bn')); ?>" required autocomplete="name_bn" autofocus>

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

                                <button type="submit" class="btn btn-primary">
                                <?php if(isset($module)): ?>
                                <i class="fas fa-arrow-circle-up"></i>&nbsp;Update</button>
                                <?php else: ?>
                                <i class="fas fa-plus-circle"></i>&nbsp;Create</button>
                                <?php endif; ?>


                            </div>

                        </div>
                    </div>

                </div>
           </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\QuickAdmin\resources\views/backend/modules/form.blade.php ENDPATH**/ ?>