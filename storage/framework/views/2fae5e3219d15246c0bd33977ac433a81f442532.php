<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset("images/logo.png")); ?>">
    <title>OpenDigital - <?php echo e($post->title); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/sass/app.scss"]); ?>
</head>
<body>
    <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="" style="">
            
            <a href="#" class="flex mt-3 h-20 border-b flex"> 
                <img class="rounded-full object-cover h-16 w-16" src="/images/profile_pictures/<?php echo e($post->user->profile_picture); ?>" alt="">
                <h2 class="mt-4 ml-2"><?php echo e($post->user->username); ?></h2>
            </a>
            <h1 class="text-2xl"><?php echo e($post->title); ?></h1>
            <p><?php echo e($post->description); ?></p>
           
            <?php if(in_array($post->file_ext, [".jpg",".jpeg",".png"])): ?>
                <img src="/content/<?php echo e($post->id . $post->file_ext); ?>" alt="<?php echo e($post->title); ?>">
            <?php elseif(in_array($post->file_ext, [".mp3",".wav",".ogg"])): ?>
                <audio controls>
                    <source src="/content/<?php echo e($post->id . $post->file_ext); ?>" type="audio/mpeg">
                </audio>
            <?php elseif(in_array($post->file_ext, [".mp4"])): ?>
                <video controls>
                    <source src="/content/<?php echo e($post->id . $post->file_ext); ?>" type="video/mp4">
                </video>
            <?php elseif(in_array($post->file_ext, [".pdf"])): ?>
                <a class="underline" href="/content/<?php echo e($post->id . $post->file_ext); ?>">Open PDF in new tab</a>
                <iframe class="" style="height:100%;width:100%;" src="/content/<?php echo e($post->id . $post->file_ext); ?>">
                </iframe>
            <?php else: ?>
                
            <?php endif; ?>
            <small>Posted at: <?php echo e($post->created_at); ?></small>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\ahmed\Desktop\Uni\1st Year\Semester2\Project\website\OpenDigital\resources\views/posts/show.blade.php ENDPATH**/ ?>