<?php
if($_POST["value"] == '' || $_POST["number"] == '' || $_POST["size"] == '')
{
echo "<font face='helvetica'><p>You forgot to enter in something.</p></font>";
}
else if((ctype_digit($_POST["value"]) == false || ctype_digit($_POST["value"]) == false || ctype_digit($_POST["value"]) == false) && 
(strpos($_POST["value"], '.') == FALSE && strpos($_POST["number"], '.') == FALSE && strpos($_POST["size"], '.') == FALSE))
{
echo "<font face='helvetica'><p>Only numbers please.</p></font>";
}
else if($_POST["value"] > 30)
{
$value = doubleval($_POST["value"]);
echo "<font face='helvetica'>There are no point values of $value,</br>unless you did a really good bribing job.</font>";
}
else
{
$value = doubleval($_POST["value"]);
$number = doubleval($_POST["number"]);
$size = doubleval($_POST["size"]);

$counter = 0;

$oldvalue = 30;
$oldnumber = 7;
$groupsize = 0;

$file = file_get_contents("numbers13.txt");

$pieces = explode("\n", $file);
$arrayit = 0;
while (($pieces[$arrayit] >= $value || $pieces[$arrayit+1] < $number) && $arrayit < count($pieces)-2) 
{
if($pieces[$arrayit] == $value && $pieces[$arrayit+1] >= $number)
{
if($groupsize == $size)
{
$counter++;
}
break;
}
if($value > $pieces[$arrayit])
{
break;
}
	if($oldvalue == $pieces[$arrayit] && $oldnumber == $pieces[$arrayit+1])
	{
		$groupsize++;
	}
	else
	{
		if($groupsize == $size)
		{
		$counter++;
		}
		$groupsize = 1;
		$oldvalue = $pieces[$arrayit];
		$oldnumber = $pieces[$arrayit+1];
	}
	$arrayit = $arrayit+2;
}
echo "<font face='helvetica'><h2>Group Counter </h2></font>";
echo "<font face='helvetica'><p>There are $counter groups ahead of you.</p></font>";
echo "<font face='helvetica'><p><a href='program.html'> Go back.</p></a></font>";
}
?>