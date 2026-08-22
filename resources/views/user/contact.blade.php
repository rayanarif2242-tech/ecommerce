<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact | Kaira</title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --black: #111111;
            --dark: #181818;
            --white: #ffffff;
            --soft: #f6f5f2;
            --border: #e6e4df;
            --muted: #777;
            --serif: 'Cormorant Garamond', serif;
            --sans: 'Montserrat', sans-serif;
        }


        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            margin: 0;
            background: var(--soft);
            color: var(--black);
            font-family: var(--sans);
            font-weight: 400;
        }


        a {
            text-decoration: none;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .main-navbar {
            height: 82px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            position: relative;
            z-index: 20;
        }


        .brand {
            font-family: var(--serif);
            font-size: 35px;
            font-weight: 600;
            letter-spacing: 5px;
            color: var(--black);
            transition: .3s ease;
        }


        .brand:hover {
            color: #666;
        }


        .nav-links {
            display: flex;
            align-items: center;
            gap: 36px;
            list-style: none;
            margin: 0;
            padding: 0;
        }


        .nav-links a {
            color: #222;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            position: relative;
            transition: .3s ease;
        }


        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 0;
            height: 1px;
            background: #111;
            transition: .3s ease;
        }


        .nav-links a:hover::after {
            width: 100%;
        }


        .nav-links a:hover {
            color: #777;
        }


        .nav-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }


        .nav-icons a {
            width: 38px;
            height: 38px;
            border: 1px solid transparent;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111;
            font-size: 17px;
            transition: .3s ease;
        }


        .nav-icons a:hover {
            border-color: #ddd;
            background: #f7f7f7;
            transform: translateY(-2px);
        }


        /* =====================================================
           HERO
        ===================================================== */

        .contact-hero {
            padding: 95px 0 80px;
            background:
                radial-gradient(circle at 15% 30%, rgba(0,0,0,.035), transparent 28%),
                radial-gradient(circle at 85% 70%, rgba(0,0,0,.04), transparent 25%),
                #f7f6f3;
            border-bottom: 1px solid var(--border);
        }


        .hero-overline {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #777;
            margin-bottom: 22px;
        }


        .hero-overline::before,
        .hero-overline::after {
            content: "";
            width: 28px;
            height: 1px;
            background: #999;
        }


        .contact-title {
            font-family: var(--serif);
            font-size: clamp(65px, 8vw, 115px);
            font-weight: 500;
            line-height: .82;
            letter-spacing: -2px;
            margin: 0;
        }


        .contact-title span {
            font-style: italic;
            font-weight: 400;
        }


        .hero-description {
            max-width: 600px;
            margin: 30px auto 0;
            color: #777;
            font-size: 13px;
            line-height: 2;
        }


        .hero-scroll {
            margin-top: 42px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #555;
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }


        .hero-scroll-line {
            width: 45px;
            height: 1px;
            background: #999;
        }


        /* =====================================================
           MAIN CONTACT SECTION
        ===================================================== */

        .contact-section {
            padding: 80px 0 100px;
        }


        .contact-wrapper {
            max-width: 1180px;
            margin: 0 auto;
        }


        /* =====================================================
           INFO CARD
        ===================================================== */

        .contact-info-card {
            height: 100%;
            min-height: 610px;
            padding: 48px;
            color: white;
            background:
                radial-gradient(circle at 90% 10%, rgba(255,255,255,.09), transparent 25%),
                radial-gradient(circle at 10% 90%, rgba(255,255,255,.05), transparent 25%),
                #111;
            position: relative;
            overflow: hidden;
        }


        .contact-info-card::before {
            content: "KAIRA";
            position: absolute;
            right: -30px;
            bottom: -40px;
            font-family: var(--serif);
            font-size: 130px;
            color: rgba(255,255,255,.035);
            letter-spacing: 8px;
            pointer-events: none;
        }


        .info-number {
            font-size: 10px;
            letter-spacing: 3px;
            color: #777;
            margin-bottom: 45px;
        }


        .contact-info-title {
           
            font-size: 54px;
            line-height: .95;
            font-weight: 500;
            margin-bottom: 20px;
        }


        .contact-info-title em {
            font-style: italic;
        }


        .contact-info-description {
            max-width: 390px;
            color: #999;
            font-size: 12px;
            line-height: 1.9;
            margin-bottom: 50px;
        }


        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 17px;
            margin-bottom: 27px;
            position: relative;
            z-index: 2;
        }


        .contact-info-icon {
            width: 43px;
            height: 43px;
            flex: 0 0 43px;
            border: 1px solid #3b3b3b;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s ease;
        }


        .contact-info-item:hover .contact-info-icon {
            background: white;
            color: #111;
            border-color: white;
            transform: translateY(-3px);
        }


        .contact-info-icon i {
            font-size: 15px;
        }


        .contact-info-label {
            font-size: 9px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #777;
            margin-bottom: 7px;
        }


        .contact-info-value {
            font-size: 12px;
            line-height: 1.7;
            color: #eee;
        }


        .contact-social {
            margin-top: 42px;
            padding-top: 25px;
            border-top: 1px solid #2e2e2e;
            position: relative;
            z-index: 2;
        }


        .social-links {
            display: flex;
            gap: 9px;
        }


        .social-links a {
            width: 38px;
            height: 38px;
            border: 1px solid #3b3b3b;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
            transition: .3s ease;
        }


        .social-links a:hover {
            background: #fff;
            color: #111;
            border-color: #fff;
            transform: translateY(-3px);
        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .contact-form-card {
            background: #fff;
            min-height: 610px;
            padding: 48px;
            border: 1px solid var(--border);
            position: relative;
        }


        .form-top-line {
            width: 55px;
            height: 2px;
            background: #111;
            margin-bottom: 24px;
        }


        .form-title {
            
            font-size: 52px;
            font-weight: 500;
            line-height: 1;
            margin: 0 0 14px;
        }


        .form-subtitle {
            max-width: 500px;
            color: #888;
            font-size: 11px;
            line-height: 1.9;
            margin-bottom: 40px;
        }


        .form-label {
            display: block;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 9px;
        }


        .form-control {
            min-height: 50px;
            border: 1px solid #deddd9;
            border-radius: 0;
            background: #fafaf9;
            padding: 13px 15px;
            font-family: var(--sans);
            font-size: 12px;
            color: #111;
            box-shadow: none !important;
            transition: .3s ease;
        }


        .form-control::placeholder {
            color: #aaa;
        }


        .form-control:hover {
            border-color: #bbb;
        }


        .form-control:focus {
            background: #fff;
            border-color: #111;
        }


        textarea.form-control {
            min-height: 145px;
            resize: vertical;
        }


        .input-wrap {
            position: relative;
        }


        .input-wrap .form-control {
            padding-left: 44px;
        }


        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 14px;
            pointer-events: none;
            z-index: 2;
        }


        .textarea-icon {
            top: 20px;
            transform: none;
        }


        .send-btn {
            width: 100%;
            min-height: 55px;
            border: 1px solid #111;
            background: #111;
            color: white;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            transition: .35s ease;
            position: relative;
            overflow: hidden;
        }


        .send-btn::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background: #fff;
            transition: .35s ease;
            z-index: 0;
        }


        .send-btn span {
            position: relative;
            z-index: 2;
        }


        .send-btn:hover {
            color: #111;
        }


        .send-btn:hover::before {
            width: 100%;
        }


        /* =====================================================
           ALERTS
        ===================================================== */

        .contact-alert {
            border-radius: 0;
            padding: 15px 18px;
            background: #fff;
            border: 1px solid var(--border);
            font-size: 11px;
        }


        .contact-alert-success {
            border-left: 4px solid #198754;
        }


        .contact-alert-danger {
            border-left: 4px solid #dc3545;
        }


        .contact-alert ul {
            padding-left: 18px;
        }


        /* =====================================================
           EXTRA TRUST SECTION
        ===================================================== */

        .trust-section {
            padding: 0 0 90px;
        }


        .trust-box {
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 28px 0;
        }


        .trust-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            color: #555;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 1.7px;
            text-transform: uppercase;
        }


        .trust-item i {
            font-size: 17px;
            color: #111;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            background: #111;
            color: white;
            padding: 75px 0 30px;
        }


        .footer-brand {
            font-family: var(--serif);
            font-size: 42px;
            font-weight: 600;
            letter-spacing: 5px;
        }


        .footer-description {
            max-width: 350px;
            color: #888;
            font-size: 11px;
            line-height: 1.9;
            margin-top: 16px;
        }


        .footer-heading {
            color: #fff;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }


        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }


        .footer-links li {
            margin-bottom: 12px;
        }


        .footer-links a {
            color: #888;
            font-size: 11px;
            transition: .3s ease;
        }


        .footer-links a:hover {
            color: #fff;
            padding-left: 4px;
        }


        .footer-bottom {
            border-top: 1px solid #2c2c2c;
            margin-top: 55px;
            padding-top: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .footer-bottom p {
            margin: 0;
            color: #666;
            font-size: 10px;
        }


        .footer-social {
            display: flex;
            gap: 8px;
        }


        .footer-social a {
            width: 34px;
            height: 34px;
            border: 1px solid #333;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            transition: .3s;
        }


        .footer-social a:hover {
            color: #111;
            background: #fff;
            border-color: #fff;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991px) {

            .nav-links {
                display: none;
            }


            .contact-hero {
                padding: 75px 0 65px;
            }


            .contact-info-card,
            .contact-form-card {
                min-height: auto;
            }


            .contact-info-card {
                padding: 40px;
            }


            .contact-form-card {
                padding: 40px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 29px;
            }


            .nav-icons {
                gap: 5px;
            }


            .nav-icons a {
                width: 35px;
                height: 35px;
            }


            .contact-hero {
                padding: 65px 0 55px;
            }


            .contact-title {
                font-size: 65px;
                letter-spacing: -1px;
            }


            .hero-description {
                padding: 0 15px;
                font-size: 11px;
            }


            .contact-section {
                padding: 55px 0 65px;
            }


            .contact-info-card,
            .contact-form-card {
                padding: 30px 25px;
            }


            .contact-info-title,
            .form-title {
                font-size: 40px;
            }


            .contact-info-card {
                min-height: auto;
            }


            .contact-info-description {
                margin-bottom: 35px;
            }


            .trust-section {
                padding-bottom: 65px;
            }


            .trust-item {
                margin: 10px 0;
            }


            .footer {
                padding-top: 55px;
            }


            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

        }


        @media (max-width: 480px) {

            .contact-title {
                font-size: 53px;
            }


            .contact-info-card,
            .contact-form-card {
                padding: 27px 20px;
            }


            .form-title {
                font-size: 37px;
            }


            .contact-info-title {
                font-size: 37px;
            }

        }

    </style>

</head>


<body>


{{-- =====================================================
     NAVBAR
===================================================== --}}

<nav class="main-navbar">

    <div class="container">

        <div class="d-flex align-items-center justify-content-between">

            {{-- LOGO --}}

            <a
                href="{{ url('/') }}"
                class="brand"
            >
                KAIRA
            </a>


            {{-- NAVIGATION --}}

            <ul class="nav-links">

                <li>
                    <a href="{{ url('/') }}">
                        Home
                    </a>
                </li>


                <li>
                    <a href="{{ route('signatures') }}">
                        Shop
                    </a>
                </li>


                <li>
                    <a href="{{ url('/collections') }}">
                        Collections
                    </a>
                </li>


                <li>
                    <a href="{{ route('blogs') }}">
                        Blog
                    </a>
                </li>


                <li>
                    <a href="{{ url('/contact') }}">
                        Contact
                    </a>
                </li>

            </ul>


            {{-- ICONS --}}

            <div class="nav-icons">

                <a href="#">
                    <i class="bi bi-search"></i>
                </a>


                <a href="#">
                    <i class="bi bi-person"></i>
                </a>


                <a href="{{ route('cart.show') }}">
                    <i class="bi bi-bag"></i>
                </a>

            </div>

        </div>

    </div>

</nav>



{{-- =====================================================
     HERO
===================================================== --}}





{{-- =====================================================
     CONTACT SECTION
===================================================== --}}

<section class="contact-section">

    <div class="container">

        <div class="contact-wrapper">


            {{-- ALERTS --}}

            @if(session('success'))

                <div class="contact-alert contact-alert-success mb-4">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            @if($errors->any())

                <div class="contact-alert contact-alert-danger mb-4">

                    <strong>
                        Please check the following:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <div class="row g-0">


                {{-- =================================================
                     CONTACT INFORMATION
                ================================================= --}}

                <div class="col-lg-5">

                    <div class="contact-info-card">

                        <div class="info-number">
                            01 / CONTACT
                        </div>


                        <h2 class="contact-info-title">
                            We'd love to<br>
                            <em>hear from you.</em>
                        </h2>


                        <p class="contact-info-description">
                            Our team is always ready to help. Reach
                            out to us and we'll make sure your
                            questions are answered with care.
                        </p>



                        {{-- EMAIL --}}

                        <div class="contact-info-item">

                            <div class="contact-info-icon">
                                <i class="bi bi-envelope"></i>
                            </div>

                            <div>

                                <div class="contact-info-label">
                                    Email
                                </div>

                                <div class="contact-info-value">
                                    support@kaira.com
                                </div>

                            </div>

                        </div>



                        {{-- PHONE --}}

                        <div class="contact-info-item">

                            <div class="contact-info-icon">
                                <i class="bi bi-telephone"></i>
                            </div>

                            <div>

                                <div class="contact-info-label">
                                    Phone
                                </div>

                                <div class="contact-info-value">
                                    +92 300 1234567
                                </div>

                            </div>

                        </div>



                        {{-- LOCATION --}}

                        <div class="contact-info-item">

                            <div class="contact-info-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>

                            <div>

                                <div class="contact-info-label">
                                    Location
                                </div>

                                <div class="contact-info-value">
                                    Pakistan
                                </div>

                            </div>

                        </div>



                        {{-- HOURS --}}

                        <div class="contact-info-item">

                            <div class="contact-info-icon">
                                <i class="bi bi-clock"></i>
                            </div>

                            <div>

                                <div class="contact-info-label">
                                    Working Hours
                                </div>

                                <div class="contact-info-value">
                                    Monday – Saturday<br>
                                    10:00 AM – 7:00 PM
                                </div>

                            </div>

                        </div>



                        {{-- SOCIAL --}}

                        <div class="contact-social">

                            <div class="contact-info-label mb-3">
                                Follow Kaira
                            </div>


                            <div class="social-links">

                                <a href="#">
                                    <i class="bi bi-instagram"></i>
                                </a>

                                <a href="#">
                                    <i class="bi bi-facebook"></i>
                                </a>

                                <a href="#">
                                    <i class="bi bi-twitter-x"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     CONTACT FORM
                ================================================= --}}

                <div class="col-lg-7">

                    <div class="contact-form-card">

                        <div class="form-top-line"></div>


                        <h2 class="form-title">
                            Send a message
                        </h2>


                        <p class="form-subtitle">
                            Have something you'd like to ask?
                            Complete the form and our team will
                            get back to you as soon as possible.
                        </p>



                        <form
                            action="{{ route('contact.store') }}"
                            method="POST"
                        >

                            @csrf



                            {{-- NAME + EMAIL --}}

                            <div class="row">

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">
                                        Your Name
                                    </label>

                                    <div class="input-wrap">

                                        <i class="bi bi-person input-icon"></i>

                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            value="{{ old('name') }}"
                                            placeholder="Enter your name"
                                            required
                                        >

                                    </div>

                                </div>


                                <div class="col-md-6 mb-4">

                                    <label class="form-label">
                                        Email Address
                                    </label>

                                    <div class="input-wrap">

                                        <i class="bi bi-envelope input-icon"></i>

                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control"
                                            value="{{ old('email') }}"
                                            placeholder="Enter your email"
                                            required
                                        >

                                    </div>

                                </div>

                            </div>



                            {{-- PHONE + SUBJECT --}}

                            <div class="row">

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">
                                        Phone Number
                                    </label>

                                    <div class="input-wrap">

                                        <i class="bi bi-telephone input-icon"></i>

                                        <input
                                            type="text"
                                            name="phone"
                                            class="form-control"
                                            value="{{ old('phone') }}"
                                            placeholder="+92 300 1234567"
                                        >

                                    </div>

                                </div>


                                <div class="col-md-6 mb-4">

                                    <label class="form-label">
                                        Subject
                                    </label>

                                    <div class="input-wrap">

                                        <i class="bi bi-chat-left-text input-icon"></i>

                                        <input
                                            type="text"
                                            name="subject"
                                            class="form-control"
                                            value="{{ old('subject') }}"
                                            placeholder="How can we help?"
                                            required
                                        >

                                    </div>

                                </div>

                            </div>



                            {{-- MESSAGE --}}

                            <div class="mb-4">

                                <label class="form-label">
                                    Your Message
                                </label>

                                <div class="input-wrap">

                                    <i class="bi bi-pencil input-icon textarea-icon"></i>

                                    <textarea
                                        name="message"
                                        class="form-control"
                                        rows="6"
                                        placeholder="Tell us how we can help..."
                                        required
                                    >{{ old('message') }}</textarea>

                                </div>

                            </div>



                            {{-- BUTTON --}}

                            <button
                                type="submit"
                                class="send-btn"
                            >

                                <span>

                                    <i class="bi bi-arrow-right me-2"></i>

                                    Send Message

                                </span>

                            </button>


                        </form>

                    </div>

                </div>


            </div>

        </div>

    </div>

