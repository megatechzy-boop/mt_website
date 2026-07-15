<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$pageMeta = [
    'title' => 'Mega Techzy Blog - SEO, Websites and Digital Marketing',
    'description' => 'Read Mega Techzy insights on website development, SEO, paid ads, local marketing and lead generation.',
    'path' => 'blog/',
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'Blog', 'path' => 'blog/'],
])];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Blog</p>
            <h1>Practical digital growth guides</h1>
            <p>Useful thinking for local businesses comparing websites, SEO, ads and lead generation systems.</p>
        </div>
    </section>
    <section class="section">
        <?php if ($blogPosts): ?>
            <div class="container card-grid">
                <?php foreach ($blogPosts as $post): ?>
                    <article class="blog-card">
                        <h2><a href="/blog/<?= e($post['slug']); ?>.php"><?= e($post['title']); ?></a></h2>
                        <p><?= e($post['excerpt']); ?></p>
                        <a class="link-arrow" href="/blog/<?= e($post['slug']); ?>.php">Read guide <?= icon_svg('arrow'); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="container narrow">
                <p>Approved insights will be published here.</p>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
