<div class="modal modal-default fade in" id="<?= $data['id_pdk']  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Biodata</h4>
      </div>
      <div class="modal-body">

              <strong><i class="fa fa-credit-card margin-r-5"></i> NIK</strong>

              <p class="text-muted">
                <?= ucwords(strtolower($data['nik_pdk']))  ?>
              </p>

              <hr>

              <strong><i class="fa fa-user margin-r-5"></i> Nama Lengkap</strong>

              <p class="text-muted">
                <?= ucwords(strtolower($data['nama_pdk']))  ?>
              </p>

              <hr>

              <strong><i class="fa fa-mars margin-r-5"></i> Jenis Kelamin</strong>

              <p class="text-muted">
                <?= ucwords(strtolower($data['jk_pdk'])) ?>
              </p>

              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i> Tempat, Tanggal Lahir</strong>

              <p class="text-muted">
                <?= ucwords(strtolower($data['tmp_lahir_pdk'])).', '.date('d M Y', strtotime($data['tgl_lahir_pdk'])) ?>
              </p>

              <hr>

              <strong><i class="fa fa-check margin-r-5"></i> Agama</strong>

              <p class="text-muted"><?= ucwords(strtolower($data['agama_pdk']))  ?></p>

              <hr>

              <strong><i class="fa fa-legal margin-r-5"></i> Status Nikah</strong>

              <p class="text-muted"><?= ucwords(strtolower($data['stts_nikah_pdk']))  ?></p>

              <hr>

              <strong><i class="fa fa-eyedropper margin-r-5"></i> Golongan Darah</strong>

              <p class="text-muted"><?= ucwords(strtolower($data['gol_darah_pdk']))  ?></p>

              <hr>

              <strong><i class="fa fa-home margin-r-5"></i> Alamat Lengkap</strong>

              <p class="text-muted">
                <?= 'RT-'.ucwords(strtolower($data['nama_rt'])).
                    ' / RW-'.ucwords(strtolower($data['nama_rw'])).
                    ', '.ucwords(strtolower($data['nama_dusun'])).
                    ', '.ucwords(strtolower($data['nama_kel'])).
                    ', Kecamatan '.ucwords(strtolower($data['nama_kec'])).
                    ', Kabupaten '.ucwords(strtolower($data['nama_kab'])).
                    ', '.ucwords(strtolower($data['nama_prov']))
                     ?>
              </p>

              <hr>

              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Nomor Telepon</strong>

              <p class="text-muted"><?= ucwords(strtolower($data['hp_pdk']))  ?></p>

              <!-- <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> -->





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
