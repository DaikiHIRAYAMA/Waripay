<!-- Group create -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Group create</title>
        <header class="header">
        <p class="title m-b-md header-text text-center">
        <a href="/">Waripay</a></p>
        </header>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    </head>


    <body>

    <form class="text-center flex-center pb-3" action="{{ route('group.store') }}" method="post" id="group">
        @csrf
        <div class="col-md-4 text-center">
            <input type="text" class="form-control" name="group_name" placeholder="グループ名を入力してください " form="group">
        </div>
            <button type="submit" class='btn btn-outline-info text-center' form="group">グループ作成 </button>
    </form>
    <br/>
    </body>
</html>
