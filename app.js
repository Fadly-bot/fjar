/**
 * STUDIO GRAFIS UMKM - FRONTEND INTERACTIONS & WHATSAPP LOGIC
 * - Dynamic WhatsApp Link & Message Generator
 * - Portfolio Filtering & Lightbox Preview
 * - Order Modal with Real-time WhatsApp Text Preview
 * - Client Order Tracking & Draft Inspection
 */

// Mock Orders for Client Dashboard (Budi Santoso - Kopi Aroma Senja)
let clientOrders = [
  {
    id: "#DSN-UMKM-082",
    brandName: "Kopi Aroma Senja",
    package: "Paket Kemasan & Stiker Label",
    price: "Rp 199.000",
    date: "29 Okt 2026",
    status: "pengerjaan",
    statusLabel: "Sedang Dikerjakan (Finishing Dieline)",
    progressPercent: 70,
    revisionsLeft: "2 dari 3 Revisi",
    currentStage: "Penyusunan format cetak CMYK & penyesuaian ukuran standing pouch 150gr.",
    note: "Dominasi warna earth-tone cokelat kraft dan ada info legalitas PIRT."
  },
  {
    id: "#DSN-UMKM-079",
    brandName: "Kopi Aroma Senja",
    package: "Paket Logo & Identitas Brand",
    price: "Rp 289.000",
    date: "25 Okt 2026",
    status: "review",
    statusLabel: "Menunggu Review Draft V1",
    progressPercent: 85,
    revisionsLeft: "3 dari 3 Revisi",
    currentStage: "2 Opsi konsep logo vektor telah dikirim via WA, menunggu pilihan konsep terbaik.",
    note: "Kombinasi siluet daun kopi dan cangkir minimalis modern."
  },
  {
    id: "#DSN-UMKM-064",
    brandName: "Kopi Aroma Senja",
    package: "Paket Feeds Promosi (5 Desain)",
    price: "Rp 129.000",
    date: "14 Okt 2026",
    status: "selesai",
    statusLabel: "Selesai (File Master Diterima)",
    progressPercent: 100,
    revisionsLeft: "Selesai Sempurna",
    currentStage: "Semua 5 feed resolusi HD & master editable Canva/AI telah diserahkan via Google Drive.",
    note: "Promo Launching varian Kopi Susu Aren & Flash Sale 10.10."
  }
];

let activeOrderFilter = 'all';
const DEFAULT_WA_NUMBER = '6281234567890';

// On Document Ready
document.addEventListener('DOMContentLoaded', () => {
  renderOrderList();
  updateOrderStats();
  setupFormListeners();
});

/* ==========================================================================
   1. WHATSAPP LOGIC
   ========================================================================== */
function getWhatsAppNumber() {
  return DEFAULT_WA_NUMBER;
}

function sendOrderToWhatsApp(packageName, price) {
  const waNum = getWhatsAppNumber();
  const text = `Halo Kak Dimas (Studio Grafis UMKM),\n\nSaya tertarik untuk memesan:\n📌 *${packageName}* (Rp ${price})\n\nSaya butuh untuk usaha UMKM saya. Mohon info ketersediaan slot pengerjaan dan data apa saja yang perlu saya siapkan.\n\nTerima kasih!`;
  const url = `https://api.whatsapp.com/send?phone=${waNum}&text=${encodeURIComponent(text)}`;
  window.open(url, '_blank');
}

function chatDesignerDirect() {
  const waNum = getWhatsAppNumber();
  const text = `Halo Kak Dimas Studio Grafis, saya Budi Santoso (Owner Kopi Aroma Senja).\nSaya ingin konsultasi mengenai progres pesanan desain saya. Terima kasih!`;
  const url = `https://api.whatsapp.com/send?phone=${waNum}&text=${encodeURIComponent(text)}`;
  window.open(url, '_blank');
}

/* ==========================================================================
   2. ORDER LIST RENDERING & STATUS TRACKING (CLIENT DASHBOARD)
   ========================================================================== */
