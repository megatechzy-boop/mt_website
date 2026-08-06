<?php
$pageMeta = $pageMeta ?? [];
$title = seo_title($pageMeta['title'] ?? SITE_NAME . ' - Digital Marketing and Website Development Company');
$description = seo_description($pageMeta['description'] ?? 'Mega Techzy helps businesses grow online with websites, SEO, paid ads, branding, automation and lead generation.');
$path = $pageMeta['path'] ?? '';
$canonical = $pageMeta['canonical'] ?? site_url($path);
$ogImage = $pageMeta['og_image'] ?? site_url('assets/images/megatechzy-logo-enhanced.png');
$ogType = $pageMeta['og_type'] ?? 'website';
$robots = $pageMeta['robots'] ?? 'index, follow';
if (str_starts_with($robots, 'index') && !str_contains($robots, 'max-image-preview')) {
    $robots .= ', max-image-preview:large, max-snippet:-1, max-video-preview:-1';
}
$htmlLang = $pageMeta['language'] ?? 'en-IN';
$ogLocale = str_replace('-', '_', $htmlLang);
$hreflangLinks = $pageMeta['hreflang'] ?? [];
$pageType = $pageMeta['schema_type'] ?? 'WebPage';
$schemas = array_merge(
    build_global_schema(),
    [webpage_schema($title, $description, $canonical, $htmlLang, $pageType, $pageMeta['about'] ?? [])],
    $pageSchemas ?? []
);
?>
<!doctype html>
<html lang="<?= e($htmlLang); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title); ?></title>
    <meta name="description" content="<?= e($description); ?>">
    <link rel="canonical" href="<?= e($canonical); ?>">
    <?php foreach ($hreflangLinks as $hreflang => $href): ?>
        <link rel="alternate" hreflang="<?= e($hreflang); ?>" href="<?= e($href); ?>">
    <?php endforeach; ?>
    <meta name="robots" content="<?= e($robots); ?>">
    <meta property="og:type" content="<?= e($ogType); ?>">
    <meta property="og:locale" content="<?= e($ogLocale); ?>">
    <meta property="og:site_name" content="<?= e(SITE_NAME); ?>">
    <meta property="og:title" content="<?= e($title); ?>">
    <meta property="og:description" content="<?= e($description); ?>">
    <meta property="og:url" content="<?= e($canonical); ?>">
    <meta property="og:image" content="<?= e($ogImage); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($title); ?>">
    <meta name="twitter:description" content="<?= e($description); ?>">
    <meta name="twitter:url" content="<?= e($canonical); ?>">
    <meta name="twitter:image" content="<?= e($ogImage); ?>">
    <meta name="theme-color" content="#0b1020">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        (function () {
            var loaded = false;
            var loadAnalytics = function () {
                if (loaded) return;
                loaded = true;
                ['pointerdown', 'keydown', 'touchstart', 'scroll'].forEach(function (eventName) {
                    window.removeEventListener(eventName, loadAnalytics);
                });
                var tag = document.createElement('script');
                tag.async = true;
                tag.src = 'https://www.googletagmanager.com/gtag/js?id=G-EQ0FXSWDD4';
                document.head.appendChild(tag);
                gtag('config', 'G-EQ0FXSWDD4');
            };
            ['pointerdown', 'keydown', 'touchstart', 'scroll'].forEach(function (eventName) {
                window.addEventListener(eventName, loadAnalytics, { passive: true, once: true });
            });
        }());
    </script>
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <link rel="icon" type="image/png" href="<?= e(asset_url('icons/favicon-transparent.png')); ?>">
    <link rel="apple-touch-icon" href="<?= e(asset_url('icons/favicon-transparent.png')); ?>">
    <link rel="preload" as="image" href="<?= e(asset_url('images/megatechzy-logo-enhanced.webp')); ?>" type="image/webp" fetchpriority="high">
    <?php if ($path === ''): ?>
        <link rel="preload" as="image" href="<?= e(asset_url('images/mega-techzy-digital-growth-hero.webp')); ?>" type="image/webp" fetchpriority="high">
    <?php endif; ?>
    <link rel="preload" href="<?= e(asset_url('css/styles.min.css')); ?>" as="style">
    <link rel="stylesheet" href="<?= e(asset_url('css/styles.min.css')); ?>">
    <?php foreach ($schemas as $schema): ?>
        <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php endforeach; ?>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
