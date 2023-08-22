{{--【PHP/Laravel】05 課題3でファイル作成　課題4でtitleとcontentを編集 --}}
@extends('layouts.profile')

@section('title', 'プロフィールの作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
            </div>
        </div>
    </div>
@endsection