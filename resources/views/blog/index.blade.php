<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('blog.title') }}</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>{{ config('blog.title') }}</h1>
        <h5>Page {{ $posts->currentPage() }} de {{ $posts->lastPage() }}</h5>

        <hr>

        <ul>
            @foreach ($posts as $post)
            <li>
                <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                <em>({{ $post->published_at->format('j M Y g:ia')}})</em>

                <p>
                    {{ str_limit($post->content)}}
                </p>
            </li>
            @endforeach
        </ul>

        <hr>

        {!! $posts->render() !!}
    </div>
</body>
</html>
