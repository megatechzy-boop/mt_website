<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$industryShowcase = [
    ['name' => 'Manufacturing', 'image' => 'industry-manufacturing.png', 'copy' => 'Industrial visibility and lead systems.'],
    ['name' => 'Real Estate', 'image' => 'industry-real-estate.png', 'copy' => 'Launch campaigns made to move enquiries.'],
    ['name' => 'Healthcare', 'image' => 'industry-healthcare.png', 'copy' => 'Trust-led digital experiences for care.'],
    ['name' => 'Education', 'image' => 'industry-education.png', 'copy' => 'Demand generation for learning brands.'],
    ['name' => 'Retail and Ecommerce', 'image' => 'industry-commerce.png', 'copy' => 'Campaigns built for attention and action.'],
];
$pageMeta = [
    'title' => 'Industries Mega Techzy Serves',
    'description' => 'Mega Techzy supports manufacturing, real estate, healthcare, education, retail, ecommerce, professional services and local businesses.',
    'path' => 'industries/',
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Industries</p>
            <h1>Digital growth systems for practical business categories</h1>
            <p>Each industry needs a different proof story, search strategy and conversion path. Mega Techzy adapts the plan accordingly.</p>
        </div>
    </section>
    <section class="section agency-industry-directory">
        <div class="container industry-showcase-grid">
            <?php foreach ($industryShowcase as $index => $industry): ?>
                <article class="industry-tile industry-tile-<?= $index + 1; ?>">
                    <img src="/assets/images/<?= e($industry['image']); ?>" alt="<?= e($industry['name']); ?> digital marketing" loading="lazy" width="1536" height="1024">
                    <div class="industry-tile-overlay">
                        <span>0<?= $index + 1; ?></span>
                        <h2><?= e($industry['name']); ?></h2>
                        <p><?= e($industry['copy']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="container industry-chip-row">
            <span>Professional Services</span><span>Local Businesses</span><span>Retail</span><span>Lead-focused B2B</span>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
