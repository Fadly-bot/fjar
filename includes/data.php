<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$site_config = [
    'brand_name' => 'STUDIOGRAFIS',
    'brand_tagline' => 'Partner Desain UMKM',
    'lead_designer' => 'Dimas Prasetyo',
    'designer_exp' => '5+ Tahun',
    'umkm_served' => '50+',
    'wa_number' => '6281234567890',
    'work_hours' => 'Setiap Hari (08.00 – 21.00 WIB)',
];

function get_initial_orders() {
    return [
        [
            'id' => '#DSN-UMKM-082',
            'client_name' => 'Budi Santoso',
            'client_phone' => '6281234567890',
            'brandName' => 'Kopi Aroma Senja',
            'package' => 'Paket Kemasan & Stiker Label',
            'price' => 'Rp 199.000',
            'date' => '29 Okt 2026',
            'status' => 'pengerjaan',
            'statusLabel' => 'Sedang Dikerjakan (Finishing Dieline)',
            'progressPercent' => 70,
            'revisionsLeft' => '2 dari 3 Revisi',
            'currentStage' => 'Penyusunan format cetak CMYK & penyesuaian ukuran standing pouch 150gr.',
            'note' => 'Dominasi warna earth-tone cokelat kraft dan ada info legalitas PIRT.'
        ],
        [
            'id' => '#DSN-UMKM-079',
            'client_name' => 'Budi Santoso',
            'client_phone' => '6281234567890',
            'brandName' => 'Kopi Aroma Senja',
            'package' => 'Paket Logo & Identitas Brand',
            'price' => 'Rp 289.000',
            'date' => '25 Okt 2026',
            'status' => 'review',
            'statusLabel' => 'Menunggu Review Draft V1',
            'progressPercent' => 85,
            'revisionsLeft' => '3 dari 3 Revisi',
            'currentStage' => '2 Opsi konsep logo vektor telah dikirim via WA, menunggu pilihan konsep terbaik.',
            'note' => 'Kombinasi siluet daun kopi dan cangkir minimalis modern.'
        ],
        [
            'id' => '#DSN-UMKM-064',
            'client_name' => 'Budi Santoso',
            'client_phone' => '6281234567890',
            'brandName' => 'Kopi Aroma Senja',
            'package' => 'Paket Feeds Promosi (5 Desain)',
            'price' => 'Rp 129.000',
            'date' => '14 Okt 2026',
            'status' => 'selesai',
            'statusLabel' => 'Selesai (File Master Diterima)',
            'progressPercent' => 100,
            'revisionsLeft' => 'Selesai Sempurna',
            'currentStage' => 'Semua 5 feed resolusi HD & master editable Canva/AI telah diserahkan via Google Drive.',
            'note' => 'Promo Launching varian Kopi Susu Aren & Flash Sale 10.10.'
        ],
        [
            'id' => '#DSN-UMKM-051',
            'client_name' => 'Ibu Lilis Hartati',
            'client_phone' => '6281987654321',
            'brandName' => 'Sambal Mak Tini',
            'package' => 'Paket Logo & Identitas Brand',
            'price' => 'Rp 289.000',
            'date' => '05 Okt 2026',
            'status' => 'selesai',
            'statusLabel' => 'Selesai (File Master Diterima)',
            'progressPercent' => 100,
            'revisionsLeft' => 'Selesai Sempurna',
            'currentStage' => 'Logo emblem vintage & stiker segel botol sudah diserahkan.',
            'note' => 'Ilustrasi cabai rawit woodcut & label jar botol.'
        ]
    ];
}

// Inisialisasi session orders jika belum ada
if (!isset($_SESSION['orders']) || empty($_SESSION['orders'])) {
    $_SESSION['orders'] = get_initial_orders();
}

