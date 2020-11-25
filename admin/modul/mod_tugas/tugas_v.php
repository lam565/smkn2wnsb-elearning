<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">Tugas Siswa</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
       Pilih Mata Pelajaran
     </div>        

     <div class="panel-body">
      <a href="?module=tugas&mp=all" class="btn <?php echo $_GET['mp']=='all' ? "btn-default" : "btn-primary"; ?> btn-sm">Semua</a>
      <a href="?module=tugas&mp=kd_mapel1" class="btn <?php echo $_GET['mp']=='kd_mapel1' ? "btn-default": "btn-primary"; ?> btn-sm">Matematika</a>
      <a href="?module=tugas&mp=kd_mapel2" class="btn <?php echo $_GET['mp']=='kd_mapel2' ? "btn-default": "btn-primary"; ?> btn-sm">Bahasa Indonesia</a>
      <a href="?module=tugas&mp=kd_mapel3" class="btn <?php echo $_GET['mp']=='kd_mapel3' ? "btn-default": "btn-primary"; ?> btn-sm">Bahasa Inggris</a> 
    </div>
  </div> 
</div>
</div>
<div class="row">

  <div class="col-md-9 col-sm-9 col-xs-12">
    <div class="col-md-6 col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-6"><strong>[Tugas] Nama Tugas</strong></div>
            <div class="col-md-6 text-right">24 Nov 2020</div>
          </div>
        </div>
        <div class="panel-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
          <hr>
          File : <a href="#">File Tugas Jika Ada!</a>
        </div>
        <div class="panel-footer text-right">
          <a href="?module=detailtugas&kd=12">Buka >></a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="panel panel-success">
        <div class="panel-heading">
          <strong>[Soal] Soal Pilihan Ganda</strong>
        </div>
        <div class="panel-body">
          <p>Detail Intruksi Soal: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
        </div>
         <div class="panel-footer text-right">
          <a href="?module=detailtugas&kd=12">Buka >></a>
        </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <strong>[Soal] Soal Tampilan Dokumen</strong>
      </div>
      <div class="panel-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
      </div>
      <div class="panel-footer">
        Panel Footer
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        Default Panel
      </div>
      <div class="panel-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
      </div>
      <div class="panel-footer">
        Panel Footer
      </div>
    </div>
  </div>

</div>
<div class="col-md-3 col-sm-3 col-xs-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Daftar Materi
    </div>
    <div class="panel-body">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Mata Pelajaran 1</a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse <?php echo $_GET['mp']=='kd_mapel1' ? "in" : "collapse"; ?>" style="height: auto;">
            <div class="panel-body">
              <ul>
                <li><a href="?module=materi&mp=all">Bab/Materi 1</a></li>
                <li><a href="?module=materi&mp=all">Bab/Materi 2</a></li>
                <li><a href="?module=materi&mp=all">Bab/Materi 3</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Mata Pelajaran 2</a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse <?php echo $_GET['mp']=='kd_mapel2' ? "in" : "collapse"; ?>" style="height: auto;">
            <div class="panel-body">
              <ul>
                <li><a href="?module=materi&mp=all">Bab/Materi 1</a></li>
                <li><a href="?module=materi&mp=all">Bab/Materi 2</a></li>
                <li><a href="?module=materi&mp=all">Bab/Materi 3</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#mapel2" class="collapsed">Mata Pelajaran 3</a>
            </h4>
          </div>
          <div id="mapel2" class="panel-collapse <?php echo $_GET['mp']=='kd_mapel3' ? "in" : "collapse"; ?>" style="height: auto;">
            <div class="panel-body">
              <ul>
                <li><a href="?module=materi&mp=all">Bab/Materi 1</a></li>
                <li><a href="?module=materi&mp=all">Bab/Materi 2</a></li>
                <li><a href="?module=materi&mp=all">Bab/Materi 3</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>