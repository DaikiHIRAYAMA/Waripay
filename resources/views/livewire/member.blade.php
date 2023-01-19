<div class="text-center">
    @for($i = 0; $i < $cnt; $i++)
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">{{ $i+1 }} 人目</label>
        <div class="col-sm-8">
            <input type="text" name="member_name_{{ $i }}"  id="member_name_{{ $i }}" class="form-control" form="member" placeholder="名前を入力してください" required/>
        </div>
    </div>
    @endfor

    <input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt; ?>" form="member" >

    <div class="mb-3">
        <button class="btn btn-outline-success text-center" wire:click="add">追加</button>

    @if(!($cnt < 3))
        <button class="btn btn-outline-danger text-center" wire:click="del">削除</button>
    @endif
    </div>
</div>
