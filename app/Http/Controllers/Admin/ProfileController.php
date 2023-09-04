<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ↓【PHP/Laravel】09　課題7で追記
use App\Models\Profile;

class ProfileController extends Controller
{
    //【PHP/Laravel】03　課題4.5で追加
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        // 以下を【PHP/Laravel】09課題7で追記
        // Validationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();

        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
