<!DOCTYPE html>
<html>
<body>

<?php

//Day 1

$sessions = array("DMS", "DBMS", "CFOS(GRS)", "CFOS(SDK)", "WT", "IOT", "DSA");

//$slot1 = shuffle($sessions);

/*print_r($sessions);
print_r($slot1);*/

for($i=1;$i<=6;$i++)
{
	echo "Slot $i: ";
    shuffle($sessions);
    foreach($sessions as $value)
	{
  		print "$value ";
	}
    echo "<br>";
}



//Day 2

$a=array("DMS", "DBMS", "CFOS(GRS)", "CFOS(SDK)", "WT", "IOT", "DSA");
$random_keys=array_rand($a,4);
//echo $random_keys;
//echo $a[$random_keys[0]]."<br>";
//echo $a[$random_keys[1]]."<br>";
//echo $a[$random_keys[2]]."<br>";
//echo $a[$random_keys[3]]."<br>";

//Array1
for($i=1;$i<=4;$i++)
{
	$slot1=array($a[$random_keys[0]],$a[$random_keys[1]],$a[$random_keys[2]],$a[$random_keys[3]]);
}

$random_keys=array_rand($a,4);
for($i=1;$i<=4;$i++)
{	$slot2=array($a[$random_keys[0]],$a[$random_keys[1]],$a[$random_keys[2]],$a[$random_keys[3]]);
}

$random_keys=array_rand($a,4);
for($i=1;$i<=4;$i++)
{	$slot3=array($a[$random_keys[0]],$a[$random_keys[1]],$a[$random_keys[2]],$a[$random_keys[3]]);
}

$random_keys=array_rand($a,4);
for($i=1;$i<=4;$i++)
{	$slot4=array($a[$random_keys[0]],$a[$random_keys[1]],$a[$random_keys[2]],$a[$random_keys[3]]);
}

$random_keys=array_rand($a,4);
for($i=1;$i<=4;$i++)
{	$slot5=array($a[$random_keys[0]],$a[$random_keys[1]],$a[$random_keys[2]],$a[$random_keys[3]]);
}

$random_keys=array_rand($a,4);
for($i=1;$i<=4;$i++)
{	$slot6=array($a[$random_keys[0]],$a[$random_keys[1]],$a[$random_keys[2]],$a[$random_keys[3]]);
}



echo "Day 1";
echo "<br>";
print_r($slot1);
echo "<br><br>";
echo "Day 2";
echo "<br>";
print_r($slot2);
echo "<br><br>";
echo "Day 3";
echo "<br>";
print_r($slot3);
echo "<br><br>";
echo "Day 4";
echo "<br>";
print_r($slot4);
echo "<br><br>";
echo "Day 5";
echo "<br>";
print_r($slot5);
echo "<br><br>";
echo "Day 6";
echo "<br>";
print_r($slot6);
?> 

</body>
</html>

