<?php
include("../../../conf/connection.php");

$id_poli = isset($_GET['id_poli']) ? $_GET['id_poli'] : null;
echo $id_poli;
$jadwal = $conn->query("SELECT 
    a.nama AS nama_dokter,
    b.id AS id_jadwal,
    b.hari AS hari,
    b.jam_mulai AS jm,
    b.jam_selesai AS js
    FROM dokter AS a
    JOIN jadwal_periksa as b
    ON a.id = b.id_dokter
    WHERE a.id_poli = '$id_poli'");

if ($jadwal->num_rows == 0) {
    echo '<option>Tidak ada jadwal</option>';
} else {
    while ($jd = $jadwal->fetch_assoc()) {
        echo '<option value=' . $jd['id_jadwal'] . '>' . $jd['nama_dokter'].' | '.$jd['hari'].', '.$jd['jm'].'-'.$jd['js']. ' </option>';
    }
}
