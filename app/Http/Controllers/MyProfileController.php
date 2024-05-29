<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MyProfileController extends Controller
{

    // プロフィール編集画面を表示するためのメソッド
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('myprofile.edit', compact('user'));
    }

    // プロフィール情報を更新するためのメソッド
    public function update(Request $request, $id)
    {

        // バリデーションルールの定義
        if ($request->password != null) {
            $request->validate([
                'name' => 'required|string|max:255',
                'password' => 'string|min:8',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        }
        $user = User::findOrFail($id);
        // dd($user);
        $user->update([
            'name' => $request->name,
            // パスワードが入力された場合のみ更新
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('myprofile.edit', $id)->with('success', 'プロフィールが更新されました。');
    }

    // アカウントを削除するためのメソッド
    public function destroy($id)
    {
        DB::beginTransaction(); // トランザクションの開始

        try {
            // 外部キー制約を一時的に無効にする
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // ユーザーに関連する記事を削除
            $user = Article::where('user_id', $id)->delete();
            // ユーザーを削除
            $user = User::findOrFail($id);
            $user->delete();

            // 外部キー制約を再度有効にする
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            DB::commit(); // トランザクションのコミット

            return redirect()->route('login')->with('success', 'アカウントが削除されました');
        } catch (\Exception $e) {
            DB::rollBack(); // トランザクションのロールバック

            return redirect()->route('login')->with('error', 'アカウントの削除に失敗しました: ' . $e->getMessage());
        }
    }
}
