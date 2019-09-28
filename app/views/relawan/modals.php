<!-- modal relawan -->
<div class="modal" tabindex="-1" role="dialog" id="mdlRelawan">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title">Data Relawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=BASEURL;?>/relawan/simpan" method="post">
        <input type="hidden" name="modus" id="mdr_modus">
        <div class="form-group row">
            <label class='col-sm-3' for="kodeRelawan">Kode Relawan</label>
            <div class="col-sm-9">
            <input type="text" name="kodeRelawan" id="mdr_kodeRelawan" class="form-control" placeholder = "Kode Relawan">
            </div>
        </div>

        <div class="form-group row">
            <label class='col-sm-3' for="angkatan">Angkatan</label>
            <div class="col-sm-9">
            <input type="number" name="angkatan" id="mdr_angkatan" class="form-control" placeholder = "Angkatan" value="<?=date('Y');?>">
            </div>
        </div>

        <div class="form-group row">
            <label class='col-sm-3' for="namaLengkap">Nama Lengkap</label>
            <div class="col-sm-9">
            <input type="text" name="namaLengkap" id="mdr_namaLengkap" class="form-control" placeholder = "Nama Lengkap">
            </div>
        </div>

        <div class="form-group row">
            <label class='col-sm-3' for="jenisKelamin">Jenis Kelamin</label>
            <div class="col-sm-9">
            <select name="jenisKelamin" id="mdr_jenisKelamin" class="form-control">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <label class='col-sm-3' for="email">Alamat E-mail</label>
            <div class="col-sm-9">
            <input type="email" name="email" id="mdr_email" class="form-control" placeholder = "Alamat E-mail">
            </div>
        </div>

        <div class="form-group row">
            <label class='col-sm-3' for="nomorTelp">Nomor Telp / HP</label>
            <div class="col-sm-9">
            <input type="text" name="nomorTelp" id="mdr_nomorTelp" class="form-control" placeholder = "Nomor Telepon / HP">
            </div>
        </div>

        <div class="form-group row">
            <label class='col-sm-3' for="pendidikanTerakhir">Pendidikan Terakhir</label>
            <div class="col-sm-9">
            <select name="pendidikanTerakhir" id="mdr_pendidikanTerakhir" class="form-control">
            <option value="SD">SD / MI / PAKET A</option>
            <option value="SLTP">SMP / MTs / PAKET B</option>
            <option value="SLTA">SMA / SMK / MA / PAKET C</option>
            <option value="Diploma">D1, D2, D3</option>
            <option value="Sarjana">Sarjana / S1 Ke atas</option>
            </select>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal pelatihan -->
<!-- modal penugasan -->
<!-- modal spesialisasi -->