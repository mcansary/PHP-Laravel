{{--【PHP/Laravel】11課題1で作成 --}}
@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $profile_form->name) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="radio" name="gender" value="male" 
                            @if ('male' == old('gender', $profile_form->gender))
                                checked
                            @endif
                            >男  
                            <input type="radio" class="gender-margin" name="gender" value="female" {{ 'female' == old('gender', $profile_form->gender) ? 'checked' : '' }}>女
                            {{--<input type="text" class="form-control" name="gender" value="{{ old('gender') }}">--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味(hobby)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="10">{{ old('hobby', $profile_form->hobby) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction', $profile_form->introduction) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection