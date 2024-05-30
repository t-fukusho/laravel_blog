{{-- プロフィール編集画面 --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール編集</title>
</head>
<style>
    /* カスタムスタイル */
    body {
        font-family: 'Noto Sans JP', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 400px;
        width: 100%;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .form-group input {
        width: calc(100% - 50px);
        /* アイコン分のスペースを考慮 */
        padding: 15px 20px 15px 40px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s;
        box-sizing: border-box;
        /* パディングを含めたサイズで計算 */
    }


    .form-group input:focus {
        border-color: #007bff;
    }

    .form-group i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #aaa;
        font-size: 18px;
    }

    .btn-primary,
    .btn-info,
    .btn-danger {
        width: 100%;
        padding: 10px 0;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .alert {
        width: 100%;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 8px;
        color: #fff;
        background-color: #dc3545;
    }

    .alert-success {
        background-color: #28a745;
    }

    .user-icon {
        text-align: center;
        margin-bottom: 20px;
    }

    .user-icon img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }

    .section {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fafafa;
    }
</style>

<body>
    {{-- プロフィール編集ページ --}}
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

        {{-- アイコン編集セクション --}}
        <div class="section">
            {{-- 設定されたアイコンまたはダミー画像の表示 --}}
            <div class="user-icon">
                <h3>プロフィール画像</h3>
                <img src="{{ $user->icon_path ? asset($user->icon_path) : 'https://picsum.photos/200' }}"
                    alt="ユーザーアイコン">
            </div>

            {{-- アイコンの編集 --}}
            <form action="{{ route('myprofile.icon_update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="icon" class="form-control">
                <button type="submit" class="btn btn-info">アイコンを変更</button>
            </form>
        </div>

        {{-- ユーザー情報編集セクション --}}
        <div class="section">
            <form action="{{ route('myprofile.update', $user->id) }}" method="POST">
                @csrf
                {{-- 名前入力フィールド --}}
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" id="name" class="form-control" placeholder="ユーザー名"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                {{-- パスワード入力フィールド (任意) --}}
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="パスワード (変更がある場合)">
                </div>
                {{-- 更新ボタン --}}
                <button type="submit" class="btn btn-primary">名前・パスワードを変更</button>
            </form>
        </div>
        {{-- アカウント削除セクション --}}
        <div class="section">
            <form action="{{ route('myprofile.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                {{-- 削除ボタン --}}
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('本当に削除しますか？\r\nあなたの書いた記事,アカウントが削除されます。\r\nこの操作は取り消せません。')">アカウント削除</button>
            </form>
        </div>

        <div>
            <a href="/blog/">トップページに戻る</a>
        </div>

    </div>



</body>
