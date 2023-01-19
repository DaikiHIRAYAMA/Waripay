<!-- Group create -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Group create</title>
        <header class="header">
        <p class="title m-b-md header-text text-center">
        <a onclick="window.location.reload(true);" class='reload'>Waripay</a></p>
        </header>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        <!-- JS -->
        <script src="{{ asset('js/member.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- livewire -->
        @livewireStyles()
    </head>


    <body>

    <div>
    <p class="text-center">グループ名</p>
    <h1 class="text-center">{{ $group->group_name }}</h1>

    </div>

    <form action="{{ route('member.store') }}" method="post" id="member">
        @csrf
    </form>

    @livewire('member')


    <div class="text-center">
    <button type='submit' class='btn btn-outline-info text-center' form="member">メンバー決定</button>
    </div>

    <!-- livewire -->
    @livewireScripts()
    </body>
</html>
