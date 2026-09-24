<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ZADX Software Solutions">
    <meta name="description"
        content="ZADX SMS API documentation: send OTP codes and SMS with a simple REST API. Authentication, endpoints, error codes, rate limits and code samples.">
    <!-- ======== Page title ============ -->
    <title>API Documentation | ZADX SMS</title>
    <link rel="canonical" href="https://sms.zadx.net/docs.php">
    <!--<< Favicon >>-->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/icon/android-icon-192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/icon/android-icon-512.png">
    <link rel="apple-touch-icon" href="assets/img/icon/apple-touch-icon.png">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="assets/css/main.css?v=20260924-docs">
    <!--<< IBM Plex Sans Arabic >>-->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="body-bg" data-meta-title="docsMetaTitle" data-meta-description="docsMetaDescription">

    <div class="custom-container-space cmn-bg rounded-bottom-4">

        <!-- Preloader Start -->
        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="preloader-logo-wrap">
                    <img class="preloader-logo" src="assets/img/logo/zadx-logo-light.png" alt="ZADX Software Solutions">
                </div>
                <p class="text-center">Loading</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Cursor Pointer -->
        <div class="mouse-follower">
            <span class="cursor-outline"></span>
            <span class="cursor-dot"></span>
        </div>
        <!-- End Cursor Pointer -->

        <!-- Offcanvas Area Start -->
        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content pb-2">
                        <div class="offcanvas__top mb-4 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="index.php#hero">
                                    <img src="assets/img/logo/zadx-logo-light.png" alt="ZADX Software Solutions">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button>
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mobile-menu fix mb-3"></div>
                        <div class="offcanvas__contact">
                            <h4>Contact Info</h4>
                            <ul class="d-grid gap-2">
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:hello@zadx.net"><span
                                                class="mailto:hello@zadx.net">hello@zadx.net</span></a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="https://wa.me/201010626698" target="_blank" rel="noopener"
                                            class="d-block">01010626698</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="header-button mt-4">
                                <a href="index.php#contact"
                                    class="common-btn text-white box-style first-box d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fs-seven fw-normal black overflow-hidden rounded-1 p1-bg py-2">
                                    Get Started
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="offcanvas-locale-switcher">
                                <div class="locale-toggle" role="group" aria-label="Language switcher">
                                    <button type="button" class="locale-toggle__button" data-lang-switch="en"
                                        aria-pressed="true">EN</button>
                                    <button type="button" class="locale-toggle__button" data-lang-switch="ar"
                                        aria-pressed="false">AR</button>
                                </div>
                            </div>
                            <div class="social-icon d-flex align-items-center">
                                <a href="https://www.facebook.com/zadxapps" target="_blank" rel="noopener"
                                    aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/zadxapps" target="_blank" rel="noopener"
                                    aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/zadxapps" target="_blank" rel="noopener"
                                    aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <a href="index.php#" class="contact-view-thumb w-100 mt-4 d-xl-block d-none mb-4 cmn-bg rounded-4 p-4">
                            <img src="assets/img/banner/contact-view.jpg" alt="img" class="w-100 rounded-4">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

        <!-- Header Section Start -->
        <header id="header-sticky" class="header-1 white-bg header-version1">
            <div class="container">
                <div class="header-common-wrapper">
                    <div class="header-main">
                        <div class="header-left">
                            <div class="logo">
                                <a href="index.php#hero" class="header-logo">
                                    <img src="assets/img/logo/zadx-logo-light.png" alt="ZADX Software Solutions">
                                </a>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li><a href="index.php#hero">Home</a></li>
                                            <li><a href="index.php#modes">Modes</a></li>
                                            <li><a href="index.php#why">Why ZADX</a></li>
                                            <li><a href="index.php#how">How It Works</a></li>
                                            <li><a href="docs.php">Docs</a></li>
                                            <li><a href="index.php#faq">FAQ</a></li>
                                            <li><a href="index.php#contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header-locale-switcher d-flex align-items-center">
                                <div class="locale-toggle" role="group" aria-label="Language switcher">
                                    <button type="button" class="locale-toggle__button" data-lang-switch="en"
                                        aria-pressed="true">EN</button>
                                    <button type="button" class="locale-toggle__button" data-lang-switch="ar"
                                        aria-pressed="false">AR</button>
                                </div>
                            </div>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar__toggle">
                                    <img src="assets/img/icon/menu.png" alt="icon">
                                </div>
                            </div>
                        </div>
                        <a href="https://wa.me/201010626698" target="_blank" rel="noopener"
                            class="blackbg call-version1 d-sm-flex d-none align-items-center gap-2 rounded-5 py-2 ps-2 pe-xxl-4 pe-4">
                            <div class="icon d-center p1-bg rounded-circle">
                                <i class="fab fa-whatsapp white-clr"></i>
                            </div>
                            <span class="fs-seven fw-normal white-clr">01010626698</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Breadcrumb Start -->
        <section class="breadcrumb-section docs-breadcrumb cmn-bg position-relative fix">
            <div class="container">
                <div
                    class="bread-content px-3 d-flex flex-wrap gap-3 align-items-center justify-content-md-between justify-content-center">
                    <h1 class="h2 black wow fadeInUp" data-i18n="docsPageTitle">API Documentation</h1>
                    <ul class="d-flex align-items-center gap-3">
                        <li>
                            <a href="index.php" class="fs-six black-clr fw-500" data-i18n="navHome">Home</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right p1-clr lang-en"></i>
                            <i class="fa-solid fa-chevron-left p1-clr lang-ar"></i>
                        </li>
                        <li class="fs-six black-clr fw-500" data-i18n="navDocs">Docs</li>
                    </ul>
                </div>
            </div>
            <img src="assets/img/element/bread-shape.png" alt="" class="bread-ele">
        </section>

        <!-- Docs Start -->
        <section id="docs" class="docs-section docs-page">
            <div class="container">
                <div class="docs-intro d-flex gap-4 flex-md-nowrap flex-wrap align-items-center justify-content-between mb-50">
                    <p class="docs-subtitle pra fs-20 mb-0" data-i18n="docsSubtitle">
                        The public reference for the ZADX SMS API. Send OTP codes and SMS from any backend with two
                        headers and one JSON request.
                    </p>
                    <a href="index.php#contact"
                        class="common-btn box-style btn2 blackbg d-inline-flex flex-shrink-0 justify-content-center align-items-center gap-2 fw-500 white-clr py-3 overflow-hidden rounded100">
                        <span data-i18n="docsCta">Get your API keys</span>
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>

                <div class="docs-shell">
                    <!-- Docs navigation -->
                    <nav class="docs-nav" aria-label="API documentation">
                        <div class="docs-nav__group">
                            <span class="docs-nav__label"><i class="fa-solid fa-rocket"></i>
                                <span data-i18n="docsGroupStart">Getting started</span></span>
                            <a href="#docs-quickstart" class="docs-nav__link" data-i18n="docsNavQuickstart">Quick start</a>
                            <a href="#docs-auth" class="docs-nav__link" data-i18n="docsNavAuth">Authentication</a>
                        </div>
                        <div class="docs-nav__group">
                            <span class="docs-nav__label"><i class="fa-regular fa-paper-plane"></i>
                                <span data-i18n="docsGroupSend">Sending</span></span>
                            <a href="#docs-otp" class="docs-nav__link" data-i18n="docsNavOtp">Send OTP</a>
                            <a href="#docs-sms" class="docs-nav__link" data-i18n="docsNavSms">Send SMS</a>
                        </div>
                        <div class="docs-nav__group">
                            <span class="docs-nav__label"><i class="fa-solid fa-book-open"></i>
                                <span data-i18n="docsGroupRead">Reading</span></span>
                            <a href="#docs-balance" class="docs-nav__link" data-i18n="docsNavBalance">Balance</a>
                            <a href="#docs-senders" class="docs-nav__link" data-i18n="docsNavSenders">Sender IDs</a>
                            <a href="#docs-messages" class="docs-nav__link" data-i18n="docsNavMessages">Messages</a>
                        </div>
                        <div class="docs-nav__group">
                            <span class="docs-nav__label"><i class="fa-regular fa-file-lines"></i>
                                <span data-i18n="docsGroupRef">Reference</span></span>
                            <a href="#docs-errors" class="docs-nav__link" data-i18n="docsNavErrors">Error codes</a>
                            <a href="#docs-limits" class="docs-nav__link" data-i18n="docsNavLimits">Rate limits</a>
                            <a href="#docs-idempotency" class="docs-nav__link">Idempotency</a>
                        </div>
                    </nav>

                    <div class="docs-panels">
                        <!-- Quick start -->
                        <article id="docs-quickstart" class="docs-panel">
                            <h3 class="docs-panel__title" data-i18n="docsNavQuickstart">Quick start</h3>
                            <p class="pra fs-eight mb-4" data-i18n="docsQsLead">Send your first SMS in under a minute.</p>
                            <ol class="docs-steps">
                                <li data-i18n="docsQs1Html"><strong>Get your credentials.</strong> Once your subscription
                                    is active we create your app, and you'll find your base URL,
                                    <code>X-Api-Key</code> and <code>X-Api-Secret</code> in the dashboard.</li>
                                <li data-i18n="docsQs2Html"><strong>Keep them on your server.</strong> Store them in
                                    environment variables: <code>ZADX_BASE_URL</code>, <code>ZADX_API_KEY</code> and
                                    <code>ZADX_API_SECRET</code> &mdash; never hard-code them.</li>
                                <li data-i18n="docsQs3Html"><strong>Send a request.</strong> Call
                                    <code>POST /sms/send</code> or <code>POST /otp/send</code> with a JSON body.</li>
                            </ol>
                            <div class="docs-code">
                                <div class="docs-code__head">
                                    <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                    <span class="docs-code__lang">curl</span>
                                    <button type="button" class="docs-copy-btn" data-docs-copy><i
                                            class="fa-regular fa-copy"></i><span>Copy</span></button>
                                </div>
<pre><code>curl -X POST "$ZADX_BASE_URL/sms/send" \
  -H "X-Api-Key: $ZADX_API_KEY" \
  -H "X-Api-Secret: $ZADX_API_SECRET" \
  -H "Content-Type: application/json" \
  -H "Idempotency-Key: order-1001-shipped" \
  -d '{
    "to": "01012345678",
    "message": "Hello from ZADX - your order has shipped."
  }'</code></pre>
                            </div>
                        </article>

                        <!-- Authentication -->
                        <article id="docs-auth" class="docs-panel">
                            <h3 class="docs-panel__title" data-i18n="docsNavAuth">Authentication</h3>
                            <p class="pra fs-eight mb-4" data-i18n="docsAuthLeadHtml">Every API request needs
                                <code>X-Api-Key</code> and <code>X-Api-Secret</code>. The <code>Idempotency-Key</code>
                                header is required on send requests; retrying with the same key and content never
                                charges an SMS twice.</p>
                            <div class="docs-table-wrap">
                                <table class="docs-table">
                                    <thead>
                                        <tr>
                                            <th data-i18n="docsThHeader">Header</th>
                                            <th data-i18n="docsThRequired">Required</th>
                                            <th data-i18n="docsThNotes">Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><code>X-Api-Key</code></td>
                                            <td data-i18n="docsAlways">Always</td>
                                            <td data-i18n="docsAuthKeyNote">Your app's public key.</td>
                                        </tr>
                                        <tr>
                                            <td><code>X-Api-Secret</code></td>
                                            <td data-i18n="docsAlways">Always</td>
                                            <td data-i18n="docsAuthSecretNote">Your app's private secret.</td>
                                        </tr>
                                        <tr>
                                            <td><code>Idempotency-Key</code></td>
                                            <td data-i18n="docsOnSend">On send requests</td>
                                            <td data-i18n="docsAuthIdemNote">The same key with the same content returns
                                                the original response.</td>
                                        </tr>
                                        <tr>
                                            <td><code>Content-Type</code></td>
                                            <td data-i18n="docsOnPost">On POST</td>
                                            <td><code>application/json</code></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="docs-callout mt-4">
                                <span class="docs-callout__icon"><i class="fa-solid fa-shield-halved"></i></span>
                                <div>
                                    <h4 data-i18n="docsAuthWarnTitle">Protect your secret</h4>
                                    <p data-i18n="docsAuthWarnHtml">Call ZADX from your server only. Never put
                                        <code>X-Api-Secret</code> inside a mobile app, browser code, or a public
                                        repository &mdash; if it leaks, rotate it immediately. For extra protection,
                                        restrict your app to your server IPs.</p>
                                </div>
                            </div>
                        </article>

                        <!-- Send OTP -->
                        <article id="docs-otp" class="docs-panel">
                            <div class="docs-endpoint">
                                <span class="docs-method docs-method--post">POST</span>
                                <h3 class="docs-mono">/otp/send</h3>
                            </div>
                            <p class="pra fs-eight mb-4" data-i18n="docsOtpLead">Send a verification code. You generate
                                the OTP; ZADX delivers it once and never retries or resends automatically.</p>
                            <div class="docs-template mb-4">
                                <span data-i18n="docsTemplateLabel">Default template</span>
                                <span class="docs-template__text" data-i18n="docsTemplateText">Your {app_name} verification code is: {otp}</span>
                            </div>
                            <div class="docs-table-wrap mb-4">
                                <table class="docs-table">
                                    <thead>
                                        <tr>
                                            <th data-i18n="docsThField">Field</th>
                                            <th data-i18n="docsThType">Type</th>
                                            <th data-i18n="docsThRequired">Required</th>
                                            <th data-i18n="docsThNotes">Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><code>to</code></td>
                                            <td>string</td>
                                            <td data-i18n="docsYes">Yes</td>
                                            <td data-i18n="docsOtpToNote">Egyptian mobile number, e.g. <code>01012345678</code> or
                                                <code>+201012345678</code>.</td>
                                        </tr>
                                        <tr>
                                            <td><code>otp</code></td>
                                            <td>string</td>
                                            <td data-i18n="docsYes">Yes</td>
                                            <td data-i18n="docsOtpOtpNote">4 to 6 digits.</td>
                                        </tr>
                                        <tr>
                                            <td><code>template_id</code></td>
                                            <td>integer</td>
                                            <td data-i18n="docsNo">No</td>
                                            <td data-i18n="docsOtpTplNote">ID of an active, approved template that
                                                belongs to your app. When omitted, the default template is used.</td>
                                        </tr>
                                        <tr>
                                            <td><code>sender_id</code></td>
                                            <td>string</td>
                                            <td data-i18n="docsNo">No</td>
                                            <td data-i18n="docsSenderNote">Must be assigned to your app, e.g. ZADX.</td>
                                        </tr>
                                        <tr>
                                            <td><code>locale</code></td>
                                            <td>string</td>
                                            <td data-i18n="docsNo">No</td>
                                            <td data-i18n="docsOtpLocaleNote"><code>ar</code> or <code>en</code>, default
                                                <code>ar</code>. Approved templates use their own saved language and
                                                text.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="docs-code-group">
                                <div class="docs-lang-tabs" role="group" aria-label="Code language">
                                    <button type="button" class="is-active" data-docs-lang="curl">curl</button>
                                    <button type="button" data-docs-lang="php">PHP</button>
                                    <button type="button" data-docs-lang="node">Node.js</button>
                                    <button type="button" data-docs-lang="python">Python</button>
                                </div>
                                <div class="docs-code" data-docs-lang-block="curl">
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">curl</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>curl -X POST "$ZADX_BASE_URL/otp/send" \
  -H "X-Api-Key: $ZADX_API_KEY" \
  -H "X-Api-Secret: $ZADX_API_SECRET" \
  -H "Content-Type: application/json" \
  -H "Idempotency-Key: signup-42-1" \
  -d '{
    "to": "01012345678",
    "otp": "482917"
  }'</code></pre>
                                </div>
                                <div class="docs-code" data-docs-lang-block="php" hidden>
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">PHP</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>&lt;?php
$ch = curl_init(getenv('ZADX_BASE_URL') . '/otp/send');
curl_setopt_array($ch, [
    CURLOPT_POST =&gt; true,
    CURLOPT_RETURNTRANSFER =&gt; true,
    CURLOPT_HTTPHEADER =&gt; [
        'X-Api-Key: ' . getenv('ZADX_API_KEY'),
        'X-Api-Secret: ' . getenv('ZADX_API_SECRET'),
        'Content-Type: application/json',
        'Idempotency-Key: signup-42-1',
    ],
    CURLOPT_POSTFIELDS =&gt; json_encode([
        'to'  =&gt; '01012345678',
        'otp' =&gt; '482917',
    ]),
]);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);</code></pre>
                                </div>
                                <div class="docs-code" data-docs-lang-block="node" hidden>
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">Node.js</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>const res = await fetch(`${process.env.ZADX_BASE_URL}/otp/send`, {
  method: "POST",
  headers: {
    "X-Api-Key": process.env.ZADX_API_KEY,
    "X-Api-Secret": process.env.ZADX_API_SECRET,
    "Content-Type": "application/json",
    "Idempotency-Key": "signup-42-1",
  },
  body: JSON.stringify({ to: "01012345678", otp: "482917" }),
});
const data = await res.json();</code></pre>
                                </div>
                                <div class="docs-code" data-docs-lang-block="python" hidden>
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">Python</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>import os
import requests

