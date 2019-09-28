<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-top">
                    <h3>Penugasan <?=$data['penugasan']['namaTugas'];?> <br> di <?=$data['penugasan']['lokasiTugas'];?> </h3>
                    <h3>Tanggal <?=ymd($data['penugasan']['tanggalMulai']);?> s.d <?=ymd($data['penugasan']['tanggalSelesai']);?></h3>
                </div>
                <div class="card-body">
                    <h2 class='text-center'>Relawan Bertugas</h2>
                    <table class="table table-striped sm">
                        <thead>
                            <tr>
                                <th>Kode Relawan</th>
                                <th>Nama Lengkap Relawan</th>
                                <th>Jenis Kelamin</th>
                                <th>Angkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data['peserta'] AS $relawan): ?>
                            <tr>
                                <td><?=$relawan['kodeRelawan'];?></td>
                                <td><?=$relawan['namaLengkap'];?></td>
                                <td><?=$relawan['jenisKelamin'];?></td>
                                <td><?=$relawan['angkatan'];?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
$this->view('template/bs4js');
function ymd($tgl){
    list($t,$b,$h) = explode( "-" , $tgl );
    return "$h / $b / $t";
}

?>