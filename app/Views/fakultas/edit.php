<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Fakultas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Fakultas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('fakultas/update'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
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

                                <input type="hidden" name="fak_id" value="<?php echo esc($fakultas['fak_id']); ?>">

                                <div class="form-group">
                                    <label for="">Nama Fakultas</label>
                                    <input type="text" value="<?php echo esc($fakultas['fak_nama']); ?>" class="form-control" name="fak_nama" placeholder="Enter Fakultas name">
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah Prodi</label>
                                    <input type="text" value="<?php echo esc($fakultas['fak_jmlprodi']); ?>" class="form-control" name="fak_jmlprodi" placeholder="Enter the number of prodi">
                                </div>

                                <div class="form-group">
                                    <label for="">Lokasi</label>
                                    <select name="fak_lokasi" id="" class="form-control">
                                        <option value="">Pilih Lokasi</option>
                                        <option value="Kampus 1" <?php echo $fakultas['fak_lokasi'] == "Kampus 1" ? 'selected' : '' ?>>Kampus 1</option>
                                        <option value="Kampus 2" <?php echo $fakultas['fak_lokasi'] == "Kampus 2" ? 'selected' : '' ?>>Kampus 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('fakultas'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>
