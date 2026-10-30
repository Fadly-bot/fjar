<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proteksi halaman: Khusus role client (atau admin yang ingin memantau tampilan klien)
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'client' && $_SESSION['role'] !== 'admin')) {
    header('Location: login.php');
    exit;
}

$client_name = $_SESSION['user_name'] ?? 'Budi Santoso';
$client_id = $_SESSION['client_id'] ?? '#UMKM-8821';

$page_title = 'Portal Klien — Tracking Pesanan Desain';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';
?>

<main class="client-portal-page">
  
  <!-- CLIENT USER HEADER BANNER -->
  <div class="client-portal-header">
    <div class="container">
      <div class="client-auth-card">
        <div class="auth-user-info">
          <div class="auth-avatar-circle">BS</div>
          <div class="auth-text-meta">
            <div class="auth-greeting">
              <span class="auth-pill-online">🟢 Sesi Klien Terverifikasi</span>
              <span class="auth-id">KLIEN-ID: <?php echo htmlspecialchars($client_id); ?></span>
            </div>
            <h1 class="auth-name"><?php echo htmlspecialchars($client_name); ?></h1>
            <p class="auth-sub">Owner <strong>"Kopi Aroma Senja"</strong> • Pantau status pengerjaan, ajukan revisi, dan unduh master file.</p>
          </div>
        </div>

        <div class="auth-quick-actions">
          <button type="button" class="btn-create-order" onclick="openNewOrderModal()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            + Pesan Desain Baru
          </button>
          <a href="logout.php" class="btn-auth-switch" title="Keluar dari akun klien">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- ORDER LIST & TRACKING DASHBOARD -->
  <div class="container client-dashboard-content">
    
    <!-- Statistics Quick Counters -->
    <div class="dashboard-stats-row">
      <div class="d-metric-box">
        <span class="metric-icon">🎨</span>
        <div class="metric-info">
          <span class="metric-val" id="statInWork">1</span>
          <span class="metric-lbl">Sedang Dikerjakan</span>
        </div>
      </div>
      <div class="d-metric-box">
        <span class="metric-icon">👀</span>
        <div class="metric-info">
          <span class="metric-val" id="statReview">1</span>
          <span class="metric-lbl">Menunggu Review Klien</span>
        </div>
      </div>
      <div class="d-metric-box">
        <span class="metric-icon">✅</span>
        <div class="metric-info">
          <span class="metric-val" id="statDone">1</span>
          <span class="metric-lbl">Pesanan Selesai</span>
        </div>
      </div>
      <div class="d-metric-box wa-contact-card">
        <span class="metric-icon">💬</span>
        <div class="metric-info">
          <span class="metric-val">Desainer Siap</span>
          <button type="button" class="btn-direct-desainer-wa" onclick="chatDesignerDirect()">
            Hubungi via WA
          </button>
        </div>
      </div>
    </div>

    <!-- Order List Management Section -->
    <section class="order-list-section">
      <div class="order-list-header-row">
        <div>
          <h2 class="order-list-title">Daftar Pesanan & Status Pengerjaan (Order List)</h2>
          <p class="order-list-sub">Pantau progres desain, periksa spek dieline cetak, dan kirim masukan revisi langsung via WhatsApp.</p>
        </div>

        <!-- Filter & Search Controls -->
        <div class="order-controls">
          <div class="search-box">
            <input type="text" id="orderSearchInput" placeholder="Cari nama project / ID..." onkeyup="searchOrders()">
          </div>
          <div class="filter-status-pills">
            <button type="button" class="order-filter-btn active" data-status="all" onclick="filterOrderStatus('all')">Semua (<span id="countAll">3</span>)</button>
            <button type="button" class="order-filter-btn" data-status="pengerjaan" onclick="filterOrderStatus('pengerjaan')">Proses</button>
            <button type="button" class="order-filter-btn" data-status="review" onclick="filterOrderStatus('review')">Review</button>
            <button type="button" class="order-filter-btn" data-status="selesai" onclick="filterOrderStatus('selesai')">Selesai</button>
          </div>
        </div>
      </div>

      <!-- Dynamic Order Cards List -->
      <div class="order-cards-stack" id="orderCardsContainer">
        <!-- Rendered via JS -->
      </div>
    </section>

    <!-- Petunjuk Klien Box -->
    <div class="client-help-notice">
      <div class="notice-icon">💡</div>
      <div class="notice-text">
        <strong>Tips untuk Klien UMKM:</strong>
        <p>Setiap revisi atau perubahan teks/warna bisa langsung disampaikan melalui tombol <em>"Kirim Masukan Revisi via WA"</em> pada kartu pesanan. Desainer akan menerima format pesan lengkap dengan ID pesanan secara otomatis.</p>
      </div>
    </div>

  </div>

</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

