<div class="accordion">
    @foreach ($specification as $k=>$items)
    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse_{{$k}}" aria-expanded="false">
        <div class="icon caret-svg"></div>
        {{ $items->name }}
    </div>

    <div class="accordion-body collapse" id="collapse_{{$k}}" style="">
        @foreach ($items->specificationTypes as $item)
        <div class="accordion-body-content">
            <input type="checkbox" name="spec_type[]" id="spec_type" class="spec_type" value="{{ $item->id }}">
            {{ $item->spec_type }}
        </div>
        @endforeach

    </div>

    @endforeach





</div>


<style>
    .accordion-body {

    padding-left: 27px;
}
</style>
