<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 【PHP/Laravel】14課題で追記
use App\Models\Profile;

class ProfileController extends Controller
{
    //【PHP/Laravel】14課題で追記
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // profile/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
