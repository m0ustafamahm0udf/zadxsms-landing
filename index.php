<?php
/**
 * ZADX SMS landing — server-side render.
 * Plans are fetched here on the SERVER with the shared X-Landing-Key, so the
 * secret never reaches the browser (see backend/docs/landing-plans-api.md).
 *   Serve with:  php -S localhost:5500 -t "/Users/m/Desktop/zadx sms landing"
 */
$endpoint = getenv('ZADX_LANDING_ENDPOINT') ?: 'http://localhost:8000/api/landing/plans';
$key = getenv('ZADX_LANDING_KEY') ?: '';
if ($key === '') {
    // Fall back to the backend .env so the key stays in sync in local dev.
    $env = @file_get_contents('/Users/m/Desktop/zadx sms/backend/.env');
    if ($env && preg_match('/^ZADX_LANDING_KEY=(.*)$/m', $env, $m)) {
        $key = trim($m[1]);
    }
}

$plans = [];
if ($key !== '') {
    $ch = curl_init($endpoint);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_HTTPHEADER     => ['X-Landing-Key: ' . $key, 'Accept: application/json'],
    ]);
    $body   = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($status === 200) {
        $plans = json_decode($body, true)['data'] ?? [];
    }
}

// Bucket plans by validity window to match the pricing tabs.
$buckets = ['month' => [], 'quarter' => [], 'halfyear' => []];
foreach ($plans as $p) {
    $d = (int) ($p['duration_days'] ?? 0);
    if ($d <= 30)     { $buckets['month'][]    = $p; }
    elseif ($d <= 90) { $buckets['quarter'][]  = $p; }
    else              { $buckets['halfyear'][] = $p; }
}

