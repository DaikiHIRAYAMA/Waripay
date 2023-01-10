<div>
    @for($i = 0; $i < $cnt; $i++)
    <p><input type="text" name="groupUserName" value=""></p>
    <p>{{ $cnt }}</p>
    @endfor
    <p><button wire:click="add">追加</button></p>
    <p><button wire:click="del">削除</button></p>
</div>
