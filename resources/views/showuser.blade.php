@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">ユーザーページ</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
              <div class="user-name">
                <label for="username">ユーザー名</label>
                <p>{{ Auth::user()->name }}</p>
              </div>
              <div class="user-email">
                <label for="email">メールアドレス</label>
                <p>{{ Auth::user()->email }}</p>
              </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection