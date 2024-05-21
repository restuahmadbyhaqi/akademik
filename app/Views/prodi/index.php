<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Program Studi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Prodi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List Prodi
                            <a href="<?php echo base_url('prodi/create'); ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>
                        <div class="card-body">
                            <?php
                            $flashMessages = [
                                'success' => 'success',
                                'info' => 'info',
                                'warning' => 'warning'
                            ];

                            foreach ($flashMessages as $type => $message) {
                                if (!empty(session()->getFlashdata($type))) {
                                    echo '<div class="alert alert-' . $type . '">' . session()->getFlashdata($type) . '</div>';
                                }
                            }
                            ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th width="10px" class="text-center">No</th>
                                            <th>Nama Prodi</th>
                                            <th>Jenjang</th>
                                            <th>Akreditasi</th>
                                            <th>Status</th>
                                            <th>Fakultas</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataprodi as $key => $row) : ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1; ?></td>
                                                <td><?= $row['prodi_nama']; ?></td>
                                                <td><?= $row['prodi_jenj']; ?></td>
                                                <td><?= $row['prodi_akre']; ?></td>
                                                <td><?= $row['prodi_status']; ?></td>
                                                <td><?= $row['fak_nama']; ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('prodi/show/' . $row['prodi_id']); ?>" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i> </a>
                                                        <a href="<?= base_url('prodi/edit/' . $row['prodi_id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                        <a href="<?= base_url('prodi/delete/' . $row['prodi_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');"><i class="fa fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>
