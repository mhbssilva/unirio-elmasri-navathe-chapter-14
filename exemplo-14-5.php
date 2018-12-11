<?php

/*************************************************************
 * O código deste arquivo é uma adaptação do seguinte código:
 *************************************************************
 *
 * 0) function course_instructor ($course, $teaching_assignments) {
 * 1) if (array_key_exists($course, $teaching_assignments)) {
 * 2) $instructor = $teaching_assignments[$course];
 * 3) RETURN "$instructor is teaching $course";
 * 4) }
 * 5) else {
 * 6) RETURN "there is no $course course";
 * 7) }
 * 8) }
 * 9) $teaching = array('Database' => 'Smith', 'OS' => 'Carrick',
 *    'Graphics' => 'Kam');
 * 10) $teaching['Graphics'] = 'Benson'; $teaching['Data Mining'] = 'Kam';
 * 11) $x = course_instructor('Database', $teaching);
 * 12) print($x);
 * 13) $x = course_instructor('Computer Architecture', $teaching);
 * 14) print($x);
 *
 *************************************************************/

function course_instructor ($course, $teaching_assignments) {

    if (array_key_exists($course, $teaching_assignments)) {
        $instructor = $teaching_assignments[$course];
        return "$instructor is teaching $course";

    } else {
        return "there is no $course course";

    }

}

$teaching                = ['Database' => 'Smith', 'OS' => 'Carrick', 'Graphics' => 'Kam'];
$teaching['Graphics']    = 'Benson';
$teaching['Data Mining'] = 'Kam';

$x = course_instructor('Database', $teaching);
print($x);

$x = course_instructor('Computer Architecture', $teaching);
print($x);

?>