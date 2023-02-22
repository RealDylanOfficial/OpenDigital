<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset("images/logo.png")}}">
    <title>OpenDigital - {{$post->title}}</title>
    @viteReactRefresh
    @vite(["resources/sass/app.scss"])
</head>
<body>
    @include('inc.navbar')
    <div class="container">
        <div class="" style="">
            
            <a href="#" class="flex mt-3 h-20 border-b flex"> 
                <img class="rounded-full object-cover h-16 w-16" src="/images/profile_pictures/{{$post->user->profile_picture}}" alt="">
                <h2 class="mt-4 ml-2">{{$post->user->username}}</h2>
            </a>
            <h1 class="text-2xl">{{$post->title}}</h1>
            <small>Posted at: {{$post->created_at}}</small>
            <p>{{$post->description}}</p>
           
            @if (in_array($post->file_ext, [".jpg",".jpeg",".png"]))
                <img src="/content/{{$post->id . $post->file_ext}}" alt="{{$post->title}}">
            @elseif (in_array($post->file_ext, [".mp3",".wav"]))
                <audio controls>
                    <source src="/content/{{$post->id . $post->file_ext}}" type="audio/mpeg">
                </audio>
            @else
                
            @endif
        </div>
    </div>
</body>
</html>