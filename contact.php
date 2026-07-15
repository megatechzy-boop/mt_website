<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';
$pageMeta = [
    'title' => 'Contact Mega Techzy - Get a Growth Proposal',
    'description' => 'Contact Mega Techzy for website development, SEO, Google Ads, Meta Ads, branding, automation and lead generation services.',
    'path' => 'contact.php',
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'Contact', 'path' => 'contact.php'],
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
                <h2>Direct email</h2>
                <p><a href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a></p>
                <p>Primary focus: Pune, PCMC and Solapur.</p>
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
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
