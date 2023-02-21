<?php
srand($_GET["a"]);
if (!(file_exists("words_alpha.txt")))
{
exec("curl -O https://raw.githubusercontent.com/dwyl/english-words/master/words_alpha.txt");
}
$bal = file_get_contents("balance.txt");
$bet = file_get_contents("bet.txt");
if (!(isset($_GET["a"])))
{
header("Location:?a=".rand(0,500000000));
}
else
{
if ($bal < $bet)
{
echo "Your Balance Is Insufisant";
}
else
{
$bal = $bal - $bet;
$dictf = file_get_contents("words_alpha.txt");
$m = rand(500,5000);
$dict = explode("\n",$dictf);
$dc = count($dict);
while ($m)
{
if (10000 == rand(1,10000))
{
$win = intval(1000000/floatval(rand(1,1000000)));
echo "<b>".$win." $ </b>";
$bal = $bal + ($win*$bet);
}
else
{
if (!($m % 49))
{
echo "<a href=\"?a=".rand(0,500000000)."\">".$dict[rand(0,$dc-1)]."</a> ";
}
else
{
echo $dict[rand(0,$dc-1)] . " ";
}
}
$m = $m -1;
}
file_put_contents("balance.txt",$bal);
}
}