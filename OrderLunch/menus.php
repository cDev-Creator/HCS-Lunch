<?php

// Return date/time info of a timestamp; then format the output
$mydate=getdate(date("U"));
echo "Day of the week : ";
$weekday = "$mydate[weekday]";
echo $weekday;
echo"</br>";
echo "Date: ";
echo "$mydate[month] $mydate[mday], $mydate[year]";

if($weekday == "Friday") {
    echo 'Rat baby works';
}

echo"</br>";
echo "Restaraunt:";

switch ($weekday) {
case "Monday":
    echo " 54 Pizza";
    break;
case "Tuesday":
    echo " Chick-fil-A";
    break;
case "Wednesday":
    echo " Ritzy's";
    break;
case "Thursday":
    echo " Arby's";
    break;
case "Friday":
    echo " Great Harvest";
    break;
default:
    echo "School is not in session!";
}

echo "</br>"
?>