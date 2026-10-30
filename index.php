<?php
$page_title = 'Jasa Desain Grafis Profesional & Cepat UMKM';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-main-content">

  <!-- ============================================== -->
  <!-- HERO SECTION (DECLUTTERED & WITH CORE ABOUT US)-->
  <!-- ============================================== -->
  <section class="hero-section" id="home">
    <div class="artboard-grid-bg"></div>

    <div class="container hero-container">
      
      <!-- HERO CONTENT (LEFT COLUMN) -->
      <div class="hero-content">
        
        <div class="hero-pill-badge">
          <span class="pill-dot"></span>
          <span>STUDIO DESAIN GRAFIS UMKM • BY <?php echo strtoupper($site_config['lead_designer']); ?></span>
        </div>

        <h1 class="hero-title">
          DESAIN GRAFIS<br>
          <span class="highlight-text">SPESIALIS UMKM</span>
        </h1>

        <!-- Subtitle integrating the core value from Tentang Kami -->
        <p class="hero-subtitle">
          Bantu bisnismu tampil <strong>bonafide, estetik, dan laris manis</strong>. Kami mengolah ide dan foto produkmu menjadi desain profesional siap cetak & posting dalam waktu <strong>24–48 jam</strong>. Cukup kirim konsep via WhatsApp, tanpa ribet software!
        </p>

        <!-- Feature Quick Bullets -->
        <div class="hero-perks">
          <div class="perk-item">
            <span class="perk-check">✓</span>
            <span>File Master Vektor & CMYK Siap Cetak</span>
          </div>
          <div class="perk-item">
            <span class="perk-check">✓</span>
            <span>Revisi Ramah & Tepat Waktu</span>
          </div>
          <div class="perk-item">
            <span class="perk-check">✓</span>
            <span>Konsultasi Langsung via WhatsApp</span>
          </div>
        </div>

        <!-- CTA Buttons -->
        <div class="hero-cta-row">
          <button type="button" class="btn-primary-wa" onclick="openOrderModal('Konsultasi Cepat Beranda')">
            <span class="btn-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.2.662.589 1.221.771 1.394.858.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.203.043.072.043.419-.101.824z"/>
              </svg>
            </span>
            <span>Pesan Sekarang via WA</span>
            <span class="btn-badge">Respon Cepat</span>
          </button>
          <a href="#paket" class="btn-secondary-outline">
            <span>Lihat Paket & Harga</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>

        <!-- Designer Core Trust Card (Moved from Tentang Kami into Beranda) -->
        <div class="hero-designer-badge">
          <div class="designer-meta-avatar">
            <span class="d-avatar-initials">DP</span>
            <span class="d-status-dot" title="Tersedia untuk Project"></span>
          </div>
          <div class="designer-meta-text">
            <div class="designer-lead-row">
              <strong><?php echo $site_config['lead_designer']; ?></strong>
              <span class="designer-role-tag">Senior Graphic Designer</span>
            </div>
            <p class="designer-summary">
              Spesialis branding & kemasan produk dengan <strong>5+ tahun pengalaman</strong> dan telah dipercaya oleh <strong>50+ UMKM lokal</strong> di seluruh Indonesia.
            </p>
          </div>
        </div>

      </div>

      <!-- HERO VISUAL (RIGHT COLUMN - REFINED ARTBOARD CARD) -->
      <div class="hero-visual">
        <div class="artboard-card">
          <!-- Window Title bar -->
          <div class="artboard-header">
            <div class="window-dots">
              <span class="dot dot-red"></span>
              <span class="dot dot-yellow"></span>
              <span class="dot dot-green"></span>
            </div>
            <span class="window-title">artboard_umkm_branding.ai (100%)</span>
            <span class="window-badge">CMYK • 300 DPI</span>
          </div>

          <!-- Card Content with Clean Artwork Mockup -->
          <div class="artboard-body">
            <div class="artboard-artwork-preview">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAb685XIgGmK-OajrHOKIdPT80YaWWdfXwZsv13xtP52j3dT5HXkw6I93I3Lw0E9FxksJmDWokfakLs0XZaEdqGJkMpDc-IvzMS-_sWCgxn_LYC8h5mXjifhDkUaV9OiuQ33M3CowMGE9smKdBb5LNChBhbvuwSXdrJ6kkXykiwKU0ilL4HpqJiWLw68ipDiXbVYInJOxdWOTcj4kH0LQ15PzlyEQydlVQ38GBeruBBUDPoLvA6c7hGv0hgMoC-WENrSrXw0Tjesg" alt="Desain Kemasan Standing Pouch Kopi Senja Gayo" class="artboard-img">
              
              <div class="artboard-swatches">
                <span class="art-swatch" style="background: #4A2E1B;" title="Coffee Roast"></span>
                <span class="art-swatch" style="background: #D9BD9C;" title="Kraft Ochre"></span>
                <span class="art-swatch" style="background: #F5B738;" title="Gold Stamp"></span>
                <span class="art-swatch" style="background: #141619;" title="Deep Carbon"></span>
              </div>
            </div>

            <!-- Spec Mini Card -->
            <div class="mockup-mini-card">
              <div class="mini-meta">
                <span class="mini-tag">KEMASAN & LABEL PRODUK</span>
                <span class="mini-status">✓ 100% SIAP CETAK</span>
              </div>
              <h4 class="mini-name">Kopi Aroma Senja Gayo</h4>
              <p class="mini-desc">Standing Pouch Kraft • Vector Master AI & PDF Included</p>
            </div>
          </div>

          <!-- Bounding Box Corner Handles -->
          <div class="corner-point corner-tl"></div>
          <div class="corner-point corner-tr"></div>
          <div class="corner-point corner-bl"></div>
          <div class="corner-point corner-br"></div>
        </div>

        <!-- Floating Stat Badge (Decluttered) -->
        <div class="floating-stat-box">
          <div class="stat-number">50+</div>
          <div class="stat-info">
            <strong>Pelaku Usaha UMKM</strong>
            <span>Puas dengan Hasil Desain & Cetak</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ============================================== -->
  <!-- TRUST & VALUE HIGHLIGHTS                       -->
  <!-- ============================================== -->
  <section class="trust-bar">
    <div class="container trust-container">
      <div class="trust-item">
        <div class="trust-icon">⚡</div>
        <div class="trust-text">
          <strong>Pengerjaan 24–48 Jam</strong>
          <span>Cepat & sesuai deadline jualan</span>
        </div>
      </div>
      <div class="trust-item">
        <div class="trust-icon">🖨️</div>
        <div class="trust-text">
          <strong>100% Siap Cetak</strong>
          <span>Format CMYK, 300 DPI, AI, PDF & PNG</span>
        </div>
      </div>
      <div class="trust-item">
        <div class="trust-icon">🤝</div>
        <div class="trust-text">
          <strong>Konsultasi Desainer Langsung</strong>
          <span>Bukan bot, diskusi fleksibel via WA</span>
        </div>
      </div>
      <div class="trust-item">
        <div class="trust-icon">💰</div>
        <div class="trust-text">
          <strong>Harga Ramah UMKM</strong>
          <span>Transparan, tanpa biaya tersembunyi</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================== -->
  <!-- CORE ABOUT VALUE BANNER (INTEGRATED INTO HOME) -->
  <!-- ============================================== -->
  <section class="about-core-strip">
    <div class="container">
      <div class="about-core-card">
        <div class="about-core-info">
          <div class="core-tag">MENGAPA MEMILIH STUDIOGRAFIS?</div>
          <h2 class="core-heading">Standar Industri Profesional dengan Komunikasi Ramah & Praktis</h2>
          <p class="core-text">
            Kami memahami kendala utama UMKM: butuh desain kilat untuk promo besok, biaya efisien, dan enggan ribet memakai software rumit. Menggunakan standar software profesional <strong>Adobe Illustrator, Photoshop, dan CorelDraw</strong>, setiap garis dan warna dipastikan akurat saat naik mesin cetak percetakan.
          </p>
        </div>
        <div class="about-core-badges">
          <div class="tool-pill-box">
            <span class="tool-item">✓ Adobe Illustrator (Vektor Master)</span>
            <span class="tool-item">✓ Photoshop (Mockup Realistis)</span>
            <span class="tool-item">✓ CorelDraw (Standar Percetakan)</span>
            <span class="tool-item">✓ Canva Pro (Template Editable)</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================== -->
  <!-- MENU PAKET & HARGA                             -->
  <!-- ============================================== -->
  <section class="packages-section" id="paket">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-eyebrow">MENU JASA & PRICING</div>
        <h2 class="section-title">Pilih Paket Desain Sesuai Kebutuhan Bisnismu</h2>
        <p class="section-desc">
          Semua paket dirancang khusus untuk skala UMKM. Praktis, berkualitas tinggi, dan pemesanan tinggal klik langsung tersambung ke WhatsApp.
        </p>
      </div>

      <div class="packages-grid">
        <?php foreach ($packages_data as $pkg): ?>
          <article class="package-card <?php echo $pkg['is_featured'] ? 'featured' : ''; ?>" id="<?php echo $pkg['id']; ?>">
            <?php if (!empty($pkg['ribbon'])): ?>
              <div class="featured-ribbon"><?php echo $pkg['ribbon']; ?></div>
            <?php endif; ?>

            <div class="package-top">
              <span class="pack-badge <?php echo $pkg['is_featured'] ? 'featured-badge' : ''; ?>"><?php echo $pkg['badge']; ?></span>
              <h3 class="pack-title"><?php echo $pkg['title']; ?></h3>
              <p class="pack-for"><?php echo $pkg['for']; ?></p>
              
              <div class="pack-price-box">
                <span class="price-currency">Rp</span>
                <span class="price-value"><?php echo $pkg['price']; ?></span>
                <span class="price-period"><?php echo $pkg['period']; ?></span>
              </div>
              <span class="price-note"><?php echo $pkg['note']; ?></span>
            </div>

            <div class="package-features">
              <div class="feature-title">Yang Didapatkan:</div>
              <ul class="feature-list">
                <?php foreach ($pkg['features'] as $feat): ?>
                  <li><span class="tick">✔</span> <?php echo $feat; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <div class="package-action">
              <button type="button" class="btn-package-wa <?php echo $pkg['is_featured'] ? 'btn-featured-wa' : ''; ?>" onclick="sendOrderToWhatsApp('<?php echo addslashes($pkg['title']); ?>', '<?php echo $pkg['price']; ?>')">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.2.662.589 1.221.771 1.394.858.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.203.043.072.043.419-.101.824z"/>
                </svg>
                <span>Pesan via WhatsApp</span>
              </button>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <!-- Custom Request Banner -->
      <div class="custom-request-box">
        <div class="custom-req-text">
          <strong>Punya Kebutuhan Desain Khusus?</strong>
          <span>Brosur lipat, buku menu kafe, nota custom, banner booth pameran, atau feed bulanan?</span>
        </div>
        <button type="button" class="btn-custom-req" onclick="openOrderModal('Kustom / Kebutuhan Lainnya')">
          Konsultasi Kebutuhan Custom
        </button>
      </div>
    </div>
  </section>

  <!-- ============================================== -->
  <!-- PORTOFOLIO / SHOWCASE KARYA                    -->
  <!-- ============================================== -->
  <section class="portfolio-section" id="portofolio">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-eyebrow">HASIL KARYA DESAIN</div>
        <h2 class="section-title">Portofolio Desain yang Terbukti Tingkatkan Penjualan</h2>
        <p class="section-desc">Koleksi karya nyata untuk pelaku usaha kuliner, fashion, kopi, keripik, dan retail lokal.</p>
      </div>

      <!-- Category Filters -->
      <div class="portfolio-filters" role="tablist">
        <button type="button" class="pf-filter-btn active" data-filter="all" onclick="filterPortfolio('all')">Semua Karya</button>
        <button type="button" class="pf-filter-btn" data-filter="logo" onclick="filterPortfolio('logo')">Logo & Branding</button>
        <button type="button" class="pf-filter-btn" data-filter="kemasan" onclick="filterPortfolio('kemasan')">Kemasan & Stiker</button>
        <button type="button" class="pf-filter-btn" data-filter="sosmed" onclick="filterPortfolio('sosmed')">Feeds Promosi</button>
      </div>

      <!-- Grid Cards -->
      <div class="portfolio-grid" id="portfolioGrid">
        <?php foreach ($portfolio_data as $item): ?>
          <div class="pf-card stitch-card" data-category="<?php echo $item['category']; ?>">
            <div class="stitch-handle-dot s-tl"></div>
            <div class="stitch-handle-dot s-tr"></div>
            <div class="stitch-handle-dot s-bl"></div>
            <div class="stitch-handle-dot s-br"></div>

            <div class="pf-top-spec">
              <span class="stitch-badge"><?php echo $item['badge']; ?></span>
              <span class="stitch-dim"><?php echo $item['dimension']; ?></span>
              <span class="stitch-pill-green"><?php echo $item['spec_pill']; ?></span>
            </div>

            <div class="pf-image-box stitch-image-frame">
              <span class="guide-cross g-tl">+</span>
              <span class="guide-cross g-br">+</span>
              
              <div class="artwork-wrapper">
                <img src="<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="stitch-art-img" loading="lazy">
              </div>

              <div class="pf-overlay">
                <span class="pf-badge-label"><?php echo $item['type']; ?></span>
                <button type="button" class="btn-preview-pf" onclick="openPreviewDetail('<?php echo addslashes($item['title']); ?>', '<?php echo addslashes($item['type']); ?>', '<?php echo addslashes($item['industry']); ?>', '<?php echo addslashes($item['desc']); ?>')">
                  🔍 Lihat Spek Desain
                </button>
              </div>
            </div>

            <div class="pf-meta">
              <h4><?php echo $item['title']; ?></h4>
              <p><?php echo $item['desc']; ?></p>
              <div class="stitch-tags-row">
                <?php foreach ($item['tags'] as $t): ?>
                  <span class="s-tag"><?php echo $t; ?></span>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Live Pre-Flight Studio Verification Bar -->
      <div class="stitch-preflight-strip">
        <div class="preflight-status">
          <span class="preflight-pulse-dot"></span>
          <strong>Live Pre-Flight Studio Verification:</strong>
          <span>100% CMYK Color Match • 3mm Bleed Check • Vector Outlines Active • 300 DPI Guaranteed</span>
        </div>
        <div class="preflight-actions">
          <button type="button" class="btn-preflight-brief" onclick="openOrderModal('Konsultasi Berdasarkan Portofolio')">
            Konsultasikan Brand UMKM Anda ➔
          </button>
        </div>
      </div>

    </div>
  </section>

  <!-- ============================================== -->
  <!-- FAQ SECTION KHUSUS UMKM                        -->
  <!-- ============================================== -->
  <section class="faq-section" id="faq">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-eyebrow">TANYA JAWAB UMKM</div>
        <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
        <p class="section-desc">Informasi lengkap seputar pemesanan, format file, dan proses pengerjaan desain.</p>
      </div>

      <div class="faq-accordion-box">
        <?php foreach ($faq_data as $idx => $f): ?>
          <details class="faq-item" <?php echo $idx === 0 ? 'open' : ''; ?>>
            <summary class="faq-question">
              <span><?php echo $f['q']; ?></span>
              <span class="faq-arrow">▼</span>
            </summary>
            <div class="faq-answer">
              <p><?php echo $f['a']; ?></p>
            </div>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================================== -->
  <!-- BOTTOM CTA BANNER                              -->
  <!-- ============================================== -->
  <section class="bottom-cta-banner">
    <div class="container cta-banner-inner">
      <div class="cta-banner-content">
        <span class="cta-mini-tag">KONSULTASI GRATIS HARI INI</span>
        <h2 class="cta-banner-title">Yuk Bikin Usahamu Tampil Beda & Lebih Menarik Pembeli!</h2>
        <p class="cta-banner-sub">
          Jangan biarkan produk berkualitasmu kalah saing cuma karena visual kurang menarik. Konsultasikan kebutuhan desain tokomu sekarang, ramah dan tanpa ribet.
        </p>
        <div class="cta-btn-group">
          <button type="button" class="btn-banner-wa" onclick="openOrderModal('CTA Banner Bawah')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.2.662.589 1.221.771 1.394.858.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.203.043.072.043.419-.101.824z"/>
            </svg>
            <span>Hubungi via WhatsApp Sekarang</span>
          </button>
          <a href="login.php" class="btn-banner-client-view">
            <span>Masuk ke Portal Login</span>
            <span>➔</span>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

