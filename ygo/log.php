<?php

$searchedCard = $_SERVER['QUERY_STRING'];

$lock = file_get_contents('lock');

$count = 0;

while($lock=='1') {

   sleep(1);

   $count++;

   if($count > 5) {

      echo 'Fail';

      file_put_contents('lock', '0');

      return;

   }

   $lock = file_get_contents('lock');

}

if($lock=='0') {

   file_put_contents('lock', '1');

   $current = file_get_contents('log.z');

   $current .= date("F j, Y, g:i a") . ": User searched " . $searchedCard . "\n";

   file_put_contents('log.z', $current);

   file_put_contents('lock', '0');

}

?>