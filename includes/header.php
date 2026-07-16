<?php
$pageMeta = $pageMeta ?? [];
$title = $pageMeta['title'] ?? SITE_NAME . ' - Digital Marketing and Website Development Company';
$description = $pageMeta['description'] ?? 'Mega Techzy helps businesses grow online with websites, SEO, paid ads, branding, automation and lead generation.';
$path = $pageMeta['path'] ?? '';
$canonical = site_url($path);
$ogImage = site_url('assets/images/mega-techzy-logo.png');
$robots = $pageMeta['robots'] ?? 'index, follow';
$schemas = array_merge(build_global_schema(), $pageSchemas ?? []);
?>
<!doctype html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title); ?></title>
    <meta name="description" content="<?= e($description); ?>">
    <link rel="canonical" href="<?= e($canonical); ?>">
    <meta name="robots" content="<?= e($robots); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e(SITE_NAME); ?>">
    <meta property="og:title" content="<?= e($title); ?>">
    <meta property="og:description" content="<?= e($description); ?>">
    <meta property="og:url" content="<?= e($canonical); ?>">
    <meta property="og:image" content="<?= e($ogImage); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($title); ?>">
    <meta name="twitter:description" content="<?= e($description); ?>">
    <meta name="twitter:image" content="<?= e($ogImage); ?>">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        window.addEventListener('load', function () {
            window.setTimeout(function () {
                var tag = document.createElement('script');
                tag.async = true;
                tag.src = 'https://www.googletagmanager.com/gtag/js?id=G-EQ0FXSWDD4';
                document.head.appendChild(tag);
                gtag('config', 'G-EQ0FXSWDD4');
            }, 1500);
        }, { once: true });
    </script>
    <link rel="icon" type="image/svg+xml" href="<?= e(asset_url('icons/favicon.svg')); ?>">
    <?php if ($path === ''): ?>
        <link rel="preload" as="image" href="<?= e(asset_url('images/mega-techzy-digital-growth-hero.webp')); ?>" type="image/webp" fetchpriority="high">
    <?php endif; ?>
    <link rel="stylesheet" href="<?= e(asset_url('css/styles.min.css')); ?>">
    <?php foreach ($schemas as $schema): ?>
        <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
    <?php endforeach; ?>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
