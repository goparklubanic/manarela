<div class="container-fluid">
    <!-- menu -->
    <div class="row row-maroon">
        <div class="col-lg-12 side-head">
            <h2>SISTEM MANAGEMENT RELAWAN</h2>
            <h3>PALANG MERAH INDONESIA KABUPATEN BANJARNEGARA</h3>
            <h4>Jl. Letjend Suprapto No. 73 Telp. +62 286 591471</h4>
        </div>    
    </div>
    <div class="row blue-splitter"></div>
    <!-- main konten -->
    <div class="row">
        <div class="col-lg-2">
            <h4>Identitas Relawan</h4>
            <div class="list-group">
                <?php $person = $data['person']; ?>
                <li class="list-group-item">
                    <?=$person['kodeRelawan'];?>
                </li>
                <li class="list-group-item">
                    <?=$person['namaLengkap'];?><br>
                    <?=$person['jenisKelamin'];?>
                </li>
                <li class="list-group-item">
                    <?=$person['angkatan'];?>
                </li>
                <li class="list-group-item">
                    <?=$person['pendidikanTerakhir'];?>
                </li>
                <li class="list-group-item">
                    <?=$person['nomorTelp'];?>
                </li>
                <li class="list-group-item">
                    <a href=mailto:<?=$person['email'];?>><?=$person['email'];?></a>
                </li>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" data-toggle="modal" data-target="#mdRelawan">Ubah Profil</button>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Diklat</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                    <?php foreach($data['diklat'] AS $dik ): ?>
                    <li class='list-group-item list-group-item list-sm'>
                        <p>
                            <?=$dik['namaPelatihan'];?> <?=$dik['jamKurikulum'];?> Jam , Tingkat <?=$dik['jenjang'];?><br><small><?=$dik['mulai'];?> s.d <?=$dik['selesai'];?></small>
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
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Penugasan</h4>
                </div>
                <div class="card-body">
                    <div class='list-group'>
                    <?php foreach($data['tugas'] AS $tugas):?>
                    <div class="list-group-item list-sm">
                        <p><?=$tugas['namaTugas'];?>, <?=$tugas['lokasiTugas'];?><br><small><?=$tugas['mulai'];?> s.d <?=$tugas['selesai'];?></small>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view('template/bs4js'); ?>
<!-- modal -->
<div class="modal" tabindex="-1" role="dialog" id="mdRelawan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=BASEURL?>/Person/update" method="post">
        <input type="hidden" name="kodeRelawan" value="<?=$person['kodeRelawan'];?>">
        <div class="form-group">
            <input type="text" name="namaLengkap" id="namaLengkap" class="form-control" required value="<?=$person['namaLengkap'];?>" >
        </div>
        <div class="form-group">
            <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                <option value="">Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>
        <div class="form-group">
            <select name="pendidikanTerakhir" id="pendidikanTerakhir" class="form-control">
                <option value="">Pendidikan terakhir</option>
                <option value="SD">SD</option>
                <option value="SLTP">SLTP</option>
                <option value="SLTA">SLTA</option>
                <option value="Diploma">Diploma</option>
                <option value="Sarjana">Sarjana</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="nomorTelp" id="nomorTelp" class="form-control" placeholder="Nomor Telp/HP" value="<?=$person['nomorTelp'];?>">
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Alamat email" value="<?=$person['email'];?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->