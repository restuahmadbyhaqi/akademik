<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Program Studi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Show Prodi</li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <dl class="dl-horizontal">
                                        <dt>Nama Prodi:</dt>
                                        <dd><?php echo $showprodi['prodi_nama']; ?></dd>
                                        <dt>Akreditasi Prodi:</dt>
                                        <dd><?php echo $showprodi['prodi_akre']; ?></dd>
                                        <dt>Fakultas:</dt>
                                        <dd><?php echo $showprodi['fak_nama']; ?></dd>
                                        <dt>Jenjang Prodi:</dt>
                                        <dd><?php echo $showprodi['prodi_jenj']; ?></dd>
                                        <dt>Status Prodi:</dt>
                                        <dd><?php echo $showprodi['prodi_status']; ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('prodi'); ?>" class="btn btn-outline-info float-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>

