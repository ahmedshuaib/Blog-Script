@php
    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $file)
        <url>
            <loc>{{ $file->path() }}</loc>
            <lastmod>{{ $file->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
