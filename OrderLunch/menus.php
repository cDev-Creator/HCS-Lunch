<?php
echo "Date: ";
echo date("m-d-Y");
echo "</br>";
$jd=gregoriantojd(1,27,2023);
echo "Day of the week : " .jddayofweek($jd,1);
echo "</br>";

?>