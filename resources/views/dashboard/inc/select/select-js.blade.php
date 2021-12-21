@section('script')
<script>
    $(function() {

        blog_render_select("#tags_selector", "{{ route('admin.select.tags') }}");
        blog_render_select("#category_selector", "{{ route('admin.select.categories') }}");


        $('#remove_thumb').click(function() {
            var is_checked = this.checked;
            var tag = $('.custom-file-input');
            var old_data = tag.attr('value');
            if (is_checked) {
                tag.attr('value', '');
            } else {
                tag.attr('value', "{{ !empty($thumbnail) ? $thumbnail : '' }}");
                console.log(tag.attr('value'));
            }
        });


        $('.textarea').summernote({
            height: 500
        })
    });
</script>
@endsection
