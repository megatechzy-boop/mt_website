<?php
require __DIR__ . '/includes/config.php';
$pageMeta = [
    'title' => 'Privacy Policy - Mega Techzy',
    'description' => 'Read how Mega Techzy collects, uses, protects and manages information submitted through this website and its enquiry forms.',
    'path' => 'privacy-policy',
    'schema_type' => 'WebPage',
    'about' => ['Mega Techzy privacy policy', 'website enquiries', 'analytics and cookies'],
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'Privacy Policy', 'path' => 'privacy-policy'],
])];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Privacy</p>
            <h1>Privacy Policy</h1>
            <p>This policy explains what information Mega Techzy receives through this website, why we use it and the choices available to you.</p>
        </div>
    </section>
    <article class="section article">
        <div class="container narrow">
            <p><strong>Last updated: 17 August 2026</strong></p>

            <h2>Information we collect</h2>
            <p>When you submit an enquiry, we may receive the details you provide, such as your name, email address, phone number, company, website, service interest and message. Our server may also process standard technical information needed to deliver and secure the site, such as an IP address, browser type, requested pages and timestamps.</p>

            <h2>How we use information</h2>
            <p>We use submitted information to respond to enquiries, understand project requirements, prepare proposals, provide requested services, maintain business records, prevent abuse and improve our website and customer journey. We do not sell personal information.</p>

            <h2>Analytics and cookies</h2>
            <p>This website uses Google Analytics to understand aggregate website activity and measure actions such as enquiries. The analytics script is loaded after a visitor interacts with the page. Google may process device, browser and usage information under its own terms. You can limit cookies through your browser settings or use available browser privacy controls.</p>

            <h2>Sharing and service providers</h2>
            <p>Information may be handled by service providers that support website hosting, email, analytics, security or project delivery. We share only what is reasonably needed for the relevant purpose. We may also disclose information when required by law or to protect the rights, safety and security of Mega Techzy, our clients or others.</p>

            <h2>Retention and security</h2>
            <p>We keep information only as long as reasonably necessary for the purpose for which it was collected, including enquiry follow-up, service delivery, legal obligations and dispute prevention. We use reasonable administrative and technical safeguards, but no internet transmission or storage system can be guaranteed completely secure.</p>

            <h2>Your choices</h2>
            <p>You may ask us to review, correct or delete personal information you have submitted, subject to legal and legitimate business record requirements. You may also ask us to stop non-essential marketing communication.</p>

            <h2>External links and changes</h2>
            <p>Our pages may link to third-party websites whose privacy practices are outside our control. We may update this policy when our website, services or legal obligations change; the date above will show the latest published version.</p>

            <h2>Contact us</h2>
            <p>For a privacy question or request, email <a href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a> or use the <a href="/contact">contact page</a>.</p>
        </div>
    </article>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
