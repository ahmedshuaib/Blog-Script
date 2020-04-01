@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger fade show">
            <i class="fa fa-times"></i> {{ __($error)  }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success fade show">
        <i class="fa fa-check"></i> {{ __(session('success')) }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger fade show">
        <i class="fa fa-times"></i> {{ __(session('error')) }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
