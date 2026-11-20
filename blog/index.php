<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$pageMeta = [
    'title' => 'Mega Techzy Blog - SEO, Websites and Digital Marketing',
    'description' => 'Free, practical guides from Mega Techzy on SEO, websites, Google and Meta Ads, WhatsApp marketing and lead generation for businesses in India.',
    'path' => 'blog/',
    'schema_type' => 'CollectionPage',
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Blog', 'path' => 'blog/'],
    ]),
    [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        '@id' => site_url('blog/') . '#post-list',
        'name' => 'Mega Techzy blog posts',
        'numberOfItems' => count($blogPosts),
        'itemListElement' => array_map(static fn (array $post, int $index): array => [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $post['title'],
            'url' => site_url('blog/' . $post['slug']),
        ], $blogPosts, array_keys($blogPosts)),
    ],
];
$startHereGuides = [
    'SEO and Google visibility' => ['google-november-2026-core-update', 'local-seo-checklist-pune-businesses', 'seo-vs-google-ads'],
    'Websites' => ['business-website-cost-pune', 'how-to-choose-website-developer-india', 'wordpress-vs-custom-website'],
    'Ads and lead generation' => ['whatsapp-status-ads-india', 'google-ads-local-services-guide', 'landing-page-checklist-lead-generation'],
];
$postsBySlug = array_column($blogPosts, null, 'slug');
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Blog</p>
            <h1>Mega Techzy Blog: SEO, Website and Digital Marketing Guides</h1>
            <p><strong>In short:</strong> free, practical guides for business owners and marketers in India who want more customers online. Each guide explains one decision, such as choosing SEO or Google Ads, what a website should cost or how to follow up leads on WhatsApp, in plain language with clear next steps.</p>
        </div>
    </section>
    <section class="section">
        <div class="container narrow">
            <p class="eyebrow">Start here</p>
            <h2>Where should you start reading?</h2>
            <p>Pick the topic closest to your current goal. These guides answer the questions business owners ask us most often.</p>
            <?php foreach ($startHereGuides as $topic => $slugs): ?>
                <h3><?= e($topic); ?></h3>
                <ul>
                    <?php foreach ($slugs as $slug): if (!isset($postsBySlug[$slug])) continue; ?>
                        <li><a href="/blog/<?= e($slug); ?>"><?= e($postsBySlug[$slug]['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="section">
        <?php if ($blogPosts): ?>
            <div class="container card-grid">
                <?php foreach ($blogPosts as $post): ?>
                    <article class="blog-card">
                        <?php if (!empty($post['image'])): ?>
                            <a class="blog-card-image" href="/blog/<?= e($post['slug']); ?>" tabindex="-1" aria-hidden="true">
                                <img src="<?= e(asset_url($post['image'])); ?>" alt="<?= e($post['image_alt'] ?? $post['title']); ?>" width="<?= e($post['image_width'] ?? 1600); ?>" height="<?= e($post['image_height'] ?? 900); ?>" loading="lazy" decoding="async">
                            </a>
                        <?php endif; ?>
                        <h2><a href="/blog/<?= e($post['slug']); ?>"><?= e($post['title']); ?></a></h2>
                        <p><?= e($post['excerpt']); ?></p>
                        <a class="link-arrow" href="/blog/<?= e($post['slug']); ?>">Read guide <?= icon_svg('arrow'); ?></a>
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
