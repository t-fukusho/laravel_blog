<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>
<div class="container">
    <h3><a href="/blog/mypage/{{$id}}">マイページ</a></h3>
</div>
<h3>いいねした記事</h3>
<div class="flex">
    @foreach ($likes as $like)
        <ul class="article">
            <li><a href="/blog/article/{{ $like->id }}" class="link">{{ $like->title }}</a></li>
            <li>{{ $like->content }}</li>
            <li>
                <img src="{{ $like->icon_path }}" onError="this.onerror=null;this.src='https://tenman.info/labo/css/wp-content/themes/raindrops/images/image-not-found.png'">
                {{ $like->name }} &#9825;{{$like->like_count}}
            </li>
        </ul>
    @endforeach
</div>
{!! $likes->render() !!}
