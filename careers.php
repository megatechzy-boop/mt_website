<?php
require __DIR__ . '/includes/config.php';

$internships = [
    [
        'title' => 'Social Media Marketing Intern',
        'icon' => 'share',
        'summary' => 'Support content research, social media calendars, captions, publishing preparation and basic performance reporting.',
        'skills' => ['Social media awareness', 'Clear written communication', 'Content research and organisation'],
    ],
    [
        'title' => 'Video Editor Intern',
        'icon' => 'video',
        'summary' => 'Help edit reels and short-form videos, add captions, prepare platform-ready formats and organise creative assets.',
        'skills' => ['Short-form video editing', 'Timing, captions and visual flow', 'A portfolio or relevant sample work'],
    ],
    [
        'title' => 'Full-Stack Developer Intern',
        'icon' => 'code',
        'summary' => 'Support website features, responsive interfaces, backend integration, testing and technical improvements under a defined project scope.',
        'skills' => ['HTML, CSS and JavaScript fundamentals', 'Backend or database fundamentals', 'Debugging and willingness to learn'],
    ],
];

$pageMeta = [
    'title' => 'Careers at Mega Techzy | Unpaid Internships',
    'description' => 'Explore unpaid internship opportunities at Mega Techzy in social media marketing, video editing and full-stack development.',
    'path' => 'careers',
    'about' => ['Mega Techzy careers', 'unpaid internships', 'social media intern', 'video editor intern', 'full-stack developer intern'],
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'Careers', 'path' => 'careers'],
])];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">Careers at Mega Techzy</p>
                <h1>Build practical digital experience with our team</h1>
                <p>Explore internship opportunities across social media marketing, video editing and full-stack development.</p>
            </div>
            <aside class="proof-panel">
                <span class="card-icon"><?= icon_svg('spark'); ?></span>
                <h2>Important: unpaid internships</h2>
                <p>All roles listed on this page are unpaid. No salary or stipend is offered. Please apply only if this arrangement is suitable for you.</p>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Open roles</p>
                <h2>Current internship opportunities</h2>
            </div>
            <p>The duration, working arrangement, responsibilities and expected availability will be discussed with shortlisted applicants before joining.</p>
        </div>
        <div class="container card-grid">
            <?php foreach ($internships as $internship): ?>
                <article class="service-card">
                    <span class="card-icon"><?= icon_svg($internship['icon']); ?></span>
                    <p class="eyebrow">Unpaid internship</p>
                    <h3><?= e($internship['title']); ?></h3>
                    <p><?= e($internship['summary']); ?></p>
                    <div class="check-list">
                        <?php foreach ($internship['skills'] as $skill): ?>
                            <div><?= icon_svg('check'); ?><span><?= e($skill); ?></span></div>
                        <?php endforeach; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">How to apply</p>
                <h2>Send your application to our HR email</h2>
                <p>Email your CV and relevant portfolio, project links or work samples to <a href="mailto:<?= e(HR_EMAIL); ?>"><?= e(HR_EMAIL); ?></a>.</p>
                <p>Use the subject line <strong>Application – Role Name</strong> and mention your skills, availability and the internship role you are applying for.</p>
            </div>
            <div class="form-shell">
                <h3>Application checklist</h3>
                <div class="check-list">
                    <div><?= icon_svg('check'); ?><span>CV or short professional profile.</span></div>
                    <div><?= icon_svg('check'); ?><span>Portfolio, GitHub profile or relevant work samples.</span></div>
                    <div><?= icon_svg('check'); ?><span>Role name and current availability.</span></div>
                    <div><?= icon_svg('check'); ?><span>Confirmation that you understand the internship is unpaid.</span></div>
                </div>
                <a class="btn btn-primary" href="mailto:<?= e(HR_EMAIL); ?>?subject=Internship%20Application%20-%20Mega%20Techzy">Email <?= e(HR_EMAIL); ?> <?= icon_svg('arrow'); ?></a>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
