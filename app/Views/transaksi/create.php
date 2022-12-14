<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
    <form action="/storeTransaksi" method="post">
    <?php
        $id_transaksi = $kode[0]['kodeTerbesar'];
        $id_transaksi++;
        $huruf = "T";
        $kodetransaksi = $huruf . sprintf("%04s", $id_transaksi);
    ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h5>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="text-right">No Invoice <?php echo $kodetransaksi; ?></h5>
                        <input type="hidden" name="no_invoice" id="no_invoice" value="<?php echo $kodetransaksi; ?>" >
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan">
                </div>
                <div class="form-group">
                    <label for="nomor_tlp_pelanggan">No Telp Pelanggan</label>
                    <input type="text" name="nomor_tlp_pelanggan" class="form-control" id="nomor_tlp_pelanggan">
                </div>
                <div class="form-group">
                    <label for="alamat_pelanggan">Alamat Pelanggan</label>
                    <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan">
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
                </div>
                <div class="form-group">
                    <label for="berat">Berat (KG)</label>
                    <input step="any" type="number" name="berat" class="form-control" id="berat">
                </div>
                <div class="form-group">
                    <label for="layanan">Pilih Layanan</label>
                    <select name="layanan" id="layanan" class="form-control" required>
                        <option value="" hidden>--Pilih--</option>
                        <?php foreach ($layanan as $lyn) : ?>
                            <option value="<?= $lyn['layanan_id'] ?>"><?= $lyn['jenis_layanan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" readonly>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="number" name="biaya" class="form-control" id="biaya" readonly>
                </div>
                <div class="form-group">
                    <label>Status Pembayaran : </label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="status_pembayaran" name="status_pembayaran" value="Belum Dibayar">
                        <label class="custom-control-label" for="status_pembayaran">Belum Dibayar</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="status_pembayaran2" name="status_pembayaran" value="Telah Dibayar">
                        <label class="custom-control-label" for="status_pembayaran2">Telah Dibayar</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Buat Transaksi</button>
            </div>
        </div>    
    </form>
</div>


<script src="<?= base_url('assets/sbadmin/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#layanan').change(function() {
            var layanan_id = $('#layanan').val();
            var berat = $('#berat').val();
            var action = 'get_layanan';

            $('#tanggal_masuk').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#tanggal_keluar').datepicker({
                format: 'yyyy-mm-dd'
            });

            $.ajax({
                url: "<?php echo site_url('/getLayanan'); ?>",
                method: "post",
                data: {
                    layanan_id: layanan_id,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    $('#biaya').val(data[0].tarif * berat);
                    var tanggal_masuk = $('#tanggal_masuk').datepicker('getDate');
                    var date = new Date(Date.parse(tanggal_masuk));
                    date.setDate(date.getDate() + +data[0].estimasi_waktu);

                    var newDate = date.toDateString();
                    newDate = new Date(Date.parse(newDate));

                    $('#tanggal_keluar').datepicker('setDate', newDate);

                }
            });
        });

    });
</script>
<?= $this->endSection(); ?>