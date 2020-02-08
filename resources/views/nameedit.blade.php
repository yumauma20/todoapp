@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">ユーザー名編集ページ</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('username.edit') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="new-username">新しいユーザー名を入力してください</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">変更</button>
                </div>
              </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection