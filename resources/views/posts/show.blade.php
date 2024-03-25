<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Blog : {{$post->title}}</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('bootstrap-5/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
</head>

<body>
    <div class="container">
        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1">{{$post->title}}</h2>
            <p class="blog-post-meta">{{date("d M Y H:i", strtotime($post->created_at))}}</p>
            <p>{{$post->content}}</p>

            <small class="text-muted">{{$total_comments}}</small>

            @foreach($comments as $comment)

            <div class="card-mb-3">
                <div class="card-body">
                    <p style="font-size:8pt">{{$comment->comment}}</p>
                </div>
            </div>
            @endforeach
        </article>
        <a href="{{url("posts")}}">Kembali</a>
    </div>
</body>

</html>