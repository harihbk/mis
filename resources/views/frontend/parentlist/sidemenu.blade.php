@foreach($parent_categorys as $k=>$cat)
<li class="list-group-item">
    <span class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="false" aria-controls="first"
        data-target="#first{{$k}}">{{ $cat->name }}</span>
    <div class="collapse" id="first{{$k}}">
        <ul class="nav flex-column ml-3" style="margin-left: 70px;">
            @foreach($cat->childcategories as $kk=>$child)
            <li class="nav-item"><a class="nav-link" href="{{ route('website.products',$child->id) }}">- {{ $child->name
                    }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</li>
@endforeach
