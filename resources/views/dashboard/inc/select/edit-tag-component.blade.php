<div class="select2-purple">
    <select id="tags_selector" name="tags[]" multiple="multiple" data-placeholder="Select Tags" data-dropdown-css-class="select2-purple" style="width: 100%;">
        @if(count($tags) > 0)
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}" selected="selected">{{ __($tag->title) }}</option>
            @endforeach
        @endif
    </select>
</div>
