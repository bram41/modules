<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Daftar Log</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Tanggal</th>
                            <th>IP Address</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        foreach ($log as $p) : ?>
                            <tr>
                                <td><?= $p['username'] ?></td>
                                <td><?= $p['times'] ?></td>
                                <td><?= $p['ip'] ?></td>
                                <td><?= $p['keterangan'] ?></td>
                            </tr>
                        <? endforeach;
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->