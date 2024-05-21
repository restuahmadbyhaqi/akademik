<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Fakultas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Fakultas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('fakultas/store'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty(session()->getFlashdata('errors'))) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php endif ?>

                                <div class="form-group">
                                    <label for="fak_nama">Nama Fakultas</label>
                                    <input type="text" class="form-control" name="fak_nama" placeholder="Enter Fakultas Name" value="<?= esc($inputs['fak_nama'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="fak_jmlprodi">Jumlah Prodi</label>
                                    <input type="text" class="form-control" name="fak_jmlprodi" placeholder="Enter The Number of Prodi" value="<?= esc($inputs['fak_jmlprodi'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="fak_lokasi">Lokasi</label>
                                    <select name="fak_lokasi" class="form-control">
                                        <option value="">Pilih Lokasi</option>
                                        <option value="Kampus 1" <?= ($inputs['fak_lokasi'] ?? '') == "Kampus 1" ? "selected" : ""; ?>>Kampus 1</option>
                                        <option value="Kampus 2" <?= ($inputs['fak_lokasi'] ?? '') == "Kampus 2" ? "selected" : ""; ?>>Kampus 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('fakultas'); ?>" class="btn btn-outline-info">Back</a>
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
