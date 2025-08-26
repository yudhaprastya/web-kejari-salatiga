<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Berita<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah Berita
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/berita" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Berita</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="form-group">
                                        <label>Judul Berita</label>
                                        <textarea class="form-control" name="judulBerita" id="judulBerita" rows="2" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Berita</label>
                                        <textarea class="form-control" name="isiBerita" id="summernote" rows="4" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Berita</label>
                                        <input type="date" name="tanggalBerita" id="tanggalBerita" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Berita <i class="text-gray">(max 2MB)</i></label>
                                        <div class="custom-file">
                                            <input type="file" name="gambarBerita" class="custom-file-input" id="gambarBerita">
                                            <label class="custom-file-label" for="gambarBerita">Choose file</label>
                                        </div>
                                    </div>
                                    <div id="previewBerita" class="invisible">
                                        <label>Preview Gambar</label><br>
                                        <img id="previewGambarBerita" src="#" alt="your image" width="50%"/>
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
                                <th>Nama</th>
                                <th>No HP/Email</th>
                                <th>Kronologi</th>
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