res = requests.post(
    f"{os.environ['ZADX_BASE_URL']}/otp/send",
    headers={
        "X-Api-Key": os.environ["ZADX_API_KEY"],
        "X-Api-Secret": os.environ["ZADX_API_SECRET"],
        "Idempotency-Key": "signup-42-1",
    },
    json={"to": "01012345678", "otp": "482917"},
    timeout=15,
)
data = res.json()</code></pre>
                                </div>
                            </div>
                            <p class="docs-note pra mt-4" data-i18n="docsOtpNotesHtml">The server fills in
                                <code>{otp}</code> and <code>{app_name}</code> for you and ignores any message text sent
                                directly &mdash; free text can't be sent through this endpoint. You'll find your approved
                                template IDs in the dashboard; an unknown or inactive ID returns
                                <code>422 invalid_template_id</code> without sending or charging.</p>
                            <h4 class="docs-subheading" data-i18n="docsResponseTitle">Success response</h4>
                            <p class="pra fs-eight mb-3" data-i18n="docsResponseLeadHtml">A paid send reserves credit
                                and returns <code>202 queued</code>. The worker makes one attempt with the provider; on a
                                timeout the status becomes <code>pending_verification</code> and the credit stays
                                reserved &mdash; no automatic resend or refund.</p>
                            <div class="docs-code">
                                <div class="docs-code__head">
                                    <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                    <span class="docs-code__lang">JSON</span>
                                    <button type="button" class="docs-copy-btn" data-docs-copy><i
                                            class="fa-regular fa-copy"></i><span>Copy</span></button>
                                </div>
