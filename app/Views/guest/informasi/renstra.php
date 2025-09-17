<?= $this->extend("guest/layouts/index") ?>

<?= $this->section("title") ?>Rencana Strategis<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section id="jadwalSidang">
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-bolder">
                <li class="breadcrumb-item">Informasi</li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Rencana Strategis</li>
            </ol>
        </nav>
        <iframe src="<?php echo base_url('assets') ?>/file/ranwal_renstra.pdf" style="width: 100%;min-height: 100vh;border: none;"></iframe>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>