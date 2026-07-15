<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';
$pageMeta = [
    'title' => 'About Mega Techzy - Premium Digital Growth Partner',
    'description' => 'Learn about Mega Techzy, a digital marketing and website development company focused on trust, SEO, performance and lead generation.',
    'path' => 'about.php',
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'About', 'path' => 'about.php'],
])];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">About Mega Techzy</p>
                <h1>A digital growth partner for businesses that want practical results</h1>
                <p>Mega Techzy brings together website development, SEO, ads, content, automation and analytics so growth efforts are planned as one system.</p>
            </div>
            <aside class="proof-panel">
                <span class="card-icon"><?= icon_svg('shield'); ?></span>
                <h2>Our standard</h2>
                <p>Premium design, clean code, transparent measurement and conversion-first thinking guide every project.</p>
            </aside>
        </div>
    </section>
    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">Mission</p>
                <h2>Help businesses become easier to find, trust and contact</h2>
                <p>We prioritize strong user experience, local SEO, speed, security and clear conversion paths because these are the foundations that make digital marketing compound.</p>
            </div>
            <div class="check-list">
                <div><?= icon_svg('check'); ?><span>SEO-first website architecture.</span></div>
                <div><?= icon_svg('check'); ?><span>Campaigns measured by lead quality.</span></div>
                <div><?= icon_svg('check'); ?><span>Automation that improves follow-up speed.</span></div>
                <div><?= icon_svg('check'); ?><span>Design that feels professional and trustworthy.</span></div>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>

