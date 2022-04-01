{{-- <div class="accordion">
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
</div> --}}

<h2>Filter</h2>
@foreach ($specification as $k=>$items)
<button class="accordion filter-accordion active">
    {{ $items->name }}
</button>
<div class="panel" style="max-height: unset">
    @foreach ($items->specificationTypes as $item)
    <div class="accordion-body-content">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="spec_type[]" id="spec_type" class="spec_type" value="{{ $item->id }}">
                {{ $item->spec_type }}
            </label>
        </div>
    </div>
    @endforeach
</div>
@endforeach

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
    }
</script>

<style>
    .accordion-body {

        padding-left: 27px;
    }

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .accordion.active,
    .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .accordion .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>