$renderCard = function (array $p): string {
    $name     = htmlspecialchars($p['name'] ?? '');
    $price    = htmlspecialchars($p['price_formatted'] ?? '');
    $quotaInt = (int) ($p['sms_quota'] ?? 0);
    $quota    = number_format($quotaInt);
    $days     = (int) ($p['duration_days'] ?? 0);
    $cents    = (int) ($p['price_cents'] ?? 0);
    $currency = htmlspecialchars($p['currency'] ?? 'EGP');
    // Effective per-message rate, e.g. "0.70 EGP / SMS" (free plans excepted).
    $rate = ($cents > 0 && $quotaInt > 0)
        ? number_format(($cents / 100) / $quotaInt, 2) . ' ' . $currency . ' / SMS'
        : 'Free to try';
    ob_start(); ?>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="pricing-items pricing-hover1 rounded-4 white-bg">
                                    <h3 class="black-clr mb-lg-3 mb-2 text-center"><?= $name ?></h3>
                                    <h2 class="text-center mb-4"><?= $price ?> <span>/ <?= $days ?> days</span></h2>
                                    <ul class="price-list d-grid gap-xl-3 gap-2 mb-4">
                                        <li class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-angles-right black-clr"></i> <?= $quota ?> SMS included
                                        </li>
                                        <li class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-angles-right black-clr"></i> <?= $days ?>-day validity
                                        </li>
                                        <li class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-angles-right black-clr"></i> <?= $rate ?>
                                        </li>
                                    </ul>
                                    <a href="#contactOptionsModal" data-bs-toggle="modal" data-bs-target="#contactOptionsModal"
                                        class="common-btn box-style btn5 d-flex justify-content-center align-items-center gap-xxl-2 gap-2 border fw-500 black overflow-hidden white-bg rounded100">
                                        Get Started
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                            </div>
<?php
    return ob_get_clean();
};
?>
<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ZADX Software Solutions">
    <meta name="description" content="ZADX SMS provides OTP and SMS delivery as a service from ZADX Software Solutions.">
    <!-- ======== Page title ============ -->
    <title>ZADX SMS | OTP &amp; SMS Delivery by ZADX Software Solutions</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="assets/img/logo/favs.png">
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
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="body-bg ">

    <div class="custom-container-space cmn-bg rounded-bottom-4 mb-xxl-5 mb-4">

        <!-- Preloader Start -->
        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="C" class="letters-loading">
                        C
                    </span>
                    <span data-text-preloader="H" class="letters-loading">
                        H
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="F" class="letters-loading">
                        F
                    </span>
                    <span data-text-preloader="Y" class="letters-loading">
                        Y
                    </span>
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
                                <a href="index.html">
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
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:+201092719790" class="d-block">01092719790</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="header-button mt-4">
                                <a href="#pricing"
                                    class="common-btn text-white box-style first-box d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fs-seven fw-normal black overflow-hidden rounded-1 p1-bg py-2">
                                    Get Start
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="social-icon d-flex align-items-center">
                                <a href="https://www.facebook.com/zadxapps" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/zadxapps" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <a href="#" class="contact-view-thumb w-100 mt-4 d-xl-block d-none mb-4 cmn-bg rounded-4 p-4">
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
                                <a href="#hero" class="header-logo">
                                    <img src="assets/img/logo/zadx-logo-light.png" alt="ZADX Software Solutions">
                                </a>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li><a href="#hero">Home</a></li>
                                            <li><a href="#modes">Modes</a></li>
                                            <li><a href="#why">Why ZADX</a></li>
                                            <li><a href="#how">How It Works</a></li>
                                            <li><a href="#pricing">Pricing</a></li>
                                            <li><a href="#faq">FAQ</a></li>
                                            <li><a href="#contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar__toggle">
                                    <img src="assets/img/icon/menu.png" alt="icon">
                                </div>
                            </div>
                        </div>
                        <a href="tel:+201092719790"
                            class="blackbg call-version1 d-sm-flex d-none align-items-center gap-2 rounded-5 py-2 ps-2 pe-xxl-4 pe-4">
                            <div class="icon d-center p1-bg rounded-circle">
                                <i class="fas fa-phone-alt white-clr"></i>
                            </div>
                            <span class="fs-seven fw-normal white-clr">01092719790</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Banner Section Start -->
        <section id="hero" class="banner-section white-bg fix">
            <div class="rounded-top-4 cmn-bg z-1 pt-80 position-relative" style="padding-top: 180px !important;">
                <div class="container">
                    <div class="row justify-content-center pb-40" style="padding-bottom: 120px !important;">
                        <div class="col-lg-11">
                            <div class="hero-content-version1" style="padding-top: 40px;">
                                <div class="trusted-partner-wrap d-flex align-items-center gap-md-3 gap-2 justify-content-center mb-5 wow fadeInUp"
                                    data-wow-delay=".5s">
                                    <div class="partner-inner">
                                        <div class="partner-icon">
                                            <img src="assets/img/hero-images/zadx-customer-avatar-01.jpg" alt="ZADX SMS customer">
                                        </div>
                                        <div class="partner-icon">
                                            <img src="assets/img/hero-images/zadx-customer-avatar-02.jpg" alt="ZADX SMS customer">
                                        </div>
                                        <div class="partner-icon">
                                            <img src="assets/img/hero-images/zadx-customer-avatar-03.jpg" alt="ZADX SMS customer">
                                        </div>
                                        <div class="partner-icon">
                                            <img src="assets/img/hero-images/zadx-customer-avatar-04.jpg" alt="ZADX SMS customer">
                                        </div>
                                        <div class="partner-icon d-center white-bg">
                                            <span class="fs-eight black-clr fw-500">
                                                +10
                                            </span>
                                        </div>
                                    </div>
                                    <span class="fs-seven fw-500 black-clr wow fadeInUp" data-wow-delay=".6s">Trusted
                                        Customers</span>
                                </div>
                                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay=".6s">
                                    <span class="stext">ZADX SMS</span> &mdash; OTP &amp; SMS delivery as a service
                                </h1>
                                <div class="text-center wow fadeInUp" data-wow-delay=".7s">
                                    <a href="#pricing"
                                        class="common-btn box-style btn2 blackbg d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fw-500 white-clr py-3 overflow-hidden rounded100">
                                        Get Started
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
                <!-- Ele -->
                <img src="assets/img/element/home1-ele1.png" alt="img" class="home1-ele1">
                <img src="assets/img/element/home1-ele2.png" alt="img" class="home1-ele2">
            </div>
        </section>

        <!-- work Section Start -->
        <section id="modes" class="worke-section space-top">
            <div class="container">
                <div
                    class="d-flex gap-3 flex-sm-nowrap flex-wrap align-items-end justify-content-sm-between justify-content-center mb-50">
                    <div class="cont">
                        <span class="fs-seven text-sm-start text-center fw-semibold p1-clr d-block mb-lg-3 mb-2"
                            style="letter-spacing: 3.2px;">
                            Our SMS Modes
                        </span>
                        <h2 class="wow fadeInUp text-center text-sm-start text-center black visible-slowly-right"
                            data-wow-delay=".3s">
                            Three sending modes <br> for developers &amp; brands
                        </h2>
                    </div>
                   
                </div>
                <div class="modes-grid">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="worke-items white-bg">
                                <div class="step-area d-flex align-items-center mb-4 pb-1">
                                    <span class="serial">01</span>
                                </div>
                                <h3 class="mb-lg-4 mb-3">
                                    <a href="#0" class="black-clr">OTP</a>
                                </h3>
                                <p class="pra fs-eight mb-xl-4 pb-2 mb-3">
                                    Send one-time passwords for login, signup, and verification &mdash; with your
                                    own message template and sender ID.
                                </p>
                                <a href="#pricing" class="rarrow d-center white-bg rounded-5 py-3" aria-label="View OTP plans">
                                    <svg width="44" height="24" viewBox="0 0 44 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.5 10.5C0.671573 10.5 -7.24234e-08 11.1716 0 12C7.24234e-08 12.8284 0.671573 13.5 1.5 13.5L1.5 10.5ZM43.5607 13.0607C44.1464 12.4749 44.1464 11.5251 43.5607 10.9393L34.0147 1.3934C33.4289 0.807609 32.4792 0.807609 31.8934 1.3934C31.3076 1.97918 31.3076 2.92893 31.8934 3.51472L40.3787 12L31.8934 20.4853C31.3076 21.0711 31.3076 22.0208 31.8934 22.6066C32.4792 23.1924 33.4289 23.1924 34.0147 22.6066L43.5607 13.0607ZM1.5 13.5L42.5 13.5L42.5 10.5L1.5 10.5L1.5 13.5Z"
                                            fill="black" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="worke-items white-bg">
                                <div class="step-area d-flex align-items-center mb-4 pb-1">
                                    <span class="serial">02</span>
                                </div>
                                <h3 class="mb-lg-4 mb-3">
                                    <a href="#0" class="black-clr">SMS</a>
                                </h3>
                                <p class="pra fs-eight mb-xl-4 pb-2 mb-3">
                                    Plain transactional or marketing messages &mdash; order updates, alerts, and
                                    promos &mdash; up to 160 characters per message.
                                </p>
                                <a href="#pricing" class="rarrow d-center white-bg rounded-5 py-3" aria-label="View SMS plans">
                                    <svg width="44" height="24" viewBox="0 0 44 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.5 10.5C0.671573 10.5 -7.24234e-08 11.1716 0 12C7.24234e-08 12.8284 0.671573 13.5 1.5 13.5L1.5 10.5ZM43.5607 13.0607C44.1464 12.4749 44.1464 11.5251 43.5607 10.9393L34.0147 1.3934C33.4289 0.807609 32.4792 0.807609 31.8934 1.3934C31.3076 1.97918 31.3076 2.92893 31.8934 3.51472L40.3787 12L31.8934 20.4853C31.3076 21.0711 31.3076 22.0208 31.8934 22.6066C32.4792 23.1924 33.4289 23.1924 34.0147 22.6066L43.5607 13.0607ZM1.5 13.5L42.5 13.5L42.5 10.5L1.5 10.5L1.5 13.5Z"
                                            fill="black" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="worke-items white-bg">
                                <div class="step-area d-flex align-items-center mb-4 pb-1">
                                    <span class="serial">03</span>
                                </div>
                                <h3 class="mb-lg-4 mb-3">
                                    <a href="#0" class="black-clr">OTP + SMS</a>
                                </h3>
                                <p class="pra fs-eight mb-xl-4 pb-2 mb-3">
                                    Use one app for everything &mdash; OTP and SMS share the same keys, sender IDs,
                                    and quota. Mix and match as you grow.
                                </p>
                                <a href="#pricing" class="rarrow d-center white-bg rounded-5 py-3" aria-label="View OTP and SMS plans">
                                    <svg width="44" height="24" viewBox="0 0 44 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.5 10.5C0.671573 10.5 -7.24234e-08 11.1716 0 12C7.24234e-08 12.8284 0.671573 13.5 1.5 13.5L1.5 10.5ZM43.5607 13.0607C44.1464 12.4749 44.1464 11.5251 43.5607 10.9393L34.0147 1.3934C33.4289 0.807609 32.4792 0.807609 31.8934 1.3934C31.3076 1.97918 31.3076 2.92893 31.8934 3.51472L40.3787 12L31.8934 20.4853C31.3076 21.0711 31.3076 22.0208 31.8934 22.6066C32.4792 23.1924 33.4289 23.1924 34.0147 22.6066L43.5607 13.0607ZM1.5 13.5L42.5 13.5L42.5 10.5L1.5 10.5L1.5 13.5Z"
                                            fill="black" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Exchange -->
        <section id="why" class="about-exchange space-top fix">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="about-exchange-thumb w-100 reveal-left pe-lg-4">
                            <img src="assets/img/about/about-section.png" alt="ZADX SMS dashboard sending messages without paperwork" class="w-100">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="about-exchange-content">
                            <h2 class="mb-md-3 mb-2 wow fadeInUp black-clr visible-slowly-right" data-wow-delay=".3s">
                                Start sending in minutes &mdash; no paperwork
                            </h2>
                            <p class="pra fs-20 mb-xl-4 mb-3 wow fadeInUp" data-wow-delay="0.3s">
                                No commercial registration and no tax card. Send right away using a sender ID
                                registered under our name. You also get a full dashboard and a ready Postman
                                collection, so you go live in minutes.
                            </p>
                            <ul class="listing-exchange mb-xl-4 mb-3 pb-lg-2 wow fadeInUp" data-wow-delay=".4s">
                                <li class="fs-eight pra d-flex align-items-center gap-xl-2 gap-2">
                                    <i class="fa-solid fa-check p1-clr"></i> No commercial registration or tax card required
                                </li>
                                <li class="fs-eight pra d-flex align-items-center gap-xl-2 gap-2">
                                    <i class="fa-solid fa-check p1-clr"></i> Send under our registered sender ID
                                </li>
                                <li class="fs-eight pra d-flex align-items-center gap-xl-2 gap-2">
                                    <i class="fa-solid fa-check p1-clr"></i> Full dashboard to manage apps, keys &amp; usage
                                </li>
                                <li class="fs-eight pra d-flex align-items-center gap-xl-2 gap-2">
                                    <i class="fa-solid fa-check p1-clr"></i> Ready-made Postman collection &mdash; test in minutes
                                </li>
                            </ul>
                            <div class="about-cta-row d-flex align-items-center gap-xl-4 gap-lg-3 gap-2 fadeInUp"
                                data-wow-delay=".5s">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#contactOptionsModal"
                                    class="contact-learn-link d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fw-600">
                                    Learn More
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </button>
                                <a href="#pricing"
                                    class="common-btn about-primary-cta box-style btn2 d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fw-600 white-clr py-3 overflow-hidden rounded100">
                                    Try for free
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Tv Section Start -->
        <section class="tv-section fix section-padding">
            <div class="container">
                <div class="row align-items-end g-3 mb-50">
                    <div class="col-lg-9 col-md-8 col-sm-9">
                        <h2 class="wow fadeInUp black-clr visible-slowly-right pe-4" data-wow-delay=".3s">
                            Built for brands &mdash; send discounts, promos, and updates to your customers in seconds
                        </h2>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 d-sm-block d-none">
                        <div class="tv-laptop w-100">
                            <img src="assets/img/brand/tv-labtop.png" alt="img" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="tv-wrapper tv-brand-wrapper">
                    <div class="tv-items tv-brand-item tv-brand-item--budgwiz wow fadeInUp" data-wow-delay=".3s">
                        <img src="assets/img/brand/budgwiz.webp" alt="Budgwiz">
                    </div>
                    <div class="tv-items tv-brand-item tv-brand-item--tamenny wow fadeInUp" data-wow-delay=".5s">
                        <img src="assets/img/brand/طمني عليك.webp" alt="طمني عليك">
                    </div>
                </div>
            </div>
        </section>


        <!-- Process Section Start -->
        <section id="how" class="process-section fix section-padding">
            <div class="container">
                <h2 class="wow fadeInUp text-center mb-50 black-clr visible-slowly-right" data-wow-delay=".3s">
                    Up and running in three simple steps
                </h2>
                <div class="process-wrap">
                    <div class="line"></div>
                    <div class="process-item d-md-flex d-grid gap-3 align-items-center justify-content-between wow fadeInUp"
                        data-wow-delay=".4s">
                        <div class="content d-lg-flex d-grid gap-2 align-items-center justify-content-between">
                            <span class="precess-title fs-seven fw-500 black-clr">Step-01</span>
                            <h3>
                                <a href="#pricing">Talk to us &amp; pick a plan</a>
                            </h3>
                        </div>
                        <div class="process-pra">
                            <a href="#pricing" class="arrow d-center rounded-circle p1-bg" aria-label="View pricing plans">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.670231 23.3623C0.885476 23.5776 1.17741 23.6985 1.48181 23.6985C1.78621 23.6985 2.07815 23.5776 2.29339 23.3623L21.4353 4.22041L21.4337 14.435C21.4337 14.5859 21.4634 14.7353 21.5212 14.8747C21.5789 15.0142 21.6636 15.1409 21.7703 15.2476C21.877 15.3543 22.0037 15.4389 22.1431 15.4967C22.2825 15.5544 22.432 15.5842 22.5829 15.5842C22.7338 15.5842 22.8832 15.5544 23.0227 15.4967C23.1621 15.4389 23.2888 15.3543 23.3955 15.2476C23.5022 15.1409 23.5869 15.0142 23.6446 14.8747C23.7024 14.7353 23.7321 14.5859 23.7321 14.435L23.7321 1.44968C23.7323 1.29871 23.7027 1.14919 23.645 1.00967C23.5873 0.870161 23.5027 0.743399 23.3959 0.636648C23.2892 0.529897 23.1624 0.445256 23.0229 0.387571C22.8834 0.329886 22.7339 0.300291 22.5829 0.300481L9.59761 0.30048C9.4467 0.300479 9.29726 0.330205 9.15784 0.387957C9.01841 0.44571 8.89172 0.53036 8.78501 0.637073C8.6783 0.743786 8.59365 0.870472 8.53589 1.0099C8.47814 1.14933 8.44842 1.29876 8.44842 1.44968C8.44842 1.60059 8.47814 1.75003 8.53589 1.88946C8.59365 2.02888 8.6783 2.15557 8.78501 2.26228C8.89172 2.369 9.01841 2.45365 9.15784 2.5114C9.29726 2.56915 9.4467 2.59888 9.59761 2.59887L19.8122 2.59725L0.670231 21.7392C0.454986 21.9544 0.334062 22.2464 0.334062 22.5508C0.334063 22.8552 0.454987 23.1471 0.670231 23.3623Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <p class="fs-eight pra">
                                Tell us your use case and choose the package that fits your monthly volume.
                            </p>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="process-item d-md-flex d-grid gap-3 align-items-center justify-content-between wow fadeInUp"
                        data-wow-delay=".6s">
                        <div class="content d-lg-flex d-grid gap-2 align-items-center justify-content-between">
                            <span class="precess-title fs-seven fw-500 black-clr">Step-02</span>
                            <h3>
                                <a href="#pricing">We set up your app</a>
                            </h3>
                        </div>
                        <div class="process-pra">
                            <a href="#pricing" class="arrow d-center rounded-circle p1-bg" aria-label="View pricing plans">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.670231 23.3623C0.885476 23.5776 1.17741 23.6985 1.48181 23.6985C1.78621 23.6985 2.07815 23.5776 2.29339 23.3623L21.4353 4.22041L21.4337 14.435C21.4337 14.5859 21.4634 14.7353 21.5212 14.8747C21.5789 15.0142 21.6636 15.1409 21.7703 15.2476C21.877 15.3543 22.0037 15.4389 22.1431 15.4967C22.2825 15.5544 22.432 15.5842 22.5829 15.5842C22.7338 15.5842 22.8832 15.5544 23.0227 15.4967C23.1621 15.4389 23.2888 15.3543 23.3955 15.2476C23.5022 15.1409 23.5869 15.0142 23.6446 14.8747C23.7024 14.7353 23.7321 14.5859 23.7321 14.435L23.7321 1.44968C23.7323 1.29871 23.7027 1.14919 23.645 1.00967C23.5873 0.870161 23.5027 0.743399 23.3959 0.636648C23.2892 0.529897 23.1624 0.445256 23.0229 0.387571C22.8834 0.329886 22.7339 0.300291 22.5829 0.300481L9.59761 0.30048C9.4467 0.300479 9.29726 0.330205 9.15784 0.387957C9.01841 0.44571 8.89172 0.53036 8.78501 0.637073C8.6783 0.743786 8.59365 0.870472 8.53589 1.0099C8.47814 1.14933 8.44842 1.29876 8.44842 1.44968C8.44842 1.60059 8.47814 1.75003 8.53589 1.88946C8.59365 2.02888 8.6783 2.15557 8.78501 2.26228C8.89172 2.369 9.01841 2.45365 9.15784 2.5114C9.29726 2.56915 9.4467 2.59888 9.59761 2.59887L19.8122 2.59725L0.670231 21.7392C0.454986 21.9544 0.334062 22.2464 0.334062 22.5508C0.334063 22.8552 0.454987 23.1471 0.670231 23.3623Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <p class="fs-eight pra">
                                We register your app, generate your API keys, and prepare your sender ID.
                            </p>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="process-item d-md-flex d-grid gap-3 align-items-center justify-content-between wow fadeInUp"
                        data-wow-delay=".7s">
                        <div class="content d-lg-flex d-grid gap-2 align-items-center justify-content-between">
                            <span class="precess-title fs-seven fw-500 black-clr">Step-03</span>
                            <h3>
                                <a href="#pricing">Activate &amp; start sending</a>
                            </h3>
                        </div>
                        <div class="process-pra">
                            <a href="#pricing" class="arrow d-center rounded-circle p1-bg" aria-label="View pricing plans">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.670231 23.3623C0.885476 23.5776 1.17741 23.6985 1.48181 23.6985C1.78621 23.6985 2.07815 23.5776 2.29339 23.3623L21.4353 4.22041L21.4337 14.435C21.4337 14.5859 21.4634 14.7353 21.5212 14.8747C21.5789 15.0142 21.6636 15.1409 21.7703 15.2476C21.877 15.3543 22.0037 15.4389 22.1431 15.4967C22.2825 15.5544 22.432 15.5842 22.5829 15.5842C22.7338 15.5842 22.8832 15.5544 23.0227 15.4967C23.1621 15.4389 23.2888 15.3543 23.3955 15.2476C23.5022 15.1409 23.5869 15.0142 23.6446 14.8747C23.7024 14.7353 23.7321 14.5859 23.7321 14.435L23.7321 1.44968C23.7323 1.29871 23.7027 1.14919 23.645 1.00967C23.5873 0.870161 23.5027 0.743399 23.3959 0.636648C23.2892 0.529897 23.1624 0.445256 23.0229 0.387571C22.8834 0.329886 22.7339 0.300291 22.5829 0.300481L9.59761 0.30048C9.4467 0.300479 9.29726 0.330205 9.15784 0.387957C9.01841 0.44571 8.89172 0.53036 8.78501 0.637073C8.6783 0.743786 8.59365 0.870472 8.53589 1.0099C8.47814 1.14933 8.44842 1.29876 8.44842 1.44968C8.44842 1.60059 8.47814 1.75003 8.53589 1.88946C8.59365 2.02888 8.6783 2.15557 8.78501 2.26228C8.89172 2.369 9.01841 2.45365 9.15784 2.5114C9.29726 2.56915 9.4467 2.59888 9.59761 2.59887L19.8122 2.59725L0.670231 21.7392C0.454986 21.9544 0.334062 22.2464 0.334062 22.5508C0.334063 22.8552 0.454987 23.1471 0.670231 23.3623Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <p class="fs-eight pra">
                                We activate your subscription and you start sending instantly from your app.
                            </p>
                        </div>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
        </section>

        <!-- Pricing Section Start -->
        <section id="pricing" class="pricing-section">
            <div class="container">
                <div
                    class="d-flex gap-3 flex-sm-nowrap flex-wrap align-items-end justify-content-sm-between justify-content-center mb-50">
                    <h2 class="wow fadeInUp text-center text-sm-start text-center black visible-slowly-right"
                        data-wow-delay=".3s">
                        Our Pricing Plans
                    </h2>
                    <ul class="nav pricing-tabbing nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="month-tab" data-bs-toggle="tab" data-bs-target="#month"
                                type="button" role="tab" aria-controls="month" aria-selected="true">Month</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="quarter-tab" data-bs-toggle="tab" data-bs-target="#quarter"
                                type="button" role="tab" aria-controls="quarter" aria-selected="false">3 Months</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="halfyear-tab" data-bs-toggle="tab" data-bs-target="#halfyear"
                                type="button" role="tab" aria-controls="halfyear" aria-selected="false">6 Months</button>
                        </li>
                    </ul>
                </div>
                <?php if (empty($plans)): ?>
                <p class="text-center pra fs-eight">Plans are temporarily unavailable. Please check back shortly.</p>
                <?php else: ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="month-tab">
                        <div class="row g-4">