<pre><code>{
  "id": 4127,
  "status": "queued",
  "to": "+201012345678",
  "sender_id": "ZADX",
  "encoding": "gsm7",
  "char_count": 32,
  "segments": 1,
  "cost_credits": 1,
  "remaining_credits": 996,
  "created_at": "2026-05-28T15:32:11+00:00"
}</code></pre>
                            </div>
                        </article>

                        <!-- Send SMS -->
                        <article id="docs-sms" class="docs-panel">
                            <div class="docs-endpoint">
                                <span class="docs-method docs-method--post">POST</span>
                                <h3 class="docs-mono">/sms/send</h3>
                            </div>
                            <p class="pra fs-eight mb-4" data-i18n="docsSmsLead">A regular transactional SMS. You
                                provide the full message text &mdash; no template substitution. Provider failures and
                                timeouts are not retried automatically. Your app name is appended as a mandatory last
                                line on every message.</p>
                            <div class="docs-callout docs-callout--warn mb-4">
                                <span class="docs-callout__icon"><i class="fa-solid fa-triangle-exclamation"></i></span>
                                <div>
                                    <h4 data-i18n="docsPolicyTitle">Content policy enforcement</h4>
                                    <p data-i18n="docsPolicyText">The API checks SMS messages before sending or
                                        reserving credit. A violation is blocked, one strike is added and 10% of the
                                        current plan quota is deducted; a third strike suspends the account. OTP
                                        messages are exempt.</p>
                                </div>
                            </div>
                            <div class="docs-table-wrap mb-4">
                                <table class="docs-table">
                                    <thead>
                                        <tr>
                                            <th data-i18n="docsThField">Field</th>
                                            <th data-i18n="docsThType">Type</th>
                                            <th data-i18n="docsThRequired">Required</th>
                                            <th data-i18n="docsThNotes">Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><code>to</code></td>
                                            <td>string</td>
                                            <td data-i18n="docsYes">Yes</td>
                                            <td data-i18n="docsSmsToNote">Same phone rules as <code>/otp/send</code>.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>message</code></td>
                                            <td>string</td>
                                            <td data-i18n="docsYes">Yes</td>
                                            <td data-i18n="docsSmsMsgNote">Up to 800 characters, billed per segment.</td>
                                        </tr>
                                        <tr>
                                            <td><code>sender_id</code></td>
                                            <td>string</td>
                                            <td data-i18n="docsNo">No</td>
                                            <td data-i18n="docsSenderNote">Must be assigned to your app, e.g. ZADX.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="docs-code-group">
                                <div class="docs-lang-tabs" role="group" aria-label="Code language">
                                    <button type="button" class="is-active" data-docs-lang="curl">curl</button>
                                    <button type="button" data-docs-lang="php">PHP</button>
                                    <button type="button" data-docs-lang="node">Node.js</button>
                                    <button type="button" data-docs-lang="python">Python</button>
                                </div>
                                <div class="docs-code" data-docs-lang-block="curl">
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">curl</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>curl -X POST "$ZADX_BASE_URL/sms/send" \
  -H "X-Api-Key: $ZADX_API_KEY" \
  -H "X-Api-Secret: $ZADX_API_SECRET" \
  -H "Content-Type: application/json" \
  -H "Idempotency-Key: order-1001-shipped" \
  -d '{
    "to": "01012345678",
    "message": "Hello from ZADX - your order has shipped."
  }'</code></pre>
                                </div>
                                <div class="docs-code" data-docs-lang-block="php" hidden>
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">PHP</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>&lt;?php
$ch = curl_init(getenv('ZADX_BASE_URL') . '/sms/send');
curl_setopt_array($ch, [
    CURLOPT_POST =&gt; true,
    CURLOPT_RETURNTRANSFER =&gt; true,
    CURLOPT_HTTPHEADER =&gt; [
        'X-Api-Key: ' . getenv('ZADX_API_KEY'),
        'X-Api-Secret: ' . getenv('ZADX_API_SECRET'),
        'Content-Type: application/json',
        'Idempotency-Key: order-1001-shipped',
    ],
    CURLOPT_POSTFIELDS =&gt; json_encode([
        'to'      =&gt; '01012345678',
        'message' =&gt; 'Hello from ZADX - your order has shipped.',
    ]),
]);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);</code></pre>
                                </div>
                                <div class="docs-code" data-docs-lang-block="node" hidden>
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">Node.js</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>const res = await fetch(`${process.env.ZADX_BASE_URL}/sms/send`, {
  method: "POST",
  headers: {
    "X-Api-Key": process.env.ZADX_API_KEY,
    "X-Api-Secret": process.env.ZADX_API_SECRET,
    "Content-Type": "application/json",
    "Idempotency-Key": "order-1001-shipped",
  },
  body: JSON.stringify({
    to: "01012345678",
    message: "Hello from ZADX - your order has shipped.",
  }),
});
const data = await res.json();</code></pre>
                                </div>
                                <div class="docs-code" data-docs-lang-block="python" hidden>
                                    <div class="docs-code__head">
                                        <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                        <span class="docs-code__lang">Python</span>
                                        <button type="button" class="docs-copy-btn" data-docs-copy><i
                                                class="fa-regular fa-copy"></i><span>Copy</span></button>
                                    </div>
