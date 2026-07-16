<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';
$pageMeta = [
    'title' => 'Contact Mega Techzy - Get a Growth Proposal',
    'description' => 'Contact Mega Techzy for website development, SEO, Google Ads, Meta Ads, branding, automation and lead generation services in Solapur, Ravet, Dehu Road and Wakad.',
    'path' => 'contact',
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'Contact', 'path' => 'contact'],
])];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">Contact</p>
                <h1>Tell Mega Techzy what you want to grow next</h1>
                <p>Share your goals, market and service needs. We will suggest a practical next step for your website, SEO, ads or lead generation system.</p>
            </div>
            <aside class="proof-panel">
                <h2>Contact Mega Techzy</h2>
                <p><a href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a></p>
                <p><a href="mailto:<?= e(INFO_EMAIL); ?>"><?= e(INFO_EMAIL); ?></a></p>
                <p><a href="tel:<?= e(CONTACT_PHONES[0]); ?>">+91 70201 62163</a><br><a href="tel:<?= e(CONTACT_PHONES[1]); ?>">+91 99754 52779</a></p>
                <p>Service areas: Solapur City, Ravet, Dehu Road and Wakad.</p>
            </aside>
        </div>
    </section>
    <section class="section cta-section">
        <div class="container cta-layout">
            <div>
                <p class="eyebrow">Enquiry form</p>
                <h2>Request a strategy call</h2>
                <p>The same secure form powers all website enquiries so lead handling stays consistent.</p>
            </div>
            <div class="form-shell">
                <?php $formContext = 'Contact page'; include __DIR__ . '/includes/lead-form.php'; ?>
            </div>
        </div>
    </section>
    <section class="section soft-section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">Find Mega Techzy</p>
                <h2>Connect on the platforms you use</h2>
                <p>Follow Mega Techzy for digital marketing updates, business information and service enquiries.</p>
            </div>
            <div class="check-list">
                <?php foreach (SOCIAL_URLS as $name => $url): ?>
                    <div><?= icon_svg('share'); ?><span><a href="<?= e($url); ?>" target="_blank" rel="noopener noreferrer"><?= e($name); ?></a></span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
