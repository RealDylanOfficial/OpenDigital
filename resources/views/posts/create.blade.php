<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OpenDigital - Create post</title>
    @viteReactRefresh
    @vite(["resources/sass/app.scss"])
</head>

<body>
    @include('inc.navbar')
    <div class="ml-60 mr-60 mt-6">
        <h1 class="display-6">Create post:</h1>
        @include("inc.messages")
        <div>
            <form action={{ route('posts.store') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <label class="mt-4 text-xl">Title</label>
                    <input type="title" class="form-control" id="titleInput" placeholder="Title" name="title">
                </div>
                <div class="">     
                    <label class="mt-4 text-xl">Description</label>
                    <textarea class="form-control" id="descriptionInput" placeholder="A speech delivered by..." name="description"></textarea>   
                </div>
                <div class="">
                    <label class="mt-4 text-xl">Tags</label>
                    <input type="title" class="form-control" id="tagsInput" placeholder="historical, churchill, radio..." name="tags">
                </div>
                <div class="">
                    <label class="mt-4 text-xl">File input</label>
                    <input class="form-control" type="file" id="fileInput" name="file">
                </div>
                <button class="btn btn-primary mt-6" style="background-color: #007bff; color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer;" type="submit">Submit</button>

            </form>
        </div>
    </div>


</body>

</html>
