<?php

/*************************************************************
 * O código deste arquivo é uma adaptação do seguinte código:
 *************************************************************
 *
 * 0) $teaching = array('Database' => 'Smith', 'OS' => 'Carrick',
 *    'Graphics' => 'Kam');
 * 1) $teaching['Graphics'] = 'Benson'; $teaching['Data Mining'] = 'Kam';
 * 2) sort($teaching);
 * 3) foreach ($teaching as $key => $value) {
 * 4) print " $key : $value\n";}
 * 5) $courses = array('Database', 'OS', 'Graphics', 'Data Mining');
 * 6) $alt_row_color = array('blue', 'yellow');
 * 7) for ($i = 0, $num = count($courses); i < $num; $i++) {
 * 8) print '<TR bgcolor="' . $alt_row_color[$i % 2] . '">';
 * 9) print "<TD>Course $i is</TD><TD>$course[$i]</TD></TR>\n";
 * 10) }
 *
 *************************************************************/

$teaching                = ['Database' => 'Smith', 'OS' => 'Carrick', 'Graphics' => 'Kam'];
$teaching['Graphics']    = 'Benson';
$teaching['Data Mining'] = 'Kam';

sort($teaching);

foreach ($teaching as $key => $value) {
    print " $key : $value\n";
}

$courses        = ['Database', 'OS', 'Graphics', 'Data Mining'];
$alt_row_color  = ['blue', 'yellow'];

for ($i = 0, $num = count($courses); $i < $num; $i++) {
    print '<TR bgcolor="' . $alt_row_color[$i % 2] . '">';
    print "<TD>Course $i is</TD><TD>{$courses[$i]}</TD></TR>\n";
}

?>