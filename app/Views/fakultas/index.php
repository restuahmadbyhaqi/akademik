<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Fakultas Universitas Muhammadiyah Magelang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Fakultas</li>
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
                            Daftar fakultas
                            <a href="<?php echo base_url('fakultas/create'); ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>

                        <div class="card-body">
                            <?php if(!empty(session()->getFlashdata('success'))) { ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success');?>
                                </div>
                            <?php } ?>

                            <?php if(!empty(session()->getFlashdata('info'))) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('info');?>
                                </div>
                            <?php } ?>

                            <?php if(!empty(session()->getFlashdata('warning'))) { ?>
                                <div class="alert alert-warning">
                                    <?php echo session()->getFlashdata('warning');?>
                                </div>
                            <?php } ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Fakultas</th>
                                            <th>Jumlah Prodi</th>
                                            <th>Lokasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($fakultas as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $row['fak_nama']; ?></td>
                                                <td><?php echo $row['fak_jmlprodi']; ?></td>
                                                <td><?php echo $row['fak_lokasi']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('fakultas/edit/'.$row['fak_id']); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('fakultas/delete/'.$row['fak_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data Fakultas ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