<pre><code>import os
import requests

res = requests.post(
    f"{os.environ['ZADX_BASE_URL']}/sms/send",
    headers={
        "X-Api-Key": os.environ["ZADX_API_KEY"],
        "X-Api-Secret": os.environ["ZADX_API_SECRET"],
        "Idempotency-Key": "order-1001-shipped",
    },
    json={
        "to": "01012345678",
        "message": "Hello from ZADX - your order has shipped.",
    },
    timeout=15,
)
data = res.json()</code></pre>
                                </div>
                            </div>
                            <div class="docs-info mt-4">
                                <h4><i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    <span data-i18n="docsEncTitle">Encoding &amp; billing</span></h4>
                                <ul>
                                    <li data-i18n="docsEnc1Html">Plain English (GSM-7): <strong>160</strong> characters
                                        per segment.</li>
                                    <li data-i18n="docsEnc2Html">Arabic, emoji, or special characters (UCS-2):
                                        <strong>70</strong> characters per segment.</li>
                                    <li data-i18n="docsEnc3Html"><code>cost_credits</code> in the response equals
                                        <code>segments</code>.</li>
                                    <li data-i18n="docsEnc4Html">Maximum 6 segments per call; longer messages return
                                        <code>422 too_many_segments</code>.</li>
                                </ul>
                            </div>
                        </article>

                        <!-- Balance -->
                        <article id="docs-balance" class="docs-panel">
                            <div class="docs-endpoint">
                                <span class="docs-method docs-method--get">GET</span>
                                <h3 class="docs-mono">/sms/balance</h3>
                            </div>
                            <p class="pra fs-eight mb-4" data-i18n="docsBalanceLead">Returns the remaining credits and
                                the active plan for the authenticated app.</p>
                            <div class="docs-code">
                                <div class="docs-code__head">
                                    <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                    <span class="docs-code__lang">curl</span>
                                    <button type="button" class="docs-copy-btn" data-docs-copy><i
                                            class="fa-regular fa-copy"></i><span>Copy</span></button>
                                </div>
