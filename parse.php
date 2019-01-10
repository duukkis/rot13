<?php
/**
* makes rot transformation to text.txt file
* rotword tab normalword endline
*/

$transfrom = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "å", "ä", "ö", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "Å", "Ä", "Ö");

$rot = 13;
$transform_to = array_merge(array_slice($transfrom, $rot), array_slice($transfrom, 0, $rot));

$c = file_get_contents("test.txt");

$p = explode("\n", $c);

$data = '';
// count($p)
for($j = 0;$j < count($p);$j++){
  $r = explode(" ", utf8_encode($p[$j]));
  for($i = 0;$i < count($r);$i++){
    $w = preg_replace("/[^a-zA-ZäöåÅÄÖ]+/","",$r[$i]);
    if(!empty($w)){
      print utf8_decode(str_replace($transfrom, $transform_to, $w))."\t".utf8_decode($w).PHP_EOL;
    }
  }
}
// iconv -f iso-8859-1 -t utf-8 < result.txt > file.new
