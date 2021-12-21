@php
    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $time }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ route('sitemap.category') }}</loc>
        <lastmod>{{ $time }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ route('sitemap.tags') }}</loc>
        <lastmod>{{ $time }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ route('sitemap.post') }}</loc>
        <lastmod>{{ $time }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ route('sitemap.firmware') }}</loc>
        <lastmod>{{ $time }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ route('sitemap.pages') }}</loc>
        <lastmod>{{ $time }}</lastmod>
    </sitemap>

</sitemapindex>
