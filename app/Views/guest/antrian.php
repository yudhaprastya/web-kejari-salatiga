<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Antrian – Satu Halaman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root{ --header-h: 16vh; }
    html, body{ height:100%; overflow:hidden; }
    body{ margin:0; }
    .wrapper{ height:100vh; display:flex; flex-direction:column; background:#0b1220; }

    /* HEADER lebih kecil & ringkas */
    .header{ height:var(--header-h); color:#fff; background:linear-gradient(180deg, rgba(2,6,23,.95), rgba(2,6,23,.85)); border-bottom:1px solid rgba(148,163,184,.25); }
    .big-number{ font-weight:800; line-height:1; font-size:min(8.5vh, 9vw); letter-spacing:.02em; }
    .label{ text-transform:uppercase; letter-spacing:.06em; font-size:.75rem; color:#67e8f9; }

    /* VIDEO: isi sisa layar tanpa scroll, TANPA TERPOTONG (contain) */
    .video-wrap{ position:relative; height:calc(100vh - var(--header-h)); overflow:hidden; background:#000; }
    .video-wrap video{ width:100%; height:100%; object-fit:contain; object-position:center center; display:block; background:#000; }
    .video-caption{ position:absolute; left:0; right:0; bottom:0; padding:.5rem 1rem; text-align:center; color:rgba(255,255,255,.75); font-size:.85rem; }

    @media (max-width: 576px){ :root{ --header-h: 22vh; } .big-number{ font-size: 8vh; } }
    .badge { background:#0ea5b7; color:#001015; font-weight:700; letter-spacing:.04em; padding:6px 10px; border-radius:999px; font-size:13px; }
    .brand{display:flex;align-items:center;gap:30px}
    .brand-logo{height:10vh;width:auto;object-fit:contain}
  </style>
</head>
<body class="bg-dark text-light">
  <div class="wrapper">

  <!-- HEADER (tanpa tombol panggil, tampilkan tanggal) -->
  <header class="header d-flex align-items-center py-2">
    <div class="container">
      <div class="row g-2 align-items-center">
        <div class="col-8 col-lg-9">
          <div class="brand">
            <a href="/">
              <img src="<?= base_url('assets/img/logo_kejaksaan.png') ?>" alt="Logo Perusahaan" class="brand-logo" />
            </a>
            <div>
              <div class="label mb-1">Nomor Dipanggil</div>
              <div class="big-number mb-0" id="currentNumber"><?= isset($current['nomor']) ? (int)$current['nomor'] : '-' ?></div>
            </div>
          </div>
        </div>
        <div class="col-4 col-lg-3 text-end">
          <div class="mb-1 badge"><?= date('d-m-Y') ?></div>
          <div class="label mb-1 mt-2">Total Antrian</div>
          <div class="h5 mb-0" id="totalQueue"><?= (int)($total ?? (is_array($queue ?? null) ? count($queue) : 0)) ?></div>
        </div>
      </div>
    </div>
  </header>

  <!-- VIDEO PROFIL (tanpa terpotong) -->
  <main class="video-wrap">
    <video autoplay muted loop playsinline poster="<?= base_url('uploads/video-poster.jpg') ?>">
      <source src="<?= base_url('assets/video/alur_pelayanan.mp4') ?>" type="video/mp4">
      Browser anda tidak mendukung video HTML5.
    </video>
    <div class="video-caption">© <?= date('Y') ?> Perusahaan Anda — Video Profil</div>
  </main>

<script>
(function(){
  const el = document.getElementById('currentNumber');
  const ele = document.getElementById('totalQueue');
  async function refresh() {
    try {
      const res = await fetch('<?= site_url('antrian/pulse') ?>', { headers: { 'X-Requested-With':'XMLHttpRequest' } });
      if (!res.ok) return;
      const data = await res.json();
      el.textContent = (data && data.nomor !== null) ? data.nomor : '-';
      ele.textContent = (data && data.queue !== null) ? data.queue : '0';
    } catch(e) { /* diamkan agar video tetap lanjut */ }
  }
  refresh(); // pertama kali saat load
  setInterval(refresh, 5000); // setiap 5 detik
})();
</script>
</body>
</html>