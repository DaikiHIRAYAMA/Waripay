ここでグループ内の貸し借り表示
<br/>
貸し借り登録
<br/>
現在の貸し借り表示
→foreachを用いて表示
<br/>
グループの編集
<br/>
URLは group/(任意で作ったもの)/に設定する
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Waripay</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap/*') }}" />
        <!-- JS -->
        <script type="text/javascript" src="{{ asset('js/index.js') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Waripay
                </div>
                <div class="links">
                    <a href="{{ url('/create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class='btn btn-outline-info text-center'>グループ作成</button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

<DOCTYPE! html>
  <html lang="ja">
    <head>
      <meta charset="UTF-8" />
      <title>GroupHome</title>
      <link rel="stylesheet" href="../../docs/css/destyle.css" />
      <link rel="stylesheet" href="../../docs/css/main.css" />
      <link rel="stylesheet" href="../../docs/css/groupHome.css" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0"
      />
    </head>
    <body>
      <header class="header">
        <div class="home">
          <a class="goToHome" href="" class="home-area"
            ><i class="home-icon fa-solid fa-house"></i
          ></a>
        </div>
        <p class="header-text"><a class="goToHome" href="">WARICAN</a></p>
        <div class="settings">
          <a class="setting-area goToSettings" href=""
            ><i class="setting-icon fa-solid fa-gear"></i
          ></a>
        </div>
      </header>
      <section class="group-header">
        <div class="group-header-container">
          <div class="loader-wrapper" id="group-title-loader-wrapper">
            <div class="loader"></div>
          </div>
          <p class="group-header-title" id="groupHeaderTitle"></p>
          <div class="group-header-edit">
            <i class="fa-solid fa-pen"></i>
          </div>
        </div>
      </section>
      <section class="member">
        <div class="member-top-container">
          <p class="member-title">メンバー</p>
          <div class="member-button" id="member-button">
            <span id="bt-l-01"></span><span id="bt-l-02"></span>
          </div>
        </div>
        <div id="member-input-wrapper">
          <div class="member-input">
            <div class="sex-button male" id="sex-button">
              <i class="fa-solid fa-mars"></i>
            </div>
            <input
              type="text"
              id="member-name-input"
              placeholder="メンバー名を入力"
            />
            <div class="add-button" id="member-add"><p>追加</p></div>
          </div>
        </div>
        <div class="member-list">
          <div class="loader-wrapper" id="member-loader-wrapper">
            <div class="loader"></div>
          </div>
          <div class="member-item-wrapper"></div>
        </div>
      </section>
      <section class="add-event">
        <div class="add-event-button">
          <a href="" class="goToCreateEvent add-event-button-area"
            >支払いを追加</a
          >
        </div>
      </section>
      <section class="events">
        <div class="events-wrapper">
          <div class="loader-wrapper" id="events-loader-wrapper">
            <div class="loader"></div>
          </div>
          <div class="event-item-wrapper" id="" hidden>
            <div class="event-item">
              <div class="event-title">
                <p class="main-title">template</p>
                <p class="sub-title">template</p>
              </div>
              <div class="alert-message" hidden>
                <p>
                  <i class="fa-solid fa-triangle-exclamation"></i
                  >メンバーが不足しています
                </p>
              </div>
              <div class="event-cost">
                <p>template</p>
              </div>
              <div class="event-edit">
                <i class="fa-solid fa-pen"></i>
              </div>
            </div>
            <div class="event-delete-button-wrapper" id="ev-delete-bt">
              <div class="event-delete-button">
                <i class="fa-solid fa-trash-can"></i>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="payment">
        <div class="share-button-container">
          <div class="share-button-item copy-button">
            <i class="fa-regular fa-clipboard"></i>
            <p>結果をコピー</p>
          </div>
          <div class="share-button-item share-button">
            <i class="fa-solid fa-arrow-up-from-bracket"></i>
            <p>URLをLINEに送る</p>
          </div>
        </div>
        <div class="payment-heading">
          <p class="payment-title">精算方法</p>
          <div class="payment-select-container">
            <select name="payment-select" id="payment">
              <option value="equal" selected>平等に割り勘</option>
              <option value="boy+">男子少し多め</option>
              <option value="boy++">男子かなり多め</option>
            </select>
            <img
              class="select-arrow-green"
              src="../../img/select_arrow_green.png"
            />
          </div>
        </div>
        <div class="payment-item-container">
          <div class="payment-item">
            <p class="payer"></p>
            <p class="arrow">→</p>
            <p class="receiver"></p>
            <p class="payment-cost">円</p>
          </div>
        </div>
      </section>
      <div class="modal">
        <div class="modal-block">
          <div class="modal-input-box">
            <p class="modal-input-title">グループ名</p>
            <input
              type="text"
              class="modal-input"
              id="modal-input-group-name"
              placeholder="グループ名を入力してください"
            />
            <p class="modal-alert">グループ名は1文字以上入力してください。</p>
          </div>
          <div class="modal-buttons">
            <div class="modal-button cancel" id="modal-cancel-bt">
              <p>キャンセル</p>
            </div>
            <div class="modal-button edit" id="modal-edit-bt"><p>変更</p></div>
          </div>
        </div>
      </div>
      <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"
      ></script>
      <script
        src="https://kit.fontawesome.com/4cfd8ef986.js"
        crossorigin="anonymous"
      ></script>
      <script src="../../docs/js/showGroup.js" type="module"></script>
      <script src="../../docs/js/groupHome.js" type="module"></script>
      <script src="../../docs/js/goTo.js"></script>
      <script src="../../docs/js/caluculation.js"></script>
    </body></html
></DOCTYPE!>
