<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ一覧</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
      <h1 class="text-center mb-5">お問い合わせ一覧</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">名前</th>
            <th scope="col">選択</th>
            <th scope="col">お問い合わせ日時</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($inquiries as $inquiry)
            <tr>
              <td>{{ $inquiry->name }}</td>
              <td>
                @foreach ($checks as $check)
                {{-- inquiriesテーブルのidとchecksテーブルのinquirers_idが同じもののみ表示 --}}
                  @if ($inquiry->id == $check->inquirers_id)
                    {{ $check_items[$check->check_item] }}
                  @endif
                @endforeach
              </td>
              <td>{{ $inquiry->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</body>
</html>