<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header card-top">
        <h3>Event Pendidikan Dan Pelatihan</h3>
        </div>
        <div class="card-body bg-secondary">
          <div class="row">
            <div class="col-md-5" style="background: lightgrey; padding: 15px;">
                <h4>Filter Relawan</h4>
                <input type="text" id="filterNamaRelawan" class="form-control"  placeholder="Tulis nama relawan">
                <ul class="list-group" style="height:350px; overflow: auto;" id="etg_dftRelawan">
                <?php foreach($data['relawan'] AS $relawan): ?>
                <li class="list-group-item etg_idRelawan" id="<?=$relawan['kodeRelawan'];?>">[<?=$relawan['angkatan'];?>] &nbsp;<?=$relawan['namaLengkap'];?></li>
                <?php endforeach;?>
                </ul>
            </div>
            <div class="col-md-5" style="background: lightgrey; padding: 15px;">
                <h4>Form Penugasan</h4>
                <form action="<?=BASEURL?>/penugasan/spEvent" method="post">

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text etg_igt">Nama Tugas</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama Kegiatan siaga" name="namaTugas" id="namaTugas">
                  </div>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text etg_igt">Lokasi Penugasan</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Lokasi Penugasan mis: Kab. Sragen" id="lokasiTugas" name="lokasiTugas" >
                  </div>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text etg_igt">Skope</span>
                    </div>
                      <select name="skope" id="skope" class="form-control">
                        <option>Dalam Kabupaten</option>
                        <option>Luar Kabupaten</option>
                        <option>Luar Propinsi</option>
                        <option>Luar Negeri</option>
                      </select>
                  </div>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text etg_igt">Tanggal Mulai</span>
                    </div>
                    <input type="date" name="tanggalMulai" id="tanggalMulai" class="form-control">
                  </div>
                  
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text etg_igt" >Tanggal Selesai</span>
                    </div>
                    <input type="date" name="tanggalSelesai" id="tanggalSelesai" class="form-control">
                  </div>

                  <div class="form-group">
                      <label for="etg_relawan">Relawan yang dikirim</label>
                      <!--textarea name="kodeRelawan" id="etg_relawan" rows="5" class="form-control"></textarea>
                      <small class='bg-dark text-light'>Pisahkan kode relawan dengan tand semi kolon ( ; )</small-->
                      <div id="etg_relawan"></div>
                  </div>

               
            </div>
            <div class="col-md-2 bg-light py-5">
            <input type="submit" class="form-control btn btn-primary" value="Simpan">
            </form>
            </div>
          </div>
        </div>
        <div class="card-body bg-light">
        <h3>Data Event Pelatihan</h3>
        <table class="table table-sm">
          <thead>
            <tr class="bg-dark">
              <th class="text-center text-light">Nama Penugasan</th>
              <th class="text-center text-light">Lokasi</th>
              <th class="text-center text-light">Lingkup</th>
              <th class="text-center text-light">Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['tugas'] AS $tugas):?>
            <tr>
              <td><?=$tugas['namaTugas'];?></td>
              <td><?=$tugas['lokasiTugas'];?></td>
              <td><?=$tugas['skope'];?></td>
              <td style="text-align:center; width: 240px;"><?=$tugas['tanggalMulai'] . ' - ' . $tugas['tanggalSelesai'];?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        <?php $this->view('template/nomorHalaman',$data); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->view('template/bs4js'); ?>
<script>
  var baseurl="<?=BASEURL;?>";
</script>
<script src="<?=BASEURL;?>/js/eventTugas.js"></script>
