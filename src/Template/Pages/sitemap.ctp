<?php 
    header('Content-type: application/xml');

    $blog_timezone = 'UTC';
    $timezone_offset = '+00:00';
    $W3C_datetime_format_php = 'Y-m-d\Th:i:s'; // See http://www.w3.org/TR/NOTE-datetime

    $output = '<?xml version="1.0" encoding="UTF-8"?>
                <?xml-stylesheet type="text/xsl" href="//yoast.com/main-sitemap.xsl"?>'. "\n";
    $output .= '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    echo $output;

    echo '<url>';
        echo '<loc>https://infogempa.com/</loc>';
        echo '<changefreq>'.date('Y-m-d\Th:i:s').'</changefreq>';
        echo '<priority>1</priority>';
    echo '</url>';


    foreach ($gempa as $gem) {
    $time = substr($gem->time, 0, 10);
    $slug = preg_replace('/[^a-zA-Z0-9\']/', '-', $gem->place);
    $slug = str_replace('--', '-', $slug);
    $slug = strtolower($slug);

    echo '<url>';
        echo '<loc>https://infogempa.com/pages'.DS.$gem->id_gempa.DS.$slug.'.html</loc>';
        echo '<changefreq>'.date('Y-m-d\Th:i:s', $time).'</changefreq>';
        echo '<priority>0.6</priority>';
    echo '</url>';

    }

    echo '</urlset>';
?>