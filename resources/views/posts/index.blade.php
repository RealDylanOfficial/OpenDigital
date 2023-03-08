<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset("images/logo.png")}}">
    <title>OpenDigital - Posts</title>

    @viteReactRefresh
    @vite(["resources/sass/app.scss", "resources/sass/indexPosts.scss", "resources/js/indexPosts.ts"])

</head>

<body>
    @include('inc.navbar')


    {{-- Gets the filters and stores them in variables --}}
    <?php
    $tags = [];
    $date = "";
    $type = "";
    $sort = "";
    if (array_key_exists("tags", $_GET)) {
        $tags = $_GET["tags"];
    }
    if (array_key_exists("date", $_GET)) {
        $date = $_GET["date"];
    }
    if (array_key_exists("type", $_GET)) {
        $type = $_GET["type"];
    }
    if (array_key_exists("sort", $_GET)) {
        $sort = $_GET["sort"];
    }
    
    
    
    // echo(implode($tags).$date.$type.$sort);

    function setValue($field, $option){
        if ($field == $option){
            echo("checked selected");
        }
    }

    ?>

    {{-- @foreach ($_GET as $arg)
        @if (is_array($arg))
            @if (array_keys($arg)[0] == "tags")
                $tags = $arg;
            @endif
            @foreach ($arg as $val)
                {{$val}}
    @endforeach
    @else
    {{$arg}}
    @if ()

    @endif
    {{$arg}}
    @endif

    @endforeach --}}
    <!-- Sidebar -->

    <div class="sidebar">
        <div class="ml-2">
            <form id="tagForm" method="get">
                <div class="form-group">
                    <label for="tagInput">Tag:</label>
                    <input type="text" class="form-control" id="tagInput" name="tag" placeholder="Enter tag">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <div class="tags mt-3">
                <p>Tags:</p>
                <ul class="list-unstyled"></ul>
            </div>


            <form id="dateForm" action="" method="get">
                <label>Posted within last:</label>
                <label>
                    <input type="radio" name="period" value="day" <?php setValue($date, "day") ?>>
                    Day
                </label>
                <label>
                    <input type="radio" name="period" value="week" <?php setValue($date, "week") ?>>
                    Week
                </label>
                <label>
                    <input type="radio" name="period" value="month" <?php setValue($date, "month") ?>>
                    Month
                </label>
                <label>
                    <input type="radio" name="period" value="year" <?php setValue($date, "year") ?>>
                    Year
                </label>

            </form>

            <form id="mediaForm" action="" method="get">
                <label>Media type:</label>
                <label>
                    <input type="radio" name="period" value="image" <?php setValue($type, "image") ?>>
                    Image
                </label>
                <label>
                    <input type="radio" name="period" value="audio" <?php setValue($type, "audio") ?>>
                    Audio
                </label>
                <label>
                    <input type="radio" name="period" value="video" <?php setValue($type, "video") ?>>
                    Video
                </label>
                <label>
                    <input type="radio" name="period" value="pdf" <?php setValue($type, "pdf") ?>>
                    PDF
                </label>

            </form>

            <button id="filter" type="submit" onclick="">Apply filters</button>
            <br><br><a class="ml-2 underline" href="/posts">Reset filters</a>
        </div>

    </div>

    <div class="absolute right-8">
        <form action="" method="get" id="sortForm">
            <div class="form-group">
                <label>Sort by:</label>
                <select class="form-control" name="sort" id="sortSelect">
                    <option <?php setValue($sort, "most recently") ?>>most recently</option>
                    <option <?php setValue($sort, "most liked") ?>>most liked</option>
                    <option <?php setValue($sort, "most downloaded") ?>>most downloaded</option>
                </select>
            </div>
        </form>
    </div>



    <div class="container mt-8" style="margin-left:20%; width:60%;">
        <div class="">
            @include('inc.messages')
        </div>

        @if (request("search"))
        <div class="mb-8 text-l">
            <h1>Searching for: "{{request("search")}}"</h1>
            <div class="hidden" id="searchTerm">{{request("search")}}</div>
        </div>

        @endif

        @if (count($posts) > 0)

        @foreach ($posts as $post)
        {{-- <div class="flex items-center">
                <div class="border-2 rounded-lg flex m-auto">
                    <h1 class="text-2xl">{{$post->title}}</h1>
    </div>
    </div> --}}

    <div class="card card-body bg-light mb-5">
        <a href="#" class="flex h-20 border-b">
            <img class="rounded-full object-cover h-16 w-16"
            src="{{ url('images/profile_pictures/'.$post->user->id.'.'.$post->user->pfp_file_extension) }}" onerror="this.onerror=null; this.src='images/profile_pictures/default.jpg'" alt="">
            <h2 class="mt-4 ml-2">{{$post->user->username}}</h2>
        </a>
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
        <small>Posted: {{$post->created_at}}</small>

        <a href="/posts/{{$post->id}}" class="h-5 mt-2.5 border-t">
            <h3 class="text-center mt-2">Comments</h3>
        </a>
    </div>



    @endforeach
    <div class="" style="">
        {{ $posts->withQueryString()->links() }}
    </div>
    @else
    </div>
    <p>No posts found</p>
    @endif




</body>

</html>