<pre><code>curl "$ZADX_BASE_URL/sms/balance" \
  -H "X-Api-Key: $ZADX_API_KEY" \
  -H "X-Api-Secret: $ZADX_API_SECRET"</code></pre>
                            </div>
                        </article>

                        <!-- Sender IDs -->
                        <article id="docs-senders" class="docs-panel">
                            <div class="docs-endpoint">
                                <span class="docs-method docs-method--get">GET</span>
                                <h3 class="docs-mono">/sms/sender-ids</h3>
                            </div>
                            <p class="pra fs-eight mb-4" data-i18n="docsSendersLead">Lists only the sender IDs
                                explicitly assigned to the authenticated app.</p>
                            <div class="docs-code">
                                <div class="docs-code__head">
                                    <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                    <span class="docs-code__lang">curl</span>
                                    <button type="button" class="docs-copy-btn" data-docs-copy><i
                                            class="fa-regular fa-copy"></i><span>Copy</span></button>
                                </div>
<pre><code>curl "$ZADX_BASE_URL/sms/sender-ids" \
  -H "X-Api-Key: $ZADX_API_KEY" \
  -H "X-Api-Secret: $ZADX_API_SECRET"</code></pre>
                            </div>
                        </article>

                        <!-- Messages -->
                        <article id="docs-messages" class="docs-panel">
                            <div class="docs-endpoint">
                                <span class="docs-method docs-method--get">GET</span>
                                <h3 class="docs-mono">/messages</h3>
                            </div>
                            <p class="pra fs-eight mb-4" data-i18n="docsMessagesLeadHtml">A paginated log of every send
                                for the authenticated app. Use <code>?per_page=25&amp;page=1</code> to paginate.</p>
                            <div class="docs-code">
                                <div class="docs-code__head">
                                    <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                    <span class="docs-code__lang">curl</span>
                                    <button type="button" class="docs-copy-btn" data-docs-copy><i
                                            class="fa-regular fa-copy"></i><span>Copy</span></button>
                                </div>
<pre><code>curl "$ZADX_BASE_URL/messages?per_page=25&amp;page=1" \
  -H "X-Api-Key: $ZADX_API_KEY" \
  -H "X-Api-Secret: $ZADX_API_SECRET"</code></pre>
                            </div>
                            <div class="docs-endpoint docs-endpoint--sub">
                                <span class="docs-method docs-method--get">GET</span>
                                <h4 class="docs-mono">/messages/{id}</h4>
                            </div>
                            <p class="pra fs-eight mb-4" data-i18n="docsMessageOneLeadHtml">Fetch a single message. The
                                status starts as <code>queued</code>, then becomes <code>sent</code> or
                                <code>delivered</code>, <code>failed</code> after an explicit rejection, or
                                <code>pending_verification</code> when provider acceptance is unknown.</p>
                            <div class="docs-code">
                                <div class="docs-code__head">
                                    <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                    <span class="docs-code__lang">curl</span>
                                    <button type="button" class="docs-copy-btn" data-docs-copy><i
                                            class="fa-regular fa-copy"></i><span>Copy</span></button>
                                </div>
<pre><code>curl "$ZADX_BASE_URL/messages/4127" \
  -H "X-Api-Key: $ZADX_API_KEY" \
  -H "X-Api-Secret: $ZADX_API_SECRET"</code></pre>
                            </div>
                        </article>

                        <!-- Error codes -->
                        <article id="docs-errors" class="docs-panel">
                            <h3 class="docs-panel__title" data-i18n="docsNavErrors">Error codes</h3>
                            <p class="pra fs-eight mb-4" data-i18n="docsErrorsLead">Every API error uses the same shape.
                            </p>
                            <div class="docs-code mb-4">
                                <div class="docs-code__head">
                                    <span class="docs-code__dots"><i></i><i></i><i></i></span>
                                    <span class="docs-code__lang">JSON</span>
                                    <button type="button" class="docs-copy-btn" data-docs-copy><i
                                            class="fa-regular fa-copy"></i><span>Copy</span></button>
                                </div>
