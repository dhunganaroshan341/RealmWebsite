<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Web APP | Admin Panel</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/plugins/fontawesome-free/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/css/adminlte.min.css?v=3.2.0')); ?>">
       
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            
            

            <?php if(Session::has('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(Session::get('error')); ?>

            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="<?php echo e(route('admin.auth')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>                            
                        </div>

                        <?php if($errors->has('email')): ?>
                        <p class="help-block"><?php echo e($errors->first('email')); ?></p>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <?php if($errors->has('password')): ?>
                        <p class="help-block"><?php echo e($errors->first('password')); ?></p>
                        <?php endif; ?>

                        <div class="row">
                            
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <script src="<?php echo e(asset('admin_assets/assets/plugins/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admin_assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admin_assets/assets/js/adminlte.min.js?v=3.2.0')); ?>"></script>
    </body>
</html><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/login.blade.php ENDPATH**/ ?>