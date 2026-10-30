<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proteksi halaman: Khusus role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/includes/data.php';

// Handle aksi update status oleh Admin (In-Session, no DB)
$admin_notice = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $order_id = $_POST['order_id'] ?? '';

    if ($action === 'update_status' && !empty($order_id)) {
        $new_status = $_POST['new_status'] ?? 'pengerjaan';
        foreach ($_SESSION['orders'] as &$ord) {
            if ($ord['id'] === $order_id) {
                $ord['status'] = $new_status;
                if ($new_status === 'pengerjaan') {
                    $ord['statusLabel'] = 'Sedang Dikerjakan';
                    $ord['progressPercent'] = 60;
                } elseif ($new_status === 'review') {
                    $ord['statusLabel'] = 'Menunggu Review Klien';
                    $ord['progressPercent'] = 85;
                } elseif ($new_status === 'selesai') {
                    $ord['statusLabel'] = 'Selesai (File Master Diserahkan)';
                    $ord['progressPercent'] = 100;
                }
                $admin_notice = "Status pesanan {$order_id} berhasil diubah menjadi: {$ord['statusLabel']}";
                break;
            }
        }
    } elseif ($action === 'add_order') {
        $new_brand = trim($_POST['brand_name'] ?? 'UMKM Baru');
        $new_client = trim($_POST['client_name'] ?? 'Klien UMKM');
        $new_pkg = trim($_POST['package'] ?? 'Paket Logo & Identitas Brand');
        $new_price = trim($_POST['price'] ?? 'Rp 289.000');
        $new_note = trim($_POST['note'] ?? 'Pesanan baru via admin.');

        $new_id = '#DSN-UMKM-0' . rand(85, 99);
        $new_order_entry = [
            'id' => $new_id,
            'client_name' => $new_client,
            'client_phone' => $site_config['wa_number'],
            'brandName' => $new_brand,
            'package' => $new_pkg,
            'price' => $new_price,
            'date' => date('d M Y'),
            'status' => 'pengerjaan',
            'statusLabel' => 'Sedang Dikerjakan (Baru)',
            'progressPercent' => 25,
            'revisionsLeft' => '3x Revisi Gratis',
            'currentStage' => 'Proses eksplorasi konsep desain & moodboard.',
            'note' => $new_note
        ];
        array_unshift($_SESSION['orders'], $new_order_entry);
        $admin_notice = "Pesanan baru {$new_id} ({$new_brand}) berhasil ditambahkan!";
    }
}

$orders = $_SESSION['orders'];
$count_all = count($orders);
$count_work = count(array_filter($orders, fn($o) => $o['status'] === 'pengerjaan'));
$count_review = count(array_filter($orders, fn($o) => $o['status'] === 'review'));
$count_done = count(array_filter($orders, fn($o) => $o['status'] === 'selesai'));

$page_title = 'Admin Panel — Studio Grafis UMKM';
require_once __DIR__ . '/includes/header.php';
?>

