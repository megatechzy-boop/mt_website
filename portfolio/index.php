<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$pageMeta = [
    'title' => 'Mega Techzy Portfolio - Websites, SEO and Lead Generation Work',
    'description' => 'See examples of Mega Techzy website, SEO, paid ads, branding and lead generation work for growing businesses.',
    'path' => 'portfolio/',
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'Portfolio', 'path' => 'portfolio/'],
])];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Portfolio</p>
            <h1>Growth systems planned around trust, visibility and enquiries</h1>
            <p>These sample stories show how Mega Techzy thinks about business outcomes across websites, SEO, ads and automation.</p>
        </div>
    </section>
    <section class="section">
        <div class="container card-grid">
            <?php foreach ($portfolioItems as $item): ?>
                <article class="case-card">
                    <p class="eyebrow"><?= e($item['type']); ?></p>
                    <h2><?= e($item['title']); ?></h2>
                    <p><?= e($item['result']); ?></p>
                    <a class="link-arrow" href="/case-studies/">View case studies <?= icon_svg('arrow'); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
