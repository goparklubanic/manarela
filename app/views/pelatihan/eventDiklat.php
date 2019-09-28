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
                <ul class="list-group" style="height:350px; overflow: auto;" id="epl_dftRelawan">
                <?php foreach($data['relawan'] AS $relawan): ?>
                <li class="list-group-item epl_idRelawan" id="<?=$relawan['kodeRelawan'];?>">[<?=$relawan['angkatan'];?>] &nbsp;<?=$relawan['namaLengkap'];?></li>
                <?php endforeach;?>
                </ul>
            </div>
            <div class="col-md-5" style="background: lightgrey; padding: 15px;">
                <h4>Form Diklat</h4>
                <form action="<?=BASEURL?>/pelatihan/spEvent" method="post">

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text epl_igt">Nama Diklat</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama Pelatihan" name="nama" id="nama">
                  </div>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text epl_igt">Jam Kurikulum</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Nama Pelatihan" id="jamKurikulum" name="jamKurikulum" >
                  </div>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text epl_igt">Jenjang</span>
                    </div>
                      <select name="jenjang" id="jenjang" class="form-control">
                        <option>Kabupaten</option>
                        <option>Propinsi</option>
                        <option>Nasional</option>
                      </select>
                  </div>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text epl_igt">Tanggal Mulai</span>
                    </div>
                    <input type="date" name="tanggalMulai" id="tanggalMulai" class="form-control">
                  </div>
                  
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text epl_igt" >Tanggal Selesai</span>
                    </div>
                    <input type="date" name="tanggalSelesai" id="tanggalSelesai" class="form-control">
                  </div>

                  <div class="form-group">
                      <label for="epl_relawan">Relawan yang dikirim</label>
                      <!--textarea name="kodeRelawan" id="epl_relawan" rows="5" class="form-control"></textarea>
                      <small class='bg-dark text-light'>Pisahkan kode relawan dengan tand semi kolon ( ; )</small-->
                      <div id="epl_relawan"></div>
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
              <th class="text-center text-light">Nama Diklat</th>
              <th class="text-center text-light">Jenjang</th>
              <th class="text-center text-light">Tanggal</th>
              <th class="text-center text-light">Kurikulum Jam</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['diklat'] AS $diklat):?>
            <tr>
              <td><?=$diklat['namaPelatihan'];?></td>
              <td><?=$diklat['jenjang'];?></td>
              <td style="text-align:center; width: 240px;"><?=$diklat['tanggalMulai'] . ' - ' . $diklat['tanggalSelesai'];?></td>
              <td style="text-align:right; width: 160px;"><?=$diklat['jamKurikulum'];?>&nbsp; Jam</td>
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
<script src="<?=BASEURL;?>/js/eventDiklat.js"></script>
