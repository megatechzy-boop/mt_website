<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$pageMeta = [
    'title' => 'Industries Mega Techzy Serves',
    'description' => 'Mega Techzy supports manufacturing, real estate, healthcare, education, retail, ecommerce, professional services and local businesses.',
    'path' => 'industries/',
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Industries</p>
            <h1>Digital growth systems for practical business categories</h1>
            <p>Each industry needs a different proof story, search strategy and conversion path. Mega Techzy adapts the plan accordingly.</p>
        </div>
    </section>
    <section class="section">
        <div class="container pill-grid">
            <?php foreach ($industries as $industry): ?>
                <span><?= e($industry); ?></span>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

