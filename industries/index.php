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
$industryFaqs = [
    ['q' => 'Which industries does Mega Techzy serve?', 'a' => 'Mega Techzy supports suitable manufacturing, real estate, healthcare, education, retail, ecommerce, professional-services and local-business projects.'],
    ['q' => 'Is the same marketing plan used for every industry?', 'a' => 'No. The website structure, proof, search topics, conversion path and measurement plan are adapted to the industry, audience and sales process.'],
    ['q' => 'Can Mega Techzy support a specialised B2B business?', 'a' => 'Yes. Suitable B2B projects can combine technical service pages, industry content, search visibility, paid campaigns and enquiry tracking around a defined buyer journey.'],
];
$industryItems = array_map(static fn (array $industry, int $index): array => [
    '@type' => 'ListItem',
    'position' => $index + 1,
    'name' => $industry['name'],
], $industryShowcase, array_keys($industryShowcase));
$pageMeta = [
    'title' => 'Industries and Digital Expertise | Mega Techzy',
    'description' => 'Mega Techzy supports manufacturing, real estate, healthcare, education, retail, ecommerce, professional services and local businesses.',
    'path' => 'industries/',
    'schema_type' => 'CollectionPage',
    'about' => array_column($industryShowcase, 'name'),
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Industries', 'path' => 'industries/'],
    ]),
    faq_schema($industryFaqs),
    [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        '@id' => site_url('industries/') . '#industry-list',
        'name' => 'Industries Mega Techzy serves',
        'numberOfItems' => count($industryItems),
        'itemListElement' => $industryItems,
    ],
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
    <section class="section faq-section">
        <div class="container narrow">
            <p class="eyebrow">Industry FAQs</p>
            <h2>How Mega Techzy adapts the digital plan</h2>
            <?php foreach ($industryFaqs as $faq): ?>
                <details>
                    <summary><?= e($faq['q']); ?></summary>
                    <p><?= e($faq['a']); ?></p>
                </details>
            <?php endforeach; ?>
            <a class="btn btn-primary" href="/contact">Discuss your industry and goals <?= icon_svg('arrow'); ?></a>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
