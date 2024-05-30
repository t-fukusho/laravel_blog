<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>
<h3>いいねした記事</h3>
<div class="flex">
        @foreach ($likes as $like)
        <ul class="article">
            <li><a href="/blog/article/{{ $like->id }}" class="link">{{ $like->title }}</a></li>
            <li>{{ $like->content }}</li>
            <li>&#9825;{{$like->like_count}}</li>
        </ul>
    @endforeach
</div>
{!! $likes->render() !!}
