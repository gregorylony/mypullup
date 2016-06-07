<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="page-header">{{ $post->title }}</h1>
        <h5>{{ $post->published_at->format('j M Y g:ia')}}</h5>

        {!! nl2br(e($post->content)) !!}

        <hr>

        <button class="btn btn-primary" onclick="history.go(-1)">Retour</button>
    </div>
</body>
</html>
