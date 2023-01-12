<!-- Group create -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Group create</title>
        <header class="header">
        <p class="title m-b-md header-text text-center">
        <a href="#">Waripay</a></p>
        </header>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    </head>


    <body>

    <form class="text-center flex-center" action="{{ route('group.store') }}" method="post" id="group">
        @csrf
    </form>
        <div class="col-md-4 text-center">
            <input type="text" class="form-control" name="group_name" placeholder="グループ名を入力してください " form="group">
        </div>
        <button type="submit" class='btn btn-outline-info text-center' form="group">グループ作成 </button>


    <div class="card">
    <div class="card-header">
    最近作ったグループ
    </div>
    <div class="card-body">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">作成日</th>
        <th scope="col">グループ名</th>
        <th scope="col">詳細</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>作成日</td>
        <td>グループ名</td>
        <td><a href="#" class="btn btn-primary">Go somewhere</a></td>
        </tr>
    </tbody>
    </table>
    </div>
    </div>
    <br/>
    </body>
</html>
