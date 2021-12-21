

function blog_render_select(tag_name, render_url) {
    var dt = $(tag_name).select2({
        ajax: {
            url: render_url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data.data,
                }
            },
            theme: "bootstrap4"
        }
    });

    return dt;
}


function load_image_file(event, preview_id) {
    var output = document.getElementById(preview_id);
    output.src = URL.createObjectURL(event.target.files[0]);

    output.onload = function () {
        URL.revokeObjectURL(output.src);
    }
}


