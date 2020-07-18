@extends('layouts.app')

@section('content')

<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-panel account-setting">
                <div class="row justify-content-center title">
                    <span class="name">{{Auth::user()->name}}</span>
                    <span>　アカウント情報編集</span>
                </div>

                <form action="{{route('setting.account')}}" method="POST" class="account-setting-form">
                    @csrf
                    <div class="row form-group">
                        <label for="screen_name">名前</label>
                        <input type="text" name="screen_name" id="screen_name" class="form-control" value="{{Auth::user()->screen_name}}">
                    </div>
                    <div class="row form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                    <div class="row form-group">
                        <label for="twitter">TwitterID</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" value="{{Auth::user()->twitter}}">
                    </div>
                    <div class="row form-group">
                        <label for="referral">自己紹介</label>
                        <textarea name="referral" id="referral" class="form-control">{{Auth::user()->referral}}</textarea>
                    </div>
                    <div class="row form-group">
                        <label for="profile_image">プロフィール画像</label>
                            <img src="{{Auth::user()->profile_image}}" alt="">
                        </div>
                    <div class="row form-group mb-5">
                        <input type="file" name="profile_image" id="profile_image">
                    </div>

                    <input type="submit" value="更新する" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
