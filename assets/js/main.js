/*-----------------------------------------------------------------

Template Name: Techify - Technology Tt Solutions HTML Template<
Author:  namespace-it
Author URI: https://themeforest.net/user/namespace-it
Version: 1.0.0
Description: Techify - Technology Tt Solutions HTML Template<

-------------------------------------------------------------------
CSS TABLE OF CONTENTS
-------------------------------------------------------------------

01. header
02. animated text with swiper slider
03. magnificPopup
04. counter up
05. wow animation
06. nice select
07. swiper slider
08. search popup
09. preloader 


------------------------------------------------------------------*/

(function ($) {
	("use strict");

	$(document).ready(function () {
		const translations = {
			en: {
				metaTitle:
					"ZADX SMS | OTP & SMS Delivery by ZADX Software Solutions",
				metaDescription:
					"ZADX SMS provides OTP and SMS delivery with ready APIs, quick setup, and a simple dashboard from ZADX Software Solutions.",
				loading: "Loading",
				offcanvasContact: "Contact Info",
				ctaGetStarted: "Get Started",
				navHome: "Home",
				navModes: "Modes",
				navWhy: "Why ZADX",
				navHow: "How It Works",
				navPricing: "Pricing",
				navFaq: "FAQ",
				navContact: "Contact",
				heroTrusted: "Trusted Customers",
				heroTitleHtml:
					'<span class="stext">ZADX SMS</span> &mdash; OTP &amp; SMS delivery as a service',
				modesEyebrow: "Our SMS Modes",
				modesTitleHtml:
					"Three sending modes <br> for developers &amp; brands",
				modeOtpDescription:
					"Send one-time passwords for login, signup, and verification with your own message template and sender ID.",
				modeSmsDescription:
					"Plain transactional or marketing messages such as order updates, alerts, and promos up to 160 characters per message.",
				modeHybridDescription:
					"Use one app for everything. OTP and SMS share the same keys, sender IDs, and quota, so you can scale without friction.",
				whyTitleHtml:
					"Start sending in minutes &mdash; no paperwork",
				whyDescriptionHtml:
					"No commercial registration and no tax card. Send right away using a sender ID registered under our name. You also get a full dashboard and a ready Postman collection, so you go live in minutes.",
				whyList1: "No commercial registration or tax card required",
				whyList2: "Send under our registered sender ID",
				whyList3: "Full dashboard to manage apps, keys, and usage",
				whyList4: "Ready-made Postman collection so you can test in minutes",
				whyLearnMore: "Learn More",
				whyTryFree: "Learn More",
				brandsTitleHtml:
					"Built for brands &mdash; send discounts, promos, and updates to your customers in seconds",
				howTitle: "Up and running in three simple steps",
				step1Label: "Step-01",
				step1Title: "Talk to us &amp; pick a plan",
				step1Description:
					"Tell us your use case and choose the package that fits your monthly volume.",
				step2Label: "Step-02",
				step2Title: "We set up your app",
				step2Description:
					"We register your app, generate your API keys, and prepare your sender ID.",
				step3Label: "Step-03",
				step3Title: "Activate &amp; start sending",
				step3Description:
					"We activate your subscription and you start sending instantly from your app.",
				pricingTitle: "Our Pricing Plans",
				pricingTabMonth: "Month",
				pricingTabQuarter: "3 Months",
				pricingTabHalfyear: "6 Months",
				pricingUnavailable:
					"Plans are temporarily unavailable. Please check back shortly.",
				pricingDaySuffix: "/ {{days}} days",
				pricingQuota: "{{count}} SMS included",
				pricingValidity: "{{days}}-day validity",
				pricingRate: "{{rate}} / SMS",
				pricingFree: "Free to try",
				faqTitle: "Frequently Asked Questions",
				faq1Question:
					"Do I need a commercial registration or tax card?",
				faq1AnswerHtml:
					"No. You can start sending right away using a sender ID registered under our name &mdash; no paperwork required.",
				faq2Question:
					"What's the difference between OTP and SMS modes?",
				faq2AnswerHtml:
					"OTP mode is built for verification codes with a template and the <code>/otp/send</code> endpoint. SMS mode sends plain transactional or marketing messages up to 160 characters via <code>/sms/send</code>. You can use both from the same app.",
				faq3Question: "How do I integrate ZADX into my app?",
				faq3AnswerHtml:
					"Create an app in your dashboard to get your API key and secret, pick a sender ID, then call our REST API. We provide a ready Postman collection so you can test in minutes.",
				faq4Question: "What happens if a message fails to send?",
				faq4AnswerHtml:
					"If the upstream provider rejects a message, we automatically refund the credit &mdash; so you only pay for messages that actually go out.",
				faq5Question: "Can I use my own sender ID?",
				faq5AnswerHtml:
					"Yes. Request a sender ID from your dashboard; once we approve and register it upstream, your messages are delivered under your own name.",
				footerSummary:
					"ZADX SMS helps apps and brands launch OTP and SMS delivery quickly with ready APIs, instant sender ID access, and a dashboard that keeps setup simple.",
				footerContactHeading: "Contact",
				footerPhoneLabel: "Phone Number",
				footerEmailLabel: "Email",
				footerQuickLinks: "Quick links",
				copyrightHtml:
					'&copy; <a href="https://zadx.net" class="p1-clr">ZADX</a> <span class="current-year"></span> | All Rights Reserved',
				terms: "Terms & Conditions",
				privacy: "Privacy Policy",
				searchPlaceholder: "Search the page...",
				modalEyebrow: "Talk to ZADX SMS",
				modalTitle: "Choose how to contact us",
				modalPhoneTitle: "Call us on mobile",
				modalFacebookTitle: "Message us on Facebook",
				copyLabel: "Copy",
				copiedLabel: "Copied",
				copyFailedLabel: "Copy failed",
				copyPhoneAria: "Copy mobile number",
				closeLabel: "Close",
				viewOtpPlans: "View OTP plans",
				viewSmsPlans: "View SMS plans",
				viewHybridPlans: "View OTP and SMS plans",
				viewPricingPlans: "View pricing plans",
				contactPreviewAlt: "Contact ZADX SMS",
				aboutAlt:
					"ZADX SMS dashboard sending messages without paperwork",
				brandAlt: "ZADX SMS messaging across screens",
				faqAlt: "FAQ support illustration",
				customerAlt: "ZADX SMS customer",
				facebookLabel: "Facebook",
				instagramLabel: "Instagram",
				linkedinLabel: "LinkedIn",
			},
			ar: {
				metaTitle:
					"ZADX SMS | إرسال OTP وSMS من ZADX Software Solutions",
				metaDescription:
					"توفر ZADX SMS خدمة إرسال رموز التحقق OTP ورسائل SMS بسرعة عبر واجهات API جاهزة ولوحة تحكم بسيطة من ZADX Software Solutions.",
				loading: "جارٍ التحميل",
				offcanvasContact: "معلومات التواصل",
				ctaGetStarted: "ابدأ الآن",
				navHome: "الرئيسية",
				navModes: "أنماط الإرسال",
				navWhy: "لماذا ZADX",
				navHow: "كيف تعمل",
				navPricing: "الأسعار",
				navFaq: "الأسئلة الشائعة",
				navContact: "تواصل معنا",
				heroTrusted: "عملاء يثقون بنا",
				heroTitleHtml:
					'<span class="stext">ZADX SMS</span> &mdash; خدمة إرسال OTP ورسائل SMS',
				modesEyebrow: "أنماط الإرسال",
				modesTitleHtml:
					"ثلاثة أنماط إرسال <br> للمطورين والعلامات التجارية",
				modeOtpDescription:
					"أرسل رموز التحقق لتسجيل الدخول وإنشاء الحساب والتحقق من الهوية باستخدام قالب رسالة ومعرّف مرسل خاص بك.",
				modeSmsDescription:
					"رسائل معاملات أو تسويق عادية مثل تحديثات الطلبات والتنبيهات والعروض حتى 160 حرفًا للرسالة الواحدة.",
				modeHybridDescription:
					"شغّل OTP وSMS من تطبيق واحد بالمفاتيح نفسها ومعرّفات الإرسال نفسها والرصيد نفسه، ووسّع استخدامك بسهولة.",
				whyTitleHtml:
					"ابدأ الإرسال خلال دقائق &mdash; من دون أوراق",
				whyDescriptionHtml:
					"لا تحتاج إلى سجل تجاري ولا بطاقة ضريبية. ابدأ مباشرة باستخدام Sender ID مسجل بإسمنا، مع لوحة تحكم كاملة وملف Postman جاهز لتكون جاهزًا للإطلاق خلال دقائق.",
				whyList1: "لا حاجة إلى سجل تجاري أو بطاقة ضريبية",
				whyList2: "أرسل باستخدام Sender ID مسجل بإسمنا",
				whyList3: "لوحة تحكم كاملة لإدارة التطبيقات والمفاتيح والاستخدام",
				whyList4: "ملف Postman جاهز لتجربتك خلال دقائق",
				whyLearnMore: "اعرف أكثر",
				whyTryFree: "اعرف المزيد",
				brandsTitleHtml:
					"مصمم للعلامات التجارية &mdash; أرسل الخصومات والعروض والتحديثات لعملائك خلال ثوانٍ",
				howTitle: "جاهز للعمل في ثلاث خطوات بسيطة",
				step1Label: "الخطوة 01",
				step1Title: "تواصل معنا واختر الباقة",
				step1Description:
					"اخبرنا بحالة الاستخدام لديك واختر الباقة المناسبة لحجم الإرسال الشهري.",
				step2Label: "الخطوة 02",
				step2Title: "نجهز تطبيقك",
				step2Description:
					"ننشئ تطبيقك ونولد مفاتيح الـ API ونجهز Sender ID الخاص بك.",
				step3Label: "الخطوة 03",
				step3Title: "فعّل وابدأ الإرسال",
				step3Description:
					"نفعّل اشتراكك وتبدأ الإرسال مباشرة من تطبيقك.",
				pricingTitle: "خطط الأسعار",
				pricingTabMonth: "شهر",
				pricingTabQuarter: "3 أشهر",
				pricingTabHalfyear: "6 أشهر",
				pricingUnavailable:
					"الخطط غير متاحة مؤقتًا. يرجى المحاولة مرة أخرى قريبًا.",
				pricingDaySuffix: "/ {{days}} يومًا",
				pricingQuota: "يشمل {{count}} رسالة",
				pricingValidity: "صلاحية {{days}} يومًا",
				pricingRate: "{{rate}} / رسالة",
				pricingFree: "تجربة مجانية",
				faqTitle: "الأسئلة الشائعة",
				faq1Question:
					"هل أحتاج إلى سجل تجاري أو بطاقة ضريبية؟",
				faq1AnswerHtml:
					"لا. يمكنك البدء في الإرسال فورًا باستخدام Sender ID مسجل بإسمنا &mdash; من دون أي أوراق.",
				faq2Question:
					"ما الفرق بين نمط OTP ونمط SMS؟",
				faq2AnswerHtml:
					"نمط OTP مخصص لرسائل التحقق باستخدام قالب ورسالة عبر نقطة النهاية <code>/otp/send</code>. أما نمط SMS فيرسل رسائل معاملات أو تسويق عادية حتى 160 حرفًا عبر <code>/sms/send</code>. ويمكنك استخدام النمطين من التطبيق نفسه.",
				faq3Question:
					"كيف أربط ZADX بتطبيقي؟",
				faq3AnswerHtml:
					"أنشئ تطبيقًا من لوحة التحكم للحصول على مفتاح الـ API والسر الخاص بك، ثم اختر Sender ID وابدأ باستخدام REST API الخاص بنا. كما نوفر ملف Postman جاهزًا للتجربة خلال دقائق.",
				faq4Question:
					"ماذا يحدث إذا فشل إرسال رسالة؟",
				faq4AnswerHtml:
					"إذا رفض المزوّد الخارجي الرسالة، نعيد الرصيد تلقائيًا حتى تدفع فقط مقابل الرسائل التي تم إرسالها فعليًا.",
				faq5Question:
					"هل يمكنني استخدام Sender ID خاص بي؟",
				faq5AnswerHtml:
					"نعم. اطلب Sender ID من لوحة التحكم، وبعد الموافقة عليه وتسجيله لدى المزوّد سيتم تسليم رسائلك باسمك الخاص.",
				footerSummary:
					"تساعد ZADX SMS التطبيقات والعلامات التجارية على إطلاق إرسال OTP وSMS بسرعة من خلال واجهات API جاهزة وSender ID فوري ولوحة تحكم تجعل الإعداد بسيطًا.",
				footerContactHeading: "تواصل معنا",
				footerPhoneLabel: "رقم الهاتف",
				footerEmailLabel: "البريد الإلكتروني",
				footerQuickLinks: "روابط سريعة",
				copyrightHtml:
					'&copy; <a href="https://zadx.net" class="p1-clr">ZADX</a> <span class="current-year"></span> | جميع الحقوق محفوظة',
				terms: "الشروط والأحكام",
				privacy: "سياسة الخصوصية",
				searchPlaceholder: "ابحث في الصفحة...",
				modalEyebrow: "تواصل مع ZADX SMS",
				modalTitle: "اختر طريقة التواصل",
				modalPhoneTitle: "اتصل بنا على الموبايل",
				modalFacebookTitle: "راسلنا على فيسبوك",
				copyLabel: "نسخ",
				copiedLabel: "تم النسخ",
				copyFailedLabel: "تعذر النسخ",
				copyPhoneAria: "نسخ رقم الموبايل",
				closeLabel: "إغلاق",
				viewOtpPlans: "عرض باقات OTP",
				viewSmsPlans: "عرض باقات SMS",
				viewHybridPlans: "عرض باقات OTP وSMS",
				viewPricingPlans: "عرض باقات الأسعار",
				contactPreviewAlt: "التواصل مع ZADX SMS",
				aboutAlt:
					"لوحة تحكم ZADX SMS لإرسال الرسائل من دون أوراق",
				brandAlt: "رسائل ZADX SMS عبر مختلف الشاشات",
				faqAlt: "رسم توضيحي لدعم الأسئلة الشائعة",
				customerAlt: "عميل من عملاء ZADX SMS",
				facebookLabel: "فيسبوك",
				instagramLabel: "إنستغرام",
				linkedinLabel: "لينكدإن",
			},
		};

		const pricingCardCache = new WeakMap();
		let currentLocale = "en";

		const normalizeLocale = function (value) {
			return value === "ar" ? "ar" : "en";
		};

		const t = function (key) {
			return (
				translations[currentLocale][key] ??
				translations.en[key] ??
				""
			);
		};

		const formatInteger = function (value) {
			const numeric = Number(String(value).replace(/,/g, ""));

			if (!Number.isFinite(numeric)) {
				return String(value);
			}

			return new Intl.NumberFormat(
				currentLocale === "ar" ? "ar-EG" : "en-US",
				{ maximumFractionDigits: 0 }
			).format(numeric);
		};

		const formatDecimalString = function (value) {
			const normalized = String(value).replace(/,/g, "").trim();
			const numeric = Number(normalized);
			const decimalPart = normalized.split(".")[1] || "";

			if (!Number.isFinite(numeric)) {
				return String(value);
			}

			return new Intl.NumberFormat(
				currentLocale === "ar" ? "ar-EG" : "en-US",
				{
					minimumFractionDigits: decimalPart.length,
					maximumFractionDigits: decimalPart.length,
				}
			).format(numeric);
		};

		const localizeMoneyText = function (value) {
			const match = String(value).trim().match(/^([\d.,]+)\s+(.+)$/);

			if (!match) {
				return value;
			}

			return `${formatDecimalString(match[1])} ${match[2]}`;
		};

		const localizeRateBase = function (value) {
			const match = String(value).trim().match(/^([\d.,]+)\s+(.+)$/);

			if (!match) {
				return value;
			}

			return `${formatDecimalString(match[1])} ${match[2]}`;
		};

		const fillTemplate = function (template, values) {
			return String(template).replace(/\{\{(\w+)\}\}/g, function (_, key) {
				return values[key] ?? "";
			});
		};

		const setText = function (selector, value) {
			document.querySelectorAll(selector).forEach(function (element) {
				element.textContent = value;
			});
		};

		const setHtml = function (selector, value) {
			document.querySelectorAll(selector).forEach(function (element) {
				element.innerHTML = value;
			});
		};

		const setAttr = function (selector, attribute, value) {
			document.querySelectorAll(selector).forEach(function (element) {
				element.setAttribute(attribute, value);
			});
		};

		const setTrailingIconLabel = function (selector, label) {
			document.querySelectorAll(selector).forEach(function (element) {
				const icon = element.querySelector("i");
				const iconHtml = icon ? icon.outerHTML : "";
				element.innerHTML = iconHtml ? `${label} ${iconHtml}` : label;
			});
		};

		const setLeadingIconLabel = function (selector, label) {
			document.querySelectorAll(selector).forEach(function (element) {
				const icon = element.querySelector("i");
				const iconHtml = icon ? icon.outerHTML : "";
				element.innerHTML = iconHtml ? `${iconHtml} ${label}` : label;
			});
		};

		const getInitialLocale = function () {
			const params = new URLSearchParams(window.location.search);
			const queryLocale = normalizeLocale(params.get("lang"));

			if (params.get("lang") === "ar" || params.get("lang") === "en") {
				return queryLocale;
			}

			try {
				const storedLocale = normalizeLocale(
					window.localStorage.getItem("zadxLandingLocale")
				);

				if (
					window.localStorage.getItem("zadxLandingLocale") === "ar" ||
					window.localStorage.getItem("zadxLandingLocale") === "en"
				) {
					return storedLocale;
				}
			} catch (error) {
				// Ignore storage access errors and fall back to browser language.
			}

			return /^ar\b/i.test(navigator.language || "") ? "ar" : "en";
		};

		const persistLocale = function (locale) {
			try {
				window.localStorage.setItem("zadxLandingLocale", locale);
			} catch (error) {
				// Ignore storage access errors.
			}

			if (window.history && window.history.replaceState) {
				const url = new URL(window.location.href);

				if (locale === "ar") {
					url.searchParams.set("lang", locale);
				} else {
					url.searchParams.delete("lang");
				}

				window.history.replaceState(
					null,
					"",
					`${url.pathname}${url.search}${url.hash}`
				);
			}
		};

		const updateLocaleButtons = function () {
			document
				.querySelectorAll("[data-lang-switch]")
				.forEach(function (button) {
					const isActive =
						button.getAttribute("data-lang-switch") === currentLocale;
					button.classList.toggle("is-active", isActive);
					button.setAttribute("aria-pressed", isActive ? "true" : "false");
				});
		};

		const setCopyButtonsIdle = function () {
			document
				.querySelectorAll("[data-copy-phone]")
				.forEach(function (button) {
					button.classList.remove("copied");
					button.setAttribute("aria-label", t("copyPhoneAria"));
					button.innerHTML = `<i class="fa-regular fa-copy"></i><span>${t(
						"copyLabel"
					)}</span>`;
				});
		};

		const getPricingCardBase = function (card) {
			if (pricingCardCache.has(card)) {
				return pricingCardCache.get(card);
			}

			const titleElement = card.querySelector("h3");
			const priceElement = card.querySelector("h2");
			const priceSpan = priceElement ? priceElement.querySelector("span") : null;
			const listItems = card.querySelectorAll(".price-list li");
			const titleText = titleElement ? titleElement.textContent.trim() : "";
			const priceText = priceElement
				? priceElement.textContent
						.replace(priceSpan ? priceSpan.textContent : "", "")
						.replace(/\s+/g, " ")
						.trim()
				: "";
			const quotaMatch = listItems[0]
				? listItems[0].textContent.match(/[\d,]+/)
				: null;
			const daysMatch =
				(priceSpan && priceSpan.textContent.match(/[\d,]+/)) ||
				(listItems[1] ? listItems[1].textContent.match(/[\d,]+/) : null);
			const rateText = listItems[2]
				? listItems[2].textContent.replace(/\s+/g, " ").trim()
				: "";
			const base = {
				titleText,
				priceText,
				quota: quotaMatch ? Number(quotaMatch[0].replace(/,/g, "")) : 0,
				days: daysMatch ? Number(daysMatch[0].replace(/,/g, "")) : 0,
				isFree: /free/i.test(rateText),
				rateBase: rateText.replace(/\/\s*SMS$/i, "").trim(),
			};

			pricingCardCache.set(card, base);
			return base;
		};

		const syncPricingCards = function () {
			document.querySelectorAll(".pricing-items").forEach(function (card) {
				const base = getPricingCardBase(card);
				const titleElement = card.querySelector("h3");
				const priceElement = card.querySelector("h2");
				const listItems = card.querySelectorAll(".price-list li");
				const titleMatch = base.titleText.match(/^([\d,]+)\s+SMS$/i);

				if (titleElement && titleMatch) {
					titleElement.textContent =
						currentLocale === "ar"
							? `${formatInteger(titleMatch[1])} رسالة`
							: `${formatInteger(titleMatch[1])} SMS`;
				} else if (titleElement) {
					titleElement.textContent = base.titleText;
				}

				if (priceElement) {
					priceElement.innerHTML = `${localizeMoneyText(
						base.priceText
					)} <span>${fillTemplate(t("pricingDaySuffix"), {
						days: formatInteger(base.days),
					})}</span>`;
				}

				if (listItems[0]) {
					const icon = listItems[0].querySelector("i");
					listItems[0].innerHTML = `${icon ? icon.outerHTML : ""} ${fillTemplate(
						t("pricingQuota"),
						{
							count: formatInteger(base.quota),
						}
					)}`;
				}

				if (listItems[1]) {
					const icon = listItems[1].querySelector("i");
					listItems[1].innerHTML = `${icon ? icon.outerHTML : ""} ${fillTemplate(
						t("pricingValidity"),
						{
							days: formatInteger(base.days),
						}
					)}`;
				}

				if (listItems[2]) {
					const icon = listItems[2].querySelector("i");
					const rateLabel = base.isFree
						? t("pricingFree")
						: fillTemplate(t("pricingRate"), {
								rate: localizeRateBase(base.rateBase),
						  });
					listItems[2].innerHTML = `${icon ? icon.outerHTML : ""} ${rateLabel}`;
				}
			});
		};

		const applyLocale = function (locale, options) {
			const settings = Object.assign({ persist: true }, options);
			const modeCards = document.querySelectorAll("#modes .worke-items");
			const whyItems = document.querySelectorAll(
				"#why .listing-exchange li"
			);
			const processItems = document.querySelectorAll("#how .process-item");
			const faqItems = document.querySelectorAll("#faq .accordion-item");
			const processContent = [
				["step1Label", "step1Title", "step1Description"],
				["step2Label", "step2Title", "step2Description"],
				["step3Label", "step3Title", "step3Description"],
			];
			const faqContent = [
				["faq1Question", "faq1AnswerHtml"],
				["faq2Question", "faq2AnswerHtml"],
				["faq3Question", "faq3AnswerHtml"],
				["faq4Question", "faq4AnswerHtml"],
				["faq5Question", "faq5AnswerHtml"],
			];

			currentLocale = normalizeLocale(locale);
			document.documentElement.lang = currentLocale;
			document.documentElement.dir = currentLocale === "ar" ? "rtl" : "ltr";
			document.title = t("metaTitle");
			setAttr(
				'meta[name="description"]',
				"content",
				t("metaDescription")
			);
			setText("#preloader p.text-center", t("loading"));
			setText(".offcanvas__contact h4", t("offcanvasContact"));
			setTrailingIconLabel(
				".offcanvas__contact .header-button a",
				t("ctaGetStarted")
			);
			setText(
				"#mobile-menu a[href='#hero'], .mean-nav a[href='#hero']",
				t("navHome")
			);
			setText(
				"#mobile-menu a[href='#modes'], .mean-nav a[href='#modes']",
				t("navModes")
			);
			setText(
				"#mobile-menu a[href='#why'], .mean-nav a[href='#why']",
				t("navWhy")
			);
			setText(
				"#mobile-menu a[href='#how'], .mean-nav a[href='#how']",
				t("navHow")
			);
			setText(
				"#mobile-menu a[href='#pricing'], .mean-nav a[href='#pricing']",
				t("navPricing")
			);
			setText(
				"#mobile-menu a[href='#faq'], .mean-nav a[href='#faq']",
				t("navFaq")
			);
			setText(
				"#mobile-menu a[href='#contact'], .mean-nav a[href='#contact']",
				t("navContact")
			);
			setText(".trusted-partner-wrap > span", t("heroTrusted"));
			setHtml(".hero-content-version1 h1", t("heroTitleHtml"));
			setTrailingIconLabel("#hero .common-btn", t("ctaGetStarted"));
			setText("#modes .cont > span", t("modesEyebrow"));
			setHtml("#modes .cont h2", t("modesTitleHtml"));

			if (modeCards[0]) {
				const title = modeCards[0].querySelector("h3 a");
				const description = modeCards[0].querySelector("p");
				const arrow = modeCards[0].querySelector(".rarrow");

				if (title) {
					title.textContent = "OTP";
				}
				if (description) {
					description.textContent = t("modeOtpDescription");
				}
				if (arrow) {
					arrow.setAttribute("aria-label", t("viewOtpPlans"));
				}
			}
			if (modeCards[1]) {
				const title = modeCards[1].querySelector("h3 a");
				const description = modeCards[1].querySelector("p");
				const arrow = modeCards[1].querySelector(".rarrow");

				if (title) {
					title.textContent = "SMS";
				}
				if (description) {
					description.textContent = t("modeSmsDescription");
				}
				if (arrow) {
					arrow.setAttribute("aria-label", t("viewSmsPlans"));
				}
			}
			if (modeCards[2]) {
				const title = modeCards[2].querySelector("h3 a");
				const description = modeCards[2].querySelector("p");
				const arrow = modeCards[2].querySelector(".rarrow");

				if (title) {
					title.textContent = "OTP + SMS";
				}
				if (description) {
					description.textContent = t("modeHybridDescription");
				}
				if (arrow) {
					arrow.setAttribute("aria-label", t("viewHybridPlans"));
				}
			}

			setHtml("#why h2", t("whyTitleHtml"));
			setText("#why .about-exchange-content > p", t("whyDescriptionHtml"));

			if (whyItems[0]) {
				setLeadingIconLabel("#why .listing-exchange li:nth-child(1)", t("whyList1"));
			}
			if (whyItems[1]) {
				setLeadingIconLabel("#why .listing-exchange li:nth-child(2)", t("whyList2"));
			}
			if (whyItems[2]) {
				setLeadingIconLabel("#why .listing-exchange li:nth-child(3)", t("whyList3"));
			}
			if (whyItems[3]) {
				setLeadingIconLabel("#why .listing-exchange li:nth-child(4)", t("whyList4"));
			}

			setTrailingIconLabel("#why .contact-learn-link", t("whyLearnMore"));
			setTrailingIconLabel("#why .about-primary-cta", t("whyTryFree"));
			setHtml(".tv-section h2", t("brandsTitleHtml"));
			setText("#how > .container > h2", t("howTitle"));

			processItems.forEach(function (item, index) {
				const content = processContent[index];

				if (!content) {
					return;
				}

				const label = item.querySelector(".precess-title");
				const title = item.querySelector("h3 a");
				const description = item.querySelector("p");
				const arrow = item.querySelector(".arrow");

				if (label) {
					label.textContent = t(content[0]);
				}
				if (title) {
					title.innerHTML = t(content[1]);
				}
				if (description) {
					description.textContent = t(content[2]);
				}
				if (arrow) {
					arrow.setAttribute("aria-label", t("viewPricingPlans"));
				}
			});

			setText("#pricing > .container > .d-flex h2", t("pricingTitle"));
			setText("#month-tab", t("pricingTabMonth"));
			setText("#quarter-tab", t("pricingTabQuarter"));
			setText("#halfyear-tab", t("pricingTabHalfyear"));
			setText("#pricing > .container > p.text-center", t("pricingUnavailable"));
			setTrailingIconLabel(".pricing-items .common-btn", t("ctaGetStarted"));
			syncPricingCards();
			setText("#faq > .container > h2", t("faqTitle"));

			faqItems.forEach(function (item, index) {
				const content = faqContent[index];

				if (!content) {
					return;
				}

				const button = item.querySelector(".accordion-button");
				const body = item.querySelector(".accordion-body p");

				if (button) {
					button.textContent = t(content[0]);
				}
				if (body) {
					body.innerHTML = t(content[1]);
				}
			});

			setText("footer .col-lg-3 .widget-head h3", t("footerContactHeading"));
			setText("footer .col-lg-4 .widget-head h3", t("footerQuickLinks"));
			setText("footer .list-area li:first-child span", t("footerPhoneLabel"));
			setText("footer .list-area li:last-child span", t("footerEmailLabel"));
			setText("footer .footer-content p", t("footerSummary"));
			setLeadingIconLabel("footer .list-linkes a[href='#hero']", t("navHome"));
			setLeadingIconLabel("footer .list-linkes a[href='#modes']", t("navModes"));
			setLeadingIconLabel("footer .list-linkes a[href='#why']", t("navWhy"));
			setLeadingIconLabel("footer .list-linkes a[href='#how']", t("navHow"));
			setLeadingIconLabel(
				"footer .list-linkes a[href='#pricing']",
				t("navPricing")
			);
			setLeadingIconLabel("footer .list-linkes a[href='#faq']", t("navFaq"));
			setHtml("footer .footer-bottom p.body-font", t("copyrightHtml"));
			setText("footer a[href='terms.html']", t("terms"));
			setText("footer a[href='privacy.html']", t("privacy"));
			setAttr(".main-search-input", "placeholder", t("searchPlaceholder"));
			setText(
				"#contactOptionsModal .modal-header > div > span",
				t("modalEyebrow")
			);
			setText("#contactOptionsModal .modal-title", t("modalTitle"));
			setText(
				"#contactOptionsModal .contact-option-main .fs-seven.black-clr.fw-600",
				t("modalPhoneTitle")
			);
			setText(
				"#contactOptionsModal a.contact-option .fs-seven.black-clr.fw-600",
				t("modalFacebookTitle")
			);
			setAttr(
				"#contactOptionsModal .btn-close",
				"aria-label",
				t("closeLabel")
			);
			setAttr(".contact-view-thumb img", "alt", t("contactPreviewAlt"));
			setAttr(".about-exchange-thumb img", "alt", t("aboutAlt"));
			setAttr(".tv-laptop img", "alt", t("brandAlt"));
			setAttr(".faq-thumb1 img", "alt", t("faqAlt"));
			setAttr("#hero .partner-icon img", "alt", t("customerAlt"));
			setAttr(
				"a[href*='facebook.com/zadxapps']",
				"aria-label",
				t("facebookLabel")
			);
			setAttr(
				"a[href*='instagram.com/zadxapps']",
				"aria-label",
				t("instagramLabel")
			);
			setAttr(
				"a[href*='linkedin.com/company/zadxapps']",
				"aria-label",
				t("linkedinLabel")
			);
			setCopyButtonsIdle();
			updateLocaleButtons();

			if (settings.persist) {
				persistLocale(currentLocale);
			}
		};

		//>> Mobile Menu Js Start <<//
		$("#mobile-menu").meanmenu({
			meanMenuContainer: ".mobile-menu",
			meanScreenWidth: "1199",
			meanExpand: ['<i class="far fa-plus"></i>'],
		});

		applyLocale(getInitialLocale(), { persist: false });

		$(document).on("click", "[data-lang-switch]", function () {
			applyLocale(this.getAttribute("data-lang-switch"));
		});

		// Smooth-scroll same-page header links without the browser's hash jump.
		$(document).on(
			"click",
			"#header-sticky a[href^='#'], .mean-nav a[href^='#'], .modes-grid .rarrow[href^='#'], .about-exchange-content .common-btn[href^='#'], .process-section a[href^='#']",
			function (e) {
				const hash = this.hash;

				if (!hash || hash === "#0" || hash === "#") {
					return;
				}

				const target = document.querySelector(hash);

				if (!target) {
					return;
				}

				e.preventDefault();

				const prefersReducedMotion = window.matchMedia(
					"(prefers-reduced-motion: reduce)"
				).matches;
				const scrollMarginTop =
					parseFloat(window.getComputedStyle(target).scrollMarginTop) ||
					($("#header-sticky").outerHeight() || 0) + 16;
				const scrollTop = Math.max(
					target.getBoundingClientRect().top +
						window.pageYOffset -
						scrollMarginTop,
					0
				);

				window.scrollTo({
					top: scrollTop,
					behavior: prefersReducedMotion ? "auto" : "smooth",
				});

				if (window.history && window.history.pushState) {
					window.history.pushState(null, "", hash);
				}
			}
		);

		$(document).on("click", "[data-copy-phone]", async function () {
			const $button = $(this);
			const phone = String($button.data("copy-phone") || "").trim();

			if (!phone) {
				return;
			}

			const setCopied = function () {
				$button
					.addClass("copied")
					.html(
						`<i class="fa-solid fa-check"></i><span>${t(
							"copiedLabel"
						)}</span>`
					);

				setTimeout(function () {
					setCopyButtonsIdle();
				}, 1800);
			};

			try {
				if (navigator.clipboard && window.isSecureContext) {
					await navigator.clipboard.writeText(phone);
				} else {
					const input = document.createElement("input");
					input.value = phone;
					input.setAttribute("readonly", "");
					input.style.position = "absolute";
					input.style.left = "-9999px";
					document.body.appendChild(input);
					input.select();
					document.execCommand("copy");
					document.body.removeChild(input);
				}

				setCopied();
			} catch (error) {
				$button.html(
					`<i class="fa-solid fa-triangle-exclamation"></i><span>${t(
						"copyFailedLabel"
					)}</span>`
				);
				setTimeout(function () {
					setCopyButtonsIdle();
				}, 1800);
			}
		});

		//>> Sidebar Toggle Js Start <<//
		$(".offcanvas__close,.offcanvas__overlay").on("click", function () {
			$(".offcanvas__info").removeClass("info-open");
			$(".offcanvas__overlay").removeClass("overlay-open");
		});
		$(".sidebar__toggle").on("click", function () {
			$(".offcanvas__info").addClass("info-open");
			$(".offcanvas__overlay").addClass("overlay-open");
		});

		//>> Body Overlay Js Start <<//
		$(".body-overlay").on("click", function () {
			$(".offcanvas__area").removeClass("offcanvas-opened");
			$(".df-search-area").removeClass("opened");
			$(".body-overlay").removeClass("opened");
		});

		//>> Sticky Header Js Start <<//

		$(window).scroll(function () {
			if ($(this).scrollTop() > 250) {
				$("#header-sticky").addClass("sticky");
			} else {
				$("#header-sticky").removeClass("sticky");
			}
		});

		//Accordion Items active class
		const accordionButtons = document.querySelectorAll(".accordion-button");

		accordionButtons.forEach((button) => {
			button.addEventListener("click", function () {
				// Remove 'active' class from all accordion items
				document
					.querySelectorAll(".accordion-item.active")
					.forEach((item) => item.classList.remove("active"));

				// Add 'active' class to the parent of the clicked button
				const parentItem = button.closest(".accordion-item");
				parentItem.classList.add("active");
			});
		});

		//>> Hero-3 Slider Start <<//
		const sliderActive1 = ".hero-slider";
		const sliderInit1 = new Swiper(sliderActive1, {
			loop: true,
			slidesPerView: 1,
			effect: "fade",
			speed: 2000,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			pagination: {
				el: ".dot",
				clickable: true,
			},
		});
		// content animation when active start here
		function animated_swiper(selector, init) {
			let animated = function animated() {
				$(selector + " [data-animation]").each(function () {
					let anim = $(this).data("animation");
					let delay = $(this).data("delay");
					let duration = $(this).data("duration");
					$(this)
						.removeClass("anim" + anim)
						.addClass(anim + " animated")
						.css({
							webkitAnimationDelay: delay,
							animationDelay: delay,
							webkitAnimationDuration: duration,
							animationDuration: duration,
						})
						.one("animationend", function () {
							$(this).removeClass(anim + " animated");
						});
				});
			};
			animated();
			init.on("slideChange", function () {
				$(sliderActive1 + " [data-animation]").removeClass("animated");
			});
			init.on("slideChange", animated);
		}
		animated_swiper(sliderActive1, sliderInit1);

		//>> Video Popup Start <<//
		$(".img-popup").magnificPopup({
			type: "image",
			gallery: {
				enabled: true,
			},
		});

		$(".video-popup").magnificPopup({
			type: "iframe",
			callbacks: {},
		});

		//>> Counterup Start <<//
		$(".count").counterUp({
			delay: 15,
			time: 4000,
		});

		//>> Wow Animation Start <<//
		new WOW().init();

		//>> Nice Select Start <<//
		$("select").niceSelect();

		//>> Testimonial Slider Start <<//
		const testimonial__slider1 = new Swiper(".testimonial-slider1", {
			spaceBetween: 30,
			speed: 500,
			loop: true,
			// autoplay: {
			// 	delay: 1000,
			// 	disableOnInteraction: false,
			// },
			pagination: {
				el: ".dot",
				clickable: true,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 1,
				},
				767: {
					slidesPerView: 1,
				},
				575: {
					slidesPerView: 1,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Sponsor One
		const sponsorWrapper = new Swiper(".sponsor-wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			breakpoints: {
				1199: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				520: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 2,
					spaceBetween: 14,
				},
			},
		});

		//--Sponsor Two
		const sponsorWrapper2 = new Swiper(".sponsor-wrapper2", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			breakpoints: {
				1199: {
					slidesPerView: 5,
				},
				991: {
					slidesPerView: 4,
					spaceBetween: 14,
				},
				520: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 2,
					spaceBetween: 14,
				},
			},
		});

		//--Fronter Slide
		const fronterWrapper = new Swiper(".fronter-wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			breakpoints: {
				1199: {
					slidesPerView: 4.3,
				},
				991: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				767: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				575: {
					slidesPerView: 2.5,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 1.2,
					spaceBetween: 14,
				},
			},
		});

		//--team Slide
		const teamWrapper = new Swiper(".team-wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial 06 Slide
		const testimonialWrapper6 = new Swiper(".testimonial-wrapper6", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 2.8,
				},
				991: {
					slidesPerView: 2.8,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Project Gallery Slide
		const projectGalleryWrap = new Swiper(".project-gallery-wrap", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial Slide
		const teamWrapper2 = new Swiper(".team-wrapper2", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 4,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial Slide
		const teamWrapper4 = new Swiper(".team-wrapper4", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial Slide
		const providingTestimonialSlide = new Swiper(
			".providing-testimonial-slide",
			{
				spaceBetween: 44,
				speed: 500,
				loop: true,
				pagination: {
					el: ".dot",
					clickable: true,
				},
				navigation: {
					nextEl: ".array-prev",
					prevEl: ".array-next",
				},
				breakpoints: {
					1199: {
						slidesPerView: 1,
					},
					767: {
						slidesPerView: 1,
					},
					575: {
						slidesPerView: 1,
					},
					0: {
						slidesPerView: 1,
					},
				},
			}
		);

		//Not Use this code bottom ----------------+++++==
		//--Text Custom Slide
		const sponsor__text__slide = new Swiper(".sponsor-text-slide", {
			speed: 6000,
			loop: true,
			slidesPerView: "auto",
			centeredSlides: true,
			autoplay: {
				delay: 1,
				disableOnInteraction: false,
			},
			breakpoints: {
				991: {
					spaceBetween: 30,
				},
				600: {
					spaceBetween: 20,
				},
				400: {
					spaceBetween: 16,
				},
				0: {
					spaceBetween: 14,
				},
			},
		});

		//--Testimonial Slide
		const testimonialSlider = new Swiper(".testimonial-slider", {
			spaceBetween: 30,
			speed: 500,
			loop: true,
			pagination: {
				el: ".dot",
				clickable: true,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 1,
				},
				767: {
					slidesPerView: 1,
				},
				575: {
					slidesPerView: 1,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});
		//--Testimonial Slide
		const lastes__project__wrapper = new Swiper(".lastes-project__wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			// autoplay: {
			// 	delay: 1000,
			// 	disableOnInteraction: false,
			// },
			pagination: {
				el: ".dot",
				clickable: true,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				500: {
					slidesPerView: 2,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 1,
					spaceBetween: 14,
				},
			},
		});

		//------------------------Not Use thsi code in this porjects

		const testimonialSlider3 = new Swiper(".testimonial-slider-3", {
			spaceBetween: 30,
			speed: 1500,
			loop: true,
			autoplay: {
				delay: 1000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
		});

		//>> Search Popup Start <<//
		const $searchWrap = $(".search-wrap");
		const $navSearch = $(".nav-search");
		const $searchClose = $("#search-close");

		$(".search-trigger").on("click", function (e) {
			e.preventDefault();
			$searchWrap.animate({ opacity: "toggle" }, 500);
			$navSearch.add($searchClose).addClass("open");
		});

		$(".search-close").on("click", function (e) {
			e.preventDefault();
			$searchWrap.animate({ opacity: "toggle" }, 500);
			$navSearch.add($searchClose).removeClass("open");
		});

		function closeSearch() {
			$searchWrap.fadeOut(200);
			$navSearch.add($searchClose).removeClass("open");
		}

		$(document.body).on("click", function (e) {
			closeSearch();
		});

		$(".search-trigger, .main-search-input").on("click", function (e) {
			e.stopPropagation();
		});

		//---------Use In Gsap--------
		// lenis Scroll Init
		// gsap.registerPlugin(ScrollSmoother);
		// const lenis = new Lenis();
		// gsap.ticker.add(function (time) {
		//   lenis.raf(time * 400);
		// });
		// gsap.ticker.lagSmoothing(0);
		// ScrollTrigger.update();

		//--- Custom Tilt Js Start ---//
		const tilt = document.querySelectorAll(".tilt");
		VanillaTilt.init(tilt, {
			reverse: true,
			max: 15,
			speed: 400,
			scale: 1.01,
			glare: true,
			reset: true,
			perspective: 800,
			transition: true,
			"max-glare": 0.45,
			"glare-prerender": false,
			gyroscope: true,
			gyroscopeMinAngleX: -45,
			gyroscopeMaxAngleX: 45,
			gyroscopeMinAngleY: -45,
			gyroscopeMaxAngleY: 45,
		});
		//--- Custom Tilt Js End ---//

		// Mouse Follower
		const follower = document.querySelector(
			".mouse-follower .cursor-outline"
		);
		const dot = document.querySelector(".mouse-follower .cursor-dot");
		window.addEventListener("mousemove", (e) => {
			follower.animate(
				[
					{
						opacity: 1,
						left: `${e.clientX}px`,
						top: `${e.clientY}px`,
						easing: "ease-in-out",
					},
				],
				{
					duration: 3000,
					fill: "forwards",
				}
			);
			dot.animate(
				[
					{
						opacity: 1,
						left: `${e.clientX}px`,
						top: `${e.clientY}px`,
						easing: "ease-in-out",
					},
				],
				{
					duration: 1500,
					fill: "forwards",
				}
			);
		});

		// Mouse Follower Hide Function
		$("a, button").on("mouseenter mouseleave", function () {
			$(".mouse-follower").toggleClass("hide-cursor");
		});

		var terElement = $(
			"h1, h2, h3, h4, .display-one, .display-two, .display-three, .display-four, .display-five, .display-six"
		);
		$(terElement).on("mouseenter mouseleave", function () {
			$(".mouse-follower").toggleClass("highlight-cursor-head");
			$(this).toggleClass("highlight-cursor-head");
		});

		var terElement = $("p");
		$(terElement).on("mouseenter mouseleave", function () {
			$(".mouse-follower").toggleClass("highlight-cursor-para");
			$(this).toggleClass("highlight-cursor-para");
		});

		//-- Use Gsap Animation --//
		// Visible From Right Animation
		const observer = new IntersectionObserver(
			(entries, observer) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						let visibleFromRight = entry.target;
						let split_item = new SplitText(visibleFromRight, {
							type: document.documentElement.dir === "rtl" ? "words" : "chars, words",
						});
						gsap.from(document.documentElement.dir === "rtl" ? split_item.words : split_item.chars, {
							duration: 0.4,
							x: 45,
							autoAlpha: 0,
							stagger: 0.15,
						});
						observer.unobserve(visibleFromRight);
					}
				});
			},
			{ threshold: 0.1 }
		);
		document.querySelectorAll(".visible-from-right").forEach((element) => {
			observer.observe(element);
		});

		// Visible From Right Slowly Animation
		let visibleSlowlyRight = document.querySelectorAll(
			".visible-slowly-right"
		);
		if ($(visibleSlowlyRight).length > 0) {
			let char_come = gsap.utils.toArray(visibleSlowlyRight);
			char_come.forEach((char_come) => {
				let split_char = new SplitText(char_come, {
					type: document.documentElement.dir === "rtl" ? "words" : "chars, words",
					lineThreshold: 0.5,
				});
				const tl2 = gsap.timeline({
					scrollTrigger: {
						trigger: char_come,
						start: "top 90%",
						end: "bottom 60%",
						scrub: false,
						markers: false,
						toggleActions: "play play play play",
					},
				});
				tl2.from(document.documentElement.dir === "rtl" ? split_char.words : split_char.chars, {
					duration: 0.8,
					x: 70,
					autoAlpha: 0,
					stagger: 0.03,
				});
			});
		}

		// Visible From Bottom Animation
		let visibleFromBottom = gsap.utils.toArray(".visible-from-bottom");
		visibleFromBottom.forEach((splitArea) => {
			const trigger = gsap.timeline({
				scrollTrigger: {
					trigger: splitArea,
					start: "top 90%",
					end: "bottom 60%",
					scrub: false,
					markers: false,
				},
			});
			const contentSplitted = new SplitText(splitArea, {
				type: "words, lines",
			});
			gsap.set(splitArea, { perspective: 400 });
			contentSplitted.split({ type: "lines" });
			trigger.from(contentSplitted.lines, {
				duration: 1,
				delay: 0.3,
				opacity: 0,
				rotationX: -75,
				force3D: true,
				transformOrigin: "top center -50",
				stagger: 0.1,
			});
		});

		// Visible Slowly From Bottom Animation
		const visibleSlowlyBottom = document.querySelectorAll(
			".visible-slowly-bottom"
		);
		function visibleSlowly() {
			visibleSlowlyBottom.forEach((splitArea) => {
				if (splitArea.anim) {
					splitArea.anim.progress(1).kill();
					splitArea.split.revert();
				}
				splitArea.split = new SplitText(splitArea, {
					type: document.documentElement.dir === "rtl" ? "lines,words" : "lines,words,chars",
					linesClass: "split-line",
				});
				splitArea.anim = gsap.from(document.documentElement.dir === "rtl" ? splitArea.split.words : splitArea.split.chars, {
					scrollTrigger: {
						trigger: splitArea,
						toggleActions: "restart pause resume reverse",
						start: "top 90%",
					},
					duration: 0.8,
					ease: "circ.out",
					y: 70,
					stagger: 0.02,
				});
			});
		}
		ScrollTrigger.addEventListener("refresh", visibleSlowly);
		visibleSlowly();

		// Btn Custom Animation
		// button Vivacity
		let btnVivacity = document.querySelectorAll(".btn-vivacity");
		if (btnVivacity) {
			VanillaTilt.init(btnVivacity, {
				max: 14,
				speed: 2800,
				perspective: 500,
			});
		}

		// Box Style
		const targetBtn = document.querySelectorAll(".box-style");
		if (targetBtn) {
			targetBtn.forEach((element) => {
				element.addEventListener("mousemove", (e) => {
					const x = e.offsetX + "px";
					const y = e.offsetY + "px";
					element.style.setProperty("--x", x);
					element.style.setProperty("--y", y);
				});
			});
		}

		// image right to left
		gsap.registerPlugin(ScrollTrigger);
		let revealContainers = document.querySelectorAll(".reveal-one");
		revealContainers.forEach((container) => {
			let image = container.querySelector(".reveal-image-one");
			let rts = gsap.timeline({
				scrollTrigger: {
					trigger: container,
					toggleActions: "restart none none reset",
					start: "top 90%",
					end: "top 0%",
				},
			});
			rts.set(container, {
				autoAlpha: 1,
			});
			rts.from(container, 1.5, {
				xPercent: 100,
				ease: Power2.out,
			});
			rts.from(image, 1.5, {
				xPercent: -100,
				scale: 1.3,
				delay: -1.5,
				ease: Power2.out,
			});
		});

		//Reveal SlideTop
		function revealSlideTop() {
			const reveals = document.querySelectorAll(".revealSlideTop");
			const windowHeight = window.innerHeight;
			const elementVisible = 150;

			reveals.forEach((reveal) => {
				const elementTop = reveal.getBoundingClientRect().top;

				if (elementTop < windowHeight - elementVisible) {
					reveal.classList.add("active");
				} else {
					reveal.classList.remove("active");
				}
			});
		}
		window.addEventListener("scroll", revealSlideTop);

		// reveal-fourth
		let revealContainersFourth = document.querySelectorAll(".reveal-fourth");
		revealContainersFourth.forEach((container) => {
			let image = container.querySelector("img");
			let tl = gsap.timeline({
				scrollTrigger: {
					trigger: container,
					toggleActions: "restart none none reset",
				},
			});
			tl.set(container, { autoAlpha: 1 });
			tl.from(container, 1.5, {
				xPercent: 100,
				ease: Power2.out,
			});
			tl.from(image, 1.5, {
				xPercent: -100,
				scale: 1.3,
				delay: -1.5,
				ease: Power2.out,
			});
		});

		// Blur animation
		// gsap.utils.toArray(".section-blur").forEach(function (section) {
		// 	gsap.set(section, { filter: "blur(20px)" });
		// 	gsap.to(section, {
		// 		filter: "blur(0px)",
		// 		scrollTrigger: {
		// 			trigger: section,
		// 			start: "top bottom",
		// 			end: "top center",
		// 			scrub: true,
		// 		},
		// 	});
		// });

		// Image reveal animation

		function revealAnimation(selector, axis, percent, scale) {
			gsap.utils.toArray(selector).forEach(function (revealItem) {
				// Check if the revealItem contains an image
				var image = revealItem.querySelector("img");
				if (!image) {
					console.warn("No image found in", revealItem);
					return;
				}

				var tl = gsap.timeline({
					scrollTrigger: {
						trigger: revealItem,
						toggleActions: "play play play reverse",
					},
				});

				// Set initial state
				tl.set(revealItem, { autoAlpha: 1 })
					.from(revealItem, {
						duration: 1.5, // Specify duration directly
						[axis + "Percent"]: -percent, // Use axis + "Percent" for dynamic property names
						ease: "power2.out", // Use string for ease function
					})
					.from(image, {
						duration: 1.5, // Specify duration directly
						[axis + "Percent"]: percent, // Use axis + "Percent" for dynamic property names
						scale: scale,
						delay: -1.5, // Delay for image animation
						ease: "power2.out", // Use string for ease function
					});
			});
		}

		// Call the function with your selectors
		revealAnimation(".reveal-left", "x", 100, 1.3);
		revealAnimation(".reveal-bottom", "y", 100, 1.3);

		// End Document Ready Function
	});
	//--== Progress Bar ==--//
	$(document).ready(function () {
		progress_bar();
	});

	function progress_bar() {
		var speed = 30;
		var items = $(".progress_bar").find(".progress_bar_item");

		items.each(function () {
			var item = $(this).find(".progress");
			var itemValue = item.data("progress");
			var i = 0;
			var value = $(this);

			var count = setInterval(function () {
				if (i <= itemValue) {
					var iStr = i.toString();
					item.css({
						width: iStr + "%",
					});
					value.find(".item_value").html(iStr + "%");
				} else {
					clearInterval(count);
				}
				i++;
			}, speed);
		});
	}
	//--== Progress Bar ==--//

	//---- Range Slide -----//
	const minInput = document.querySelector(".min");
	const maxInput = document.querySelector(".max");
	const minLabel = document.querySelector(".min-label");
	const maxLabel = document.querySelector(".max-label");
	const sliderRange = document.querySelector(".slider-range");

	function updateSlider() {
		let minVal = parseInt(minInput.value);
		let maxVal = parseInt(maxInput.value);

		if (minVal > maxVal) {
			if (this === minInput) {
				maxVal = minVal;
				maxInput.value = maxVal;
			} else {
				minVal = maxVal;
				minInput.value = minVal;
			}
		}

		minLabel.textContent = minVal;
		maxLabel.textContent = maxVal;

		const minPercent =
			((minVal - minInput.min) / (minInput.max - minInput.min)) * 100;
		const maxPercent =
			((maxVal - minInput.min) / (minInput.max - minInput.min)) * 100;

		sliderRange.style.left = `${minPercent}%`;
		sliderRange.style.width = `${maxPercent - minPercent}%`;
	}
	if (minInput && maxInput) {
		minInput.addEventListener("input", updateSlider);
		maxInput.addEventListener("input", updateSlider);

		updateSlider(); // Initial call to set up the slider
	}
	//---- Range Slide -----//

	//---- Quantity -----//
	(function () {
		const quantityContainer = document.querySelector(".quantity");
		if (!quantityContainer) return; // Exit if .quantity doesn't exist on the page

		const minusBtn = quantityContainer.querySelector(".minus");
		const plusBtn = quantityContainer.querySelector(".plus");
		const inputBox = quantityContainer.querySelector(".input-box");

		updateButtonStates();

		quantityContainer.addEventListener("click", handleButtonClick);
		inputBox.addEventListener("input", handleQuantityChange);

		function updateButtonStates() {
			const value = parseInt(inputBox.value);
			minusBtn.disabled = value <= 1;
			plusBtn.disabled = value >= parseInt(inputBox.max);
		}

		function handleButtonClick(event) {
			if (event.target.classList.contains("minus")) {
				decreaseValue();
			} else if (event.target.classList.contains("plus")) {
				increaseValue();
			}
		}

		function decreaseValue() {
			let value = parseInt(inputBox.value);
			value = isNaN(value) ? 1 : Math.max(value - 1, 1);
			inputBox.value = value;
			updateButtonStates();
			handleQuantityChange();
		}

		function increaseValue() {
			let value = parseInt(inputBox.value);
			value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
			inputBox.value = value;
			updateButtonStates();
			handleQuantityChange();
		}

		function handleQuantityChange() {
			let value = parseInt(inputBox.value);
			value = isNaN(value) ? 1 : value;

			// Execute your code here based on the updated quantity value
			console.log("Quantity changed:", value);
		}
	})();
	//---- Quantity -----//

	//Mixitup Filter
	(function () {
		// Check if the container element exists
		var containerEl = document.querySelector(".mixitup-filter");

		if (containerEl) {
			// Initialize MixItUp if the container exists
			var mixer = mixitup(containerEl);
		}
	})();

	// Current year
	(function () {
		var year = new Date().getFullYear();
		document.querySelectorAll(".current-year").forEach(function (element) {
			element.textContent = year;
		});
	})();

	// progress-area
	let progressBars = $(".progress-area");
	let observer = new IntersectionObserver(function (progressBars) {
		progressBars.forEach(function (entry, index) {
			if (entry.isIntersecting) {
				let width = $(entry.target)
					.find(".progress-bar")
					.attr("aria-valuenow");
				let count = 0;
				let time = 1000 / width;
				let progressValue = $(entry.target).find(".progress-value");
				setInterval(() => {
					if (count == width) {
						clearInterval();
					} else {
						count += 1;
						$(progressValue).text(count + "%");
					}
				}, time);
				$(entry.target)
					.find(".progress-bar")
					.css({ width: width + "%", transition: "width 1s linear" });
			} else {
				$(entry.target)
					.find(".progress-bar")
					.css({ width: "0%", transition: "width 1s linear" });
			}
		});
	});
	progressBars.each(function () {
		observer.observe(this);
	});
	$(window).on("unload", function () {
		observer.disconnect();
	});
	//end

	function loader() {
		$(window).on("load", function () {
			// Animate loader off screen
			$(".preloader").addClass("loaded");
			$(".preloader").delay(600).fadeOut();
		});
	}

	loader();
})(jQuery); // End jQuery
