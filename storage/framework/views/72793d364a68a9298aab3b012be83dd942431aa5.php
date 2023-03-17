<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo e(asset("images/logo.png")); ?>">
	<title>OpenDigital - Login</title>
	<link rel="stylesheet" href="login.scss">
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/js/app.js", "resources/js/login.js", "resources/sass/app.scss", "resources/sass/login.scss"]); ?>

	
</head>

<main>	

<?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-body">
				<form action="<?php echo e(route('sample.validate_login')); ?>" method="post">
					<?php echo csrf_field(); ?>
					<div class="form-group mb-3">
						<input type="text" name="username" class="form-control" placeholder="Username" />
						<?php if($errors->has('username')): ?>
							<span class="text-danger"><?php echo e($errors->first('username')); ?></span>
						<?php endif; ?>
					</div>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" />
						<?php if($errors->has('password')): ?>
							<span class="text-danger"><?php echo e($errors->first('password')); ?></span>
						<?php endif; ?>
					</div>
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block auth-button">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


</main><?php /**PATH C:\Users\ahmed\Desktop\Uni\1st Year\Semester2\Project\website\OpenDigital\resources\views/login.blade.php ENDPATH**/ ?>