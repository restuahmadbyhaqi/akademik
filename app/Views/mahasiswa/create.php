<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('mahasiswa/create'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $inputs = session()->getFlashdata('inputs');
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <label for="">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" name="mhs_nama" placeholder="Enter mahasiswa name" value="<?php echo isset($inputs['mhs_nama']) ? $inputs['mhs_nama'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">NPM Mahasiswa</label>
                                    <input type="text" class="form-control" name="mhs_npm" placeholder="Enter NPM" value="<?php echo isset($inputs['mhs_npm']) ? $inputs['mhs_npm'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Prodi</label>
                                    <select name="prodi_id" class="form-control">
                                        <option value="">Pilih Prodi</option>
                                        <?php foreach ($data_prodi as $prodi) : ?>
                                            <option value="<?= $prodi['prodi_id'] ?>"><?= $prodi['prodi_nama'] ?></option>dx
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('mahasiswa'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>
