<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Berita<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah Permohonan
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/layanan/kunjungan-tahanan" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Formulir Besuk Tahanan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="form-group">
                                        <label>Nama Pemohon<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>NIK / Nomor Passport<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Whatsapp / Email<span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nomor" id="email" placeholder="Nomor Whatsapp">
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="email" id="nomor" placeholder="Email (jika tidak punya kosongkan)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat / Tanggal Lahir<span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="nomor" id="email" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name="email" id="nomor" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin<span class="text-danger">*</span></label>
                                        <select class="form-select" name="kelamin" id="kelamin">
                                            <option value="">Pilih</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat/Tempat Tinggal<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Tempat Tinggal"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Agama<span class="text-danger">*</span></label>
                                        <select class="form-select" name="agama" id="agama">
                                            <option value="">Pilih Agama</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="budha">Budha</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan">
                                    </div>
                                    <div class="form-group">
                                        <label>Hubungan<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="hubungan" id="hubungan" placeholder="Hubungan pemohon dengan tahanan">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Permohonan (<span class="text-danger">Tanggal terisi otomatis hari ini</span>)</label>
                                        <input type="text" class="form-control" name="tanggal_register" id="tanggal_register" value="<?= date('Y-m-d') ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Kunjungan<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control dates datepicker" name="tanggal_kunjungan" id="tanggal_kunjungan">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Terdakwa<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nama_terdakwa" id="nama_terdakwa" placeholder="Nama Terdakwa">
                                    </div>
                                    <div class="form-group">
                                        <label>Dokumen KTP<span class="text-danger">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" name="ktp" class="custom-file-input" id="ktp">
                                            <label class="custom-file-label" for="ktp">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success" >Simpan</button>
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
                                <th style="width: 10px">No</th>
                                <th>Nama Pemohon</th>
                                <th>Nama Terdakwa</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($items)) : ?>
                            <tr>
                                <td class="text-center" colspan="6">Belum ada Pengaduan.</td>
                            </tr>
                            <?php else : ?>
                            <?php foreach($items as $key => $item): ?>
                            <tr>
                                <td><?= $key+1 ?>.</td>
                                <td><?= $item['nama'] ?></td>
                                <td>
                                    <?= $item['no_hp'] ?>
                                    <?= $item['email'] ?>
                                </td>
                                <td><?= $item['kronologi'] ?></td>
                                <td>
                                    <?php
                                    $status = $item['status'] ?? 'waiting';
                                    if (empty($status)) {
                                        $status = 'waiting';
                                    }
                                    ?>
                                    <span class="badge badge-<?= $status == 'waiting' ? 'warning' : ($status == 'in_progress' ? 'info' : 'success') ?>">
                                        <?= ucfirst($status) ?>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <button 
                                            type="button" 
                                            class="edit-btn btn btn-warning" 
                                            data-toggle="modal" 
                                            data-target="#modal-detail-pengaduan"
                                            data-id="<?= $item['id'] ?>"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="/panel/berita/delete/<?= $item['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus berita ini?');">
                                            <i class="fas fa-trash"></i>
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
                    <ul class="pagination pagination-sm m-0 float-right">
                        
                    </ul>
                </div>
            </div>
        <div class="col-12">
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
    
<?= $this->endSection() ?>