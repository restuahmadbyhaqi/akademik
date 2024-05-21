<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Prodi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Prodi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');

                    if (!empty($errors)) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Whoops! Ada kesalahan saat input data, yaitu:
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?= form_open_multipart('prodi/store'); ?>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?= form_label('fakultas', 'fakultas'); ?>
                                        <?= form_dropdown('fak_id', $fakultas, isset($inputs['fak_id']) ? $inputs['fak_id'] : '', ['class' => 'form-control']); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="prodi_nama">Nama Prodi</label>
                                        <input type="text" class="form-control" name="prodi_nama" id="prodi_nama" placeholder="Enter Prodi name" value="<?= old('prodi_nama') ?? (isset($inputs['prodi_nama']) ? $inputs['prodi_nama'] : '') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="prodi_akre">Akreditasi Prodi</label>
                                        <?= form_dropdown('prodi_akre', ['' => 'Pilih', 'A' => 'A', 'B' => 'B', 'C' => 'C' ], isset($inputs['prodi_akre']) ? $inputs['prodi_akre'] : '', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prodi_jenj">Jenjang Prodi</label>
                                        <?= form_dropdown('prodi_jenj', ['' => 'Pilih', 'D3' => 'D3', 'S1' => 'S1', 'S2' => 'S2' ], isset($inputs['prodi_jenj']) ? $inputs['prodi_jenj'] : '', ['class' => 'form-control']); ?>
                                    </div>

                                    <div class="form-group">
                                        <?= form_label('Status', 'prodi_status'); ?>
                                        <?= form_dropdown('prodi_status', ['' => 'Pilih', 'Active' => 'Active', 'Inactive' => 'Inactive'], $inputs['prodi_status'] ?? '', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="<?= base_url('prodi'); ?>" class="btn btn-outline-info">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>
