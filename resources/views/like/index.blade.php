<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>
<h3>いいねした記事</h3>
<div class="flex">
        @foreach ($likes as $like)
        <ul>
            <li><a href="/blog/article/{{ $like->id }}">{{ $like->title }}</a></li>
            <li>{{ $like->content }}</li>
        </ul>
    @endforeach
</div>
