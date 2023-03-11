<nav>
    <div class="flex flex-row items-center border-b h-20 bg-gray-100">
        <div class="ml-4 mt-1">
            
            
            <a href="/home"> <img class="h-16 w-16" src="<?php echo e(asset("images/logo.png")); ?>" alt=""></a>
        </div>

        <div class="ml-8">
            
            <ul class="flex text-blue-500">
                <li class="mr-6">
                  <a class="hover:text-blue-800 text-2xl" href="/posts/?type=pdf">PDF</a>
                </li>
                <li class="mr-6">
                  <a class="hover:text-blue-800 text-2xl" href="/posts/?type=audio">Audio</a>
                </li>
                <li class="mr-6">
                  <a class="hover:text-blue-800 text-2xl" href="/posts/?type=video">Video</a>
                </li>
                <li class="mr-6">
                  <a class="hover:text-blue-800 text-2xl" href="/posts/?type=images">Images</a>
                </li>
              </ul>
        </div>
        <div class="ml-20">
            
            <ul class="flex border-2 border-blue-500 bg-blue-500 rounded-lg text-white hover:border-blue-800 hover:bg-blue-800 text-2xl">
                <li class="mr-3">
                    <a class="ml-3" href="/posts/create">+ Post</a>
                </li>
            </ul>
        </div>
        <div class="relative ml-6 mr-6 text-gray-600 lg:block hidden">
            
            <form action="/posts" method="get">
                <input
                class="border-2 border-gray-300 bg-white h-10 pl-3 pr-10 rounded-lg text-sm focus:outline-none"
                type="search" name="search" placeholder="Search">
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-2">
                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                     version="1.1" id="Capa_1" x="0px" y="0px"
                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                     xml:space="preserve"
                     width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
          </svg>
            </button>
            </form>

        </div>
        <div>
        
            <?php if(Auth::check()): ?>
            <ul class="flex text-blue-500">
                <li class="mr-6">
                    <a class="hover:text-blue-800 text-2xl" href="<?php echo e(route('logout')); ?>">Logout</a>
                </li>
            </ul>            
            <?php else: ?>
            
            <ul class="flex text-blue-500">
                <li class="mr-6">
                    <a class="hover:text-blue-800 text-2xl" href="/login">Login</a>
                </li>
                <li class="mr-6">
                    <a class="hover:text-blue-800 text-2xl" href="/register">Register</a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
        <div>
            
            <ul class="flex text-blue-500">
                <li class="mr-6">
                  <a class="hover:text-blue-800 text-2xl" href="/profile">Account</a>
                </li>
            </ul>
        </div>
    </div>

</nav><?php /**PATH C:\Users\ahmed\Desktop\Uni\1st Year\Semester2\Project\website\OpenDigital\resources\views/inc/navbar.blade.php ENDPATH**/ ?>