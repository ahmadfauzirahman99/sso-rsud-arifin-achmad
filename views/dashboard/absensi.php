<?php
$this->title = "Rekap Absensi";
?>
<div class="card card-body">
    <h2>Data Rekap Absensi </h2>
    <table class="table table-bordered" cellpading="1" width="100%">
        <thead>
            <tr>
                <th style="width: 15px;">No</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>Jam Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($allRekan as $item) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $item['nama_lengkap'] ?></td>
                    <td><?= $item['id_nip_nrp'] ?></td>
                    <td><?= $item['jam_masuk'] ?></td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>