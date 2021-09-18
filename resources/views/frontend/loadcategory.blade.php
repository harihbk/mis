

    @foreach($category as $k=>$cat)
        <li class="list-group-item">
                <span class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="false"
                aria-controls="first" data-target="#first{{$k}}">{{ $cat->name }}</span>
                <div class="collapse" id="first{{$k}}">
                        <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                            @foreach($cat->subcategory as $kk=>$subcat)
                                    <li class="nav-item"><a class="nav-link"
                                        href="{{ route('website.parentcats',$subcat->id) }}">- {{ $subcat->name }}</a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
        </li>
    @endforeach

