<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Buku Tamu<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
        <!-- Flashdata: Error -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        <!-- Flashdata: Success -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah Buku Tamu
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form id="addTamuForm" action="/panel/buku-tamu" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Buku Tamu</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5 row">
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Nama Petugas<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_petugas" id="namaPetugas" placeholder="Enter ..." required>
                                        </div>
                                    </div>
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Pelayanan<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Enter ..." required>
                                        </div>
                                    </div>
                                    <div class="class col-md-12">
                                        <div class="form-group">
                                            <label>Tipe Pelayanan<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="tipe_pelayanan" required>
                                                <?php foreach($layanans as $key => $layanan): ?>
                                                    <option value="<?= $layanan['id'] ?>"><?= $layanan['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Nama<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Identitas<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="tipe_identitas" required>
                                                <option value="ktp">KTP</option>
                                                <option value="sim">SIM</option>
                                                <option value="passport">Passport</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Identitas<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nomor_identitas" id="nomorIdentitas" placeholder="Enter ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor HP / Whatsapp / Email</label>
                                            <input type="text" class="form-control" name="no_hp" id="noHp" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="jenis_kelamin" required>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" id="tempatLahir" placeholder="Enter ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggalLahir" placeholder="Enter ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Plat Kendaraan</label>
                                            <input type="text" class="form-control" name="plat" id="plat" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Diri <span class="small">(maks. file 2MB)</span></label>
                                        <div class="card p-4 text-center align-items-center">
                                            <video id="video" autoplay playsinline muted></video>
                                            <canvas id="canvas" style="display:none;"></canvas>
                                            <img id="preview" alt="Snapshot preview" />

                                            <!-- Hidden input where we’ll store the base64 image -->
                                            <input type="hidden" name="photo_base64" id="photo_base64">

                                            <div class="actions">
                                                <button class="cam-button" type="button" id="start">Start Camera</button>
                                                <button class="cam-button" type="button" id="snap" disabled>Snap</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button id="btnSubmit" class="btn btn-success" >Simpan</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No Urut</th>
                                <th>Nama</th>
                                <th>Tipe Pelayanan</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($tamus)) : ?>
                            <tr>
                                <td class="text-center" colspan="6">Belum ada data Tamu.</td>
                            </tr>
                            <?php else : ?>
                            <?php foreach($tamus as $key => $tamu): ?>
                            <tr>
                                <td><?= $tamu['nomor'] ?></td>
                                <td><?= $tamu['nama'] ?></td>
                                <td>
                                    <?php 
                                        $layanan = array_filter($layanans, function($l) use ($tamu) {
                                            return $l['id'] == $tamu['layanan_id'];
                                        });
                                        echo !empty($layanan) ? reset($layanan)['nama'] : 'Tidak Diketahui';
                                    ?>
                                </td>
                                <td><?= $tamu['tanggal'] ?></td>
                                <td>
                                    <b><?= $tamu['status'] ?></b> <br>
                                    <?php if ($tamu['status'] == "waiting"){ ?>
                                    <a href="/panel/buku-tamu/next/<?= $tamu['id'] ?>" type="button" class="btn btn-warning" onclick="return confirm('Anda ingin memanggil antrian ini?');">
                                        Panggil
                                    </a>
                                    <a href="/panel/buku-tamu/done/<?= $tamu['id'] ?>" type="button" class="btn btn-success" onclick="return confirm('Anda yakin pelayanan sudah selesai?');" style="pointer-events: none;">
                                        Selesai
                                    </a>
                                    <?php } else if ($tamu['status'] == 'called') { ?>
                                    <a href="/panel/buku-tamu/next/<?= $tamu['id'] ?>" type="button" class="btn btn-warning" onclick="return confirm('Anda ingin memanggil antrian ini?');" style="pointer-events: none;">
                                        Panggil
                                    </a>
                                    <a href="/panel/buku-tamu/done/<?= $tamu['id'] ?>" type="button" class="btn btn-success" onclick="return confirm('Anda yakin pelayanan sudah selesai?');">
                                        Selesai
                                    </a>
                                    <?php } else { ?>
                                    <a href="/panel/buku-tamu/next/<?= $tamu['id'] ?>" type="button" class="btn btn-warning" onclick="return confirm('Anda ingin memanggil antrian ini?');" style="pointer-events: none;">
                                        Panggil
                                    </a>
                                    <a href="/panel/buku-tamu/done/<?= $tamu['id'] ?>" type="button" class="btn btn-success" onclick="return confirm('Anda yakin pelayanan sudah selesai?');" style="pointer-events: none;">
                                        Selesai
                                    </a>
                                    <?php } ?>
                                </td>
                                <td>
                                <span>
                                    <a href="/panel/buku-tamu/delete/<?= $tamu['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus daftar tamu ini?');">
                                        Hapus
                                    </a>
                                </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                </div>
            </div>
        <div class="col-12">
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
    <script>
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.onclick = () => {
                ['id', 'namaPetugas', 'tanggal', 'tipePelayanan', 'tipeIdentitas', 'nomorIdentitas', 'nama', 'noHp', 'plat', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'alamat', 'fotoDiri', 'fotoIdentitas'].forEach(f => {
                    document.getElementById('tamu' + f.charAt(0).toUpperCase() + f.slice(1)).value = btn.dataset[f];
                });

                document.getElementById('editForm').action = `/panel/berita/update/${btn.dataset.id}`;
            }
        })
    </script>
    <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const preview = document.getElementById('preview');
    const startBtn = document.getElementById('start');
    const snapBtn = document.getElementById('snap');
    const photoBase64Input = document.getElementById('photo_base64');
    let stream;

    startBtn.onclick = async () => {
      try {
        stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' }, audio: false });
        video.srcObject = stream;
        snapBtn.disabled = false;
      } catch (e) {
        alert('Could not access webcam. You can still choose a file.');
        console.error(e);
      }
    };

    snapBtn.onclick = () => {
      if (!stream) return;
      const { videoWidth, videoHeight } = video;
      if (!videoWidth || !videoHeight) return;

      canvas.width = videoWidth;
      canvas.height = videoHeight;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

      // JPEG with quality 0.92; change to image/png if you prefer PNG
      const dataUrl = canvas.toDataURL('image/jpeg', 0.92);
      preview.src = dataUrl;
      photoBase64Input.value = dataUrl;
    };

    // Clean up webcam on page unload
    window.addEventListener('beforeunload', () => {
      if (stream) stream.getTracks().forEach(t => t.stop());
    });
  </script>
<?= $this->endSection() ?>