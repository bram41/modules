<html>
<head>
    <title>PAGINATION | CODEIGNITER 3</title>

    <!-- LOAD FILE CSS BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css"); ?>">
</head>
<body>
    <div class="container">
    <h1>Data Siswa</h1><hr>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
            <?php
                foreach($data->result() as $s){ // Lakukan looping pada variabel siswa dari controller
                    echo "<tr>";
                    echo "<td>".$s->prod_name."</td>";
                    echo "<td>".$s->stock."</td>";
                    echo "<td>".$s->prod_price."</td>";
                    echo "<td>".$s->prod_desc."</td>";
                    echo "<td>".$s->prod_image."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
    <?php
    // Tampilkan link-link paginationnya
        echo $pagination;
    ?>
    </div>
</body>
</html>