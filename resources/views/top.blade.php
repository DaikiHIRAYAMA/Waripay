<!-- / Toppage -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Waripay</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Waripay
                </div>
                <div class="links">
                    <a href="{{ route('group.create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class='btn btn-outline-info text-center'>グループ作成</button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
