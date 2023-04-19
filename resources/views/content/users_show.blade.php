<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ユーザーリスト</title>


</head>
    @include('includes.header')
    <h4>ユーザーリスト</h4>
<table calss="table table-bordered">
    <thead>

        <tr>
        <th scope="col" >ID</th>
        <th scope="col">名前</th>
        <th scope="col" >メールアドレス</th>
        <th scope="col" >プロフ写真</th>
        <th scope="col">プロフィール</th>
        <th scope="col">ユーザー権限</th>
        <th scope="col">作成日時</th>
        <th scope="col">更新日</th>
        <th scope="col">編集</th>
        <th scope="col">削除</th>
        </tr>
    </thead>


    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td >{{$user->name}}</td>
            <td >{{$user->email}}</td>
            <td ><img src="{{asset('storage/images/'.$user->image)}}" alt=""width="50"></td>
            <td>{{$user->prof}}</td>
            <td >
                @if($user->role == 0) 管理者 @else  一般  @endif
            </td>
            <td >{{$user->created_at}}</td>
            <td >{{$user->updated_at}}</td>
            <td >
                <div class="edit-delete">
                <div class="edit-btn">
                    <a href="user/edit/{{ $user->id }}">編集</a>
                </div>
            </td>
            <td >
                <form method="POST" action="{{ route('user_delete', $user->id)}}" onsubmit="return checkDelete()">
                @csrf
                <div class="delete-btn">
                    <button type="submit" class="btn btn-danger"onClick="return confirm('本当に削除しますか？');">削除</button>
                </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
     @include('includes.footer')
</html>