$packages_data = [
    [
        'id' => 'paket-sosmed',
        'badge' => 'PROMO KHUSUS',
        'is_featured' => false,
        'title' => 'Paket Feeds Promosi',
        'for' => 'Cocok untuk kuliner, fashion, dan toko online yang butuh konten promosi harian.',
        'price' => '129.000',
        'period' => '/ 5 Desain',
        'note' => 'Hanya Rp 25.800 / postingan',
        'features' => [
            '5 Desain Feed Instagram / WhatsApp Story',
            'Copywriting teks promo singkat dibantu',
            'Format High Resolution JPG & PNG',
            '2x Sesi Revisi Minor',
            'Pengerjaan Kilat 24 Jam'
        ]
    ],
    [
        'id' => 'paket-logo',
        'badge' => 'BEST VALUE',
        'ribbon' => 'PALING BANYAK DIPILIH UMKM',
        'is_featured' => true,
        'title' => 'Logo & Identitas Brand',
        'for' => 'Bikin tokomu punya logo berkarakter yang profesional dan gampang diingat pelanggan.',
        'price' => '289.000',
        'period' => '/ paket',
        'note' => 'Termasuk File Vektor Master AI & PDF',
        'features' => [
            '<strong>2 Opsi Konsep Logo Eksklusif</strong>',
            'File Master Vektor (AI, EPS, SVG)',
            'PNG Transparan (langsung tempel foto produk)',
            'Panduan Warna & Font (Color Palette Kit)',
            'Mockup Visual 3D (Kaos, Banner, Gelas)',
            '<strong>3x Sesi Revisi</strong> sampai mantap'
        ]
    ],
    [
        'id' => 'paket-kemasan',
        'badge' => 'PRODUK & PACKAGING',
        'is_featured' => false,
        'title' => 'Kemasan & Stiker Label',
        'for' => 'Spesialis standing pouch, stiker botol minuman, toples kue, & box makanan.',
        'price' => '199.000',
        'period' => '/ desain kemasan',
        'note' => 'File siap kirim langsung ke percetakan',
        'features' => [
            'Desain sesuai ukuran kemasan (Dieline akurat)',
            'Layout tabel gizi, barcode & info izin PIRT/BPOM',
            'File Siap Cetak (PDF High Quality, CMYK)',
            'Mockup 3D Kemasan Realistis',
            '3x Revisi Desain'
        ]
    ],
    [
        'id' => 'paket-komplit',
        'badge' => 'HEMAT 40%',
        'is_featured' => false,
        'title' => 'Bundle UMKM Juara',
        'for' => 'Solusi all-in-one re-branding untuk UMKM yang mau tampil berkelas total.',
        'price' => '499.000',
        'period' => '/ all-in',
        'note' => 'Logo + Kemasan + 5 Feeds + Banner Toko',
        'features' => [
            '<strong>Semua fitur Paket Logo & Vektor Master</strong>',
            '<strong>1 Desain Kemasan / Stiker Siap Cetak</strong>',
            '<strong>5 Desain Feeds Instagram Promo</strong>',
            '1 Desain Banner Spanduk Toko / Shopee Header',
            'Prioritas Pengerjaan VIP (Express 24 Jam)',
            '<strong>Unlimited Revisi Minor</strong>'
        ]
    ]
];

