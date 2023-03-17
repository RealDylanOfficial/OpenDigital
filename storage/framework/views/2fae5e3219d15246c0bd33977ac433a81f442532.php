<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <meta name="_postID" content="<?php echo e($post->id); ?>">
    <meta name="_postExt" content="<?php echo e($post->file_ext); ?>">
    <meta name="_postTitle" content="<?php echo e($post->title); ?>">
    <link rel="icon" href="<?php echo e(asset("images/logo.png")); ?>">
    <title>OpenDigital - <?php echo e($post->title); ?></title>
   
    <!-- having to import boostrap, couldn't get it working -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/sass/app.scss", "resources/js/showPosts.ts"]); ?>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/sass/showPosts.scss"]); ?>

</head>
<body>
    <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- having to import boostrap, couldn't get it working -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container">
        <div class="" style="">
            
            <a href="/profile/<?php echo e($post->user->id); ?>" class="flex h-20 border-b">
                <img class="rounded-full object-cover h-16 w-16"
                src="<?php echo e(url('images/profile_pictures/'.$post->user->id.'.'.$post->user->pfp_file_extension)); ?>" onerror="this.onerror=null; this.src='/images/profile_pictures/default.jpg'" alt="">
                <h2 class="mt-4 ml-2"><?php echo e($post->user->username); ?></h2>
            </a>

            <!-- <form method="POST" action="<?php echo e(route('flagPost', $post->id)); ?>">
                <?php echo csrf_field(); ?>
            <button type="submit">
                Flag
            </button>    
            </form> -->

             

            
            <button id="download-btn">Download</button>

           
            




            <!-- Button trigger modal -->

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Flag Post
            </button>

             <!-- LIKE BUTTON -->

            <div class="container12">
                <button class="like__btn animated">
                    <i class="like__icon fa fa-heart"></i>
                    <span class="like__number">0</span>
                </button>
            </div>
            <!-- DOWNLOAD BUTTON -->

            <div class="container123">
                <button class="download__btn">
                <i class="fa-solid fa-download"></i>
                    <span class="download__number">0</span>
                </button>
            </div>
              
        
            <!-- FLAG BUTTON -->
            <div class="container1234">
                <button class="flag__btn">
                <i class="fa-solid fa-flag"></i>
                </button>
            </div> 


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Flag user post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                <form action="<?php echo e(route('flagPost', $post->id)); ?>" method="post">
					<?php echo csrf_field(); ?>
					<div class="form-group mb-3">
						<input type="text" name="reason" class="form-control" placeholder="Reason for flagging (optional)" />
						<?php if($errors->has('reason')): ?>
							<span class="text-danger"><?php echo e($errors->first('reason')); ?></span>
						<?php endif; ?>
					</div>
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block auth-button">Flag Post</button>
					</div>
				</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

            





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
            <form action=<?php echo e(route('comments.store')); ?> method="comment" enctype="multipart/form-data">    
                 <?php echo csrf_field(); ?>
                <label class="mt-4 text-xl">Comments</label>
                <textarea class="form-control resize-none h-24" id="commentInput" placeholder="Add a Comment..." name="comment" maxlength="500"></textarea>   
                <button class="btn btn-primary mt-2" style="background-color: #007bff; color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer;" type="submit">Comment</button>
            </form>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h1><?php echo e($comment->content); ?></h1>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\ahmed\Desktop\Uni\1st Year\Semester2\Project\website\OpenDigital\resources\views/posts/show.blade.php ENDPATH**/ ?>