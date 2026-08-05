<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$divisionOrder = ['Konkan', 'Pune', 'Nashik', 'Chhatrapati Sambhajinagar', 'Amravati', 'Nagpur'];
$locationsByDivision = array_fill_keys($divisionOrder, []);
$localAreaLocations = [];
$itemList = [];

foreach ($locations as $slug => $location) {
    if (!empty($location['statewide'])) {
        $division = $location['division'] ?? 'Pune';
        $locationsByDivision[$division][$slug] = $location;
        $itemList[] = [
            '@type' => 'ListItem',
            'position' => count($itemList) + 1,
            'name' => $location['name'],
            'url' => site_url('locations/' . $slug),
        ];
    } else {
        $localAreaLocations[$slug] = $location;
    }
}

foreach ($locationsByDivision as &$divisionLocations) {
    uasort($divisionLocations, static fn (array $a, array $b): int => strcmp($a['name'], $b['name']));
}
unset($divisionLocations);

$statewideCount = count($itemList);
$pageMeta = [
    'title' => 'Maharashtra Digital Marketing Locations | Mega Techzy',
    'description' => 'Explore Mega Techzy website development, SEO, paid ads and lead-generation coverage across Maharashtra municipal-corporation and district-headquarter markets.',
    'path' => 'locations/',
    'robots' => 'index, follow',
    'schema_type' => 'CollectionPage',
    'about' => ['Maharashtra digital marketing', 'Maharashtra website development', 'city SEO services'],
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Maharashtra Locations', 'path' => 'locations/'],
    ]),
    [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        '@id' => site_url('locations/') . '#city-list',
        'name' => 'Mega Techzy Maharashtra city coverage',
        'numberOfItems' => $statewideCount,
        'itemListElement' => $itemList,
    ],
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Maharashtra Coverage</p>
            <h1>Digital marketing and web development across Maharashtra</h1>
            <p>Explore <?= e($statewideCount); ?> focused market pages covering every Maharashtra municipal-corporation market and every district-headquarter market, including the Mumbai, Pune, Nagpur, Nashik and Chhatrapati Sambhajinagar metro economies.</p>
        </div>
    </section>

    <section class="section">
        <div class="container narrow">
            <p class="eyebrow">Statewide approach</p>
            <h2>One service system, adapted to each market</h2>
            <p>Mega Techzy supports suitable Maharashtra projects through website development, SEO, paid campaigns, analytics, content and lead-generation systems. Each city page explains the market and likely customer groups instead of publishing hundreds of near-identical pages with only a city name changed.</p>
        </div>
    </section>

    <?php foreach ($divisionOrder as $division): if (empty($locationsByDivision[$division])) continue; ?>
        <section class="section <?= $division === 'Pune' || $division === 'Amravati' ? 'soft-section' : ''; ?>">
            <div class="container split-heading">
                <div>
                    <p class="eyebrow"><?= e($division); ?> Division</p>
                    <h2><?= e($division); ?> city markets</h2>
                </div>
            </div>
            <div class="container location-grid">
                <?php foreach ($locationsByDivision[$division] as $slug => $location): ?>
                    <a href="/locations/<?= e($slug); ?>"><?= icon_svg('map'); ?><?= e($location['name']); ?></a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>

    <?php if ($localAreaLocations): ?>
        <section class="section soft-section">
            <div class="container split-heading">
                <div>
                    <p class="eyebrow">Local service areas</p>
                    <h2>Pune and PCMC neighbourhood coverage</h2>
                </div>
            </div>
            <div class="container location-grid">
                <?php foreach ($localAreaLocations as $slug => $location): ?>
                    <a href="/locations/<?= e($slug); ?>"><?= icon_svg('map'); ?><?= e($location['name']); ?></a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
