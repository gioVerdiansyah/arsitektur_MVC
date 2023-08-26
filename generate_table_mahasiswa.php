<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "kampusku";
$tbname = ["murid"];

$conn = mysqli_connect($dbhost, $dbusername, $dbpass);


if (!$conn) {
    die("Koneksi ke DataBase gagal!" . mysqli_connect_errno() . " - " . mysqli_connect_error());
}

// buat DB jika belum ada
$query = "CREATE DATABASE IF NOT EXISTS {$dbname}";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error(
        $conn
    ) . " _ " . mysqli_error($conn));
} else {
    echo "Database <b>\"{$dbname}\"</b> berhasil dibuat!!!<br>";
}

// select DB
$result = mysqli_select_db($conn, $dbname);

if (!$result) {
    die("Query Error: " . mysqli_error(
        $conn
    ) . " _ " . mysqli_error($conn));
} else {
    echo "Database <b>\"{$dbname}\"</b> berhasil dipilih!!!<br>";
}


// cek apakah table mahasiswa sudah ada? jika belum HAPUS
$query = "DROP TABLE IF EXISTS {$tbname[0]}";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error(
        $conn
    ) . " _ " . mysqli_error($conn));
} else {
    echo "Tabel <b>\"{$tbname[0]}\"</b> berhasil dibuat!!!<br>";
}

// query create tabel
$query = "CREATE TABLE {$tbname[0]} (
    nim CHAR(8),
    nama VARCHAR(100),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    fakultas VARCHAR(50),
    jurusan VARCHAR(50),
    ipk DECIMAL(3,2),
    PRIMARY KEY (nim)
)";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error(
        $conn
    ) . " _ " . mysqli_error($conn));
} else {
    echo "Tabel <b>\"{$tbname[0]}\"</b> berhasil buat!!!<br>";
}

// mengisi data
$query = "INSERT INTO {$tbname[0]} VALUES ";
$query .= "('140050', 'Riana Putria', 'Padang', '1996-11-23', ";
$query .= "'FMIPA', 'Kimia', 3.1), ";
$query .= "('150214', 'Rudi Permana', 'Bandung', '1994-08-22', ";
$query .= "'FASILKOM', 'Ilmu Komputer', 2.9), ";
$query .= "('150036', 'Sari Citra Lestari', 'Jakarta', '1997-12-31', ";
$query .= "'Ekonomi', 'Manajemen', 3.5), ";
$query .= "('150022', 'Rina Kumala Sari', 'Jakarta', '1997-06-28', ";
$query .= "'Ekonomi', 'Akuntansi', 3.4), ";
$query .= "('130012', 'James Situmorang', 'Medan', '1995-04-02', ";
$query .= "'Kedokteran','Kedokteran Gigi', 2.7)";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error(
        $conn
    ) . " _ " . mysqli_error($conn));
} else {
    echo "Tabel <b>\"{$tbname[0]}\"</b> berhasil diisi!!!<br>";
}

mysqli_close($conn);
?>