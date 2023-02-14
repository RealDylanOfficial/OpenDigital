<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OpenDigital - Posts</title>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js
    "></script>
    @viteReactRefresh
    @vite(["resources/sass/app.scss"])

</head>
<body>
    @include('inc.navbar')
    <div class="ml-5">

        <div class="" style="font-size:2rem;">
            <i class="bi-filter"></i>
        </div>


    </div>

      
    <div class="container">
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            {{-- <div class="flex items-center">
                <div class="border-2 rounded-lg flex m-auto">
                    <h1 class="text-2xl">{{$post->title}}</h1>
                </div>
            </div> --}}
            
                <div class="card card-body bg-light mb-5" style="margin-left:20%; width:60%">
                
                    <h1 class="text-2xl"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                    <small>Posted by: {{$post->user->username}}</small>
                    <small>Posted: {{$post->created_at}}</small>
                   
                    @if (in_array($post->content_type, [".jpg",".jpeg",".png"]))
                        <img src="/content/{{$post->id . $post->content_type}}" alt="{{$post->title}}">
                    @elseif (in_array($post->content_type, [".mp3",".wav"]))
                        <audio controls>
                            <source src="/content/{{$post->id . $post->content_type}}" type="audio/mpeg">
                        </audio>
                    @else
                        
                    @endif
                </div>
                
            
            
        @endforeach
    @else
    </div>
        <p>No posts found</p>
    @endif
</body>
</html>