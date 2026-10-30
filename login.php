<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';

// Jika sudah login, redirect sesuai role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin.php');
        exit;
    } elseif ($_SESSION['role'] === 'client') {
        header('Location: client.php');
        exit;
    }
}

// Proses form login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    // String matching persis sesuai permintaan user
    if ($user === 'a' && $pass === 'a') {
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = 'a';
        $_SESSION['user_name'] = 'Admin Studio Grafis';
        header('Location: admin.php');
        exit;
    } elseif ($user === 'customer' && $pass === 'klien') {
        $_SESSION['role'] = 'client';
        $_SESSION['username'] = 'customer';
        $_SESSION['user_name'] = 'Budi Santoso';
        $_SESSION['client_id'] = '#UMKM-8821';
        header('Location: client.php');
        exit;
    } else {
        $error = 'Username atau Password anda salah';
    }
}

$page_title = 'Login Portal Klien & Admin';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';
?>

<main class="login-page-section">
  <div class="container login-container">
    
    <div class="login-card-wrapper">
      
      <!-- Window Title Header -->
      <div class="login-card-header">
        <div class="window-dots">
          <span class="dot dot-red"></span>
          <span class="dot dot-yellow"></span>
          <span class="dot dot-green"></span>
        </div>
        <span class="window-title">auth_portal_login.exe</span>
        <span class="window-badge">SECURE SESSION</span>
      </div>

      <div class="login-card-body">
        
        <div class="login-intro text-center">
          <div class="login-icon-box">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
              <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
              <polyline points="10 17 15 12 10 7"></polyline>
              <line x1="15" y1="12" x2="3" y2="12"></line>
            </svg>
          </div>
          <h1 class="login-title">Masuk ke Portal</h1>
          <p class="login-subtitle">Silakan masukkan data akun untuk mengakses dashboard pesanan.</p>
        </div>

        <!-- Alert Error Message -->
        <?php if (!empty($error)): ?>
          <div class="login-alert-error" role="alert">
            <span class="alert-icon">⚠️</span>
            <div class="alert-text">
              <strong>Gagal Masuk:</strong> <?php echo htmlspecialchars($error); ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="login.php" method="POST" class="login-form">
          <div class="form-group">
            <label for="username">Username</label>
            <input 
              type="text" 
              name="username" 
              id="username" 
              class="login-input" 
              placeholder="Masukkan username..." 
              value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" 
              required 
              autofocus
            >
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input 
              type="password" 
              name="password" 
              id="password" 
              class="login-input" 
              placeholder="Masukkan password..." 
              required
            >
          </div>

          <button type="submit" class="btn-login-submit">
            <span>Masuk ke Menu</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
          </button>
        </form>

        <!-- Testing Credentials Helper Box (User Friendly Demo) -->
        <div class="login-credentials-guide">
          <div class="guide-title">
            <span>💡</span>
            <strong>Akun Login Demo:</strong>
          </div>
          <div class="guide-accounts-grid">
            <button type="button" class="guide-chip" onclick="fillLogin('a', 'a')" title="Klik untuk autofill Admin">
              <span class="chip-role">👑 Role Admin</span>
              <span class="chip-data">User: <strong>a</strong> | Pass: <strong>a</strong></span>
              <span class="chip-action">Klik Isi Otomatis</span>
            </button>
            <button type="button" class="guide-chip" onclick="fillLogin('customer', 'klien')" title="Klik untuk autofill Klien">
              <span class="chip-role">👤 Role Klien</span>
              <span class="chip-data">User: <strong>customer</strong> | Pass: <strong>klien</strong></span>
              <span class="chip-action">Klik Isi Otomatis</span>
            </button>
          </div>
        </div>

        <div class="login-back-row text-center">
          <a href="index.php" class="login-back-link">
            ← Kembali ke Beranda Utama
          </a>
        </div>

      </div>

    </div>

  </div>
</main>

<script>
function fillLogin(user, pass) {
  document.getElementById('username').value = user;
  document.getElementById('password').value = pass;
}
</script>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

