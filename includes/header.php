<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/data.php';

$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' — ' . $site_config['brand_name'] : $site_config['brand_name'] . ' - Jasa Desain Grafis Profesional & Cepat UMKM'; ?></title>
  <meta name="description" content="Jasa desain grafis khusus UMKM. Desain logo berkarakter, kemasan produk siap cetak, dan feed sosial media dengan pengerjaan 24-48 jam.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

  <!-- NAVBAR (DECLUTTERED & FOCUS ON FUNCTION) -->
  <header class="navbar-wrapper">
    <div class="container navbar-container">
      <a href="index.php" class="brand-logo">
        <div class="logo-box">
          <span class="logo-icon-svg">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
              <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
              <path d="M2 2l7.586 7.586"></path>
              <circle cx="11" cy="11" r="2"></circle>
            </svg>
          </span>
        </div>
        <div class="logo-text">
          <span class="logo-title"><?php echo $site_config['brand_name']; ?></span>
          <span class="logo-sub"><?php echo $site_config['brand_tagline']; ?></span>
        </div>
      </a>

      <!-- Clean Navigation Links (Tentang Desainer & Alur Pesan Removed) -->
      <nav class="nav-links" id="mainNav">
        <a href="index.php#home" class="nav-item <?php echo $current_page === 'index' ? 'active' : ''; ?>">Beranda</a>
        <a href="index.php#paket" class="nav-item">Paket & Harga</a>
      </nav>

      <!-- Right Action: Clean Login Button or User Session Info -->
      <div class="nav-cta-group">
        <?php if (isset($_SESSION['role'])): ?>
          <div class="user-session-badge">
            <?php if ($_SESSION['role'] === 'admin'): ?>
              <a href="admin.php" class="nav-session-btn admin-role">
                <span class="role-icon">👑</span>
                <span class="role-text">Admin Panel</span>
              </a>
            <?php else: ?>
              <a href="client.php" class="nav-session-btn client-role">
                <span class="role-avatar">BS</span>
                <span class="role-text">Portal Klien</span>
              </a>
            <?php endif; ?>
            <a href="logout.php" class="btn-nav-logout" title="Keluar / Logout">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
              <span>Logout</span>
            </a>
          </div>
        <?php else: ?>
          <a href="login.php" class="btn-nav-login">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
              <polyline points="10 17 15 12 10 7"></polyline>
              <line x1="15" y1="12" x2="3" y2="12"></line>
            </svg>
            <span>Login</span>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </header>

