<!-- Event create -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index</title>
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
    <div class='text-center mb-3'>
        <a href="{{ route('event.create', $parameter) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
            <button class='btn btn-outline-info text-center'>建て替え記録を追加</button>
        </a>
    </div>

@foreach ($events as $event)
    <div class="card">
        <h5 class="card-header"></h5>
        <div class="card-body">
            <p class="card-text">日付：{{ $event->created_at }}</p>
            <p class="card-text">誰が：{{ $event->payer_list }} 名前表示</p>
            <p class="card-text">誰の：{{ $event->receiver_list }} array→名前表示</p>
            <p class="card-text">何を：{{ $event->event_name }}</p>
            <p class="card-text">いくら支払った：{{ $event->cost }}</p>
            <a href="#" class="btn btn-primary">修正</a>
        </div>
    </div>
@endforeach

    <!-- livewire -->
    @livewireScripts()
</body>

<footer>

<div class="card-group mb-3">
@foreach ($calculates as $calculate )
    <div class="card">
    <div class="card-body ">
        <h5 class="card-title">{{ $calculate[0] }}</h5>
@if($calculate[1] != NULL)
    @if ( array_sum($calculate[1]) < 0)
        <p class="card-text"> <font color = 'red'>{{ array_sum($calculate[1]) }} </font></p>
    @else
        <p class="card-text">{{ array_sum($calculate[1]) }}</p>
        <p class="card-text"><small class="text-muted">URLbutton</small></p>
    @endif
@else
    <p class="card-text text-center">建て替え記録はありません</p>
@endif
    </div>
    </div>
@endforeach

</div>
<div class="container  text-center">
    <input type="text" name="order_site_url" id="order-site-url" class="form-control" value= {{ url()->current() }} >
    <button class="btn btn-sm btn-primary text-center mt-1" id="btn-copy-url">URLをコピー</button>
</div>
</footer>
<script>
// コピーボタン押下時の処理
$("#btn-copy-url").click(function () {
    // コピー対象を取得
    var copyTarget = $("#order-site-url");
    // コピー対象のテキストを選択
    copyTarget.select();
    // 選択したテキストをクリップボードにコピー
    document.execCommand("Copy");
    // コピー完了メッセージの表示
    alert("URLをコピーしました。");
});
var url = location.href;
</script>
</html>
