
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>المساعد العقاري | Real Estate Assistant</title>

    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
    <script src="{{ asset('js/chatbot.js') }}" defer></script>
</head>
<body>

    <header class="navbar">
        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">⌂</span>
            <span data-i18n="brand">عقاراتي</span>
        </a>

        <div class="nav-actions">
            <a href="{{ url('/') }}" class="back-link" data-i18n="home">
                الصفحة الرئيسية
            </a>
            <button id="languageToggle" class="language-btn" type="button">
                English
            </button>
            <button id="themeToggle" class="theme-btn" type="button"
            aria-label="تفعيل الوضع الليلي" title="تغيير المظهر">
        <span id="themeIcon">🌙</span>
    </button>

        </div>
    </header>

    <main class="page-container">
        <section class="chat-card">

            <div class="chat-header">
                <div class="bot-avatar">⌂</div>

                <div class="bot-info">
                    <h1 data-i18n="title">المساعد العقاري</h1>
                    <p data-i18n="subtitle">نحن هنا لمساعدتك في العثور على عقارك</p>
                    <span class="online-status">
                        <span class="status-dot"></span>
                        <span data-i18n="online">متصل الآن</span>
                    </span>
                </div>
            </div>

            <div id="chatMessages" class="chat-messages"
                 aria-live="polite" aria-label="المحادثة">
            </div>

            <div class="suggestions">
                <p data-i18n="suggestionsTitle">يمكنك السؤال عن:</p>
                <div id="quickQuestions" class="quick-questions"></div>
            </div>

            <form id="chatForm" class="chat-form">


                <button type="submit" class="send-btn"
                        aria-label="إرسال الرسالة">
                    <span id="sendLabel">إرسال</span>
                </button>
            </form>

            <p class="footer-note" data-i18n="footer">
                المساعد العقاري — خدمة الأسئلة الشائعة
            </p>

        </section>
    </main>

</body>
</html>
