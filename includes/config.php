<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    ]);
    session_start();
}

define('SITE_NAME', 'Mega Techzy');
define('SITE_URL', rtrim((string) (getenv('SITE_URL') ?: 'https://www.megatechzy.com'), '/'));
define('CONTACT_EMAIL', (string) (getenv('CONTACT_EMAIL') ?: 'hello@megatechzy.com'));

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function site_url(string $path = ''): string
{
    return SITE_URL . '/' . ltrim($path, '/');
}

function asset_url(string $path): string
{
    return '/assets/' . ltrim($path, '/');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return (string) $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool
{
    return is_string($token) && hash_equals((string) ($_SESSION['csrf_token'] ?? ''), $token);
}

function icon_svg(string $name): string
{
    $icons = [
        'arrow' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>',
        'check' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg>',
        'code' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m16 18 6-6-6-6M8 6l-6 6 6 6"/></svg>',
        'search' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>',
        'target' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/><path d="M12 3v3M21 12h-3M12 21v-3M3 12h3"/></svg>',
        'chart' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5M4 19h16"/><path d="M8 16v-5M12 16V8M16 16v-9"/></svg>',
        'mail' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg>',
        'map' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-5.4 7-12a7 7 0 1 0-14 0c0 6.6 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/></svg>',
        'shield' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 4.5 2.9 7.4 7 9 4.1-1.6 7-4.5 7-9V6l-7-3Z"/><path d="m9 12 2 2 4-5"/></svg>',
        'spark' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l1.8 6.2L20 10l-6.2 1.8L12 18l-1.8-6.2L4 10l6.2-1.8L12 2Z"/><path d="M19 16l.8 2.2L22 19l-2.2.8L19 22l-.8-2.2L16 19l2.2-.8L19 16Z"/></svg>',
        'megaphone' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 11 14-6v14L3 13v-2Z"/><path d="M7 14v4a2 2 0 0 0 2 2h1"/><path d="M21 9v6"/></svg>',
        'linkedin' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9v10"/><path d="M6 5v.01"/><path d="M10 19v-6a4 4 0 0 1 8 0v6"/><path d="M10 13v6"/></svg>',
        'automation' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h6v6H4zM14 11h6v6h-6z"/><path d="M10 10h2a3 3 0 0 1 3 3v1M14 6h2a3 3 0 0 1 3 3v2M7 13v2a3 3 0 0 0 3 3h4"/></svg>',
        'whatsapp' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19 6.4 15.5A8 8 0 1 1 9 18.3L5 19Z"/><path d="M9 8.8c.4 2.7 2.1 4.5 5 5.3l1.2-1.2"/></svg>',
        'palette' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 0 0 0 18h1.5a2 2 0 0 0 1.2-3.6 1.4 1.4 0 0 1 .8-2.5H17a4 4 0 0 0 0-8 8.8 8.8 0 0 0-5-3.9Z"/><circle cx="7.5" cy="11" r=".8"/><circle cx="10" cy="7.5" r=".8"/><circle cx="14" cy="7.5" r=".8"/></svg>',
        'share' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.7 10.7 6.6-4.4M8.7 13.3l6.6 4.4"/></svg>',
        'video' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="6" width="13" height="12" rx="2"/><path d="m16 10 5-3v10l-5-3z"/></svg>',
        'cart' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/><path d="M3 4h2l3 12h10l3-8H7"/></svg>',
        'funnel' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5h16l-6 7v5l-4 2v-7L4 5Z"/></svg>',
    ];

    return $icons[$name] ?? $icons['spark'];
}

function service_options(array $services): array
{
    return array_map(static fn (array $service): string => $service['name'], $services);
}

function build_global_schema(): array
{
    return [
        [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => SITE_NAME,
            'url' => SITE_URL,
            'email' => CONTACT_EMAIL,
            'areaServed' => ['Pune', 'PCMC', 'Solapur', 'Maharashtra', 'India'],
            'sameAs' => [],
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => SITE_NAME,
            'url' => SITE_URL,
            'email' => CONTACT_EMAIL,
            'priceRange' => '$$',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Pune',
                'addressRegion' => 'Maharashtra',
                'addressCountry' => 'IN',
            ],
            'areaServed' => ['Pune', 'PCMC', 'Solapur'],
        ],
    ];
}

function faq_schema(array $faqs): array
{
    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(static fn (array $faq): array => [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a'],
            ],
        ], $faqs),
    ];
}

function breadcrumb_schema(array $items): array
{
    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array_map(static fn (array $item, int $index): array => [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => site_url($item['path']),
        ], $items, array_keys($items)),
    ];
}
