<nav>
    <div class="flex flex-row items-center border-b h-20 mb-8">
        <div class="ml-4 mt-1">
            {{-- logo with link to homepage --}}
            
            <a href="/home"> <img class="h-16 w-auto" src="{{asset("images/logo.png")}}" alt=""></a>
        </div>

        <div class="ml-8">
            {{-- menu with links to pages --}}
            <ul class="flex text-blue-500 hover:text-blue-800 text-2xl">
                <li class="mr-6">
                  <a class="" href="#">Active</a>
                </li>
                <li class="mr-6">
                  <a class="" href="#">Link</a>
                </li>
                <li class="mr-6">
                  <a class="" href="#">Link</a>
                </li>
                <li class="mr-6">
                    <a class="" href="login">Login</a>
                </li>
                <li class="mr-6">
                    <a class="" href="register">Register</a>
                </li>
              </ul>
        </div>
        <div>
            {{-- upload post button --}}
        </div>
        <div class="relative mx-auto text-gray-600 lg:block hidden">
            {{-- search bar --}}
            <input
                class="border-2 border-gray-300 bg-white h-10 pl-2 pr-8 rounded-lg text-sm focus:outline-none"
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
        </div>
        <div>
            {{-- login and register buttons --}}
        </div>
        <div>
            {{-- view account button with profile icon --}}
        </div>
    </div>

</nav>