function renderOrderList() {
  const container = document.getElementById('orderCardsContainer');
  if (!container) return;

  const searchQuery = (document.getElementById('orderSearchInput')?.value || '').toLowerCase();

  const filtered = clientOrders.filter(order => {
    const matchesStatus = (activeOrderFilter === 'all') || (order.status === activeOrderFilter);
    const matchesSearch = order.brandName.toLowerCase().includes(searchQuery) ||
                          order.package.toLowerCase().includes(searchQuery) ||
                          order.id.toLowerCase().includes(searchQuery);
    return matchesStatus && matchesSearch;
  });

  if (filtered.length === 0) {
    container.innerHTML = `
      <div style="text-align: center; padding: 3rem 1rem; background: #FAF8F5; border: 2px dashed #141619; border-radius: 4px;">
        <span style="font-size: 2.2rem; display: block; margin-bottom: 0.5rem;">📂</span>
        <h4 style="font-family: var(--font-heading); font-size: 1.1rem; margin-bottom: 0.25rem;">Tidak Ada Pesanan Ditemukan</h4>
        <p style="font-size: 0.85rem; color: #5A626A;">Coba ubah kata kunci pencarian atau ganti filter status.</p>
      </div>
    `;
    return;
  }

  container.innerHTML = filtered.map(order => {
    let statusClass = 'status-pengerjaan';
    let progressColor = '#F5B738';
    if (order.status === 'review') {
      statusClass = 'status-review';
      progressColor = '#E85D04';
    } else if (order.status === 'selesai') {
      statusClass = 'status-selesai';
      progressColor = '#10B981';
    }

    return `
      <article class="order-card-item" id="card-${order.id.replace('#', '')}">
        <!-- Col 1: Identity -->
        <div class="order-id-col">
          <span class="order-id-badge">${order.id}</span>
          <h4 class="order-brand-title">${order.brandName}</h4>
          <span class="order-package-lbl">${order.package}</span>
          <div class="order-date-text">Tanggal Order: ${order.date}</div>
        </div>

        <!-- Col 2: Progress & Stage -->
        <div class="order-progress-col">
          <div class="order-status-row">
            <span class="order-status-badge ${statusClass}">${order.statusLabel}</span>
            <span class="order-revision-count">${order.revisionsLeft}</span>
          </div>

          <div class="order-progress-track">
            <div class="order-progress-fill" style="width: ${order.progressPercent}%; background: ${progressColor};"></div>
          </div>

          <div class="order-step-info">
            <span><strong>Tahap:</strong> ${order.currentStage}</span>
            <span><strong>${order.progressPercent}%</strong></span>
          </div>
        </div>

        <!-- Col 3: Actions -->
        <div class="order-actions-col">
          <button type="button" class="btn-order-view" onclick="openDraftModal('${order.id}')">
            🔍 Lihat Draft & Detail
          </button>
          
          ${order.status !== 'selesai' ? `
            <button type="button" class="btn-order-wa-revise" onclick="sendRevisionWhatsApp('${order.id}', '${order.brandName}', '${order.package}')">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.2.662.589 1.221.771 1.394.858.173.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086.159.058 1.011.477 1.184.564.173.087.289.13.332.203.043.072.043.419-.101.824z"/></svg>
              Kirim Revisi via WA
            </button>
          ` : `
            <button type="button" class="btn-order-download" onclick="downloadMasterFiles('${order.id}')">
              ⬇ Unduh Master File
            </button>
          `}
        </div>
      </article>
    `;
  }).join('');
}

function updateOrderStats() {
  const inWork = clientOrders.filter(o => o.status === 'pengerjaan').length;
  const inReview = clientOrders.filter(o => o.status === 'review').length;
  const inDone = clientOrders.filter(o => o.status === 'selesai').length;

  const statWorkEl = document.getElementById('statInWork');
  const statReviewEl = document.getElementById('statReview');
  const statDoneEl = document.getElementById('statDone');
  const countAllEl = document.getElementById('countAll');

  if (statWorkEl) statWorkEl.textContent = inWork;
  if (statReviewEl) statReviewEl.textContent = inReview;
  if (statDoneEl) statDoneEl.textContent = inDone;
  if (countAllEl) countAllEl.textContent = clientOrders.length;
}

function filterOrderStatus(status) {
  activeOrderFilter = status;
  document.querySelectorAll('.order-filter-btn').forEach(btn => {
    btn.classList.toggle('active', btn.getAttribute('data-status') === status);
  });
  renderOrderList();
}

function searchOrders() {
  renderOrderList();
}

