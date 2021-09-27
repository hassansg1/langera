<div class="form-check form-check-primary mb-3">
    <input onclick="handleToDoClick(this,'{{ $item->id }}');" class="form-check-input" type="checkbox"
           id="formCheckcolor1" @if($item->checked) checked="checked" @endif>
    <label class="form-check-label" for="formCheckcolor1">
        {{ $item->title }}
    </label>
</div>