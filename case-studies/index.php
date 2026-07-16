<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$pageMeta = [
    'title' => 'Mega Techzy Case Studies',
    'description' => 'Explore Mega Techzy case study themes for SEO, website development, paid ads and lead generation systems.',
    'path' => 'case-studies/',
    'robots' => 'noindex, follow',
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Case Studies</p>
            <h1>Proof-led growth stories</h1>
            <p>Case studies will expand as projects are published with measurable context, strategy and learnings.</p>
        </div>
    </section>
    <section class="section">
        <div class="container narrow">
            <p>Published case studies will include approved client context, the work completed and verifiable results. Until then, we do not publish illustrative results as client proof.</p>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
