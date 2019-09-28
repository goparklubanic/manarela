<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center card-top">
                    <h3>DATA PELATIHAN RELAWAN PMI KABUPATEN BANJARNEGARA</h3>
                    <h5>
                    Kode Relawan: <?=$data['kodeRelawan'];?>
                    <a href="<?=BASEURL;?>/relawan"> <i class="fa fa-home"></i> </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h3>IDENTITAS RELAWAN</h3>
                    </div>
                    <?php  $relawan = $data['relawan'] ;?>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="bg-secondary text-light">
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Nomor Telp/HP</th>
                                <th>Pendidikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$relawan['namaLengkap'];?></td>
                                <td><?=$relawan['jenisKelamin'];?></td>
                                <td><?=$relawan['email'];?></td>
                                <td><?=$relawan['nomorTelp'];?></td>
                                <td><?=$relawan['pendidikanTerakhir'];?></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h3>RIWAYAT DIKLAT</h3>
                    </div>
                    <div>
                    <?php
                    if(isset($_SESSION['pesan'])){
                        echo '
                        <div class="alert alert-info alert-dismissible fade show" role="alert">' . $_SESSION['pesan'] .' 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ';
                        unset($_SESSION['pesan']);
                    }
                    
                    ?>
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Nama Pelatihan</th>
                                <th>Jenjang</th>
                                <th>Mulai Tanggal</th>
                                <th>Sampai Tanggal</th>
                                <th>Jumlah Jam</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <form action="<?=BASEURL;?>/pelatihan/simpan" method="post">
                        <input type="hidden" name="kodeRelawan" id="kodeRelawan" value="<?=$data['kodeRelawan'];?>">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="namaPelatihan" id="namaPelatihan" class="form-control">
                                </td>
                                <td>
                                    <select name="jenjang" id="jenjang" class="form-control">
                                        <option>Kabupaten</option>
                                        <option>Propinsi</option>
                                        <option>Nasional</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="date" name="tanggalMulai" id="tanggalMulai" class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="tanggalSelesai" id="tanggalSelesai" class="form-control">
                                </td>
                                <td width="105px">
                                    <input type="number" name="jamKurikulum" id="jamKurikulum" class="form-control" style="width:100px;">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary" id="pelatSubmit">Simpan</button>
                                </td>
                            </tr>
                        <!--/tbody-->
                        </form>
                    <!--/table>
                    <br>
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr class="bg-primary">
                                <th>Nama Pelatihan</th>
                                <th>Jenjang</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jumlah Jam</th>
                                <th>Konrol</th>
                            </tr>
                        </thead>
                        <tbody-->
                        <?php foreach($data['pelatihan'] AS $pelatihan ): ?>
                        <tr>
                            <td><?=$pelatihan['namaPelatihan'];?></td>
                            <td><?=$pelatihan['jenjang'];?></td>
                            <td><?=$pelatihan['tanggalMulai'];?></td>
                            <td><?=$pelatihan['tanggalSelesai'];?></td>
                            <td><?=$pelatihan['jamKurikulum'];?> jam</td>
                            <td>
                                <i class="fa fa-trash-o" id="<?=$pelatihan['idxPelatihan'];?>"></i>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view('template/bs4js');?>
<script>
    $(document).ready( function(){
        $(".fa-trash-o").click( function(){
            let idxPelatihan =  $(this).prop('id') ;
            let tenan = confirm('Data pelatihan akan dihapus');
            if( tenan == true ){
                window.location = "<?=BASEURL;?>/pelatihan/batal/"+idxPelatihan+"/<?=$data['kodeRelawan'];?>";
            }
        })
    })
</script>