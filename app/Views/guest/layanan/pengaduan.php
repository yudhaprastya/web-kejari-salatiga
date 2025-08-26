<?= $this->extend("guest/layouts/index") ?>

<?= $this->section("title") ?>Layanan<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Layanan</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Pengaduan Masyarakat</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="row mt-5">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Pengaduan / Pelaporan Masyarakat</strong>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <strong>
                        Layanan Pengaduan atau Pelaporan Masyarakat untuk wadah bagi masyarakat menyampaikan pengaduan atau laporan terkait pelayanan publik, dugaan pelanggaran hukum, atau masalah lainnya yang memerlukan perhatian dari pihak berwenang.
                        </strong>
                    </div>
                </div>
                <div class="row gx-5 gy-5 justify-content-center">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="shadow p-5">
                            <?php if (session()->getFlashdata('success_create') !== NULL) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong class="text-center">Pelaporan Berhasil</strong><br>
                                    <hr>
                                    <p class="mb-0 fw-light">
                                        Catatan: <br> Untuk lanjutan pelaporan anda akan ditindaklanjuti melalui nomor telepon atau email yang anda berikan.
                                    </p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('errors') !== NULL) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('error'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <h3>Formulir Pengaduan Masyarakat</h3><hr>
                            </div>
                            <form action="/layanan/pengaduan" method="POST" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="nama" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="mb-4">
                                    <label for="alamat" class="form-label">Alamat Lengkap<span class="text-danger">*</span></label>
                                    <textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" required></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="nik" class="form-label">NIK<span class="text-danger">*</span></label>
                                    <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                                </div>
                                <div class="mb-4">
                                    <label for="noHp" class="form-label">Nomor Telepon<span class="text-danger">*</span></label>
                                    <input type="text" name="no_hp" class="form-control" id="noHp" placeholder="Nomor Telepon" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="mb-4">
                                    <label for="identitas" class="form-label">Identitas Pelapor dan Terlapor<span class="text-danger">*</span></label>
                                    <input type="file" name="identitas[]" multiple class="form-control" id="identitas" required>
                                    <p style="font-size: 0.7rem;">Upload maksimal 5 file: PDF, dokumen, atau image(jpg, jpeg, png). Maks  2 MB per file .</p>
                                </div>
                                <div class="mb-4">
                                    <label for="kronologi" class="form-label">Uraian kronologis kejadian (perbuatan, waktu, tempat)<span class="text-danger">*</span></label>
                                    <textarea type="text" name="kronologi" class="form-control" id="kronologi" placeholder="kronologi" required></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="buktiDukung" class="form-label">Bukti dukung laporan pengaduan<span class="text-danger">*</span></label>
                                    <input type="file" name="bukti_dukung" class="form-control" id="buktiDukung" required>
                                    <p style="font-size: 0.7rem;">Upload 1 file: PDF, audio, video, dokumen, atau image(jpg, jpeg, png). Maks 10 MB.</p>
                                </div>
                                <button type="submit" class="btn btn-green"><strong>Submit</strong></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>