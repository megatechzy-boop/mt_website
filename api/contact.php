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
$_SESSION['lead_attempts'] = array_values(array_filter($_SESSION['lead_attempts'] ?? [], static fn ($ts): bool => $ts > $now - 3600));
if (count($_SESSION['lead_attempts']) >= 5) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'message' => 'Too many requests. Please try again later.']);
    exit;
}
$_SESSION['lead_attempts'][] = $now;

if (!verify_csrf($_POST['csrf_token'] ?? null)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'message' => 'Security check failed. Please refresh and try again.']);
    exit;
}

if (!empty($_POST['website'] ?? '')) {
    echo json_encode(['ok' => true, 'message' => 'Thanks. We will get back to you soon.']);
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

if ($errors) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => implode(' ', $errors)]);
    exit;
}

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

if (!$sent && getenv('ENABLE_PHP_MAIL') === '1') {
    $headers = [
        'From: ' . SITE_NAME . ' <' . CONTACT_EMAIL . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'Content-Type: text/plain; charset=UTF-8',
    ];
    $sent = mail(CONTACT_EMAIL, $subject, $body, implode("\r\n", $headers));
}

$storageDir = dirname(__DIR__) . '/storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}
file_put_contents($storageDir . '/leads.jsonl', json_encode($lead, JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND | LOCK_EX);

echo json_encode([
    'ok' => true,
    'message' => $sent
        ? 'Thanks. Your enquiry has been sent.'
        : 'Thanks. Your enquiry has been saved and our team will follow up.',
]);
