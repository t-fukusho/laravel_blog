{{-- プロフィール編集画面 --}}

<div class="container">
    <h1>プロフィール編集</h1>

    {{-- 成功メッセージの表示 --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- エラーメッセージの表示 --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- プロフィール編集フォーム --}}
    <form action="{{ route('myprofile.update', $user->id) }}" method="POST">
        @csrf
        {{-- @method('put') --}}
        {{-- 名前入力フィールド --}}
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}"
                required>
        </div>

        {{-- パスワード入力フィールド（任意） --}}
        <div class="form-group">

            <label for="password">パスワード（変更する場合のみ）</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        {{-- 更新ボタン --}}
        <button type="submit" class="btn btn-primary">更新</button>
    </form>

    {{-- アカウント削除フォーム --}}
    <form action="{{ route('myprofile.destroy', $user->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE');
        {{-- 削除ボタン --}}
        <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">アカウント削除</button>
    </form>
</div>
