

    @foreach($category as $k=>$cat)
        <li class="list-group-item">
                <span class="nav-link leftNav" href="#" data-toggle="collapse" aria-expanded="true"
                aria-controls="first" data-target="#first{{$k}}"><strong>{{ $cat->name }}</strong></span>
                <div class="collapse in" id="first{{$k}}">
                        <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                            @foreach($cat->subcategory as $kk=>$subcat)
                                    <li class="nav-item"><a class="nav-link"
                                        href="{{ route('website.parentcats',$subcat->id) }}">{{ $subcat->name }}</a>
                                    </li>
                            @endforeach
                        </ul>
                        <div class="d-grid">
                            <button type="button" class="btn mt-3 btn-primary more_product">More Products</button>
                        </div>
                    </div>
        </li>

    @endforeach

