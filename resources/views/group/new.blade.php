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
        <style>
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: "Nunito", sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: 0.1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
            @livewireStyles
    </head>


    <body>
    @livewireScripts

    <form class="text-center flex-center">
    <div class="col-md-4 text-center">
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="グループ名を入力してください">
 #TODO: type change
    </div>
@include('livewire.group-user-add')

    <button  type='submit' class='btn btn-outline-info text-center'>グループ作成</button>
    </div>
    #TODO: type change
    </form>


    </div>

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
    @livewireScripts
    </body>
</html>
