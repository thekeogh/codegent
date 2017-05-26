<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xhtml="http://www.w3.org/1999/xhtml" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ secure_url('/') }}</loc>
    </url>
    <url>
        <loc>{{ secure_url(route('about')) }}</loc>
    </url>
    <url>
        <loc>{{ secure_url(route('products')) }}</loc>
    </url>
    <url>
        <loc>{{ secure_url(route('agency')) }}</loc>
    </url>
    <url>
        <loc>{{ secure_url(route('blog.index')) }}</loc>
    </url>
    <url>
        <loc>{{ secure_url(route('blog.feed')) }}</loc>
    </url>
    @foreach ($blogcats as $blogcat)
        <url>
            <loc>{{ secure_url(route('blog.category', $blogcat->slug, false)) }}</loc>
        </url>
    @endforeach
    @foreach ($blogtags as $blogtag)
        <url>
            <loc>{{ secure_url(route('blog.tag', $blogtag->slug, false)) }}</loc>
        </url>
    @endforeach
    @foreach ($blogarticles as $blogarticle)
        <url>
            <loc>{{ secure_url(route('blog.show', [$blogarticle->published_at->format('Y'), $blogarticle->published_at->format('n'), $blogarticle->slug], false)) }}</loc>
        </url>
    @endforeach
    <url>
        <loc>{{ secure_url(route('contact')) }}</loc>
    </url>
    
</urlset>
