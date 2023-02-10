<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OpenDigital - Posts</title>
    @viteReactRefresh
    @vite(["resources/sass/app.scss"])
</head>
<body>
    @include('inc.navbar')
    <div class="container">
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            {{-- <div class="flex items-center">
                <div class="border-2 rounded-lg flex m-auto">
                    <h1 class="text-2xl">{{$post->title}}</h1>
                </div>
            </div> --}}
            
                <div class="card card-body bg-light" style="margin-left:20%; width:60%">
                
                    <h1 class="text-2xl">{{$post->title}}</h1>
                    <small>Posted: {{$post->created_at}}</small>
                   
                    @if (in_array($post->content_type, [".jpg",".jpeg",".png"]))
                        <img src="/images/content/{{$post->id . $post->content_type}}" alt="{{$post->title}}">
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