$portfolio_data = [
    [
        'id' => 1,
        'category' => 'kemasan',
        'badge' => 'ARTBOARD 01',
        'dimension' => '[W: 140mm × H: 220mm]',
        'spec_pill' => 'ROTOGRAVURE READY',
        'title' => 'Kopi Senja Gayo',
        'type' => 'Kemasan Standing Pouch Kraft',
        'industry' => 'F&B / Kopi',
        'desc' => 'Kemasan standing pouch kraft bertekstur alami dengan penempatan valve aroma, foil emas, dan legalitas P-IRT lengkap.',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAb685XIgGmK-OajrHOKIdPT80YaWWdfXwZsv13xtP52j3dT5HXkw6I93I3Lw0E9FxksJmDWokfakLs0XZaEdqGJkMpDc-IvzMS-_sWCgxn_LYC8h5mXjifhDkUaV9OiuQ33M3CowMGE9smKdBb5LNChBhbvuwSXdrJ6kkXykiwKU0ilL4HpqJiWLw68ipDiXbVYInJOxdWOTcj4kH0LQ15PzlyEQydlVQ38GBeruBBUDPoLvA6c7hGv0hgMoC-WENrSrXw0Tjesg',
        'tags' => ['Kemasan Kopi Pouch', 'Rotogravure & Sablon', 'P-IRT Registered']
    ],
    [
        'id' => 2,
        'category' => 'logo',
        'badge' => 'ARTBOARD 02',
        'dimension' => '[DIA: 85mm • CIRCLE]',
        'spec_pill' => 'GOLD FOIL READY',
        'title' => 'Sambal Mak Tini',
        'type' => 'Logo & Label Botol Jar',
        'industry' => 'Kuliner',
        'desc' => 'Emblem vintage woodcut cabai rawit pedas & kurva tipografi presisi untuk segel jar botol kaca.',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBnEUucyGBdn5kIrbMdxqYal1G8TG0nFo_TwjLBTF1pqitaft2LPwsjb5yEQN8oJDJugAg8P230SW4RQRhvW3toWfCcuztQm0eorHHM74ZUYbLjKxiRvwQUbf0et7ZnI-imc1EUusX6YQe58LRP6eupDLbDhV2p19Hgfshy5ERFMwmDxlaNOj6iTdJiszgX1_L9P16KYXjQdMDbsOrDSE7kntQmMPJbBmBXE9HTZPmQYR5_HenUANGLPR6Z8xQ2HC9aZSnERaTiCQ',
        'tags' => ['Vector Logo Emblem', 'Gold Foil Stamp', 'Label Jar Botol']
    ],
    [
        'id' => 3,
        'category' => 'sosmed',
        'badge' => 'ARTBOARD 03',
        'dimension' => '[1080 × 1080 PX • 1:1]',
        'spec_pill' => 'SRGB • 72 DPI',
        'title' => 'Nayra Hijab Official',
        'type' => 'Feed Promosi Sosmed',
        'industry' => 'Fashion',
        'desc' => 'Materi promosi Instagram feed bernuansa sage pastel & tipografi editorial serif untuk launching busana.',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDCD_uE4LVY-zA3lCIKz0GS4e8oAGgUzHQwJbX0ToeSo66ax08l0YcQ8vpBrFuD6tGQ-ytOlJmOpTWNb9yYhyFiCZVDhluoL6YjbSWHjtPG5Ihbg33eCD8Tslbi5dweP-fGb0j379uMCRJTY1ABpxPOeTr1ceKgBVdzbmB0hGFsZ_f1IQYCaZfuTWZ4byQxEjG2CUbIPuN-74xe5w03-3lou6nN6eotTqlR6qEaI4ZJSC9FjVwDZdc3MiuQ1fn6dKk6cuH3cyX7qg',
        'tags' => ['Social Media Feed', 'Instagram Carousel', 'Fashion Editorial']
    ],
    [
        'id' => 4,
        'category' => 'kemasan',
        'badge' => 'ARTBOARD 04',
        'dimension' => '[W: 160mm × H: 260mm]',
        'spec_pill' => 'FOOD GRADE FOIL',
        'title' => 'Kriuk Joss Snack',
        'type' => 'Stiker & Pouch Foil Camilan',
        'industry' => 'Snack / Makanan Ringan',
        'desc' => 'Desain kemasan foil berenergi tinggi dengan pop-typography komik & tata letak barcode BPOM/Halal.',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDvhpBEwWU97Umy-_NUFKPymdkXiB649Sg9wGqHo6Ev8NEeQPkxjSxbdsLiED94L2wEWVc0UVLYzCk8p5eQJ2ww8uqXnqaGgvnjDZldqBod0pH2OhcY8p0jnaLaJqZTAUilQAYc5rwc7e1yfHFjkTlsak2bdTgijG75JKo7O3cKcmnbhH5zeoMqRcrZ7Es7a4hymE8wKKGAgRMoaXkb_2RJELJoIeukWHWeRSXgEl-6ewlNjJSQeyVBOLjNfNNUjzrM3xEAONxq7w',
        'tags' => ['Label Kemasan Plastik', 'Food Grade Cetak', 'Retail Ready Barcode']
    ],
    [
        'id' => 5,
        'category' => 'logo',
        'badge' => 'ARTBOARD 05',
        'dimension' => '[Rot: 0.00° • SYMMETRY]',
        'spec_pill' => 'MONOCHROME VECTOR',
        'title' => "Brother's Barbershop",
        'type' => 'Logo Signage & Branding',
        'industry' => 'Jasa / Grooming',
        'desc' => 'Sistem identitas visual monokrom vintage untuk neon box signage, kartu keanggotaan & kaleng pomade.',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAuQA9DOv2_kYN3wM2FqI000sFGEW6tvRrb3XXftRdn75D3LTRSGbkIDDstAl5u-9xBciHHHtUVxrUJD1Y8m6Cu0RO_hEZn_Wm97oyhJoYYwUxR6k1pQmvHq2PSOoVVmlZWm5h4hHMNtfXSBAw5HHkXbXLkDWKevHgkL2JqAcQGsqYTngRHdlEmaKkkiLFwYyJyIRAPmWxML8wLCKTxYGsNt6VOLGXkx3FGfQm2d4ASMuPvscKCQZa5szzzVJbaV1sQj17c8hM0xg',
        'tags' => ['Brand Identity & Signage', 'Vector Monogram', 'Pomade Tin Label']
    ],
    [
        'id' => 6,
        'category' => 'sosmed',
        'badge' => 'ARTBOARD 06',
        'dimension' => '[#06_promo_banner.png]',
        'spec_pill' => 'FOOD DELIVERY ASSET',
        'title' => 'Bebek Rempah Mas Roy',
        'type' => 'Banner Promosi Kuliner',
        'industry' => 'Resto / Kuliner',
        'desc' => 'Banner promosi materi media sosial beresolusi tinggi dengan tipografi penawaran diskon menggugah selera.',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCnK03b3U1AARjpCH4hiSm44B6k1O0ddEhL__xA2VCQfB7toXy5gMmR6knVc3Uhmf90M-S59etq30XoN_5UuH_47bZF8JN0eERdAechGa3QaJTkwA6-Iq56WCIe3ouBck1p735RmNERaYLfSH6FMsQLMm7MNo17-T0dAIBe_CaVlpLh7ypZoklSbN2_nKOXJCqEXn8eojLxhlismpOZNwWS4sEM2kzVenOWpwPZcVdHT5ZaJQxsW7LuT8glLTZ3s1DPYgWQJ0Y8dA',
        'tags' => ['Banner Promosi Digital', 'Menu Board Spanduk', 'GoFood/GrabFood Banner']
    ]
];

