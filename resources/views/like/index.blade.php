<h3>いいねした記事</h3>
    @foreach ($likes as $like)
        <ul>
            <li><a href="/blog/article/{{ $like->id }}">{{ $like->title }}</a></li>
            <li><a href="/blog/article/{{ $like->id }}">{{ $like->content }}</a></li>
        </ul>
    @endforeach