<main class="admin-portal-page">
  
  <!-- ADMIN HEADER BANNER -->
  <div class="admin-portal-header">
    <div class="container">
      <div class="admin-auth-card">
        <div class="admin-user-info">
          <div class="admin-avatar-box">👑</div>
          <div class="admin-text-meta">
            <div class="admin-greeting">
              <span class="auth-pill-online">🟢 Akses Administrator Aktif</span>
              <span class="auth-id">ROLE: LEAD DESIGNER & MANAGEMENT</span>
            </div>
            <h1 class="admin-title">Panel Kontrol Studio Grafis</h1>
            <p class="admin-sub">Kelola antrean pengerjaan desain, perbarui status revisi klien, dan pantau penyelesaian order.</p>
          </div>
        </div>

        <div class="admin-quick-actions">
          <button type="button" class="btn-create-order" onclick="openAdminAddOrderModal()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            + Input Pesanan Masuk
          </button>
          <a href="index.php" class="btn-view-site" target="_blank" title="Buka website publik di tab baru">
            Lihat Web Publik ↗
          </a>
          <a href="logout.php" class="btn-auth-switch" title="Keluar dari sesi admin">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container admin-dashboard-content">

    <!-- Notice Notification Banner -->
    <?php if (!empty($admin_notice)): ?>
      <div class="admin-notice-banner">
        <span>✅</span>
        <span><?php echo htmlspecialchars($admin_notice); ?></span>
      </div>
    <?php endif; ?>

    <!-- Summary Metrics -->
    <div class="dashboard-stats-row">
      <div class="d-metric-box">
        <span class="metric-icon">📦</span>
        <div class="metric-info">
          <span class="metric-val"><?php echo $count_all; ?></span>
          <span class="metric-lbl">Total Semua Pesanan</span>
        </div>
      </div>
      <div class="d-metric-box">
        <span class="metric-icon">🎨</span>
        <div class="metric-info">
          <span class="metric-val"><?php echo $count_work; ?></span>
          <span class="metric-lbl">Sedang Dikerjakan</span>
        </div>
      </div>
      <div class="d-metric-box">
        <span class="metric-icon">👀</span>
        <div class="metric-info">
          <span class="metric-val"><?php echo $count_review; ?></span>
          <span class="metric-lbl">Menunggu Review Klien</span>
        </div>
      </div>
      <div class="d-metric-box">
        <span class="metric-icon">✅</span>
        <div class="metric-info">
          <span class="metric-val"><?php echo $count_done; ?></span>
          <span class="metric-lbl">Pesanan Selesai</span>
        </div>
      </div>
    </div>

    <!-- Order Management Table / Cards -->
    <section class="order-list-section">
      <div class="order-list-header-row">
        <div>
          <h2 class="order-list-title">Manajemen Antrean Pesanan Klien</h2>
          <p class="order-list-sub">Klik tombol status untuk mengubah progres secara langsung, atau hubungi klien via WhatsApp.</p>
        </div>
      </div>

      <div class="admin-orders-table-wrapper">
        <table class="admin-table">
          <thead>
            <tr>
              <th>ID & Klien</th>
              <th>Paket & Nilai</th>
              <th>Status Saat Ini</th>
              <th>Progres & Tahap</th>
              <th>Aksi Update Status</th>
              <th>Kontak Klien</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $ord): ?>
              <?php
                $status_badge_class = 'status-pengerjaan';
                if ($ord['status'] === 'review') $status_badge_class = 'status-review';
                if ($ord['status'] === 'selesai') $status_badge_class = 'status-selesai';
              ?>
              <tr>
                <td>
                  <span class="order-id-badge"><?php echo $ord['id']; ?></span>
                  <strong class="d-block mt-1"><?php echo htmlspecialchars($ord['brandName']); ?></strong>
                  <span class="text-muted d-block font-xs"><?php echo htmlspecialchars($ord['client_name'] ?? 'Budi Santoso'); ?></span>
                  <span class="text-light d-block font-xs"><?php echo $ord['date']; ?></span>
                </td>
                <td>
                  <strong><?php echo htmlspecialchars($ord['package']); ?></strong>
                  <div class="price-tag-sm"><?php echo $ord['price']; ?></div>
                </td>
                <td>
                  <span class="order-status-badge <?php echo $status_badge_class; ?>">
                    <?php echo $ord['statusLabel']; ?>
                  </span>
                  <div class="font-xs mt-1 text-muted"><?php echo $ord['revisionsLeft']; ?></div>
                </td>
                <td style="max-width: 260px;">
                  <div class="order-progress-track">
                    <div class="order-progress-fill" style="width: <?php echo $ord['progressPercent']; ?>%;"></div>
                  </div>
                  <div class="font-xs mt-1"><?php echo htmlspecialchars($ord['currentStage']); ?></div>
                </td>
                <td>
                  <form method="POST" class="status-change-form">
                    <input type="hidden" name="action" value="update_status">
                    <input type="hidden" name="order_id" value="<?php echo $ord['id']; ?>">
                    <select name="new_status" class="admin-select-status" onchange="this.form.submit()">
                      <option value="pengerjaan" <?php echo $ord['status'] === 'pengerjaan' ? 'selected' : ''; ?>>Proses</option>
                      <option value="review" <?php echo $ord['status'] === 'review' ? 'selected' : ''; ?>>Review Klien</option>
                      <option value="selesai" <?php echo $ord['status'] === 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                    </select>
                  </form>
                </td>
                <td>
                  <?php
                    $wa_text = "Halo Kak {$ord['client_name']}, saya Dimas (Desainer Studio Grafis). Mengenai pesanan {$ord['id']} ({$ord['brandName']}), saya ingin menyampaikan update pengerjaan...";
                    $wa_url = "https://api.whatsapp.com/send?phone={$site_config['wa_number']}&text=" . urlencode($wa_text);
                  ?>
                  <a href="<?php echo $wa_url; ?>" target="_blank" class="btn-table-wa">
                    Chat Klien
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

  </div>
</main>

<!-- MODAL: ADMIN ADD ORDER -->
<dialog id="adminAddModal" class="app-modal">
  <div class="modal-card">
    <div class="modal-header">
      <div class="modal-title-wrap">
        <span class="modal-pill-tag">ADMIN ENTRY</span>
        <h3 class="modal-title">Tambah Pesanan Baru</h3>
      </div>
      <button type="button" class="btn-modal-close" onclick="closeAdminAddOrderModal()">✕</button>
    </div>
    <form method="POST">
      <input type="hidden" name="action" value="add_order">
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Brand / Usaha UMKM</label>
          <input type="text" name="brand_name" required placeholder="Contoh: Kripik Tempe Renyah">
        </div>
        <div class="form-group">
          <label>Nama Klien / Pemilik</label>
          <input type="text" name="client_name" required placeholder="Contoh: Bu Sri Mulyani">
        </div>
        <div class="form-row">
          <div class="form-group col-half">
            <label>Paket Layanan</label>
            <select name="package">
              <option value="Paket Feeds Promosi">Paket Feeds Promosi</option>
              <option value="Paket Logo & Identitas Brand" selected>Paket Logo & Identitas Brand</option>
              <option value="Paket Kemasan & Stiker Label">Paket Kemasan & Stiker Label</option>
              <option value="Paket Bundle UMKM Juara">Paket Bundle UMKM Juara</option>
            </select>
          </div>
          <div class="form-group col-half">
            <label>Nilai Order</label>
            <input type="text" name="price" value="Rp 289.000">
          </div>
        </div>
        <div class="form-group">
          <label>Catatan Desain / Permintaan Klien</label>
          <textarea name="note" rows="2" placeholder="Catatan brief..."></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeAdminAddOrderModal()">Batal</button>
        <button type="submit" class="btn-confirm-wa" style="background: var(--accent-yellow); color: var(--text-main);">
          Simpan Pesanan
        </button>
      </div>
    </form>
  </div>
</dialog>

<script>
function openAdminAddOrderModal() {
  const modal = document.getElementById('adminAddModal');
  if (modal) modal.showModal();
}
function closeAdminAddOrderModal() {
  const modal = document.getElementById('adminAddModal');
  if (modal) modal.close();
}
</script>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

