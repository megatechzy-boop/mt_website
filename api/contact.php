<?php
declare(strict_types=1);

require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Please submit the form.']);
    exit;
}

$now = time();
$_SESSION['lead_attempts'] = array_values(array_filter($_SESSION['lead_attempts'] ?? [], static fn ($ts): bool => $ts > $now - 900));
if (count($_SESSION['lead_attempts']) >= 10) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'message' => 'Too many enquiries were submitted recently. Please try again in a few minutes.']);
    exit;
}

if (!verify_csrf($_POST['csrf_token'] ?? null)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'message' => 'Security check failed. Please refresh and try again.']);
    exit;
}

$storageDir = dirname(__DIR__) . '/storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}

// Spam is answered like a normal success so bots get no signal to adapt to,
// and logged privately so false positives can be reviewed.
function reject_as_spam(string $reason, string $storageDir): void
{
    $entry = [
        'created_at' => date(DATE_ATOM),
        'reason' => $reason,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
        'name' => substr((string) ($_POST['name'] ?? ''), 0, 80),
        'email' => substr((string) ($_POST['email'] ?? ''), 0, 120),
        'message' => substr((string) ($_POST['message'] ?? ''), 0, 300),
    ];
    file_put_contents($storageDir . '/spam.jsonl', json_encode($entry, JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND | LOCK_EX);
    echo json_encode(['ok' => true, 'message' => 'Thanks. Your enquiry has been sent.']);
    exit;
}

if (!empty($_POST['website'] ?? '')) {
    reject_as_spam('honeypot', $storageDir);
}

$formAge = form_age_seconds($_POST['form_time'] ?? null);
if ($formAge === null || $formAge > 86400) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'message' => 'This form has expired. Please refresh the page and try again.']);
    exit;
}
if ($formAge < 4) {
    reject_as_spam('submitted too fast', $storageDir);
}
if (($_POST['human_check'] ?? '') !== 'mt-' . substr((string) ($_POST['csrf_token'] ?? ''), 0, 12)) {
    reject_as_spam('no human interaction', $storageDir);
}

// Session limits are easy to dodge by dropping cookies, so also cap per IP.
$ipKey = hash('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? ''));
$rateFile = $storageDir . '/rate-' . substr($ipKey, 0, 32) . '.json';
$ipAttempts = is_file($rateFile) ? (json_decode((string) file_get_contents($rateFile), true) ?: []) : [];
$ipAttempts = array_values(array_filter($ipAttempts, static fn ($ts): bool => is_int($ts) && $ts > $now - 3600));
if (count($ipAttempts) >= 5) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'message' => 'Too many enquiries were submitted recently. Please try again later.']);
    exit;
}

function clean_field(string $value, int $max = 120): string
{
    $value = trim(strip_tags($value));
    $value = preg_replace('/\s+/', ' ', $value) ?? '';
    return substr($value, 0, $max);
}

$validServices = service_options($services);
$name = clean_field((string) ($_POST['name'] ?? ''), 80);
$phone = clean_field((string) ($_POST['phone'] ?? ''), 20);
$email = clean_field((string) ($_POST['email'] ?? ''), 120);
$company = clean_field((string) ($_POST['company'] ?? ''), 120);
$service = clean_field((string) ($_POST['service'] ?? ''), 120);
$message = clean_field((string) ($_POST['message'] ?? ''), 1200);
$context = clean_field((string) ($_POST['form_context'] ?? 'Website enquiry'), 120);

$errors = [];
if ($name === '' || strlen($name) < 2) {
    $errors[] = 'Please enter your name.';
}
if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if (!in_array($service, $validServices, true)) {
    $errors[] = 'Please select a service.';
}

if (strlen(preg_replace('/\D/', '', $phone) ?? '') < 10) {
    $errors[] = 'Please enter a valid phone number.';
}

if ($errors) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => implode(' ', $errors)]);
    exit;
}

$spamText = $name . ' ' . $company . ' ' . $message;
if (preg_match_all('#https?://|www\.#i', $spamText) > 1 || preg_match('#https?://|www\.#i', $name)) {
    reject_as_spam('links', $storageDir);
}
if (preg_match('/[\p{Cyrillic}\p{Han}\p{Hangul}]/u', $spamText)) {
    reject_as_spam('foreign script', $storageDir);
}
if (preg_match('/\b(?:backlinks?|guest post|crypto|bitcoin|casino|betting|viagra|cialis|loan offer|forex|seo package|dofollow|da\s*\d{2}|link building)\b/i', $spamText)) {
    reject_as_spam('spam keywords', $storageDir);
}

// Only completed, valid enquiries count towards the abuse limit.
$_SESSION['lead_attempts'][] = $now;
$ipAttempts[] = $now;
file_put_contents($rateFile, json_encode($ipAttempts), LOCK_EX);

$lead = [
    'created_at' => date(DATE_ATOM),
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'company' => $company,
    'service' => $service,
    'message' => $message,
    'context' => $context,
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
    'user_agent' => substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 300),
];

