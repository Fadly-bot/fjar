<?php
require_once __DIR__ . '/data.php';
?>
  <!-- FLOATING QUICK WHATSAPP BUTTON (UNOBTRUSIVE) -->
  <aside class="floating-wa-wrap" aria-label="WhatsApp Quick Contact">
    <div class="floating-wa-bubble">
      <div class="wa-status-pill">
        <span class="online-indicator"></span>
        <span>Desainer Online • Balas Cepat</span>
      </div>
      <button type="button" class="btn-floating-wa" onclick="openOrderModal('Konsultasi Cepat WA')" title="Chat Desainer di WhatsApp">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.2.662.589 1.221.771 1.394.858.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.203.043.072.043.419-.101.824z"/>
        </svg>
        <span class="btn-wa-text">Tanya Desain</span>
      </button>
    </div>
  </aside>

  <!-- FOOTER -->
  <footer class="app-footer">
    <div class="container footer-container">
      <div class="footer-col brand-col">
        <div class="footer-logo">
          <div class="logo-box">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
              <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
            </svg>
          </div>
          <strong><?php echo $site_config['brand_name']; ?>.ID</strong>
        </div>
        <p class="footer-bio">
          Jasa desain grafis kreatif dan profesional khusus UMKM Indonesia. Membantu lebih dari 50+ brand lokal tampil meyakinkan, siap cetak, dan laris di pasar modern.
        </p>
        <div class="footer-hours">
          <span class="hours-dot"></span>
          <span>Jam Konsultasi: <?php echo $site_config['work_hours']; ?></span>
        </div>
      </div>

      <div class="footer-col">
        <h4 class="footer-heading">Navigasi</h4>
        <ul class="footer-nav">
          <li><a href="index.php#home">Beranda</a></li>
          <li><a href="index.php#paket">Pilihan Paket & Harga</a></li>
          <li><a href="index.php#portofolio">Portofolio Desain</a></li>
          <li><a href="index.php#faq">Tanya Jawab (FAQ)</a></li>
          <li><a href="login.php">Area Login Portal</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4 class="footer-heading">Jaminan Standar</h4>
        <ul class="footer-perks">
          <li>✓ 100% Format Siap Cetak (CMYK 300DPI)</li>
          <li>✓ File Vektor Master Asli (AI, EPS, PDF)</li>
          <li>✓ Sesi Revisi Ramah & Solutif</li>
          <li>✓ Diskusi Langsung dengan Desainer</li>
        </ul>
      </div>

      <div class="footer-col">
        <h4 class="footer-heading">Kontak WhatsApp</h4>
        <p class="footer-wa-note">Punya pertanyaan atau butuh penawaran custom?</p>
        <button type="button" class="footer-wa-btn" onclick="openOrderModal('Footer Kontak')">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.2.662.589 1.221.771 1.394.858.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.203.043.072.043.419-.101.824z"/>
          </svg>
          <span>Chat via WhatsApp</span>
        </button>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container footer-bottom-inner">
        <p>© <?php echo date('Y'); ?> <?php echo $site_config['brand_name']; ?> UMKM. Dibuat dengan presisi untuk mendukung kemajuan bisnis lokal.</p>
        <div class="footer-bottom-links">
          <span>Lead Designer: <?php echo $site_config['lead_designer']; ?></span>
          <span>•</span>
          <a href="login.php" class="footer-login-link">Login Area</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- ============================================== -->
  <!-- MODAL: ORDER VIA WHATSAPP                      -->
  <!-- ============================================== -->
  <dialog id="orderModal" class="app-modal">
    <div class="modal-card">
      <div class="modal-header">
        <div class="modal-title-wrap">
          <span class="modal-pill-tag">ORDER FORM CEPAT</span>
          <h3 class="modal-title" id="modalPackageName">Pesan Jasa Desain Grafis</h3>
        </div>
        <button type="button" class="btn-modal-close" onclick="closeOrderModal()" aria-label="Tutup Modal">✕</button>
      </div>

      <form id="orderForm" onsubmit="handleOrderFormSubmit(event)">
        <div class="modal-body">
          <p class="modal-intro">
            Lengkapi data ringkas di bawah. Setelah klik <strong>"Kirim via WhatsApp"</strong>, pesan format otomatis akan langsung siap dikirim ke desainer!
          </p>

          <div class="form-group">
            <label for="formNamaBisnis">Nama Brand / Usaha UMKM <span class="req">*</span></label>
            <input type="text" id="formNamaBisnis" required placeholder="Contoh: Kopi Aroma Senja / Sambal Bu Lilis">
          </div>

          <div class="form-row">
            <div class="form-group col-half">
              <label for="formKategori">Kategori Produk</label>
              <select id="formKategori">
                <option value="Makanan & Minuman (F&B)">Makanan & Minuman (F&B)</option>
                <option value="Fashion & Busana">Fashion & Busana</option>
                <option value="Kecantikan & Skincare">Kecantikan & Skincare</option>
                <option value="Toko & Retail Lokal">Toko & Retail Lokal</option>
                <option value="Jasa / Service">Jasa / Salon / Bengkel</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
            <div class="form-group col-half">
              <label for="formPaketSelect">Paket Layanan <span class="req">*</span></label>
              <select id="formPaketSelect" required>
                <option value="Paket Feeds Promosi (Rp 129.000)">Paket Feeds Promosi (Rp 129.000)</option>
                <option value="Paket Logo & Identitas Brand (Rp 289.000)">Paket Logo & Identitas Brand (Rp 289.000)</option>
                <option value="Paket Kemasan & Stiker Label (Rp 199.000)">Paket Kemasan & Stiker Label (Rp 199.000)</option>
                <option value="Paket Bundle UMKM Juara (Rp 499.000)">Paket Bundle UMKM Juara (Rp 499.000)</option>
                <option value="Kustom / Konsultasi Lainnya">Kustom / Konsultasi Khusus</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="formCatatan">Catatan / Kebutuhan Khusus (Opsional)</label>
            <textarea id="formCatatan" rows="3" placeholder="Contoh: Nuansa warna cokelat kraft earth-tone, ukuran pouch 150gr, mau ada logo halal..."></textarea>
          </div>

          <div class="modal-preview-message">
            <span class="preview-msg-label">Preview Format WhatsApp Otomatis:</span>
            <div class="preview-msg-box" id="waMessagePreview">
              Halo Kak Dimas Studio Grafis, saya ingin pesan desain untuk usaha saya...
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn-cancel" onclick="closeOrderModal()">Batal</button>
          <button type="submit" class="btn-confirm-wa">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.2.662.589 1.221.771 1.394.858.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.203.043.072.043.419-.101.824z"/>
            </svg>
            <span>Kirim via WhatsApp</span>
          </button>
        </div>
      </form>
    </div>
  </dialog>

  <!-- ============================================== -->
  <!-- MODAL: PREVIEW DETAIL PORTOFOLIO               -->
  <!-- ============================================== -->
  <dialog id="previewModal" class="app-modal">
    <div class="modal-card modal-large">
      <div class="modal-header">
        <div>
          <span class="modal-pill-tag" id="prevCategory">KATEGORI</span>
          <h3 class="modal-title" id="prevTitle">Detail Portofolio</h3>
        </div>
        <button type="button" class="btn-modal-close" onclick="closePreviewModal()">✕</button>
      </div>
      <div class="modal-body">
        <div class="preview-layout-grid">
          <div class="preview-art-frame" id="prevCanvasBox">
            <div class="preview-inner-artboard">
              <div class="prev-banner-badge">PROYEK TERSELESAIKAN</div>
              <h2 id="prevBrandName">Brand UMKM</h2>
              <p id="prevDeliverables">Packaging + Vektor Master + Mockup 3D</p>
              <div class="prev-palette-strip">
                <span class="strip-item" style="background:#1F2421;"></span>
                <span class="strip-item" style="background:#216869;"></span>
                <span class="strip-item" style="background:#49A078;"></span>
                <span class="strip-item" style="background:#9CC5A1;"></span>
                <span class="strip-item" style="background:#DCE1DE;"></span>
              </div>
            </div>
          </div>
          <div class="preview-info-box">
            <h4>Deskripsi Pengerjaan:</h4>
            <p id="prevDescription" class="prev-desc-text">Deskripsi pengerjaan...</p>
            
            <div class="prev-spec-list">
              <div class="spec-row">
                <span class="spec-key">Waktu Pengerjaan:</span>
                <span class="spec-val">24–36 Jam Selesai</span>
              </div>
              <div class="spec-row">
                <span class="spec-key">File Diserahkan:</span>
                <span class="spec-val">AI, PDF CMYK 300DPI, PNG Transparan</span>
              </div>
              <div class="spec-row">
                <span class="spec-key">Status Cetak:</span>
                <span class="spec-val">100% Sesuai Standar Percetakan</span>
              </div>
            </div>

            <div class="prev-cta-wrap">
              <button type="button" class="btn-want-similar" onclick="orderSimilarDesign()">
                Saya Mau Desain Seperti Ini via WA
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </dialog>

  <!-- ============================================== -->
  <!-- MODAL: DETAIL DRAFT PESANAN                    -->
  <!-- ============================================== -->
  <dialog id="draftModal" class="app-modal">
    <div class="modal-card">
      <div class="modal-header">
        <div>
          <span class="modal-pill-tag" id="draftOrderBadge">ORDER #DSN-UMKM-082</span>
          <h3 class="modal-title" id="draftOrderTitle">Detail Draft Desain</h3>
        </div>
        <button type="button" class="btn-modal-close" onclick="closeDraftModal()">✕</button>
      </div>
      <div class="modal-body">
        <div class="draft-preview-box" id="draftPreviewCanvas">
          <div class="watermark-overlay">PREVIEW DRAFT • STUDIOGRAFIS</div>
          <div class="draft-mockup-inner" id="draftInnerContent">
            <h4>Draft Desain Sedang Berjalan</h4>
          </div>
        </div>

        <div class="draft-detail-meta" id="draftMetaContent">
          <!-- Populated by JS -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeDraftModal()">Tutup</button>
        <button type="button" class="btn-confirm-wa" id="btnDraftReviseWA">
          Kirim Revisi via WA
        </button>
      </div>
    </div>
  </dialog>

  <script src="assets/js/app.js"></script>
</body>
</html>

