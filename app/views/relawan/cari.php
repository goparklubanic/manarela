<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header card-top">
                    <div class="row">
                    <div class="col-sm-8">
                        <h3>DATA RELAWAN PMI KABUPATEN BANJARNEGARA</h3>
                    </div>
                    <div class="col-sm-4">
                        <form class="form-inline">
                            <label class="sr-only" for="relSearchForm">Cari Reawan</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"> <i class="fa fa-search"></i> </div>
                                </div>
                                <input type="text" class="form-control" id="relSearchName" placeholder="Nama Relawan">
                            </div>

                            <button type="button" id="relSearchForm" class="btn btn-primary mb-2">Cari</button>&nbsp;
                            <button type="button" class="btn btn-primary mb-2 toHome"><i class="fa fa-home"></i></button>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                <!-- kodeRelawan,angkatan,namaLengkap,jenisKelamin,email,nomorTelp,pendidikanTerakhir -->
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="bg-primary text-light">
                            <tr class='text-center'>
                                <th>ID Relawan</th>
                                <th>Angkatan</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>email</th>
                                <th>No. Telepon</th>
                                <th>Pendidikan</th>
                                <th> <i class="fa fa-cog"></i> </th>
                            </tr>
                        </thead>
                        <tbody id="dftRelawan">
                            <?php foreach($data['relawan'] AS $relawan ): ?>
                            <tr>
                                <td><?=$relawan['kodeRelawan'];?></td>
                                <td><?=$relawan['angkatan'];?></td>
                                <td><?=$relawan['namaLengkap'];?></td>
                                <td><?=$relawan['jenisKelamin'];?></td>
                                <td><?=$relawan['email'];?></td>
                                <td><?=$relawan['nomorTelp'];?></td>
                                <td><?=$relawan['pendidikanTerakhir'];?></td>
                                <td>
                                    <i class="fa fa-trash-o"></i>&nbsp;
                                    <i class="fa fa-pencil-square-o"></i>&nbsp;
                                    <i class="fa fa-bookmark-o"></i>&nbsp;
                                    <i class="fa fa-ambulance"></i>
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
</div>
<?php // $this->view('template/nomorHalaman',$data); ?>
<?php $this->view('template/bs4js'); ?>
<script src="<?=BASEURL;?>/js/relw-main.js"></script>