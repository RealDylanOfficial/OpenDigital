<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OpenDigital - {{$post->title}}</title>
    @viteReactRefresh
    @vite(["resources/sass/app.scss"])
</head>
<body>
    @include('inc.navbar')
    <div class="container">
        <div class="" style="">
                
            <h1 class="text-2xl">{{$post->title}}</h1>
            <small>Posted by: {{$post->user->username}}</small><br>
            <small>Posted at: {{$post->created_at}}</small>
            <p>{{$post->description}}</p>
           
            @if (in_array($post->content_type, [".jpg",".jpeg",".png"]))
                <img src="/content/{{$post->id . $post->content_type}}" alt="{{$post->title}}">
            @elseif (in_array($post->content_type, [".mp3",".wav"]))
                <audio controls>
                    <source src="/content/{{$post->id . $post->content_type}}" type="audio/mpeg">
                </audio>
            @else
                
            @endif
        </div>
    </div>
</body>
</html>