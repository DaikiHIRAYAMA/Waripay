ここでtouroku
<!-- Event create -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Group create</title>
        <header class="header">
        <p class="title m-b-md header-text text-center">
        <a>Waripay</a></p>
        </header>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        <!-- JS -->
        <script src="{{ asset('js/member.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>


    <body>
    <form action="{{ route('event.store',['parameter' => $parameter]) }}" method="post" id="event">
        @csrf
    </form>

<!-- Who to whom -->
    <div class="row">
        <div class="col-sm-6">
        <div class="card mb-3">
            <div class="card-header">誰が</div>
            <div class="card-body">
                @foreach($members as $member)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payer_list" id="payer_list" form="event" value="{{ $member->member_id }}">
                    <label class="form-check-label" for="flexRadioDefault1">
                    {{ $member->member_name }}
                    </label>
                </div>
                @endforeach
        </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="card mb-3">
            <div class="card-header">誰の</div>
            <div class="card-body">
                @foreach($members as $member)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="receiver_list" name ="receiver_list[]" form="event" value="{{ $member->member_id }}">
                        <label class="form-check-label" for="receiver_list">{{ $member->member_name }}</label>
                    </div>
                @endforeach
        </div>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="card mb-3">
            <div class="card-header">何を</div>
            <div class="card-body">
            <input type="text" class="form-control" name="event_name" id="event_name" form="event"/>
        </div>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="card mb-3">
            <div class="card-header">いくら払った</div>
            <div class="card-body">
            <input type="number" pattern="^[1-9][0-9]*$" class="cost-input form-control" name="cost" id="cost" form="event"/>
        </div>
        </div>
        </div>

    </div>

    <div class='text-center mb-3'>
            <button type='submit' form='event' class='btn btn-outline-info text-center'>建て替え記録を保存</button>
        </a>
    </div>

    <div class='text-center'>
        <a href="#" onclick="history.back(-1);return false;" class="back-button-area">
            <button class='btn btn-outline-dark text-center'>もどる</button>
        </a>
    </div>

    <div class="tab-content" id="several-content">
        <section class="several-page">
            <div class="receiver-checkbox-container"></div>


            <div class="buttons">

            </div>
        </section>
    </div>

    <footer></footer>

    <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"
    ></script>
    <script
        src="https://kit.fontawesome.com/4cfd8ef986.js"
        crossorigin="anonymous"
    ></script>
    <script src="../../../docs/js/createEvent.js"></script>
    <script src="../../../docs/js/goTo.js"></script>

    <div>
    </body>
</html>
