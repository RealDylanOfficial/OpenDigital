
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>How To Install React in Laravel 9 with Vite</title>

    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/js/app.js", "resources/sass/app.scss"]); ?>

	
</head>
<body>
	<?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
    <?php echo e($testHead); ?>

	<div id="root"></div>
	<img src="<?php echo e(asset('images/Blue_tit_three-quarter_close-up.jpg')); ?>" alt="" style="height: 200px; width:auto">
	<h1 class="text-3xl font-bold underline">test</h1>

</body>
</html>
<?php /**PATH C:\Users\ahmed\Desktop\Uni\1st Year\Semester2\Project\website\OpenDigital\resources\views/test.blade.php ENDPATH**/ ?>