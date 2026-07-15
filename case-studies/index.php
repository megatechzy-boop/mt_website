<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$pageMeta = [
    'title' => 'Mega Techzy Case Studies',
    'description' => 'Explore Mega Techzy case study themes for SEO, website development, paid ads and lead generation systems.',
    'path' => 'case-studies/',
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Case Studies</p>
            <h1>Proof-led growth stories</h1>
            <p>Case studies will expand as projects are published with measurable context, strategy and learnings.</p>
        </div>
    </section>
    <section class="section">
        <div class="container card-grid">
            <?php foreach ($portfolioItems as $item): ?>
                <article class="case-card">
                    <p class="eyebrow"><?= e($item['type']); ?></p>
                    <h2><?= e($item['title']); ?></h2>
                    <p><?= e($item['result']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

