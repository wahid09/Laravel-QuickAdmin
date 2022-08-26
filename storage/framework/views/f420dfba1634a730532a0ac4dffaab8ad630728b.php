<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit"></i>
                </div>
                <div>General Settings</div>
            </div>
            <div class="page-title-actions">
                <a href="<?php echo e(route('app.dashboard')); ?>" class="btn-shadow mr-3 btn btn-warning" name="button">
                    <i class="fas fa-arrow-left"></i>&nbsp;Back to dashboard
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="main-card mb-3 card">

                <div class="card-body">
                    <div class="list-group">
                        <a href="<?php echo e(route('app.settings.general')); ?>" class="list-group-item list-group-item-action">General</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">How To Use</h5>
                        <p>You can get the value of this setting anywhere on your site by calling <code>setting('key')</code></p>
                    </div>
                </div>
            <form action="<?php echo e(route('app.settings.general.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="main-card mb-3 card">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Site Title</label>
                            <input id="site_title" type="text"
                                   class="form-control <?php $__errorArgs = ['site_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_title"
                                   value="<?php echo e(setting('site_title') ?? old('site_title')); ?>" required>

                            <?php $__errorArgs = ['site_title'];
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
                            <label for="name">Site Description</label>
                            <textarea name="site_description" class="form-control <?php $__errorArgs = ['site_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(setting('site_description') ?? old('site_description')); ?></textarea>

                            <?php $__errorArgs = ['site_description'];
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
                            <label for="name">Site Address</label>
                            <textarea name="site_address" class="form-control <?php $__errorArgs = ['site_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(setting('site_address') ?? old('site_address')); ?></textarea>

                            <?php $__errorArgs = ['site_address'];
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
                                <i class="fas fa-arrow-circle-up"></i>&nbsp;Update
                        </button>
                    </div>

                </div>
                
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function () {
            $('.roleSelect').select2();
        });
        $('.dropify').dropify();
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/php/QuickAdmin/resources/views/backend/setting/form.blade.php ENDPATH**/ ?>