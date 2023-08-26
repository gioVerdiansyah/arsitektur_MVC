<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "kampusku";
$tbname = ["murid"];

$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

$query = "SELECT * FROM {$tbname[0]}";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mahasiswa</title>
    <style>
    /* ====GLOBAL STYLE==== */
    body {
        background-color: #F8F8F8;
    }

    div.container {
        width: 960px;
        padding: 10px 50px 50px;
        background-color: white;
        margin: 20px auto;
        box-shadow: 1px 0px 10px, -1px 0px 10px;
    }

    h1 {
        text-align: center;
        font-family: Cambria, "Times New Roman", serif;
        clear: both;
    }

    /* ======TABLE====== */
    table {
        border-collapse: collapse;
        border-spacing: 0;
        border: 1px black solid;
        width: 100%
    }

    th,
    td {
        padding: 8px 15px;
        border: 1px black solid;
    }

    tr:nth-child(2n+3) {
        background-color: #F2F2F2;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>IPK</th>
            </thead>
            <tbody>
                <?php foreach ($result as $dataMhs):

                    $tanggal_php = strtotime($dataMhs["tanggal_lahir"]);
                    $tanggal = date("d - m - Y", $tanggal_php); ?>
                <tr>
                    <td>
                        <?= $dataMhs['nim'] ?>
                    </td>
                    <td>
                        <?= $dataMhs['nama'] ?>
                    </td>
                    <td>
                        <?= $dataMhs['tempat_lahir'] ?>
                    </td>
                    <td>
                        <?= $tanggal ?>
                    </td>
                    <td>
                        <?= $dataMhs['fakultas'] ?>
                    </td>
                    <td>
                        <?= $dataMhs['jurusan'] ?>
                    </td>
                    <td>
                        <?= $dataMhs['ipk'] ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
            </tr>
        </table>
    </div>
</body>

</html>