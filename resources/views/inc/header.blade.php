<header>
    @auth
        <nav class="navbar navbar-expand-lg navbar-dark border-bottom-red-5px bg-primary">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dash') }}">
                                   <i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth




    <div class="brand-text brand-header bg-dark border-bottom-red-5px">
        <div class="container p-1">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <a href="/">
                        <h2 class="text-success mt-5 border-5px-radius"><b><i>A</i> <span class="text-white">Telecom</span> <span class="text-red">BD</span></b></h2>
                    </a>
                </div>

                <div class="col-md-7 d-none d-sm-block col-sm-6 col-xs-12 text-right ml-auto">
                    <img class="bkash-logo-holder" src="{{ asset('/storage/img/'.$default->favicon_icon) }}">
                    <p class="text-white">{{ __($default->account_number) }}</p>
                </div>

            </div>

        </div>
    </div>
    <div class="border-bottom-red-5px">
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}"><span class="fas fa-home"></span> {{ __('Home') }} <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('firmware') ? 'active' : '' }}" href="{{ route('all.firmware') }}"><span class="fas fa-file-archive"></span> {{ __('Firmware') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ route('all.posts') }}"><span class="fas fa-blog"></span> {{ __('Blog') }}</a>
                        </li>
                        @if(count($pages) > 0)
                            @foreach($pages as $page)
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('page/*') ? 'active' : '' }}" href="{{ $page->path() }}">{!! __($page->title) !!} </a>
                                </li>
                            @endforeach
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}"><span class="fas fa-phone"></span> {{ __('Contact') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<section class="bg-light p-2 border-bottom">
    <div class="container">

        @if(count($recent_firmwares) > 0)
            <div class="rf-mq-container mq-container container row">
                <div class="col-md-2 col-sm-3 col-xs-2 text-right">
                    <i class="fas fa-clock"></i>
                    <span class="hidden-xs font-13 font-weight-bold">Recent Files</span>
                </div>

                <div class="col-md-10 col-sm-9 col-xs-10">
                    <div class="marquee-set">
                        <div class="marquee-content">
                            @foreach($recent_firmwares as $firmware)
                                <div class="mq-file-item inline">
                                    <a href="{{ $firmware->path() }}">{{ __($firmware->title) }}</a>
                                    <span class="item_date item_detail">[ {{ $firmware->created_at->diffForHumans() }} ]</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif



        @if(count($file_views) > 0)
            <div class="tf-mq-container mq-container container row">
                <div class="col-md-2 col-sm-3 col-xs-2 text-right">
                    <i class="fas fa-bolt"></i>
                    <span class="hidden-xs font-13 font-weight-bold">Top Views</span>
                </div>

                <div class="col-md-10 col-sm-9 col-xs-10">
                    <div class="marquee-set">
                        <div class="marquee-content">
                            @foreach($file_views as $file)
                                <div class="mq-file-item inline">
                                    <a href="{{ $file->path() }}">{{ __($file->title) }}</a>

                                    <span class="item_downloads item_detail">[ {{ __($file->total_views) }} Views ]</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

</section>
