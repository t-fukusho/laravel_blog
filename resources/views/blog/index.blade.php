@php
use Illuminate\Support\Str;
@endphp

<head>
    <link rel="stylesheet" href="/css/style.css">
</head>
<h1>トップページ</h1>

マイページへのリンク予定
{{-- <a href="{{ route('blog.mypage', $user->id }}" class="button">投稿</a> --}}



<form action="{{ route('blog.index') }}" class="search-form-4">
    <button type="submit" aria-label="検索"></button>
    <label>
        <input type="text" name="keyword" placeholder="検索" value="{{ request('keyword') }}">
    </label>
</form>

@if ($articles->isEmpty())
    <p>記事がありません</p>
@else
<div class="Container">
    <div class="Box-Container">
        @foreach ($articles as $article)
            <div class="article">
                <h2><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></h2>
                <p>{{ Str::limit($article->content, 30, '...') }}</p>
                <p>いいね: {{ $article->likes_count }}</p>
            </div>
        @endforeach
</div>
    <div class="Arrow left"><</div>
    <div class="Arrow right">></div>
    </div>
@endif

<a href="{{ route('blog.create') }}" class="button">投稿</a>

