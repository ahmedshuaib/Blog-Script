<div class="col-md-4 col-sm-12">
    <form action="{{ route('search.keyword') }}" method="get">
        <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
        </div>
    </form>



    @if(count($categories) > 0)
        <div class="card-header border-0 font-weight-bold border-bottom-red-5px">
            <span class="card-title">Categories</span>
        </div>
        <ul class="list-group list-group-flush mb-3">
            @foreach($categories as $category)
                <li class="list-group-item"><a class="card-link" href="{{ $category->path() }}">{{ __($category->title) }}</a></li>
            @endforeach
        </ul>
    @endif


    @if(count($recent_posts) > 0)
        <div class="card-header border-0 font-weight-bold border-bottom-red-5px">
            <span class="card-title">Recent posts</span>
        </div>
        <ul class="list-group list-group-flush mb-3">
            @foreach($recent_posts as $rpost)
                <li class="list-group-item"><a class="card-link" href="{{ $rpost->path() }}">{{ __($rpost->title) }}</a></li>
            @endforeach
        </ul>
    @endif


    @if(count($recent_firmwares) > 0)
        <div class="card-header border-0 font-weight-bold border-bottom-red-5px">
            <span class="card-title">Recent Firmware</span>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($recent_firmwares as $rfirm)
                <li class="list-group-item"><a class="card-link" href="{{ $rfirm->path() }}"> {{ __($rfirm->title )}} </a> </li>
            @endforeach
        </ul>
    @endif

</div>
