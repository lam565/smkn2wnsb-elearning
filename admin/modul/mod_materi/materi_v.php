<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">Materi Belajar Siswa</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
       Pilih Mata Pelajaran
     </div>        

     <div class="panel-body">
      <a href="?module=materi&mp=all" class="btn <?php echo $_GET['mp']=='all' ? "btn-default" : "btn-primary"; ?> btn-sm">Semua</a>
      <a href="?module=materi&mp=kd_mapel1" class="btn <?php echo $_GET['mp']=='kd_mapel1' ? "btn-default": "btn-primary"; ?> btn-sm">Matematika</a>
      <a href="?module=materi&mp=kd_mapel2" class="btn <?php echo $_GET['mp']=='kd_mapel2' ? "btn-default": "btn-primary"; ?> btn-sm">Bahasa Indonesia</a>
      <a href="?module=materi&mp=kd_mapel3" class="btn <?php echo $_GET['mp']=='kd_mapel3' ? "btn-default": "btn-primary"; ?> btn-sm">Bahasa Inggris</a> 
    </div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-9 col-sm-9 col-xs-12">
    <?php
    if (isset($_GET['mp'])){
      $mapel=$_GET['mp'];
    } else {
      $mapel='all';
    }

    switch ($mapel) {
      case 'kd_mapel1':
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>Materi </th>
              <th>Mata Pelajaran </th>
              <th>Guru Pengampu </th>
              <th>File </th>
              <th>Aksi </th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd gradeX">
              <td>Tiga Dimensi</td>
              <td>Matapelajaran 1</td>
              <td>Guru Mapel 1</td>
              <td class="center">Tiga Dimensi untuk SMK kelas XII Ganjil.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
            <tr class="odd gradeX">
              <td>Aljabar Linier</td>
              <td>Matapelajaran 1</td>
              <td>Guru Mapel 1</td>
              <td class="center">Aljabar Linier untuk SMK kelas XII Ganjil.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>       
          </tbody>
        </table>
      </div>
      <?php
      break;

      case 'kd_mapel2':
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>Materi </th>
              <th>Mata Pelajaran </th>
              <th>Guru Pengampu </th>
              <th>File </th>
              <th>Aksi </th>
            </tr>
          </thead>
            <tr class="odd gradeX">
              <td>Inti Bacaan dan Gagasan Pokok </td>
              <td>Matapelajaran 2</td>
              <td>Guru Mapel 2</td>
              <td class="center">Gagasan Pokok.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
          <tbody>                                
          </tbody>
        </table>
      </div>
      <?php
      break;

      case 'kd_mapel3':
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>Materi </th>
              <th>Mata Pelajaran </th>
              <th>Guru Pengampu </th>
              <th>File </th>
              <th>Aksi </th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd gradeX">
              <td>Past Tense</td>
              <td>Matapelajaran 3</td>
              <td>Guru Mapel 3</td>
              <td class="center">Past Tense.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
            <tr class="odd gradeX">
              <td>Telling Time</td>
              <td>Matapelajaran 3</td>
              <td>Guru Mapel 3</td>
              <td class="center">Telling Time.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
            <tr class="odd gradeX">
              <td>Expression</td>
              <td>Matapelajaran 3</td>
              <td>Guru Mapel 3</td>
              <td class="center">Expression.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>                            
          </tbody>
        </table>
      </div>
      <?php
      break;

      default:
      //all
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>Materi </th>
              <th>Mata Pelajaran </th>
              <th>Guru Pengampu </th>
              <th>File </th>
              <th>Aksi </th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd gradeX">
              <td>Aljabar Linier</td>
              <td>Matapelajaran 1</td>
              <td>Guru Mapel 1</td>
              <td class="center">Aljabar Linier untuk SMK kelas XII Ganjil.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr> 
            <tr class="odd gradeX">
              <td>Past Tense</td>
              <td>Matapelajaran 3</td>
              <td>Guru Mapel 3</td>
              <td class="center">Past Tense.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
            <tr class="odd gradeX">
              <td>Inti Bacaan dan Gagasan Pokok </td>
              <td>Matapelajaran 2</td>
              <td>Guru Mapel 2</td>
              <td class="center">Gagasan Pokok.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
            <tr class="odd gradeX">
              <td>Telling Time</td>
              <td>Matapelajaran 3</td>
              <td>Guru Mapel 3</td>
              <td class="center">Telling Time.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
            <tr class="odd gradeX">
              <td>Tiga Dimensi</td>
              <td>Matapelajaran 1</td>
              <td>Guru Mapel 1</td>
              <td class="center">Tiga Dimensi untuk SMK kelas XII Ganjil.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>
            <tr class="odd gradeX">
              <td>Expression</td>
              <td>Matapelajaran 3</td>
              <td>Guru Mapel 3</td>
              <td class="center">Expression.pdf</td>
              <td class="center"><a href="modul/mod_materi/download.php?materi=file materi.pdf">Download</a> | <a href="#" class="pmateri" data-id="1" data-judul="Judule Materi">Preview</a></td>
            </tr>                                
          </tbody>
        </table>
      </div>
      <?php
      break;
    }

    ?>
  </div>

  <div class="modal fade" id="previewmateri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Judul Materi</h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-3 col-xs-12" >
    <div class="alert alert-info text-center">
      <?php
      
      switch ($mapel) {
        case 'kd_mapel1':
        ?>
        <h3> Mata Pelajaran 1 </h3> 
        <hr />
        <img src="assets/img/user2.png">
        <hr />
        <p>
         <h4>Nama Guru Mata Pelajaran 1</h4>
         <h4>Tahun Ajaran 2020/2021 Ganjil</h4>
       </p>
       <hr />
       <a href="#" class="btn btn-info">Lihat Detail</a>
       <?php
       break;

       case 'kd_mapel2':
       ?>
       <h3> Mata Pelajaran 2 </h3> 
       <hr />
       <img src="assets/img/user2.png">
       <hr />
       <p>
         <h4>Nama Guru Mata Pelajaran 2</h4>
         <h4>Tahun Ajaran 2020/2021 Ganjil</h4>
       </p>
       <hr />
       <a href="#" class="btn btn-info">Lihat Detail</a>
       <?php
       break;

       case 'kd_mapel3':
       ?>
       <h3> Mata Pelajaran 3 </h3> 
       <hr />
       <img src="assets/img/user2.png">
       <hr />
       <p>
         <h4>Nama Guru Mata Pelajaran 3</h4>
         <h4>Tahun Ajaran 2020/2021 Ganjil</h4>
       </p>
       <hr />
       <a href="#" class="btn btn-info">Lihat Detail</a>
       <?php
       break;

       default:
       ?>
       <h3> NAMA SISWA DISINI </h3> 
       <hr />
       <img src="assets/img/user2.png">
       <hr />
       <p>
         <h4>Kelas XII A</h4>
         <h4>Tahun Ajaran 2020/2021 Ganjil</h4>
       </p>
       <hr />
       <a href="#" class="btn btn-info">Ubah Data</a>
       <?php
       break;
     }
     ?> 
   </div>
 </div>
</div>