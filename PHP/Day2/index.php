<?php
//1--------------------
$arr = ["PHP", "Open Source", "ITI", "Day2", "Arrays"];
//2--------------------
echo "<h3>print indexed Array</h3>";
foreach ($arr as $value) {
    echo $value . "  ";
}
echo "<br>";
for($i = 0; $i< sizeof($arr); $i++){
    echo  $arr[$i] . " ";
}
//3--------------------
$info = [
    "Name" => "sohyla",
    "Age" => 22,
    "Email" => "sohyla@iti.gov.eg",
    "College" => " Computer science"
];
//4--------------------
echo "<h3>print Associative Array</h3>";
foreach ($info as $key => $val) {
    echo "$key: $val <br>";
}
//5--------------------

asort($info); 
echo "<h3>Sort by Value:</h3>";
print_r($info);

ksort($info); 
echo "<h3>Sort by Key):</h3>";
print_r($info);
//6---------------------
echo "<h3>array_keys() Function</h3>";
$keys = array_keys($info);

echo "The keys in the info array are: <br>";

foreach ($keys as $k) {
    echo "$k". " ";
}

?>