<?php foreach ($buckets['month'] as $p) { echo $renderCard($p); } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="quarter" role="tabpanel" aria-labelledby="quarter-tab">
                        <div class="row g-4">
<?php foreach ($buckets['quarter'] as $p) { echo $renderCard($p); } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="halfyear" role="tabpanel" aria-labelledby="halfyear-tab">
                        <div class="row g-4">
<?php foreach ($buckets['halfyear'] as $p) { echo $renderCard($p); } ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Sponsor Section Start -->
        <section class="sponsor-section fix section-padding">
            <div class="swiper sponsor-wrapper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="sponsor-items1 d-flex align-items-center gap-4">
                            <img src="assets/img/testimonial/sponsor-text1.png" alt="img" class="sponsor-text">
                            <img src="assets/img/testimonial/sponsor-icon1.png" alt="img" class="sponsor-icon">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-items1 d-flex align-items-center gap-4">
                            <img src="assets/img/testimonial/sponsor-text2.png" alt="img" class="sponsor-text">
                            <img src="assets/img/testimonial/sponsor-icon2.png" alt="img" class="sponsor-icon">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-items1 d-flex align-items-center gap-4">
                            <img src="assets/img/testimonial/sponsor-text3.png" alt="img" class="sponsor-text">
                            <img src="assets/img/testimonial/sponsor-icon3.png" alt="img" class="sponsor-icon">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-items1 d-flex align-items-center gap-4">
                            <img src="assets/img/testimonial/sponsor-text4.png" alt="img" class="sponsor-text">
                            <img src="assets/img/testimonial/sponsor-icon3.png" alt="img" class="sponsor-icon">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- clients  -->
        <!-- <section class="testimonial-section">
            <div class="container">
                <div class="testimonail-wrapper-style1">
                    <div
                        class="d-flex flex-sm-nowrap flex-wrap align-items-center justify-content-sm-between justify-content-center gap-sm-3 gap-2 mb-sm-2 mb-3">
                        <h2 class="white-clr mb-xl-4 mb-3 visible-slowly-right text-sm-start text-center">What Our
                            Clients Say</h2>
                        <div class="array-button verstion-2 gap-xxl-4 gap-3 d-flex wow fadeInUp" data-wow-delay=".5s">
                            <button class="array-prev d-center">
                                <i class="fa-solid fa-arrow-left p2-clr"></i>
                            </button>
                            <button class="array-next active d-center">
                                <i class="fa-solid fa-arrow-right p2-clr"></i>
                            </button>
                        </div>
                    </div>
                    <div class="swiper testimonial-slider1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-items1">
                                    <div class="thumb">
                                        <img src="assets/img/testimonial/testimonial1-thumb.png" alt="img">
                                    </div>
                                    <div class="content">
                                        <div
                                            class="d-md-flex d-grid align-items-center justify-content-md-between justify-content-center text-md-start text-center gap-2 mb-3">
                                            <div class="cont">
                                                <h3 class="white-clr mb-1">
                                                    Dianne Russell
                                                </h3>
                                                <span class="fs-eight white-clr d-block">President of Sales</span>
                                            </div>
                                            <div
                                                class="d-flex justify-content-md-start justify-content-center align-items-center gap-1">
                                                <i class="fa-solid fa-star fs-seven p5-clr"></i>
                                                <i class="fa-solid fa-star fs-seven p5-clr"></i>
                                                <i class="fa-solid fa-star fs-seven p5-clr"></i>
                                                <i class="fa-solid fa-star fs-seven p5-clr"></i>
                                                <i class="fa-solid fa-star fs-seven p5-clr"></i>
                                            </div>
                                        </div>
                                        <p class="white-clr text-md-start text-center">
                                            Information Technology is a broad field a encompassing the design,
                                            development implementation, and the an a maintenance
                                            of the computer systems and applications. This industry plays a crucial role
                                            in shaping our modern world, with
                                            innovations
                                        </p>
                                        <div class="d-flex align-items-center gap-2 fs-six fw_600 black">
                                            <div class="line"></div> Mukesh Kumer
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Faq Section Start -->
        <section id="faq" class="faq-section fix">
            <div class="container">
                <h2 class="wow fadeInUp text-center black visible-slowly-right mb-50" data-wow-delay=".3s">
                    Frequently Asked Questions
                </h2>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="accordion custom-accordion accordion-style1 pe-xl-4 pe-0" id="accordionExample">
                            <div class="accordion-item active bg-transparent wow fadeInUp" data-wow-delay=".3s">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-transparent" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Do I need a commercial registration or tax card?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-1">
                                        <p class="fs-eight pra">
                                            No. You can start sending right away using a sender ID registered under
                                            our name &mdash; no paperwork required.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-transparent wow fadeInUp" data-wow-delay=".5s">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button bg-transparent collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        What's the difference between OTP and SMS modes?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-1">
                                        <p class="fs-16">
                                            OTP mode is built for verification codes with a template and the
                                            <code>/otp/send</code> endpoint. SMS mode sends plain transactional or
                                            marketing messages up to 160 characters via <code>/sms/send</code>. You
                                            can use both from the same app.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-transparent wow fadeInUp" data-wow-delay=".6s">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button bg-transparent collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        How do I integrate ZADX into my app?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-1">
                                        <p class="fs-16">
                                            Create an app in your dashboard to get your API key and secret, pick a
                                            sender ID, then call our REST API. We provide a ready Postman collection
                                            so you can test in minutes.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-transparent wow fadeInUp" data-wow-delay=".7s">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button bg-transparent collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        What happens if a message fails to send?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-1">
                                        <p class="fs-16">
                                            If the upstream provider rejects a message, we automatically refund the
                                            credit &mdash; so you only pay for messages that actually go out.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-transparent wow fadeInUp" data-wow-delay=".8s">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button bg-transparent collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        Can I use my own sender ID?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-1">
                                        <p class="fs-16">
                                            Yes. Request a sender ID from your dashboard; once we approve and
                                            register it upstream, your messages are delivered under your own name.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-thumb1 w-100 reveal-left">
                            <img src="assets/img/faq-section/qa-section.png" alt="FAQ support illustration" class="rounded-4 w-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Section Start -->
        <section class="blog-section section-padding fix position-relative">
            <div class="container">
                <div class="section-title d-flex flex-md-nowrap flex-wrap gap-md-4 gap-2 align-items-center mb-50">
                    <div class="section-title">
                        <h2 class="wow fadeInUp black visible-slowly-right" data-wow-delay=".3s">
                            Transforming Ideas into Reality Tomorrow
                        </h2>
                    </div>
                    <p class="fs-five wow fadeInLeft">
                        IT Technology is a dynamic field encompassing the stu implementation an support, and management
                    </p>
                </div>
                <div class="row g-xl-4 g-sm-3 g-4">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog-items white-bg d-grid rounded-4 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="thumb rounded-4 position-relative w-100">
                                <img src="assets/img/blog/blog-grid1.jpg" alt="img" class="w-100">
                            </div>
                            <div class="content py-4 px-4">
                                <div class="admin-area d-flex align-items-center gap-xxl-4 gap-3 mb-20">
                                    <div class="d-flex align-items-center gap-xxl-2 gap-2 fs-eight pra">
                                        <i class="fa-solid fa-calendar-days black-clr"></i>
                                        By admin
                                    </div>
                                    <div class="d-flex align-items-center gap-xxl-2 gap-2 fs-eight pra">
                                        <i class="fa-solid fa-user black-clr"></i>
                                        October 19, 2022
                                    </div>
                                </div>
                                <h3 class="mb-3">
                                    <a href="blog-details.html" class="black">
                                        Navigating the Digital Frontier
                                        Transforming Ideas
                                    </a>
                                </h3>
                                <a href="blog-details.html"
                                    class="blog-arrow1 pb-2 d-flex justify-content-between cmn-border-bottom align-items-center gap-2">
                                    <span class="fs-seven black-clr">
                                        Learn More
                                    </span>
                                    <span class="arrows w-40 d-center rounded-circle cmn-bg">
                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.737759 10.9501C0.831527 11.0439 0.958703 11.0966 1.09131 11.0966C1.22392 11.0966 1.3511 11.0439 1.44487 10.9501L9.78378 2.61121L9.78307 7.06103C9.78307 7.12678 9.79602 7.19188 9.82118 7.25262C9.84634 7.31336 9.88321 7.36855 9.9297 7.41503C9.97619 7.46152 10.0314 7.4984 10.0921 7.52356C10.1529 7.54872 10.218 7.56167 10.2837 7.56167C10.3494 7.56167 10.4145 7.54872 10.4753 7.52356C10.536 7.4984 10.5912 7.46152 10.6377 7.41503C10.6842 7.36855 10.7211 7.31336 10.7462 7.25262C10.7714 7.19188 10.7843 7.12678 10.7843 7.06103L10.7843 1.40418C10.7844 1.33841 10.7715 1.27328 10.7464 1.2125C10.7213 1.15172 10.6844 1.0965 10.6379 1.05C10.5914 1.00349 10.5362 0.966618 10.4754 0.941488C10.4146 0.916358 10.3495 0.903466 10.2837 0.903549L4.62685 0.903548C4.5611 0.903548 4.496 0.916497 4.43526 0.941657C4.37452 0.966816 4.31934 1.00369 4.27285 1.05018C4.22636 1.09667 4.18948 1.15186 4.16432 1.2126C4.13916 1.27334 4.12622 1.33844 4.12622 1.40418C4.12622 1.46992 4.13916 1.53502 4.16432 1.59576C4.18948 1.6565 4.22636 1.71169 4.27285 1.75818C4.31934 1.80467 4.37452 1.84154 4.43526 1.8667C4.496 1.89186 4.5611 1.90481 4.62685 1.90481L9.07667 1.9041L0.737759 10.243C0.643991 10.3368 0.591312 10.464 0.591312 10.5966C0.591312 10.7292 0.643991 10.8564 0.737759 10.9501Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog-items white-bg d-grid rounded-4 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="thumb rounded-4 position-relative w-100">
                                <img src="assets/img/blog/blog-grid2.jpg" alt="img" class="w-100">
                            </div>
                            <div class="content py-4 px-4">
                                <div class="admin-area d-flex align-items-center gap-xxl-4 gap-3 mb-20">
                                    <div class="d-flex align-items-center gap-xxl-2 gap-2 fs-eight pra">
                                        <i class="fa-solid fa-calendar-days black-clr"></i>
                                        By admin
                                    </div>
                                    <div class="d-flex align-items-center gap-xxl-2 gap-2 fs-eight pra">
                                        <i class="fa-solid fa-user black-clr"></i>
                                        October 19, 2022
                                    </div>
                                </div>
                                <h3 class="mb-3">
                                    <a href="blog-details.html" class="black">
                                        Crafting Tomorrow's Solutions
                                        Innovate Integrate
                                    </a>
                                </h3>
                                <a href="blog-details.html"
                                    class="blog-arrow1 pb-2 d-flex justify-content-between cmn-border-bottom align-items-center gap-2">
                                    <span class="fs-seven black-clr">
                                        Learn More
                                    </span>
                                    <span class="arrows w-40 d-center rounded-circle cmn-bg">
                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.737759 10.9501C0.831527 11.0439 0.958703 11.0966 1.09131 11.0966C1.22392 11.0966 1.3511 11.0439 1.44487 10.9501L9.78378 2.61121L9.78307 7.06103C9.78307 7.12678 9.79602 7.19188 9.82118 7.25262C9.84634 7.31336 9.88321 7.36855 9.9297 7.41503C9.97619 7.46152 10.0314 7.4984 10.0921 7.52356C10.1529 7.54872 10.218 7.56167 10.2837 7.56167C10.3494 7.56167 10.4145 7.54872 10.4753 7.52356C10.536 7.4984 10.5912 7.46152 10.6377 7.41503C10.6842 7.36855 10.7211 7.31336 10.7462 7.25262C10.7714 7.19188 10.7843 7.12678 10.7843 7.06103L10.7843 1.40418C10.7844 1.33841 10.7715 1.27328 10.7464 1.2125C10.7213 1.15172 10.6844 1.0965 10.6379 1.05C10.5914 1.00349 10.5362 0.966618 10.4754 0.941488C10.4146 0.916358 10.3495 0.903466 10.2837 0.903549L4.62685 0.903548C4.5611 0.903548 4.496 0.916497 4.43526 0.941657C4.37452 0.966816 4.31934 1.00369 4.27285 1.05018C4.22636 1.09667 4.18948 1.15186 4.16432 1.2126C4.13916 1.27334 4.12622 1.33844 4.12622 1.40418C4.12622 1.46992 4.13916 1.53502 4.16432 1.59576C4.18948 1.6565 4.22636 1.71169 4.27285 1.75818C4.31934 1.80467 4.37452 1.84154 4.43526 1.8667C4.496 1.89186 4.5611 1.90481 4.62685 1.90481L9.07667 1.9041L0.737759 10.243C0.643991 10.3368 0.591312 10.464 0.591312 10.5966C0.591312 10.7292 0.643991 10.8564 0.737759 10.9501Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog-items white-bg d-grid rounded-4 wow fadeInUp" data-wow-delay="0.8s">
                            <div class="thumb rounded-4 position-relative w-100">
                                <img src="assets/img/blog/blog-grid3.jpg" alt="img" class="w-100">
                            </div>
                            <div class="content py-4 px-4">
                                <div class="admin-area d-flex align-items-center gap-xxl-4 gap-3 mb-20">
                                    <div class="d-flex align-items-center gap-xxl-2 gap-2 fs-eight pra">
                                        <i class="fa-solid fa-calendar-days black-clr"></i>
                                        By admin
                                    </div>
                                    <div class="d-flex align-items-center gap-xxl-2 gap-2 fs-eight pra">
                                        <i class="fa-solid fa-user black-clr"></i>
                                        October 19, 2022
                                    </div>
                                </div>
                                <h3 class="mb-3">
                                    <a href="blog-details.html" class="black">
                                        Tech Excellence in Every Byte
                                        Unleashing Possibilities
                                    </a>
                                </h3>
                                <a href="blog-details.html"
                                    class="blog-arrow1 pb-2 d-flex justify-content-between cmn-border-bottom align-items-center gap-2">
                                    <span class="fs-seven black-clr">
                                        Learn More
                                    </span>
                                    <span class="arrows w-40 d-center rounded-circle cmn-bg">
                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.737759 10.9501C0.831527 11.0439 0.958703 11.0966 1.09131 11.0966C1.22392 11.0966 1.3511 11.0439 1.44487 10.9501L9.78378 2.61121L9.78307 7.06103C9.78307 7.12678 9.79602 7.19188 9.82118 7.25262C9.84634 7.31336 9.88321 7.36855 9.9297 7.41503C9.97619 7.46152 10.0314 7.4984 10.0921 7.52356C10.1529 7.54872 10.218 7.56167 10.2837 7.56167C10.3494 7.56167 10.4145 7.54872 10.4753 7.52356C10.536 7.4984 10.5912 7.46152 10.6377 7.41503C10.6842 7.36855 10.7211 7.31336 10.7462 7.25262C10.7714 7.19188 10.7843 7.12678 10.7843 7.06103L10.7843 1.40418C10.7844 1.33841 10.7715 1.27328 10.7464 1.2125C10.7213 1.15172 10.6844 1.0965 10.6379 1.05C10.5914 1.00349 10.5362 0.966618 10.4754 0.941488C10.4146 0.916358 10.3495 0.903466 10.2837 0.903549L4.62685 0.903548C4.5611 0.903548 4.496 0.916497 4.43526 0.941657C4.37452 0.966816 4.31934 1.00369 4.27285 1.05018C4.22636 1.09667 4.18948 1.15186 4.16432 1.2126C4.13916 1.27334 4.12622 1.33844 4.12622 1.40418C4.12622 1.46992 4.13916 1.53502 4.16432 1.59576C4.18948 1.6565 4.22636 1.71169 4.27285 1.75818C4.31934 1.80467 4.37452 1.84154 4.43526 1.8667C4.496 1.89186 4.5611 1.90481 4.62685 1.90481L9.07667 1.9041L0.737759 10.243C0.643991 10.3368 0.591312 10.464 0.591312 10.5966C0.591312 10.7292 0.643991 10.8564 0.737759 10.9501Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
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
                                        <a href="index.html">
                                            <img src="assets/img/logo/zadx-logo-light.png" alt="ZADX Software Solutions">
                                        </a>
                                    </div>
                                    <div class="footer-content">
                                        <p class="pra fs-eight mb-30 d-block">
                                            Information Technology is a broad field the main man encompassing the
                                            design Info Technology is a broad field the main
                                            man
                                        </p>
                                        <form action="#"
                                            class="form-cmn-style white-bg style1 cmn-border rounded-5 mb-30">
                                            <input type="text" placeholder="Enter you E-mail">
                                            <button type="button"
                                                class="common-btn white-clr text-nowrap box-style first-box d-inline-flex justify-content-center align-items-center fs-seven gap-xxl-2 gap-2 fs-seven overflow-hidden p1-bg rounded-5">
                                                Sign up
                                            </button>
                                        </form>
                                        <div class="social-wrapper d-flex flex-wrap align-items-center gap-xxl-3 gap-2">
                                            <a href="https://www.facebook.com/zadxapps" target="_blank" rel="noopener" class="rounded-circle cmn-bg" aria-label="Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="https://www.instagram.com/zadxapps" target="_blank" rel="noopener" class="rounded-circle cmn-bg" aria-label="Instagram">
                                                <i class="fa-brands fa-instagram"></i>
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
                                                <i class="fa-solid fa-phone black-clr"></i>
                                            </div>
                                            <a href="tel:+201092719790" class="d-block fs-seven black-clr fw-500">
                                                <span class="fs-eight pra d-block">
                                                    Phone Number
                                                </span>
                                                01092719790
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
                                                <a href="#hero"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Home
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#modes"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Modes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#why"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Why ZADX
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#how"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    How It Works
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#pricing"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Pricing
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="list-linkes d-flex flex-column gap-3">
                                            <li>
                                                <a href="#faq"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    FAQ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#contact"
                                                    class="d-flex align-items-center gap-2 pra-clr fs-seven">
                                                    <i class="fa-solid fa-angles-right black-clr fs-eight"></i>
                                                    Contact
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
                            &copy; <a href="https://zadx.net" class="p1-clr">ZADX</a> <span class="current-year"></span> | All Rights Reserved
                        </p>
                        <ul
                            class="condition d-flex flex-sm-nowrap flex-wrap justify-content-sm-start justify-content-center align-items-center gap-xxl-4 gap-xl-3 gap-sm-2 gap-1">
                            <li>
                                <a href="contact.html" class="fs-eight pra p1-hover">
                                    Terms & Condition
                                </a>
                            </li>
                            <li>
                                <a href="contact.html" class="fs-eight pra p1-hover">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="contact.html" class="fs-eight pra p1-hover">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Ele -->
                    <img src="assets/img/element/footer1-ele1.png" alt="img" class="footer-ele1">
                </div>
            </div>
        </footer>

        <!-- Search Area Start -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fas fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get">
                        <div class="search-field-holder">
                            <input type="search" class="main-search-input" placeholder="Search...">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade contact-options-modal" id="contactOptionsModal" tabindex="-1"
        aria-labelledby="contactOptionsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <span class="d-block fs-eight p1-clr fw-600 mb-1">Talk to ZADX SMS</span>
                        <h3 class="modal-title black-clr" id="contactOptionsModalLabel">Choose how to contact us</h3>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-3">
                    <div class="d-grid gap-3">
                        <div class="contact-option d-flex align-items-center gap-3 rounded-4 cmn-border">
                            <a href="tel:+201092719790" class="contact-option-main d-flex align-items-center gap-3">
                                <span class="contact-option-icon rounded-circle d-center cmn-bg">
                                    <i class="fa-solid fa-phone black-clr"></i>
                                </span>
                                <span>
                                    <span class="d-block fs-seven black-clr fw-600">Call us on mobile</span>
                                    <span class="d-block pra fs-eight">01092719790</span>
                                </span>
                            </a>
                            <button type="button" class="contact-copy-btn rounded100 fw-600"
                                data-copy-phone="01092719790" aria-label="Copy mobile number">
                                <i class="fa-regular fa-copy"></i>
                                <span>Copy</span>
                            </button>
                        </div>
                        <a href="https://www.facebook.com/zadxapps" target="_blank" rel="noopener"
                            class="contact-option d-flex align-items-center gap-3 rounded-4 cmn-border">
                            <span class="contact-option-icon rounded-circle d-center cmn-bg">
                                <i class="fab fa-facebook-f black-clr"></i>
                            </span>
                            <span>
                                <span class="d-block fs-seven black-clr fw-600">Message us on Facebook</span>
                                <span class="d-block pra fs-eight">facebook.com/zadxapps</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="assets/js/main.js?v=20260612-copy-phone"></script>
</body>

</html>
