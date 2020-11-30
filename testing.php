<?php 
"SELECT *
FROM kurikulum, detail_kurikulum as dk, mapel, kelas, guru, silabus, materi, timeline
WHERE kurikulum.kd_kurikulum=dk.kd_kurikulum AND kurikulum.aktif='Y' AND dk.kd_kelas=kelas.kd_kelas AND dk.kd_mapel=mapel.kd_mapel AND dk.kd_guru=guru.kd_guru AND dk.kd_silabus=silabus.kd_silabus AND dk.id_detail=materi.id_detail AND timeline.id_jenis=materi.kd_materi";
 ?>