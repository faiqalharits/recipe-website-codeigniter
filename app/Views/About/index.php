<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>About Us<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- HERO SECTION -->
<?= view('layout/partials/hero') ?>

<!-- PHILOSOPHY SECTION -->
<?= view('layout/partials/philosophy') ?>

<!-- GALLERY SECTION -->
<?= view('layout/partials/gallery') ?>

<?= $this->endSection() ?>