function sendRevisionWhatsApp(orderId, brandName, packageName) {
  const waNum = getWhatsAppNumber();
  const text = `Halo Kak Dimas Studio Grafis,\n\nSaya ingin mengirimkan revisi/masukan untuk pesanan:\n🆔 *No. Order:* ${orderId}\n🏢 *Brand:* ${brandName}\n📦 *Paket:* ${packageName}\n\n*Poin Revisi Saya:* \n1. [Tuliskan revisi teks / warna / tata letak di sini]\n2. ...\n\nMohon dicek ya kak, terima kasih!`;
  const url = `https://api.whatsapp.com/send?phone=${waNum}&text=${encodeURIComponent(text)}`;
  window.open(url, '_blank');
}

function downloadMasterFiles(orderId) {
  alert(`✅ [MASTER FILE SIAP]\n\nUnduhan Master File untuk pesanan ${orderId} sedang diproses:\n- Vector Master (.AI, .EPS, .SVG)\n- High Res PDF Siap Cetak (CMYK 300 DPI)\n- PNG Transparan & Mockup Preview\n\nLink Google Drive privat juga telah dikirimkan ke WhatsApp Anda.`);
}

/* ==========================================================================
   3. MODALS (ORDER VIA WHATSAPP & REALTIME MESSAGE PREVIEW)
   ========================================================================== */
function openOrderModal(packageName) {
  const modal = document.getElementById('orderModal');
  const titleEl = document.getElementById('modalPackageName');
  const selectEl = document.getElementById('formPaketSelect');

  if (packageName && selectEl) {
    titleEl.textContent = `Pesan: ${packageName}`;
    for (let i = 0; i < selectEl.options.length; i++) {
      if (selectEl.options[i].value.includes(packageName)) {
        selectEl.selectedIndex = i;
        break;
      }
    }
  }

  updateWaPreviewText();
  if (modal) modal.showModal();
}

function closeOrderModal() {
  const modal = document.getElementById('orderModal');
  if (modal) modal.close();
}

function openNewOrderModal() {
  openOrderModal('Order Baru Klien Budi Santoso');
  const nameInput = document.getElementById('formNamaBisnis');
  if (nameInput) nameInput.value = 'Kopi Aroma Senja';
  updateWaPreviewText();
}

function setupFormListeners() {
  const nameInput = document.getElementById('formNamaBisnis');
  const catSelect = document.getElementById('formKategori');
  const packSelect = document.getElementById('formPaketSelect');
  const noteArea = document.getElementById('formCatatan');

  [nameInput, catSelect, packSelect, noteArea].forEach(el => {
    if (el) {
      el.addEventListener('input', updateWaPreviewText);
      el.addEventListener('change', updateWaPreviewText);
    }
  });
}

function updateWaPreviewText() {
  const name = document.getElementById('formNamaBisnis')?.value.trim() || '[Nama Brand UMKM Kamu]';
  const cat = document.getElementById('formKategori')?.value || 'Makanan & Minuman (F&B)';
  const pack = document.getElementById('formPaketSelect')?.value || 'Paket Logo & Identitas Brand';
  const notes = document.getElementById('formCatatan')?.value.trim() || '-';

  const previewEl = document.getElementById('waMessagePreview');
  if (!previewEl) return;

  const msg = `Halo Kak Dimas (Studio Grafis UMKM),\nSaya ingin memesan jasa desain grafis:\n\n` +
              `🏢 *Nama Usaha:* ${name}\n` +
              `🏷️ *Kategori Produk:* ${cat}\n` +
              `📦 *Paket Dipilih:* ${pack}\n` +
              `📝 *Catatan Khusus:* ${notes}\n\n` +
              `Mohon info ketersediaan slot pengerjaan terdekatnya ya kak. Terima kasih!`;

  previewEl.textContent = msg;
}

function handleOrderFormSubmit(event) {
  event.preventDefault();
  const name = document.getElementById('formNamaBisnis')?.value.trim() || 'UMKM Baru';
  const pack = document.getElementById('formPaketSelect')?.value || 'Paket Desain Grafis';
  const previewText = document.getElementById('waMessagePreview')?.textContent || '';

  const newOrderObj = {
    id: `#DSN-UMKM-0${Math.floor(83 + Math.random() * 15)}`,
    brandName: name,
    package: pack.split('(')[0].trim(),
    price: pack.includes('Rp') ? pack.split('(')[1].replace(')', '') : 'Rp 199.000',
    date: 'Hari Ini (Baru)',
    status: 'pengerjaan',
    statusLabel: 'Baru Diterima (Antrean Desainer)',
    progressPercent: 20,
    revisionsLeft: '3x Revisi Gratis',
    currentStage: 'Menunggu konfirmasi rincian brief via WhatsApp.',
    note: document.getElementById('formCatatan')?.value.trim() || 'Pesanan baru via web'
  };

  clientOrders.unshift(newOrderObj);
  renderOrderList();
  updateOrderStats();

  // Open WhatsApp
  const waNum = getWhatsAppNumber();
  const url = `https://api.whatsapp.com/send?phone=${waNum}&text=${encodeURIComponent(previewText)}`;
  window.open(url, '_blank');

  closeOrderModal();
}

