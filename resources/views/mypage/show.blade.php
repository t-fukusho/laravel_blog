<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>

<div class="container">
    <h3><a href="/blog">TOP</a></h3>
</div>

<h1>マイページ</h1>

<div class="container">
    <h3><a href="/blog/mypage/{{$id}}/edit">プロフィール編集</a></h3>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('ログアウト') }}
        </x-dropdown-link>
    </form>
</div>

<div class="container">
    <h3>投稿した記事</h3>
    <div class="flex">
        @foreach ($articles as $article)
            <ul class="article">
                <li><a href="/blog/article/{{ $article->id }}" class="link">{{ $article->title }}</a></li>
                <li>{{ $article->content }}</li>
                <li>
                    <img src="{{ $article->icon_path }}" onError="this.onerror=null;this.src='https://tenman.info/labo/css/wp-content/themes/raindrops/images/image-not-found.png'">
                    {{ $article->name }} &#9825;{{$article->like_count}}
                </li>
            </ul>
        @endforeach
        @if (count($articles) >= 9)
            <ul class="article">
                <li class="more"><a href="/blog/my_article_list/{{$id}}" class="link">もっと見る</a></li>
            </ul>
        @endif
    </div>
</div>

<div class="container">
    <h3>いいねした記事</h3>
    <div class="flex">
        @foreach ($likes as $like)
            <ul class="article">
                <li><a href="/blog/article/{{ $article->id }}" class="link">{{ $like->title }}</a></li>
                <li>{{ $like->content }}</li>
                <li>
                    <img src="{{ $like->icon_path }}" onError="this.onerror=null;this.src='https://tenman.info/labo/css/wp-content/themes/raindrops/images/image-not-found.png'">
                    {{ $like->name }} &#9825;{{$like->like_count}}
                </li>
            </ul>
        @endforeach
        @if (count($likes) >= 9)
            <ul class="article">
                <li class="more"><a href="/blog/like_list/{{$id}}" class="link">もっと見る</a></li>
            </ul>
        @endif
    </div>
</div>

