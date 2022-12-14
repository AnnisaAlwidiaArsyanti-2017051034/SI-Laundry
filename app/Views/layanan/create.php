<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Layanan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Layanan</h6>
        </div>
        <!-- form start -->
        <form action="/storeLayanan" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="jenis_layanan">Jenis Layanan</label>
                    <input type="text" name="jenis_layanan" class="form-control" id="jenis_layanan">
                </div>
                <div class="form-group">
                    <label for="estimasi_waktu">Estimasi Waktu (hari)</label>
                    <input type="text" name="estimasi_waktu" class="form-control" id="estimasi_waktu">
                </div>
                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <input type="text" name="tarif" class="form-control" id="tarif">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Layanan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>