/* ==========================================================================
   4. PORTFOLIO FILTER & DETAIL MODAL
   ========================================================================== */
function filterPortfolio(category) {
  const filterBtns = document.querySelectorAll('.pf-filter-btn');
  filterBtns.forEach(btn => {
    btn.classList.toggle('active', btn.getAttribute('data-filter') === category);
  });

  const cards = document.querySelectorAll('.pf-card');
  cards.forEach(card => {
    if (category === 'all' || card.getAttribute('data-category') === category) {
      card.style.display = 'flex';
    } else {
      card.style.display = 'none';
    }
  });
}

function openPreviewDetail(brand, category, industry, description) {
  const modal = document.getElementById('previewModal');
  if (!modal) return;

  document.getElementById('prevBrandName').textContent = brand;
  document.getElementById('prevCategory').textContent = industry.toUpperCase();
  document.getElementById('prevTitle').textContent = `Karya: ${brand} (${category})`;
  document.getElementById('prevDeliverables').textContent = `${category} • 100% Siap Cetak`;
  document.getElementById('prevDescription').textContent = description;

  modal.showModal();
}

function closePreviewModal() {
  const modal = document.getElementById('previewModal');
  if (modal) modal.close();
}

function orderSimilarDesign() {
  const brand = document.getElementById('prevBrandName')?.textContent || 'Desain Serupa';
  closePreviewModal();
  openOrderModal(`Desain Serupa ${brand}`);
}

/* ==========================================================================
   5. DRAFT PREVIEW MODAL (CLIENT DASHBOARD)
   ========================================================================== */
function openDraftModal(orderId) {
  const order = clientOrders.find(o => o.id === orderId);
  if (!order) return;

  const modal = document.getElementById('draftModal');
  document.getElementById('draftOrderBadge').textContent = order.id;
  document.getElementById('draftOrderTitle').textContent = `${order.brandName} - ${order.package}`;
  
  const canvasContent = document.getElementById('draftInnerContent');
  canvasContent.innerHTML = `
    <div style="text-align: center; padding: 1.5rem; background: #FFFFFF; border: 2px solid #141619; box-shadow: 3px 3px 0px #141619; border-radius: 4px;">
      <span style="font-size: 1.8rem; display: block; margin-bottom: 0.35rem;">🎨</span>
      <h4 style="font-family: var(--font-heading); font-size: 1.2rem; margin-bottom: 0.2rem;">${order.brandName}</h4>
      <p style="font-size: 0.8rem; color: #5A626A; margin-bottom: 0.75rem;">Progres Desain: <strong>${order.progressPercent}%</strong></p>
      <div style="background: #FAF8F5; border: 1px dashed #141619; padding: 0.5rem; border-radius: 4px; font-size: 0.75rem;">
        Tahap Sekarang: <strong>${order.currentStage}</strong>
      </div>
    </div>
  `;

  const metaContent = document.getElementById('draftMetaContent');
  metaContent.innerHTML = `
    <div style="margin-top: 1rem; display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.85rem;">
      <div><strong>Status Saat Ini:</strong> ${order.statusLabel}</div>
      <div><strong>Sisa Kuota Revisi:</strong> ${order.revisionsLeft}</div>
      <div><strong>Catatan Khusus Klien:</strong> ${order.note}</div>
    </div>
  `;

  const btnRevise = document.getElementById('btnDraftReviseWA');
  if (btnRevise) {
    btnRevise.onclick = () => {
      closeDraftModal();
      sendRevisionWhatsApp(order.id, order.brandName, order.package);
    };
  }

  modal.showModal();
}

function closeDraftModal() {
  const modal = document.getElementById('draftModal');
  if (modal) modal.close();
}
