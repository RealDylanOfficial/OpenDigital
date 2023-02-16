<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    
    
    
    echo(implode($tags).$date.$type.$sort);

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
                <input type="radio" name="period" value="day">
                Day
            </label>
            <label>
                <input type="radio" name="period" value="week">
                Week
            </label>
            <label>
                <input type="radio" name="period" value="month">
                Month
            </label>
            <label>
                <input type="radio" name="period" value="year">
                Year
            </label>
            
        </form>

        <form id="mediaForm" action="" method="get">
            <label>Media type:</label>
            <label>
                <input type="radio" name="period" value="image">
                Image
            </label>
            <label>
                <input type="radio" name="period" value="audio">
                Audio
            </label>
            <label>
                <input type="radio" name="period" value="video">
                Video
            </label>
            <label>
                <input type="radio" name="period" value="pdf">
                PDF
            </label>
            
        </form>

        <button id="filter" type="submit" onclick="">Apply filters</button>
    </div>

    </div>

    <div class="absolute right-8">
        <form action="" method="get" id="sortForm">
        <div class="form-group">
          <label>Sort by:</label>
          <select class="form-control" name="sort" id="sortSelect">
            <option>most recently</option>
            <option>most liked</option>
            <option>most downloaded</option>
          </select>
        </div>
        </form>
    </div>


    <div class="container mt-8">
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
