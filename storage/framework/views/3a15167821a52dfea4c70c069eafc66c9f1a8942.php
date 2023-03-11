<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="<?php echo e(asset("images/logo.png")); ?>">
    <title> OpenDigital - Home</title>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/js/app.js", "resources/sass/app.scss"]); ?>
</head>
<body>
<?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

home<?php /**PATH C:\Users\ahmed\Desktop\Uni\1st Year\Semester2\Project\website\OpenDigital\resources\views/home.blade.php ENDPATH**/ ?>