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
