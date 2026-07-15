<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';
$post = null;
foreach ($blogPosts as $candidate) {
    if ($candidate['slug'] === $postSlug) {
        $post = $candidate;
        break;
    }
}
if (!$post) {
    http_response_code(404);
    $pageMeta = ['title' => 'Blog Post Not Found - Mega Techzy', 'description' => 'The requested blog post was not found.', 'path' => 'blog/'];
    include dirname(__DIR__) . '/includes/header.php';
    include dirname(__DIR__) . '/includes/navbar.php';
    echo '<main id="main" class="section"><div class="container"><h1>Blog post not found</h1><a class="btn btn-primary" href="/blog/">View blog</a></div></main>';
    include dirname(__DIR__) . '/includes/footer.php';
    exit;
}
$pageMeta = ['title' => $post['title'] . ' - Mega Techzy', 'description' => $post['excerpt'], 'path' => 'blog/' . $postSlug . '.php'];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'Blog', 'path' => 'blog/'],
    ['name' => $post['title'], 'path' => 'blog/' . $postSlug . '.php'],
])];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main">
    <article class="section article">
        <div class="container narrow">
            <p class="eyebrow">Mega Techzy Guide</p>
            <h1><?= e($post['title']); ?></h1>
            <p class="lead"><?= e($post['excerpt']); ?></p>
            <h2>Start with the business goal</h2>
            <p>A good digital decision begins with the outcome: more qualified leads, better local visibility, stronger trust, faster follow-up or cleaner reporting. Once the goal is clear, the right mix of website, SEO, ads and automation becomes easier to choose.</p>
            <h2>Check the foundations before scaling spend</h2>
            <p>Your website should load quickly, explain the offer clearly, show proof, answer common objections and make enquiry simple. Campaigns become more efficient when this foundation is in place.</p>
            <h2>Measure what can guide action</h2>
            <p>Track calls, forms, campaign sources and page performance. The best reports do not just show traffic; they show where the next improvement should happen.</p>
            <a class="btn btn-primary" href="/contact.php">Discuss your growth plan <?= icon_svg('arrow'); ?></a>
        </div>
    </article>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

