<h3>投稿した記事</h3>
    @foreach ($articles as $article)
        <ul>
            <li><a href="/blog/article/{{ $article->id }}">{{ $article->title }}</a></li>
            <li><a href="/blog/article/{{ $article->id }}">{{ $article->content }}</a></li>
        </ul>
    @endforeach

