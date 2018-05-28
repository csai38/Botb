<?php

$regexp='/zp\:([a-z0-9]+)\:/';
$tplcontent = 'zp:datacontent: lkjkjhbzxvscvscbh zp:alldata:';

preg_match_all($regexp,$tplcontent,$matches);

echo '<pre>';
print_r($matches);
echo '</pre>';