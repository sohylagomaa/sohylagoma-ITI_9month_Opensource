<?php
echo"welcome to php";
//-------------------
$x=5;
$y="welcome";
$z = true;
echo "<br>";
echo gettype($x);
echo "<br>";
echo gettype($y);
echo "<br>";
echo gettype($z);
echo "<br>";
//-------------------
    // for($i=0; $i<=15; $i++){
    //     echo $i. " ";
    // }
    $i=0;
    while($i<=15) {
        echo $i. " ";
        $i++;
    }
    echo "<br>";
//---------------------
define("INSTITUTE", "ITI");
echo INSTITUTE. "<br>";
//----------------------
echo "Is x set? " . (isset($x) ? 'Yes' : 'No') . " | Is x empty? " . (empty($x) ? 'Yes' : 'No') . "<br>";
//----------------------
$m=100;
$n=15;
$result = $m+$n;
if($result>50) 
    echo"Accepted". "<br>";
else
    echo "Not Accepted". "<br>";


//---------------------
echo "<h3>HTML Table via Echo:</h3>";
echo "<table border='1' style='border-collapse: collapse; width: 50%; text-align: center;'>
        <tr>
            <th>Variable Name</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>x</td>
            <td>$x</td>
        </tr>
        <tr>
            <td>y</td>
            <td>$y</td>
        </tr>
      </table>";

// --------------------------------
function numberToString($num) {
    return (string)$num; 
}

echo "Converted 123: " . numberToString(123) . " (Type: " . gettype(numberToString(123)) . ")";

?>