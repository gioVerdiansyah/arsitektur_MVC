<?php
/**
 * Fungsi untuk membuat koneksi ke database.
 * 
 * @return mysqli Koneksi database.
 */
function connectionDB()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "kampusku";
    return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}
/**
 * Fungsi untuk mendapatkan nilai dari tabel.
 * 
 * @param string $tableName Nama tabel yang ingin diambil nilainya.
 * @return array Nilai dari tabel.
 */
function getValueTable($tableName)
{
    $result = mysqli_query(connectionDB(), "SELECT * FROM {$tableName}");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}