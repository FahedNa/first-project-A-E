<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policies & Agreement | Real Estate Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2f6f64;
            --primary-light: #e8f2f0;
            --primary-dark: #1e4a42;
            --text-main: #2d3748;
            --text-muted: #718096;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --border-color: #e2e8f0;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px -1px rgba(47, 111, 100, 0.08), 0 2px 4px -1px rgba(0,0,0,0.04);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.7;
        }

        /* Header Section */
        .page-header {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            transform: rotate(30deg);
            pointer-events: none;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .last-updated {
            display: inline-block;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.15);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Layout Structure */
        .container {
            max-width: 1200px;
            margin: -30px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .content-wrapper {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
            align-items: start;
        }

        /* Sidebar Navigation */
        .sidebar {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            position: sticky;
            top: 30px;
            border: 1px solid var(--border-color);
        }

        .sidebar h3 {
            font-size: 1.1rem;
            color: var(--primary-dark);
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            margin-bottom: 8px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .sidebar a:hover {
            background: var(--primary-light);
            color: var(--primary-color);
            transform: translateX(4px);
        }

        .sidebar a i {
            font-size: 0.9rem;
            width: 20px;
            text-align: center;
        }

        /* Main Content Cards */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .card-section {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: 35px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            scroll-margin-top: 30px;
        }

        .card-section h2 {
            font-size: 1.5rem;
            color: var(--primary-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-section h2 i {
            color: var(--primary-color);
            font-size: 1.3rem;
        }

        .card-section p {
            color: var(--text-muted);
            margin-bottom: 16px;
            font-size: 1rem;
        }

        .card-section ul {
            margin: 15px 0 20px 20px;
            color: var(--text-muted);
        }

        .card-section li {
            margin-bottom: 10px;
            font-size: 0.98rem;
        }

        .highlight-box {
            background: var(--primary-light);
            border-left: 4px solid var(--primary-color);
            padding: 18px 20px;
            border-radius: 0 var(--radius-md) var(--radius-md) 0;
            margin: 20px 0;
            color: var(--primary-dark);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Action Buttons Bar */
        .actions-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--bg-card);
            padding: 20px 30px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            margin-top: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn:hover {
            background: var(--primary-dark);
            box-shadow: 0 4px 12px rgba(47, 111, 100, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background: var(--primary-light);
            color: var(--primary-dark);
            box-shadow: none;
        }

        /* Responsive Design */
        @media (max-width: 900px) {
            .content-wrapper {
                grid-template-columns: 1fr;
            }
            .sidebar {
                position: static;
                margin-bottom: 10px;
            }
            .page-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="page-header">
        <h1>Policies & Agreement</h1>
        <p>Transparency, trust, and security guidelines for our real estate platform users, buyers, and sellers.</p>
        <span class="last-updated"><i class="far fa-clock"></i> Last Updated:2026/10/10</span>
    </header>

    <!-- Main Container -->
    <div class="container">
        <div class="content-wrapper">

            <!-- Sidebar Navigation -->
            <aside class="sidebar">
                <h3><i class="fas fa-bars"></i> Navigation</h3>
                <ul>
                    <li><a href="#terms"><i class="fas fa-file-contract"></i> Terms of Service</a></li>
                    <li><a href="#privacy"><i class="fas fa-shield-alt"></i> Privacy Policy</a></li>
                    <li><a href="#listings"><i class="fas fa-home"></i> Property Listings</a></li>
                    <li><a href="#financial"><i class="fas fa-wallet"></i> Financial Terms</a></li>
                    <li><a href="#liability"><i class="fas fa-balance-scale"></i> Limitation of Liability</a></li>
                </ul>
            </aside>

            <!-- Main Content Area -->
            <main class="main-content">

                <!-- Terms of Service -->
                <section id="terms" class="card-section">
                    <h2><i class="fas fa-file-contract"></i> 1. Terms of Service</h2>
                    <p>Welcome to our real estate platform. By accessing or using our website and services, you agree to comply with and be bound by the following terms and conditions. Please review them carefully.</p>
                    <div class="highlight-box">
                        <i class="fas fa-info-circle"></i> Use of this platform signifies your formal acceptance of these terms and agreement to abide by all local real estate regulations.
                    </div>
                    <p>Users must be at least 18 years of age to register accounts, schedule property viewings, or list properties for sale or rent through our digital portal.</p>
                </section>

                <!-- Privacy Policy -->
                <section id="privacy" class="card-section">
                    <h2><i class="fas fa-shield-alt"></i> 2. Privacy Policy</h2>
                    <p>We are committed to protecting your personal data and privacy. We collect only necessary details required to facilitate real estate transactions, customer support, and seamless user experiences.</p>
                    <ul>
                        <li><strong>Information Collection:</strong> Name, email address, phone number, and preferences.</li>
                        <li><strong>Data Usage:</strong> To connect buyers with verified agents and secure optimal property matches.</li>
                        <li><strong>Data Security:</strong> We employ state-of-the-art encryption protocols to safeguard your private communications.</li>
                    </ul>
                </section>

                <!-- Property Listings -->
                <section id="listings" class="card-section">
                    <h2><i class="fas fa-home"></i> 3. Property Listings & Accuracy</h2>
                    <p>All property descriptions, prices, measurements, and images displayed on our platform are provided by verified agents, developers, or property owners.</p>
                    <p>While we strive to ensure 100% accuracy:</p>
                    <ul>
                        <li>Prices and availability are subject to change without prior notice.</li>
                        <li>Virtual tours and blueprints are for illustrative representation only.</li>
                        <li>Prospective buyers are advised to conduct physical inspections prior to final contracting.</li>
                    </ul>
                </section>

                <!-- Financial Terms -->
                <section id="financial" class="card-section">
                    <h2><i class="fas fa-wallet"></i> 4. Financial Terms & Commissions</h2>
                    <p>Transactions processed through our gateway adhere to strict financial security regulations. Commission fees for brokers and administrative service charges are explicitly detailed prior to final contract execution.</p>
                    <div class="highlight-box">
                        <i class="fas fa-check-circle"></i> Deposits and down payments are handled securely through trusted escrow channels.
                    </div>
                </section>

                <!-- Limitation of Liability -->
                <section id="liability" class="card-section">
                    <h2><i class="fas fa-balance-scale"></i> 5. Limitation of Liability</h2>
                    <p>Our platform acts as an intermediary marketplace connecting property seekers with providers. We shall not be held liable for direct, indirect, or incidental damages resulting from disputes between independent buyers, sellers, or third-party agencies.</p>
                </section>

                <!-- Bottom Actions Bar -->
                <div class="actions-bar">
                    <a href="javascript:window.print()" class="btn btn-outline">
                        <i class="fas fa-print"></i> Print Policy
                    </a>
                    <a href="{{ url('landing') }}" class="btn">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

            </main>
        </div>
    </div>

</body>
</html>