</section>



{{-- =====================================================
     TRUST SECTION
===================================================== --}}

<section class="trust-section">

    <div class="container">

        <div class="trust-box">

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="trust-item">

                        <i class="bi bi-headset"></i>

                        Dedicated Support

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="trust-item">

                        <i class="bi bi-shield-check"></i>

                        Secure Shopping

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="trust-item">

                        <i class="bi bi-box-seam"></i>

                        Carefully Delivered

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =====================================================
     FOOTER
===================================================== --}}

<footer class="footer">

    <div class="container">

        <div class="row">


            {{-- BRAND --}}

            <div class="col-lg-6 col-md-6 mb-5 mb-md-0">

                <div class="footer-brand">
                    KAIRA
                </div>

                <p class="footer-description">
                    Discover timeless fashion designed for
                    modern living. Thoughtfully selected pieces
                    created to become part of your everyday style.
                </p>

            </div>



            {{-- LINKS --}}

            <div class="col-lg-3 col-md-3 col-6">

                <div class="footer-heading">
                    Explore
                </div>

                <ul class="footer-links">

                    <li>
                        <a href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('signatures') }}">
                            Shop
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/collections') }}">
                            Collections
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('blogs') }}">
                            Blog
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/contact') }}">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>



            {{-- CONTACT --}}

            <div class="col-lg-3 col-md-3 col-6">

                <div class="footer-heading">
                    Contact
                </div>

                <ul class="footer-links">

                    <li>
                        <a href="#">
                            support@kaira.com
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            +92 300 1234567
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Pakistan
                        </a>
                    </li>

                </ul>

            </div>

        </div>



        {{-- FOOTER BOTTOM --}}

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} Kaira. All Rights Reserved.
            </p>


            <div class="footer-social">

                <a href="#">
                    <i class="bi bi-instagram"></i>
                </a>

                <a href="#">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="#">
                    <i class="bi bi-twitter-x"></i>
                </a>

            </div>

        </div>

    </div>

</footer>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>