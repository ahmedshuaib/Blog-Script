

@if(!empty($thumbnail))
    <div class="form-group row">
        <div class="p-2">
            <div class="icheck-primary d-inline">
                <input type="checkbox" id="remove_thumb">
                <label for="remove_thumb">Remove Thumbnail</label>
            </div>
        </div>
    </div>
@endif

<div class="form-group">
    <div class="custom-file">
        <input type="file" value="{{ !empty($thumbnail) ? $thumbnail : '' }}" name="thumbnail" class="custom-file-input" onchange="load_image_file(event, 'output')" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
</div>

<div class="form-group">
    <img src="{{ !empty($thumbnail) ? asset('/storage/img/'. $thumbnail) : '' }}" class="img-thumbnail" alt="" id="output" />
</div>
