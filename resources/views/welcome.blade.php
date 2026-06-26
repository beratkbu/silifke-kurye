<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silifke Kurye 33 | 7/24 Acil Motorlu Kurye Hizmeti</title>
    <style>
        :root {
            --bg-main: #0b0f19;
            --bg-card: rgba(30, 41, 59, 0.6);
            --primary: #f59e0b;
            --primary-hover: #d97706;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --glass-border: rgba(255, 255, 255, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Düzenli Grid ve Container Yapısı */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Üst Menü / Header (Modern Glassmorphism) */
        header {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--glass-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-img {
            width: 45px;
            height: 45px;
            object-fit: contain;
            filter: drop-shadow(0 0 8px rgba(245, 158, 11, 0.4));
        }

        .logo-text {
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 1px;
        }

        .logo-text span {
            color: var(--primary);
            text-shadow: 0 0 15px rgba(245, 158, 11, 0.4);
        }

        .auth-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .auth-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.3s;
        }

        .auth-link:hover {
            color: #fff;
        }

        .contact-btn {
            background: linear-gradient(135deg, var(--primary), #ed8936);
            color: #0f172a;
            padding: 10px 22px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 20px rgba(245, 158, 11, 0.2);
        }

        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(245, 158, 11, 0.4);
        }

        /* Ana Tanıtım / Hero Section */
        .hero {
            padding: 80px 0 40px 0;
            text-align: center;
            background: radial-gradient(circle at top, rgba(30, 41, 59, 0.4) 0%, var(--bg-main) 80%);
        }

        .hero h1 {
            font-size: 44px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #fff;
            line-height: 1.2;
        }

        .hero h1 span {
            color: var(--primary);
            background: linear-gradient(135deg, #fff, var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 18px;
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto;
        }

        /* Özellikler Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .card {
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 35px 25px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(245, 158, 11, 0.2);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 15px;
            display: inline-block;
        }

        .card h3 {
            font-size: 20px;
            color: #fff;
            margin-bottom: 10px;
        }

        .card p {
            color: var(--text-muted);
            font-size: 14px;
        }

        /* ANLAŞMALI RESTORANLAR (YENİ ALAN) */
        .restaurants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .restaurant-card {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .restaurant-card:hover {
            border-color: var(--primary);
            background: rgba(245, 158, 11, 0.05);
        }

        .rest-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .restaurant-card h4 {
            color: #fff;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .restaurant-card span {
            font-size: 12px;
            color: var(--primary);
            background: rgba(245, 158, 11, 0.1);
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 600;
        }

        /* Ortak Bölence Yapısı */
        .section-box {
            background: var(--bg-card);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px;
            margin: 40px 0;
        }

        .section-box h3 {
            font-size: 22px;
            color: var(--primary);
            margin-bottom: 20px;
            text-align: center;
            letter-spacing: 0.5px;
        }

        .badges {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
        }

        .badge {
            background: rgba(51, 65, 85, 0.4);
            color: #e2e8f0;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid var(--glass-border);
        }

        /* Sipariş Formu Düzeni */
        .order-form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 12px;
            color: #fff;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: var(--primary);
        }

        .form-success-alert {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid #10b981;
            color: #34d399;
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        .submit-order-btn {
            width: 100%;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .submit-order-btn:hover {
            transform: scale(1.01);
        }

        /* Instagram ve Medya Alanı */
        .instagram-box {
            background: radial-gradient(circle at top left, rgba(131, 58, 180, 0.12), transparent), var(--bg-card);
            border: 1px solid rgba(253, 29, 29, 0.15);
            text-align: center;
        }

        .instagram-btn {
            text-decoration: none;
            background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 700;
            margin-top: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* WhatsApp */
        .cta-container {
            text-align: center;
            padding: 20px 0 50px 0;
        }

        .whatsapp-main-btn {
            background: linear-gradient(135deg, #25d366, #128c7e);
            color: #fff;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 20px;
            font-weight: 800;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.2);
        }

        footer {
            background-color: #060911;
            text-align: center;
            padding: 25px;
            color: #475569;
            font-size: 13px;
            border-top: 1px solid var(--glass-border);
        }

        footer span {
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 30px; }
            .hero p { font-size: 15px; }
            .section-box { padding: 25px 15px; }
            .whatsapp-main-btn { font-size: 16px; padding: 14px 25px; }
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <div class="logo-area">
                <img src="{{ asset('logo.png') }}" alt="Silifke Kurye 33 Logo" class="logo-img">
                <div class="logo-text">SİLİFKE KURYE <span>33</span></div>
            </div>
            
            <div class="auth-nav">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="auth-link" style="color: var(--primary);">Panel Girişi →</a>
                    @else
                        <a href="{{ route('login') }}" class="auth-link">Giriş</a>
                        <a href="{{ route('register') }}" class="auth-link">Kayıt</a>
                    @endauth
                @endif
                <a href="tel:05069306528" class="contact-btn">📞 Tıkla Ara</a>
            </div>
        </div>
    </header>

    <div class="container">
        
        <section class="hero">
            <h1>Silifke'de <span>7/24</span> Hızlı ve Güvenilir Motorlu Kurye</h1>
            <p>Evrak, paket, lezzetli restoran menüleri veya acil ulaştırılması gereken tüm gönderileriniz profesyonel ekibimizle dakikalar içinde kapınızda.</p>
            
            <div class="features-grid">
                <div class="card">
                    <div class="card-icon">⚡</div>
                    <h3>Işık Hızında Teslimat</h3>
                    <p>Silifke trafiğine takılmadan, gönderilerinizi en kısa sürede adresine ulaştırıyoruz.</p>
                </div>
                <div class="card">
                    <div class="card-icon">🌙</div>
                    <h3>7/24 Gece Kuryesi</h3>
                    <p>Gece veya gündüz fark etmez; nöbetçi kuryelerimizle kesintisiz hizmet veriyoruz.</p>
                </div>
                <div class="card">
                    <div class="card-icon">🛡️</div>
                    <h3>Güvenli Taşıma</h3>
                    <p>Emanetleriniz, hassasiyetle taşınır ve hiçbir zarar görmeden alıcısına teslim edilir.</p>
                </div>
            </div>
        </section>

<!-- ANLAŞMALI GERÇEK RESTORANLARIMIZ -->
        <section class="section-box">
            <h3>🤝 ANLAŞMALI İŞ ORTAKLARIMIZ</h3>
            <p style="text-align: center; color: var(--text-muted); font-size: 14px; margin-top: -10px; margin-bottom: 25px;">
                Silifke Kurye ailesine katılan, profesyonel ve hızlı teslimat sağladığımız anlaşmalı işletmelerimiz.
            </p>
            <div class="restaurants-grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 15px;">
                
                <!-- MBR GRUBU -->
                <div class="restaurant-card" style="border-color: rgba(245, 158, 11, 0.3);">
                    <div class="rest-icon">🥩</div>
                    <h4>MBR İskender</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card" style="border-color: rgba(245, 158, 11, 0.3);">
                    <div class="rest-icon">🌯</div>
                    <h4>MBR Tantuni</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card" style="border-color: rgba(245, 158, 11, 0.3);">
                    <div class="rest-icon">🍗</div>
                    <h4>MBR Express Tavuk Döner</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <!-- DİĞER İŞLETMELER -->
                <div class="restaurant-card">
                    <div class="rest-icon">🍲</div>
                    <h4>Ümmügülsüm Hanım Sofrası</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card">
                    <div class="rest-icon">🍗</div>
                    <h4>Beyaz Mutfak</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card">
                    <div class="rest-icon">🌯</div>
                    <h4>Göksel Tantuni</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card">
                    <div class="rest-icon">☕</div>
                    <h4>Balkan's Milk Bar & Coffee</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card">
                    <div class="rest-icon">🧃</div>
                    <h4>Balboxs</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card">
                    <div class="rest-icon">🥪</div>
                    <h4>Esnaf Tost</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card">
                    <div class="rest-icon">🍔</div>
                    <h4>Butik Burger</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

                <div class="restaurant-card">
                    <div class="rest-icon">👨‍🍳</div>
                    <h4>Mersin Şef Tantuni</h4>
                    <span>Anlaşmalı Üye</span>
                </div>

            </div>
        </section>

        <section class="section-box" style="background: radial-gradient(circle at bottom right, rgba(245, 158, 11, 0.03), var(--bg-card));">
            <h3>📦 ONLİNE KURYE ÇAĞIRMA SİSTEMİ</h3>
            
            <div class="order-form-container">
                @if(session('success'))
                    <div class="form-success-alert">
                        🚀 Başarılı! {{ session('success') }} Siparişiniz kurye havuzumuza iletildi.
                    </div>
                @endif

<form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Adınız Soyadınız / Restoran Adı</label>
                        <input type="text" name="customer_name" required placeholder="Örn: MBR İskender veya Ahmet Yılmaz">
                    </div>

                    <!-- YENİ: BÖLGE SEÇİMİ VE DİNAMİK FİYATLANDIRMA -->
                    <div class="form-group">
                        <label>Gönderi Bölgesi (Fiyatı Etkiler)</label>
                        <select name="region" id="regionSelect" required style="width: 100%; background: rgba(15, 23, 42, 0.7); border: 1px solid var(--glass-border); border-radius: 12px; padding: 12px; color: #fff; font-size: 14px; outline: none;">
                            <option value="merkez" data-price="90.00">Silifke Merkez (İçi) - 90 TL</option>
                            <option value="tasucu" data-price="160.00">Taşucu - 160 TL</option>
                            <option value="atakent" data-price="180.00">Atakent (Susanoğlu) - 180 TL</option>
                            <option value="atayurt" data-price="130.00">Atayurt - 130 TL</option>
                            <option value="arkum" data-price="140.00">Arkum - 140 TL</option>
                        </select>
                    </div>

                    <!-- YENİ: TELEFON NUMARASI -->
                    <div class="form-group">
                        <label>İletişim / Telefon Numarası</label>
                        <input type="tel" name="phone" required placeholder="Örn: 0506XXXXXXX">
                    </div>

                    <div class="form-group">
                        <label>Paketin Alınacağı Net Adres (Mağaza/Ev)</label>
                        <textarea name="pickup_address" rows="2" required placeholder="Örn: Göksu Mah. Atatürk Cad. No:12"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Teslim Edilecek Net Adres (Müşteri)</label>
                        <textarea name="delivery_address" rows="2" required placeholder="Örn: Saray Mah. İlhan Akgün Cad. No:45"></textarea>
                    </div>

                    <!-- Canlı olarak güncellenecek fiyat göstergesi -->
                    <div style="margin-bottom: 20px; text-align: right; font-weight: 700; color: var(--primary); font-size: 18px;">
                        Hesaplanan Ücret: <span id="priceDisplay">90.00</span> TL
                    </div>

                    <!-- Arka planda veritabanına gidecek gizli fiyat inputu -->
                    <input type="hidden" name="price" id="priceInput" value="90.00">
                    <input type="hidden" name="courier_id" value="">

                    <button type="submit" class="submit-order-btn">🏍️ SİSTEME SİPARİŞİ GEÇ</button>
                </form>

        <section class="section-box">
            <h3>📍 AKTİF GÖREV BÖLGELERİMİZ</h3>
            <div class="badges">
                <div class="badge">Silifke Merkez</div>
                <div class="badge">Atakent (Susanoğlu)</div>
                <div class="badge">Taşucu</div>
                <div class="badge">Arkum</div>
                <div class="badge">Göksu</div>
                <div class="badge">Atayurt</div>
                <div class="badge">Sarıaydın</div>
                <div class="badge">Yeşilovacık</div>
            </div>
        </section>

        <section class="section-box instagram-box">
            <h3>📸 BİZİ INSTAGRAM'DA TAKİP EDİN</h3>
            <p style="color: var(--text-muted); font-size: 14px;">Güncel duyurular, kurye saatleri ve aktif hizmetlerimizden haberdar olun.</p>
            <a href="https://www.instagram.com/silifkekurye33" target="_blank" class="instagram-btn">
                📸 @silifkekurye33
            </a>
        </section>

        <div class="cta-container">
            <a href="https://wa.me/905069306528?text=Merhaba,%20acil%20kurye%20hizmeti%20almak%20istiyorum." target="_blank" class="whatsapp-main-btn">
                🟢 WHATSAPP İLE ACİL KURYE ÇAĞIR
            </a>
        </div>

    </div>

    <footer>
        <div class="container">
            <p>&copy; 2026 Silifke Kurye 33. Tüm Hakları Saklıdır. | Geliştirici: <span>Berat Orçun Serdar</span></p>
        </div>
    </footer>

</body>

<script>
        document.getElementById('regionSelect').addEventListener('change', function() {
            // Seçilen bölgenin data-price değerini alıyoruz
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            
            // Ekranda gösterilen fiyatı ve veritabanına gidecek gizli inputu güncelliyoruz
            document.getElementById('priceDisplay').innerText = price;
            document.getElementById('priceInput').value = price;
        });
    </script>
</html>