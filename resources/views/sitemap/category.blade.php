@php
    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categories as $tag)

            @foreach($tag->posts as $path)
                <url>
                    <loc>{{ $path->path() }}</loc>
                    <changefreq>weekly</changefreq>
                    <priority>0.9</priority>
                </url>
            @endforeach

            @foreach($tag->files as $path)
                <url>
                    <loc>{{ $path->path() }}</loc>
                    <changefreq>weekly</changefreq>
                    <priority>0.9</priority>
                </url>
            @endforeach

    @endforeach

</urlset>
