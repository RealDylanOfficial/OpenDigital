<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset("images/logo.png")}}">
    <title>OpenDigital</title>
    @viteReactRefresh
    @vite(["resources/sass/app.scss"])
</head>

<body>
    @include('inc.navbar')
    @include('inc.messages')
    @if (count($flags) > 0)
    <div class="container mt-8" style="margin-left:20%; width:60%;">
        @foreach ($flags as $flag)
        <?php $post = $flag->post ?>
        <div class="card card-body bg-light mb-5">
            <div class="flex h-20 border-b">
                <a class="flex" href="/profile/{{$post->user->id}}">
                    <img class="rounded-full object-cover h-16 w-16"
                        src="{{ url('images/profile_pictures/'.$post->user->id.'.'.$post->user->pfp_file_extension) }}"
                        onerror="this.onerror=null; this.src='/images/profile_pictures/default.jpg'" alt="">
                    <h2 class="mt-4 ml-2">{{$post->user->username}}</h2>
                </a>
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <h2 class="underline text-blue-600 mt-4" style="margin-left: 25rem">Delete</h2>
                    </button>

                </form>

            </div>


            <h1 class="text-2xl mt-2"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>

            @if (in_array($post->file_ext, [".jpg",".jpeg",".png"]))
            <img src="/content/{{$post->id . $post->file_ext}}" alt="{{$post->title}}">
            @elseif (in_array($post->file_ext, [".mp3",".wav", ".ogg"]))
            <audio controls>
                <source src="/content/{{$post->id . $post->file_ext}}" type="audio/mpeg">
            </audio>
            @elseif (in_array($post->file_ext, [".mp4"]))
            <video controls>
                <source src="/content/{{$post->id . $post->file_ext}}" type="video/mp4">
            </video>
            @elseif (in_array($post->file_ext, [".pdf"]))
            <a class="underline" href="/content/{{$post->id . $post->file_ext}}">Open PDF in new tab</a>
            <iframe class="" style="height:40rem;width:100%;" src="/content/{{$post->id . $post->file_ext}}">
            </iframe>
            @else

            @endif
            <h1>Reason: {{$flag->reason}}</h1>
            <small>Posted: {{$post->created_at}}</small>

            <a href="/posts/{{$post->id}}" class="h-5 mt-2.5 border-t">
                <h3 class="text-center mt-2">Comments</h3>
            </a>
        </div>



        @endforeach
        <div class="" style="">
            {{ $flags->withQueryString()->links() }}
        </div>
        @else
    </div>
    <p>No posts found</p>
    @endif
</body>

</html>
