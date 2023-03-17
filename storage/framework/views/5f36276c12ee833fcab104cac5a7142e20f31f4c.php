<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo e(asset("images/logo.png")); ?>">
	<title>OpenDigital - Profile Page</title>
	<link rel="stylesheet" href="profile.scss">
	
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/js/app.js", "resources/sass/app.scss", "resources/sass/register.scss"]); ?>
	
</head>

<?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<body>
    
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo e(url('images/profile_pictures/'.$user->id.'.'.$user->pfp_file_extension)); ?>" onerror="this.onerror=null; this.src='/images/profile_pictures/default.jpg'" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>

            <div class="card-body pt-0 pt-md-4">
            
              <div class="text-center">
                <h3>
                  <?php echo e($user->username); ?>

                </h3>
                <!-- <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Manchester, United Kingdom
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Computer Science Student
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Manchester
                </div> -->
                <hr class="my-4">
                <p><?php echo e($user->profile_description); ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php if($user == Auth::user()): ?>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My Account</h3>
                </div>

              </div>
            </div>


			<!-- card -->

            <div class="card-body"> 
              <form method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control form-control-alternative" placeholder="<?php echo e($user->username); ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Email address</label>
                        <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="<?php echo e($user->email); ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label">Profile Picture</label>
                        <input type="file" class="file" name="file" id="file" accept=".png, .jpg, .jpeg">
                      </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="random">
                      </div>
                    </div> -->
                    <!-- <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="123">
                      </div>
                    </div> -->
                  </div>
                </div>
                <hr class="my-4">


                <!-- Address -->
                <!-- <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Oxford Road, Manchester" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="Manchester">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United Kingdon">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4"> -->
                <!-- Description -->


                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea id="profile_description" name="profile_description" rows="4" class="form-control form-control-alternative" placeholder="<?php echo e($user->profile_description); ?>"></textarea>
                  </div>
                </div>
                <div>
                  <button class="btn btn-sm btn-primary" type="submit">Update Profile</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
      
    </div>
    <div class="container mt-8" style="margin-left:20%; width:60%;">

    <?php if(count($posts) > 0): ?>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
    <div class="card card-body bg-light mb-5">
      <div class="flex h-20 border-b">
        <a class="flex" href="/profile/<?php echo e($post->user->id); ?>">
          <img class="rounded-full object-cover h-16 w-16"
          src="<?php echo e(url('images/profile_pictures/'.$post->user->id.'.'.$post->user->pfp_file_extension)); ?>" onerror="this.onerror=null; this.src='/images/profile_pictures/default.jpg'" alt="">
          <h2 class="mt-4 ml-2"><?php echo e($post->user->username); ?></h2>
        </a>
        <?php if($auth == true): ?>
        <form method="POST" action="<?php echo e(route('posts.destroy', $post->id)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button type="submit">
            <h2 class="underline text-blue-600 mt-4" style="margin-left: 50rem">Delete</h2>
          </button>
          
        </form>
        <?php endif; ?>
      
      </div>


      <h1 class="text-2xl mt-2"><a href="/posts/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h1>

      <?php if(in_array($post->file_ext, [".jpg",".jpeg",".png"])): ?>
      <img src="/content/<?php echo e($post->id . $post->file_ext); ?>" alt="<?php echo e($post->title); ?>">
      <?php elseif(in_array($post->file_ext, [".mp3",".wav", ".ogg"])): ?>
      <audio controls>
          <source src="/content/<?php echo e($post->id . $post->file_ext); ?>" type="audio/mpeg">
      </audio>
      <?php elseif(in_array($post->file_ext, [".mp4"])): ?>
      <video controls>
          <source src="/content/<?php echo e($post->id . $post->file_ext); ?>" type="video/mp4">
      </video>
      <?php elseif(in_array($post->file_ext, [".pdf"])): ?>
      <a class="underline" href="/content/<?php echo e($post->id . $post->file_ext); ?>">Open PDF in new tab</a>
      <iframe class="" style="height:40rem;width:100%;" src="/content/<?php echo e($post->id . $post->file_ext); ?>">
      </iframe>
      <?php else: ?>

      <?php endif; ?>
      <small>Posted: <?php echo e($post->created_at); ?></small>

      <a href="/posts/<?php echo e($post->id); ?>" class="h-5 mt-2.5 border-t">
          <h3 class="text-center mt-2">Comments</h3>
      </a>
  </div>



  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class="" style="">
      <?php echo e($posts->withQueryString()->links()); ?>

  </div>
  <?php else: ?>
  </div>
  <p>No posts found</p>
  <?php endif; ?>
  



</body>





<?php /**PATH C:\Users\ahmed\Desktop\Uni\1st Year\Semester2\Project\website\OpenDigital\resources\views/profile.blade.php ENDPATH**/ ?>