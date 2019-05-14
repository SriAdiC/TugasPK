<h2>Data Pelanggan</h2>
<?php
$query = $dbconnect->query("SELECT id_user, nama, username FROM users WHERE level_user = 'member'");

?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <?php $nomor = 1; ?>
            <?php while ($row = $query->fetch_assoc()) : ?>
            <tbody>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['username'] ?></td>

                    <td>
                        <a href="?page=hapus_member&id=<?= $row['id_user'] ?> " onClick='return confirmation();'><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                    </td>
                </tr>
            </tbody>
            <?php $nomor++ ?>
            <?php endwhile; ?>
        </table>
    </div>
</div> 