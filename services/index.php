<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$pageMeta = [
    'title' => 'Digital Marketing Services - Mega Techzy',
    'description' => 'Explore Mega Techzy services including website development, SEO, Google Ads, Meta Ads, LinkedIn Ads, automation, branding and lead generation.',
    'path' => 'services/',
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Services', 'path' => 'services/'],
    ]),
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Services</p>
            <h1>Digital marketing services built for ranking, trust and qualified leads</h1>
            <p>Choose one focused service or combine website, SEO, ads, automation and analytics into a complete growth system.</p>
        </div>
    </section>
    <section class="section">
        <div class="container card-grid service-grid">
            <?php foreach ($services as $slug => $service): ?>
                <article class="service-card">
                    <span class="card-icon"><?= icon_svg($service['icon']); ?></span>
                    <h2><a href="/services/<?= e($slug); ?>.php"><?= e($service['name']); ?></a></h2>
                    <p><?= e($service['intro']); ?></p>
                    <a class="link-arrow" href="/services/<?= e($slug); ?>.php">Learn more <?= icon_svg('arrow'); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

