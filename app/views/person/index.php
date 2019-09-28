<?php $person = $data['person']; ?>
<div class="container-fluid">
    <!-- menu -->
    <div class="row">
        <div class="col-lg-8 side-head row-maroon">
            <h2>SISTEM MANAGEMENT RELAWAN</h2>
            <h3>PALANG MERAH INDONESIA KABUPATEN BANJARNEGARA</h3>
            <h4>Jl. Letjend Suprapto No. 73 Telp. +62 286 591471</h4>
        </div>
        <div class="col-lg-4">
            <table class="table table-sm mt-3">
                <tbody>
                    <tr>
                        <td>ID Relawan</td><td><?=$person['kodeRelawan'];?></td>
                    </tr>
                    <tr>
                        <td>
                        Nama Relawan [L/P]</td><td><?=$person['namaLengkap'];?>
                        [ <?=$person['jenisKelamin'];?> ]
                        </td>
                    </tr>
                    <tr>
                        <td>Angkatan / Pendidikan </td>
                        <td><?=$person['angkatan'];?>  / <?=$person['pendidikanTerakhir'];?></td>
                    </tr>
                    <tr>
                        <td>Nomor Telp</td><td><?=$person['nomorTelp'];?></td>
                    </tr>
                    <tr>
                        <td>Email</td><td><?=$person['email'];?></td>
                    </tr>

                </tbody>
            </table>
        </div>    
    </div>

    <!-- main konten -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Diklat</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                    <?php foreach($data['diklat'] AS $dik ): ?>
                    <li class='list-group-item list-group-item-sm'>
                        <p>
                            <?=$dik['namaPelatihan'];?> <?=$dik['jamKurikulum'];?> Jam , Tingkat <?=$dik['jenjang'];?><br>
                            <small><?=$dik['mulai'];?> s.d <?=$dik['selesai'];?></small>
                        </p>

                    </li>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="card-header">
                    <h4>Spesialisasi</h4>
                </div>
                <div class="card-body">
                    <?php foreach($data['specs'] AS $spek): ?>
                    <span class="specs"><?=$spek['spec'];?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Penugasan</h4>
                </div>
                <div class="card-body">
                    <div class='list-group'>
                    <?php foreach($data['tugas'] AS $tugas):?>
                    <div class="list-group-item">
                        <p><?=$tugas['namaTugas'];?></p>
                        <p>
                            <?=$tugas['lokasiTugas'];?><br>
                            <small><?=$tugas['mulai'];?> s.d <?=$tugas['selesai'];?></small>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