<pre><code>{
  "error": {
    "code": "snake_case_code",
    "message": "Human-friendly explanation"
  }
}</code></pre>
                            </div>
                            <div class="docs-table-wrap">
                                <table class="docs-table docs-table--errors">
                                    <thead>
                                        <tr>
                                            <th>HTTP</th>
                                            <th data-i18n="docsThCode">Error code</th>
                                            <th data-i18n="docsThFix">How to fix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">401</span></td>
                                            <td><code>missing_credentials</code></td>
                                            <td data-i18n="docsErr1">Add X-Api-Key and X-Api-Secret.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">401</span></td>
                                            <td><code>invalid_credentials</code></td>
                                            <td data-i18n="docsErr2">Update your app credentials.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">402</span></td>
                                            <td><code>no_active_subscription</code></td>
                                            <td data-i18n="docsErr3">Buy or renew a plan.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">402</span></td>
                                            <td><code>quota_exhausted</code></td>
                                            <td data-i18n="docsErr4">Add another plan or upgrade.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">403</span></td>
                                            <td><code>app_inactive</code></td>
                                            <td data-i18n="docsErr5">The app was suspended or cancelled by an admin.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">403</span></td>
                                            <td><code>ip_not_allowed</code></td>
                                            <td data-i18n="docsErr6">Add the caller IP to your allowlist.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">403</span></td>
                                            <td><code>sender_id_not_allowed</code></td>
                                            <td data-i18n="docsErr7">Use a sender ID assigned to your app.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">403</span></td>
                                            <td><code>mode_not_allowed</code></td>
                                            <td data-i18n="docsErr8">Use the endpoint allowed for your app's mode.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">409</span></td>
                                            <td><code>idempotency_conflict</code></td>
                                            <td data-i18n="docsErr9">Reuse a key only with the same content.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">422</span></td>
                                            <td><code>missing_idempotency_key</code></td>
                                            <td data-i18n="docsErr10">Add a unique Idempotency-Key header to every send
                                                request.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">422</span></td>
                                            <td><code>validation_failed</code></td>
                                            <td data-i18n="docsErr11">Check the request body &mdash; e.g. a badly
                                                formatted template_id.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">422</span></td>
                                            <td><code>invalid_template_id</code></td>
                                            <td data-i18n="docsErr12">The template is unknown, inactive, or belongs to
                                                another app. Nothing is sent or charged.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">422</span></td>
                                            <td><code>invalid_phone</code></td>
                                            <td data-i18n="docsErr13">Pass a valid Egyptian mobile number.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">422</span></td>
                                            <td><code>message_too_long</code></td>
                                            <td data-i18n="docsErr14">Keep the message under 800 characters.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">422</span></td>
                                            <td><code>too_many_segments</code></td>
                                            <td data-i18n="docsErr15">Keep the text within 6 SMS segments.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">429</span></td>
                                            <td><code>rate_limited_app</code></td>
                                            <td data-i18n="docsErr16">Slow down and respect the Retry-After header.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">429</span></td>
                                            <td><code>rate_limited_phone_minute</code></td>
                                            <td data-i18n="docsErr17">This recipient already hit the per-minute limit.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--4">429</span></td>
                                            <td><code>rate_limited_phone_hour</code></td>
                                            <td data-i18n="docsErr18">This recipient already hit the hourly limit.</td>
                                        </tr>
                                        <tr>
                                            <td><span class="docs-status docs-status--5">502</span></td>
                                            <td><code>provider_failed</code><br><code>provider_unavailable</code><br><code>driver_exception</code>
                                            </td>
                                            <td data-i18n="docsErr19">An explicit provider rejection becomes failed and
                                                the credit is refunded. A timeout becomes pending_verification with the
                                                credit kept reserved &mdash; don't auto-resend.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </article>

                        <!-- Rate limits -->
                        <article id="docs-limits" class="docs-panel">
                            <h3 class="docs-panel__title" data-i18n="docsNavLimits">Rate limits</h3>
                            <p class="pra fs-eight mb-4" data-i18n="docsLimitsLeadHtml">Exceeding a limit returns
                                <code>429</code>. Wait before retrying.</p>
                            <div class="docs-table-wrap">
                                <table class="docs-table">
                                    <thead>
                                        <tr>
                                            <th data-i18n="docsThScope">Scope</th>
                                            <th data-i18n="docsThDefault">Default</th>
                                            <th data-i18n="docsThBehavior">Behavior</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-i18n="docsLimScopeApp">Per app</td>
                                            <td class="text-nowrap" data-i18n="docsLimAppVal">60 sends / minute</td>
                                            <td data-i18n="docsLimAppNoteHtml">Some plans can go higher via
                                                <code>max_sms_per_minute</code>.</td>
                                        </tr>
                                        <tr>
                                            <td data-i18n="docsLimScopePhone">Per recipient phone</td>
                                            <td class="text-nowrap" data-i18n="docsLimMinVal">1 send / minute</td>
                                            <td data-i18n="docsLimMinNote">Prevents accidental double sends. Accepted
                                                sends count whether sent, delivered, or still queued.</td>
                                        </tr>
                                        <tr>
                                            <td data-i18n="docsLimScopePhone">Per recipient phone</td>
                                            <td class="text-nowrap" data-i18n="docsLimHourVal">5 sends / hour</td>
                                            <td data-i18n="docsLimHourNote">Stops loops from flooding a single number.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </article>

                        <!-- Idempotency -->
                        <article id="docs-idempotency" class="docs-panel">
                            <h3 class="docs-panel__title">Idempotency</h3>
                            <div class="docs-info">
                                <h4><i class="fa-solid fa-key"></i>
                                    <span data-i18n="docsIdemTitleHtml">The <code>Idempotency-Key</code> header is
                                        required on write requests.</span></h4>
                                <p class="pra fs-eight mb-3" data-i18n="docsIdemLeadHtml">Use a stable value for each
                                    logical action, such as <code>order-{orderId}-shipped</code> or
                                    <code>signup-{userId}-{attempt}</code>.</p>
                                <ul>
                                    <li data-i18n="docsIdem1">The same key with the same content returns the original
                                        response.</li>
                                    <li data-i18n="docsIdem2Html">The same key with different content returns
                                        <code>409 idempotency_conflict</code>.</li>
                                    <li data-i18n="docsIdem3">Keys are kept for 24 hours.</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!--<< Footer Section Start >>-->
        <footer id="contact" class="footer-section style1 z-1 position-relative fix">
            <div class="container">
                <div class="common-wrapper z-1 position-relative white-bg rounded-4 mb-60 pt-80 px-xxl-5 px-4">
                    <div class="footer-widgets-wrapper pb-80 mb-1">
                        <div class="row g-lg-4 g-5 justify-content-between">
                            <div class="col-lg-5 col-md-6 col-sm-7">
                                <div class="single-footer-widget wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="widget-head">
                                        <a href="index.php#hero">
                                            <img src="assets/img/logo/zadx-logo-light.png"
                                                alt="ZADX Software Solutions">
                                        </a>
                                    </div>
                                    <div class="footer-content">
                                        <p class="pra fs-eight mb-30 d-block">
                                            ZADX SMS helps apps and brands launch OTP and SMS delivery quickly with
                                            ready APIs, instant sender ID access, and a dashboard that keeps setup
                                            simple.
                                        </p>
                                        <div class="social-wrapper d-flex flex-wrap align-items-center gap-xxl-3 gap-2">
                                            <a href="https://www.facebook.com/zadxapps" target="_blank" rel="noopener"
                                                class="rounded-circle cmn-bg" aria-label="Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="https://www.instagram.com/zadxapps" target="_blank" rel="noopener"
                                                class="rounded-circle cmn-bg" aria-label="Instagram">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                            <a href="https://www.linkedin.com/company/zadxapps" target="_blank"
                                                rel="noopener" class="rounded-circle cmn-bg" aria-label="LinkedIn">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-5 d-flex justify-content-lg-center">
                                <div class="single-footer-widget wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="widget-head">
                                        <h3 class="black-clr fw-500">Contact</h3>
                                    </div>
                                    <ul class="list-area d-grid gap-md-4 gap-3">
                                        <li class="d-flex align-items-center gap-xl-3 gap-2">
                                            <div class="icon d-center cmn-bg w-40 rounded-circle">
                                                <i class="fa-brands fa-whatsapp black-clr"></i>
                                            </div>
                                            <a href="https://wa.me/201010626698" target="_blank" rel="noopener"
                                                class="d-block fs-seven black-clr fw-500">
                                                <span class="fs-eight pra d-block">
                                                    WhatsApp
                                                </span>
                                                01010626698
                                            </a>
                                        </li>
                                        <li class="d-flex align-items-center gap-xl-3 gap-2">
                                            <div class="icon d-center cmn-bg w-40 rounded-circle">
                                                <i class="fa-solid fa-envelope black-clr"></i>
                                            </div>
                                            <a href="mailto:hello@zadx.net" class="d-block fs-seven black-clr fw-500">
                                                <span class="fs-eight pra d-block">
                                                    Email
                                                </span>
                                                hello@zadx.net
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                                <div class="single-footer-widget wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="widget-head">
                                        <h3 class="black-clr fw-500">Quick links</h3>
                                    </div>
                                    <div class="d-flex flex-row gap-xxl-5 gap-xl-4 gap-4">
                                        <ul class="list-linkes d-flex flex-column gap-3">
                                            <li>
                                                <a href="index.php#hero"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Home
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php#modes"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Modes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php#why" class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Why ZADX
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php#how" class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    How It Works
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="list-linkes d-flex flex-column gap-3">
                                            <li>
                                                <a href="index.php#faq" class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    FAQ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="docs.php" class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Docs
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="footer-bottom py-4 cmn-border-top d-flex flex-sm-nowrap flex-wrap align-items-center justify-content-sm-between justify-content-center gap-sm-0 gap-2">
                        <p class="body-font fs-eight pra text-center">
                            &copy; <a href="https://zadx.net" class="p1-clr">ZADX</a> <span class="current-year"></span>
                            | All Rights Reserved
                        </p>
                        <ul
                            class="condition d-flex flex-sm-nowrap flex-wrap justify-content-sm-start justify-content-center align-items-center gap-xxl-4 gap-xl-3 gap-sm-2 gap-1">
                            <li>
                                <a href="terms.html" class="fs-eight pra p1-hover">
                                    Terms & Conditions
                                </a>
                            </li>
                            <li>
                                <a href="privacy.html" class="fs-eight pra p1-hover">
                                    Privacy Policy
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Ele -->
                    <img src="assets/img/element/footer1-ele1.png" alt="img" class="footer-ele1">
                </div>
            </div>
        </footer>

    </div>

    <!--<< All JS Plugins >>-->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="assets/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="assets/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="assets/js/wow.min.js"></script>
    <!--<< Gsap Js >>-->
    <script src="assets/js/gsap.min.js"></script>
    <!--<< Lenis Js >>-->
    <script src="assets/js/lenis.min.js"></script>
    <!--<< ScrollSmoother Js >>-->
    <script src="assets/js/scrollSmoother.js"></script>
    <!--<< ScrollTrigger Js >>-->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <!--<< Spalit Text Js >>-->
    <script src="assets/js/spilitext-gsap.js"></script>
    <!--<< Valina Tilt Js >>-->
    <script src="assets/js/vanilla-tilt.min.js"></script>
    <!--<< Mixitup Js >>-->
    <script src="assets/js/mixitup.min.js"></script>
    <!--<< Main.js >>-->
    <script src="assets/js/main.js?v=20260924-docs"></script>
</body>

</html>