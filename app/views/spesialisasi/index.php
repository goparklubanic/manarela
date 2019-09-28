<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-top">
                    <h3>DATA SPESIALISASI RELAWAN</h3>
                </div>
                <div class="card-body bg-secondary text-light">
                    <div class="row">
                        <div class="col-md-2">
                            <form action="<?=BASEURL;?>/Spesialisasi/save" method="post">
                                <input type="text" name="spc_kodeRelawan" id="spc_kodeRelawan" class="form-control" placeholder="Tulis nama relawan" list="spc_dftRelawan">
                                <datalist id="spc_dftRelawan"></datalist>
                            </div>
                            <div class="col-md-8">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi1" name="kompetensi[]" value="PP">
                                    <label class="form-check-label" for="kompetensi1">PP</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi2" name="kompetensi[]" value="Siaga Bencana">
                                    <label class="form-check-label" for="kompetensi2">Siaga Bencana</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi3" name="kompetensi[]" value="H2P">
                                    <label class="form-check-label" for="kompetensi3">H2P</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi4" name="kompetensi[]" value="PSP">
                                    <label class="form-check-label" for="kompetensi4">PSP</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi5" name="kompetensi[]" value="WASH">
                                    <label class="form-check-label" for="kompetensi5">WASH</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi6" name="kompetensi[]" value="DU">
                                    <label class="form-check-label" for="kompetensi6">DU</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi7" name="kompetensi[]" value="PK">
                                    <label class="form-check-label" for="kompetensi7">PK</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi8" name="kompetensi[]" value="GPM">
                                    <label class="form-check-label" for="kompetensi8">Gerakan PM/BSM</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="kompetensi9" name="kompetensi[]" value="UKTD">
                                    <label class="form-check-label" for="kompetensi9">UKTD</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php
                            if(isset($_SESSION['pesan'])){
                                echo '
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                ' . $_SESSION['pesan'] . '
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                ';
                            }
                            unset($_SESSION['pesan']);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bg-dark text-light py-2 px-4">
                                <h4>Spesialisasi Relawan</h4>
                            </div>
                            <div class="form-group">
                                <input type="text" id="spr_kodeRelawan" class="form-control" placeholder="Tulis Nama Relawan" list="spr_dftRelawan">
                                <datalist id="spr_dftRelawan"></datalist>
                            </div>
                            <div id="spr_dftKompetensi" class="list-group"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-dark text-light py-2 px-4">
                                <h4>Relawan Spesialis</h4>
                            </div>
                            <div class="form-group">
                                <select id="rsp_kompetensi" class="form-control">
                                    <option value="PP">Pertolongan Pertama</option>
                                    <option value="Siaga Bencana">Siaga Bencana</option>
                                    <option value="H2P">H 2 P</option>
                                    <option value="PSP">P S P</option>
                                    <option value="WASH">WASH</option>
                                    <option value="DU">Dapur Umum</option>
                                    <option value="PK">Perawatan Kedaruratan</option>
                                    <option value="GPM">Gerakan Kepalangmerahan</option>
                                    <option value="UKTD">Usaha Kesehatan Transfusi Darah</option>
                                </select>
                            </div>
                            <div class="list-group" id="rsp_dftRelawan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view('template/bs4js');?>
<script src="<?=BASEURL;?>/js/specialist.js"></script>