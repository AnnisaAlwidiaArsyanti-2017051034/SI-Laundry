<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pengguna</h6>
        </div>
        <!-- form start -->

        <form action="/updateUser/<?= $user->id ?>" method="post">
            <div class="card-body">
               
                <div class="form-group">
                    <label for="email">E-mail Pengguna</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= $user->email ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username Pengguna</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?= $user->username ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password Pengguna</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Edit Pengguna</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>