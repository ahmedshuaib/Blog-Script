<select name="category" data-placeholder="Select Category" class="form-control" id="category_selector">
    @if(!empty($category))
    <option value="{{ $category->id }}" selected="selected">{{ $category->title }}</option>
    @endif
</select>