$subject = 'New Mega Techzy enquiry: ' . $service;
$body = "New website enquiry\n\n"
    . "Name: {$name}\n"
    . "Phone: {$phone}\n"
    . "Email: {$email}\n"
    . "Company: {$company}\n"
    . "Service: {$service}\n"
    . "Context: {$context}\n\n"
    . "Message:\n{$message}\n";

$sent = false;

// FormSubmit handles delivery without exposing mailbox credentials in the site.
// The first enquiry prompts the mailbox owner to verify this destination.
$formSubmitEmail = (string) (getenv('FORMSUBMIT_EMAIL') ?: CONTACT_EMAIL);
if ($formSubmitEmail !== '' && filter_var($formSubmitEmail, FILTER_VALIDATE_EMAIL)) {
    $formSubmitPayload = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'company' => $company,
        'service' => $service,
        'message' => $message,
        'form_context' => $context,
        '_subject' => $subject,
        '_template' => 'table',
        '_captcha' => 'false',
    ];

    if (function_exists('curl_init')) {
        $formSubmitOrigin = (string) (parse_url(SITE_URL, PHP_URL_SCHEME) ?: 'https')
            . '://'
            . (string) (parse_url(SITE_URL, PHP_URL_HOST) ?: ($_SERVER['HTTP_HOST'] ?? 'www.megatechzy.com'));
        $curl = curl_init('https://formsubmit.co/ajax/' . rawurlencode($formSubmitEmail));
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($formSubmitPayload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 8,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded',
                'Origin: ' . $formSubmitOrigin,
                'Referer: ' . site_url('contact'),
                'User-Agent: MegaTechzyWebsite/1.0',
            ],
        ]);
        $formSubmitResponse = curl_exec($curl);
        $formSubmitStatus = (int) curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        $formSubmitError = curl_error($curl);
        curl_close($curl);

        $formSubmitResult = is_string($formSubmitResponse) ? json_decode($formSubmitResponse, true) : null;
        $formSubmitAccepted = is_array($formSubmitResult)
            && in_array($formSubmitResult['success'] ?? false, [true, 'true', 1, '1'], true);

        if ($formSubmitAccepted && $formSubmitStatus >= 200 && $formSubmitStatus < 300) {
            $sent = true;
        } elseif ($formSubmitError !== '') {
            error_log('Mega Techzy FormSubmit error: ' . $formSubmitError);
        } else {
            error_log('Mega Techzy FormSubmit response: ' . $formSubmitStatus . ' ' . (string) ($formSubmitResult['message'] ?? 'Unknown error'));
        }
    } else {
        error_log('Mega Techzy FormSubmit error: cURL is not enabled.');
    }
}

$autoload = dirname(__DIR__) . '/vendor/autoload.php';
if (!$sent && file_exists($autoload)) {
    require_once $autoload;
}

$mailConfig = [];
$mailConfigFile = dirname(__DIR__) . '/includes/mail-config.php';
if (is_file($mailConfigFile)) {
    $configuredMail = require $mailConfigFile;
    if (is_array($configuredMail)) {
        $mailConfig = $configuredMail;
    }
}

$smtpHost = (string) ($mailConfig['host'] ?? getenv('SMTP_HOST') ?: '');
$smtpPort = (int) ($mailConfig['port'] ?? getenv('SMTP_PORT') ?: 587);
$smtpUser = (string) ($mailConfig['username'] ?? getenv('SMTP_USER') ?: '');
$smtpPassword = (string) ($mailConfig['password'] ?? getenv('SMTP_PASS') ?: '');
$smtpSecure = (string) ($mailConfig['secure'] ?? getenv('SMTP_SECURE') ?: ($smtpPort === 465 ? 'ssl' : 'tls'));
$mailFrom = (string) ($mailConfig['from'] ?? getenv('MAIL_FROM') ?: CONTACT_EMAIL);

if (!$sent && class_exists(\PHPMailer\PHPMailer\PHPMailer::class)) {
    try {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        if ($smtpHost) {
            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->Port = $smtpPort;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUser;
            $mail->Password = $smtpPassword;
            $mail->SMTPSecure = $smtpSecure;
        } else {
            $mail->isMail();
        }
        $mail->setFrom($mailFrom, SITE_NAME);
        $mail->addAddress(CONTACT_EMAIL);
        $mail->addReplyTo($email, $name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $sent = $mail->send();
    } catch (Throwable $exception) {
        error_log('Mega Techzy PHPMailer error: ' . $exception->getMessage());
    }
}

if (!$sent && function_exists('mail')) {
    $headers = [
        'From: ' . SITE_NAME . ' <' . CONTACT_EMAIL . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'Content-Type: text/plain; charset=UTF-8',
    ];
    $sent = mail(CONTACT_EMAIL, $subject, $body, implode("\r\n", $headers));
    if (!$sent) {
        error_log('Mega Techzy native mail delivery failed.');
    }
}

file_put_contents($storageDir . '/leads.jsonl', json_encode($lead, JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND | LOCK_EX);

echo json_encode([
    'ok' => true,
    'message' => $sent
        ? 'Thanks. Your enquiry has been sent.'
        : 'Thanks. Your enquiry has been saved and our team will follow up.',
]);
