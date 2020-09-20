<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">お問い合わせ</h1>
        @if (session('flash_message'))
            <div class="alert alert-danger">
                {{ session('flash_message') }}
            </div>
        @endif
        <div class="container">
            {!! Form::open(['route' => 'process', 'method' => 'POST']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お名前</p>
                    <div class="col-sm-8">
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('name'))
                    <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">選択（複数選択可）</p>
                    <div class="col-sm-8">
                        @foreach ($check_items as $key => $check_item)
                            <label>{{ Form::checkbox('check_item[]', $key) }}{{ $check_item }}</label>
                        @endforeach
                    </div>
                </div>
                @if ($errors->has('check_item'))
                    <p class="alert alert-danger">{{ $errors->first('check_item') }}</p>
                @endif
                
                <div class="text-center">
                    {{ Form::submit('送信', ['name' => 'submit', 'class' => 'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>