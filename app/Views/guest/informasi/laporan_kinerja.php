<?= $this->extend("guest/layouts/index") ?>

<?= $this->section("title") ?>Laporan Kinerja<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section id="jadwalSidang">
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-bolder">
                <li class="breadcrumb-item">Informasi</li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Laporan Kinerja</li>
            </ol>
        </nav>
        <div class="d-flex gap-3 mb-3">
            <button class="btn btn-green" onclick="gantiPdf(this, 'lk_1.pdf')">Triwulan 1</button>
            <button class="btn btn-white" onclick="gantiPdf(this, 'lk_2.pdf')">Triwulan 2</button>
        </div>
        <iframe id="pdfViewer" src="<?php echo base_url('assets') ?>/file/lk_1_2025.pdf" style="width: 100%;min-height: 100vh;border: none;"></iframe>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
    function gantiPdf(button, fileName) {
        document.getElementById('pdfViewer').src = "<?php echo base_url('assets') ?>/file/" + fileName;

        const buttons = document.querySelectorAll('.d-flex button');
        buttons.forEach(btn => {
            btn.classList.remove('btn-green');
            btn.classList.add('btn-white');
        });

        button.classList.remove('btn-white');
        button.classList.add('btn-green');
    }
</script>
<?= $this->endSection() ?>