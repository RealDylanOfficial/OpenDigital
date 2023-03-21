<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="_postID" content="{{ $post->id }}">
    <meta name="_postExt" content="{{ $post->file_ext }}">
    <meta name="_postTitle" content="{{ $post->title }}">
    <link rel="icon" href="{{asset("images/logo.png")}}">
    <title>OpenDigital - {{$post->title}}</title>
   
    <!-- having to import boostrap, couldn't get it working -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @viteReactRefresh
    @vite(["resources/sass/app.scss", "resources/js/showPosts.ts"])
</head>
<body>
    @include('inc.navbar')
    @include('inc.messages')
    <!-- having to import boostrap, couldn't get it working -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container">
        <div class="" style="">
            
            <a href="/profile/{{$post->user->id}}" class="flex h-20 border-b">
                <img class="rounded-full object-cover h-16 w-16"
                src="{{ url('images/profile_pictures/'.$post->user->id.'.'.$post->user->pfp_file_extension) }}" onerror="this.onerror=null; this.src='/images/profile_pictures/default.jpg'" alt="">
                <h2 class="mt-4 ml-2">{{$post->user->username}}</h2>
            </a>

            <!-- <form method="POST" action="{{ route('flagPost', $post->id) }}">
                @csrf
            <button type="submit">
                Flag
            </button>    
            </form> -->

            {{-- <a href="/content/{{$post->id . $post->file_ext}}" download="{{ $post->title }}">
                <button class="btn btn-primary">Download</button>
            </a> --}}
            <button id="download-btn">Download</button>


            <!-- Button trigger modal -->

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Flag Post
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Flag user post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('flagPost', $post->id) }}" method="post">
					@csrf
					<div class="form-group mb-3">
						<input type="text" name="reason" class="form-control" placeholder="Reason for flagging (optional)" />
						@if($errors->has('reason'))
							<span class="text-danger">{{ $errors->first('reason') }}</span>
						@endif
					</div>
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block auth-button">Flag Post</button>
					</div>
				</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

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
            
            <form action={{ route('comments.store') }} method="post" enctype="multipart/form-data">    
                 @csrf
                <label class="mt-4 text-xl">Comments</label>
                <textarea class="form-control resize-none h-24" id="commentInput" placeholder="Add a Comment..." name="content" maxlength="500"></textarea>   
                <button class="btn btn-primary mt-2 mb-3" style="background-color: #007bff; color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer;" type="submit">Comment</button>
                <input type="hidden" value="{{$post->id}}" name="postID" id="postIDInput">
            </form>
            
            @foreach ($comments as $comment)
            <div class="card card-body bg-light mb-2">
                <a href="/profile/{{$comment->user->id}}" class="flex h-20 border-b">
                    <img class="rounded-full object-cover h-16 w-16"
                    src="{{ url('images/profile_pictures/'.$comment->user->id.'.'.$comment->user->pfp_file_extension) }}" onerror="this.onerror=null; this.src='/images/profile_pictures/default.jpg'" alt="">
                    <h2 class="mt-4 ml-2">{{$comment->user->username}}</h2>
                </a>
                <h1>{{$comment->content}}</h1>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>