$faq_data = [
    [
        'q' => 'Berapa lama waktu pengerjaan desainnya?',
        'a' => 'Rata-rata pengerjaan draft pertama adalah <strong>24 hingga 48 jam</strong> kerja tergantung tingkat kerumitan paket. Untuk kebutuhan super urgent / express bisa dikonsultasikan langsung via WhatsApp.'
    ],
    [
        'q' => 'Kalau saya belum punya ide atau konsep sama sekali bagaimana?',
        'a' => 'Tenang saja! Desainer akan memandu melalui sesi tanya jawab singkat tentang target pasar usahamu, warna favorit, dan memberikan 2–3 pilihan referensi konsep yang cocok untuk produkmu.'
    ],
    [
        'q' => 'File apa saja yang akan saya terima?',
        'a' => 'Kamu akan menerima file lengkap: <strong>PNG transparan</strong> (bisa langsung ditempel di foto produk), <strong>JPG High Resolution</strong> (untuk postingan sosmed), serta <strong>File Master Vektor (AI/PDF/EPS)</strong> yang tidak akan pecah saat dicetak ke spanduk atau neon box ukuran besar.'
    ],
    [
        'q' => 'Apakah ada garansi revisi kalau belum sesuai selera?',
        'a' => 'Tentu ada! Setiap paket sudah mencakup 2 hingga 3 kali sesi revisi minor (seperti ubah warna, ganti font, geser layout) sampai hasilnya benar-benar kamu sukai dan siap pakai.'
    ]
];

