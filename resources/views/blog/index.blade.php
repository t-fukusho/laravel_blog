@php
    use Illuminate\Support\Str;
@endphp

<head>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<div class="container-fluid">
    <div class="row">
        <!-- サイドバー -->
        <div class="col-md-3 col-lg-2 d-md-block bg-body-tertiary p-3">
            <a href="/blog"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Note</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link link-body-emphasis"
                            href="{{ route('blog.index', ['category_id' => $category->id]) }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#file" />
                            </svg>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- メインコンテンツ -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">トップページ</h1>
                <a href="/blog/mypage/{{ $id }}">my Page</a>
            </div>

            <form action="{{ route('blog.index') }}" class="search-form-4">
                <button type="submit" aria-label="検索"></button>
                <label>
                    <input type="text" name="keyword" placeholder="検索" value="{{ request('keyword') }}">
                </label>
            </form>
            <div>
                <h3>人気の記事</h3>
                @if ($articles->isEmpty())
                    <p>記事がありません</p>
                @else
                    <div class="Container">
                        <div class="Box-Container">
                            @foreach ($articles as $article)
                                <div class="box">

                                    <div class="image-container">
                                        <img src="{{ $article->thumbnail ? asset('thumbnails/' . $article->thumbnail) : 'https://picsum.photos/250/150' }}" alt="サムネイル" class="img-thumbnail">
                                    </div>

                                    <div class="text-container">
                                    <h2><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a>
                                    </h2>
                                    <p>{{ Str::limit($article->content, 30, '...') }}</p>
                                    <div class="user-icon">
                                        <p><img src="{{ $article->user->icon_path }}" alt="ユーザーアイコン">
                                            {{ $article->user->name }}<br>&#9825;{{ $article->likes_count }}</p>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="Arrow left" onclick="scrollLeft()">&#9664;</div>
                        <div class="Arrow right" onclick="scrollRight()">&#9654;</div>
                    </div>
                @endif
            </div>
            <div>
                <h2>新着記事</h2>
                @if ($articles->isEmpty())
                    <p>記事がありません</p>
                @else
                    <div class="Container latest-container">
                        <div class="Box-Container">
                            @foreach ($articles2 as $article2)
                                <div class="box">

                                    <div class="image-container">
                                        <img src="{{ $article2->thumbnail ? asset('thumbnails/' . $article2->thumbnail) : 'https://picsum.photos/250/150' }}" alt="サムネイル" class="img-thumbnail">
                                    </div>
                                    <div class="text-container">
                                    <h3><a
                                            href="{{ route('article.show', $article2->id) }}">{{ $article2->title }}</a>
                                    </h3>
                                    <p>{{ Str::limit($article2->content, 30, '...') }}</p>
                                    <div class="user-icon">
                                        <p><img src="{{ $article2->user->icon_path }}" alt="ユーザーアイコン">
                                            {{ $article2->user->name }}<br>&#9825;{{ $article2->likes_count }}</p>
                                    </div>
                                </div></div>
                            @endforeach
                        </div>
                        <div class="Arrow left" onclick="scrollLeft()">&#9664;</div>
                        <div class="Arrow right" onclick="scrollRight()">&#9654;</div>
                    </div>
                @endif
            </div>
            <a href="{{ route('blog.create') }}" class="btn btn-primary">投稿</a>
        </main>

    </div>
</div>
<script src="{{ asset('/js/scroll.js') }}"></script>
