<?php
// ini seharusnya memakai init.php namun karena hanya khsus yang kita miliki simple maka tidak perlu
require "model.php";
$dataMahsiswa = getValueTable("murid");
require "view.php";
?>