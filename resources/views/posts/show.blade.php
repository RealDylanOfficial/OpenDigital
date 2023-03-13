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
            
            <a href="/profile/{{$post->user->id}}" class="flex h-20 border-b">
                <img class="rounded-full object-cover h-16 w-16"
                src="{{ url('images/profile_pictures/'.$post->user->id.'.'.$post->user->pfp_file_extension) }}" onerror="this.onerror=null; this.src='/images/profile_pictures/default.jpg'" alt="">
                <h2 class="mt-4 ml-2">{{$post->user->username}}</h2>
            </a>

            <form method="POST" action="{{ route('flagPost', $post->id) }}">
                @csrf
            <button type="submit">
                Flag
            </button>
            
            </form>
            <h1 class="text-2xl">{{$post->title}}</h1>
            <p>{{$post->description}}</p>
           
            @if (in_array($post->file_ext, [".jpg",".jpeg",".png"]))
                <img src="/content/{{$post->id . $post->file_ext}}" alt="{{$post->title}}">
            @elseif (in_array($post->file_ext, [".mp3",".wav",".ogg"]))
                <audio controls>
                    <source src="/content/{{$post->id . $post->file_ext}}" type="audio/mpeg">
                </audio>
            @elseif (in_array($post->file_ext, [".mp4"]))
                <video controls>
                    <source src="/content/{{$post->id . $post->file_ext}}" type="video/mp4">
                </video>
            @elseif (in_array($post->file_ext, [".pdf"]))
                <a class="underline" href="/content/{{$post->id . $post->file_ext}}">Open PDF in new tab</a>
                <iframe class="" style="height:100%;width:100%;" src="/content/{{$post->id . $post->file_ext}}">
                </iframe>
            @else
                
            @endif
            <small>Posted at: {{$post->created_at}}</small>
        </div>
    </div>
</body>
</html>